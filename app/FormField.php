<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $table = "form_fields";
    protected $fillable = ['name', 'type', 'status'];
}
