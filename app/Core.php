<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Core extends Model
{
    protected $fillable=['name','status','city_id','province_id','admin_id'];

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class,'area_cores');
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
