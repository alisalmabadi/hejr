<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_FormField_answere extends Model
{
    protected $table = "form_form_field_answeres";
    protected $fillable = ['form_formfield_id', 'answere', 'user_id'];
}
