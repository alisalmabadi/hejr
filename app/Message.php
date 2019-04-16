<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=['title','text','status','fuser_id','message_type_id'];

    public function users()
    {
        return $this->belongsToMany(User::class,'message_users','message_id','tuser_id');

    }
    public function admin()
    {
        return $this->belongsTo(Admin::class,'message_users','fuser_id');

    }

    public function message_type()
    {
        return $this->belongsTo(MessageType::class);
    }
}
