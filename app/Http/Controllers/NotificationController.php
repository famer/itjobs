<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    
    public function toEdit() {

        $companiesToEdit = auth()->user()->companies->where('moderated', 'remoderation');
        $positionsToEdit = auth()->user()->positions->where('moderated', 'remoderation');
        
        return view('notifications', [
            'count' => Notification::count(auth()->user()),
            'companiesToEdit' => $companiesToEdit,
            'positionsToEdit' => $positionsToEdit,
        ]);
    }
}
