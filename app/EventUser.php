<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable =['event_id' , 'user_id' , 'user_information' , 'status'];
    protected $table = "event_users";
}
