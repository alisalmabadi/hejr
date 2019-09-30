<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = "forms";
    protected $fillable = ['name', 'form_type_id', 'description', 'form_status_id'];
}
