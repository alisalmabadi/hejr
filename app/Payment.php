<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected  $fillable=['user_id','amount',
        'event_user_id','authority','type','refid','payment_method_id',
        'state','transaction_id'];

    public function event_user()
    {
        return $this->belongsTo(EventUser::class);
    }

   /* public function payment_method(  )
    {
        return $this->belongsTo('App\PaymentMethod');
    }*/
}
