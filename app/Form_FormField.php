<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_FormField extends Model
{
    protected $table = "form_form_fields";
    protected$fillable = ['title', 'form_id', 'form_field_id', 'attribute', 'status', 'description'];
}
