<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
	public $timestamps = false;
    protected $table = "event_images";
    protected $fillable = ['event_id' , 'image_id'];
}
