<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected  $fillable=['name','province_id'];

	public function province()
	{
		return $this->belongsTo('App\Province');
    }

    public function deliveries()
	{
		return $this->belongsToMany('App\Delivery','city_delivery');
	}

	public function users()
	{
		return $this->hasMany('App\User');
	}

	public function orders()
	{
		return $this->hasMany('App\Order');
	}
    public function ex_requests()
    {
        return $this->hasMany('App\ExRequest');
    }

    public function areas()
    {
        return $this->hasMany('App\Area');
    }



}
