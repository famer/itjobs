<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public $title;

    public static function count(User $user) {
        return (
            $user->companies->where('moderated', 'remoderation')->count()
            +
            $user->positions->where('moderated', 'remoderation')->count()
        );
    }

    public function getNotifications() {

    }
}
