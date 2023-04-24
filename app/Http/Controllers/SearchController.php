<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class SearchController extends Controller
{
    public function search(Request $request) {
        $q = $request->query('query');
        
        $positions = Position::where('title', 'LIKE', '%'.$q.'%')
                            ->orWhere('description', 'LIKE', '%'.$q.'%')
                            //->where('modreated', 'yes')
                            ->get();
       
        return view('search', [
            'positions' => $positions
        ]);
    }
}
