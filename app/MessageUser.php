<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageUser extends Model
{
    public function message()
    {
        return $this->belongsTo(MessageUser::class);
    }
    public function tusers()
    {
        return $this->belongsTo(User::class,'tuser_id');
    }
}
