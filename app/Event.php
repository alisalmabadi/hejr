<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name','description','long_description','start_date','end_date','end_date_signup','price','capacity','event_subject_id','event_type_id','event_status_id','province_id','city_id','address','address_point','operator_user_id','center_core_id','information'
    ];

    protected $table = 'events';

    public function event_subject(){
        return $this->belongsTo(EventSubject::class , 'event_subject_id');
    }
    public function event_type(){
        return $this->belongsTo(EventType::class , 'event_type_id');
    }
    public function event_status(){
        return $this->belongsTo(EventStatus::class , 'event_status_id');
    }
    public function provinces(){
        return $this->belongsTo(Province::class , 'province_id');
    }
    public function cities(){
        return $this->belongsTo(City::class , 'city_id');
    }
    public function operator(){
        return $this->belongsTo(Admin::class , 'operator_user_id');
    }
    public function center_core(){
        return $this->belongsTo(Core::class , 'center_core_id');
    }
}