<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function getDateAttribute()
    {
        $v=new Verta($this->created_at);
        return $v->format('%d %B %Y');
    }
}
