<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable =['event_id' , 'user_id' , 'user_information' ,'event_information' , 'status'];
    protected $table = "event_users";

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
