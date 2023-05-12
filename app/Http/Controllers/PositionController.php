<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class PositionController extends Controller
{
    public function list() {
        $positions = Position::latest()->where('moderated', 'yes')->take(10)->get();
        return view('index', [
            'positions' => $positions
        ]);
    }

    public function index(Position $position) {
        return view('position.index', ['position' => $position]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        // Check if company belongs to the user
        if (!Company::find($request->company_id)->user->user_id === auth()->user()->user_id) {
            return back();
        }
        
        Position::create($request->only(['title', 'description', 'company_id']));

        return back()->with('status', __('positions.On moderation'));
    }

    public function destroy(Position $position) {

        // Check if company belongs to the user
        if (!Gate::allows('update-position', $position)) {
            abort(403);
        }

        $position->delete();

        return back();

    }

    public function editForm(Position $position) {
        if (!Gate::allows('update-position', $position)) {
            abort(403);
        }
        return view('position.edit-form', [ 'position' => $position ]);
    }

    public function edit(Position $position, Request $request) {

        // Check if company of the position belongs to current user
        if (!Gate::allows('update-position', $position)) {
            abort(403);
        }
        $position->title = $request->title;
        $position->description = $request->description;
        $position->moderated = 'no';
        $position->save();
        return redirect()->route('position', $position);
    }
}
