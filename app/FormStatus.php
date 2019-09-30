<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormStatus extends Model
{
    protected $table = "form_statuses";
    protected $fillable = ['name', 'form_type'];
}
