<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name','description','long_description','start_date','end_date','end_date_signup','price','capacity','event_subject_id','event_type_id','event_status_id','province_id','city_id','address','address_point','eventable_id','center_core_id','information','eventable_type'
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

    public function center_core(){
        return $this->belongsTo(Core::class , 'center_core_id');
    }

    public function getStartDatesAttribute()
    {
        $v=Verta::parse($this->start_date);
        $res=$v->format('%d %B %Y');
        return $res;
    }

    public function getEndDatesAttribute()
    {
        $v=Verta::parse($this->end_date);
        $res=$v->format('%d %B %Y');
        return $res;
    }

    public function getEndDateSignAttribute()
    {
        $v=Verta::parse($this->end_date_signup);
        $res=$v->format('%d %B %Y');
        return $res;
    }

    public function images()
    {
        return $this->belongsToMany(Image::class , 'event_images');
    }

    public function users()
    {
        return $this->belongsToMany(User::class , 'event_users');
    }
    public function getEventUserIdAttribute(){
        $user_id=\Auth::user()->id;
        $event_user_id=EventUser::where(['user_id'=>$user_id,'event_id'=>$this->id])->first()->id;
        return $event_user_id;
    }
    

    public function eventable(){
        return $this->morphto();
    }
}
