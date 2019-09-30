<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Users extends Model
{
    //off the time stamp and autoIncresment
    protected $table = "form_users";
    protected $fillable = ['form_id', 'user_id'];
}
