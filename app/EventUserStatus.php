<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUserStatus extends Model
{
    protected  $fillable=['name','sms_text','send_sms','type_id','class'];
}
