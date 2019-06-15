<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    protected $fillable = ['image_path' , 'image_type' , 'image_original'];

    public function events()
    {
    	return $this->belongsToMany(Event::class , 'event_images');
    }
}
