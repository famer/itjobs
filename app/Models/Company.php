<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function positions() {
        return $this->hasMany(Position::class)->latest();
    }

}
