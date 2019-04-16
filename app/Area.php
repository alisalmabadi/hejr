<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable=['name','province_id','city_id'];

    public function city()
    {
      return  $this->belongsTo(City::class);
    }
    public function province(){
      return  $this->belongsTo(Province::class);
    }
}
