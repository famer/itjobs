<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    
    public function toEdit() {
        return view('notifications', [
            'count' => Notification::count(auth()->user()),
        ]);
    }
}
