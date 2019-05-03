<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSubject extends Model
{
    protected $fillable = ['id' , 'name' , 'status'];
    protected $table = 'event_subjects';
}
