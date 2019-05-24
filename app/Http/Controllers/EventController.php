<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventSubject;
use App\EventType;
use App\EventStatus;
use App\province;
use App\City;
use App\Core;
use App\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index' , compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_subjects = EventSubject::where('status' , 1)->get();
        $event_types = EventType::where('status' , 1)->get();
        $event_statuses = EventStatus::where('status' , 1)->get();
        $provinces = Province::all();
        $cores = Core::where('status' , 1)->get();
        return view('admin.event.create' , compact('event_subjects' , 'event_types' , 'event_statuses' , 'provinces' , 'cores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['start_date'] = Convertnumber2english($request['start_date']);
        $request['end_date'] = Convertnumber2english($request['end_date']);
        $request['end_date_signup'] = Convertnumber2english($request['end_date_signup']);

        $this->validate($request , [
            'name'=>'required|max:255',
            'description'=>'required|max:100',
            'long_description'=>'required|max:255',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'end_date_signup'=>'required|date',
            'price'=>'required|numeric',
            'capacity'=>'required|numeric',
            'event_subject_id'=>'required|numeric',
            'event_type_id'=>'required|numeric',
            'event_status_id'=>'required|numeric',
            'province_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|max:255',
            'center_core_id'=>'required|numeric',
            'information'=>'max:255'
        ],[
            'name.required'=>'لطفا نام را وارد کنید',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'description.required'=>'لطفا این فیلد را پر کنید',
            'description.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'long_description.required'=>'لطفا این فیلد را پر کنید',
            'long_description.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'start_date.required'=>'لطفا تاریخ شروع را وارد کنید',
            'start_date.date'=>'فرمت وارد شده اشتباه است',
            'end_date.required'=>'لطفا تاریخ اتمام را وارد کنید',
            'end_date.date'=>'فرمت وارد شده اشتباه است',
            'end_date_signup.required'=>'لطفا تاریخ اتمام ثبت نام را وارد کنید',
            'end_date_signup.date'=>'فرمت وارد شده اشتباه است',
            'price.required'=>'لطفا قیمت را وارد کنید',
            'price.numeric'=>'فقط عدد وارد کنید',
            'capacity.required'=>'ظرفیت را وارد کنید',
            'capacity.numeric'=>'فقط عدد وارد کنید',
            'evend_subject_id.required'=>'این فیلد را خالی رها نکنید',
            'event_subject_id.numeric'=>'از لیست بالا انتخاب کنید',
            'event_type_id.required'=>'این فیلد را خالی رها نکنید',
            'event_type_id.numeric'=>'از لیست بالا انتخاب کنید',
            'event_status_id.required'=>'این فیلد را خالی رها نکنید',
            'event_status_id.numeric'=>'از لیست بالا انتخاب کنید',
            'province_id.required'=>'این فیلد را خالی رها نکنید',
            'province_id.numeric'=>'از لیست بالا انتخاب کنید',
            'city_id.required'=>'این فیلد را خالی رها نکنید',
            'city_id.numeric'=>'از لیست بالا انتخاب کنید',
            'center_core_id.required'=>'این فیلد را خالی رها نکنید',
            'center_core_id.numeric'=>'از لیست بالا انتخاب کنید',
            'address.required'=>'لطفا ادرس را وارد کنید',
            'address.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'information.required'=>'لطفا این فیلد را خالی رها نکنید',
            'information.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است'
        ]);

        $admin = \Auth::guard('admin')->user();
        $request['operator_user_id'] = $admin->id;

        $request['information'] = json_encode($request['information']);

        $event = new Event();
        $event->create($request->all());

        flash('رویداد با موفقیت ثبت گردید');
        return redirect()->route('admin.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        /*har admin faghat betoone oon event ke khodesh sabt karde ro edit kone*/
        if($event->operator_user_id == \Auth::guard('admin')->user()->id) {
            $cities = City::where('province_id', $event->province_id)->get();
            $event_subjects = EventSubject::where('status', 1)->get();
            $event_types = EventType::where('status', 1)->get();
            $event_statuses = EventStatus::where('status', 1)->get();
            $provinces = Province::all();
            $cores = Core::where('status', 1)->get();
            $event['information'] = json_decode($event->information);
            return view('admin.event.edit', compact('event', 'cities', 'event_subjects', 'event_types', 'event_statuses', 'provinces', 'cores'));
        }
        else{/*in event baraye in admin nist, dastresi nade*/
            flash('شما قادر به ویرایش این رویداد نمی باشید');
            return redirect()->route('admin.event.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request['start_date'] = Convertnumber2english($request['start_date']);
        $request['end_date'] = Convertnumber2english($request['end_date']);
        $request['end_date_signup'] = Convertnumber2english($request['end_date_signup']);

        $this->validate($request , [
            'name'=>'required|max:255',
            'description'=>'required|max:100',
            'long_description'=>'required|max:255',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'end_date_signup'=>'required|date',
            'price'=>'required|numeric',
            'capacity'=>'required|numeric',
            'event_subject_id'=>'required|numeric',
            'event_type_id'=>'required|numeric',
            'event_status_id'=>'required|numeric',
            'province_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|max:255',
            'center_core_id'=>'required|numeric',
            'information'=>'max:255'
        ],[
            'name.required'=>'لطفا نام را وارد کنید',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'description.required'=>'لطفا این فیلد را پر کنید',
            'description.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'long_description.required'=>'لطفا این فیلد را پر کنید',
            'long_description.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'start_date.required'=>'لطفا تاریخ شروع را وارد کنید',
            'start_date.date'=>'فرمت وارد شده اشتباه است',
            'end_date.required'=>'لطفا تاریخ اتمام را وارد کنید',
            'end_date.date'=>'فرمت وارد شده اشتباه است',
            'end_date_signup.required'=>'لطفا تاریخ اتمام ثبت نام را وارد کنید',
            'end_date_signup.date'=>'فرمت وارد شده اشتباه است',
            'price.required'=>'لطفا قیمت را وارد کنید',
            'price.numeric'=>'فقط عدد وارد کنید',
            'capacity.required'=>'ظرفیت را وارد کنید',
            'capacity.numeric'=>'فقط عدد وارد کنید',
            'evend_subject_id.required'=>'این فیلد را خالی رها نکنید',
            'event_subject_id.numeric'=>'از لیست بالا انتخاب کنید',
            'event_type_id.required'=>'این فیلد را خالی رها نکنید',
            'event_type_id.numeric'=>'از لیست بالا انتخاب کنید',
            'event_status_id.required'=>'این فیلد را خالی رها نکنید',
            'event_status_id.numeric'=>'از لیست بالا انتخاب کنید',
            'province_id.required'=>'این فیلد را خالی رها نکنید',
            'province_id.numeric'=>'از لیست بالا انتخاب کنید',
            'city_id.required'=>'این فیلد را خالی رها نکنید',
            'city_id.numeric'=>'از لیست بالا انتخاب کنید',
            'center_core_id.required'=>'این فیلد را خالی رها نکنید',
            'center_core_id.numeric'=>'از لیست بالا انتخاب کنید',
            'address.required'=>'لطفا ادرس را وارد کنید',
            'address.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'information.required'=>'لطفا این فیلد را خالی رها نکنید',
            'information.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است'
        ]);

        $event->update($request->all());

        flash('تغییرات با موفقیت اعمال گردید');
        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(event $event)
    {
        if(!empty($event)){
            if($event->operator_user_id == \Auth::guard('admin')->user()->id){
                Event::destroy($event->id);
            }
            else{
                flash('شما قادر به حذف این رویداد نمی باشید');
                return redirect()->route('admin.event.index');
            }
        }
        flash('رویداد حذف گردید');
        return redirect()->route('admin.event.index');
    }

    public function citySelector(Request $request)
    {
        $cities = City::where('province_id',$request['province_id'])->get();
        if($request->ajax())
            return response($cities);
        else
            return $cities;
    }
}
