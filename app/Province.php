<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected  $fillable=['name'];

	public function cities()
	{
		return $this->hasMany('App\City');

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

}
