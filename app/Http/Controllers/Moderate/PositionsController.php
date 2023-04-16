<?php

namespace App\Http\Controllers\Moderate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionsController extends Controller
{
    
    public function __construct() {
        $this->middleware(['canany:moderate-positions,moderate']);
    }

    public function moderatePositionsList() {
        $positions = Position::get()->where('moderated', 'no');

        return view('moderate.positions', ['positions' => $positions]);
    }

    
    public function moderatePositionForm(Position $position) {
        return view('moderate.position-form', ['position' => $position]);
    }

    public function moderatePosition(Position $position, Request $request) {

        $position->moderated = $request->moderated;

        if ($request->moderated == 'remoderation') {
            $position->moderationComments = $request->comments;
        }
        $position->save();
        return redirect()->route('moderate.positions');

    }
}
