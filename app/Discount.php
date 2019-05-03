<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['name' , 'code' , 'status' ,'percent' , 'start_price'];
    protected $table = "discounts";
}
