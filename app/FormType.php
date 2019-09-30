<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    protected $table = "form_types";
    protected $fillable = ['name', 'status'];
}
