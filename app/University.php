<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable=['name','city_id','province_id','university_type_id','bio','status'];

    public function university_type()
    {
        return $this->belongsTo(UniversityTypes::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }


}
