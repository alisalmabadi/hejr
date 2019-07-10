<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	use Notifiable;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable =
    [
		'name', 'email', 'password'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

    public function messageusers()
    {
        return $this->morphMany('App\MessageUser', 'fuser');
    }

    public function events()
    {
        return $this->morphMany(Event::class,'eventable');
    }
}
