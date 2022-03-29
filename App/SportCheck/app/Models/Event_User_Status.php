<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_User_Status extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'status_id',
    ];
}
