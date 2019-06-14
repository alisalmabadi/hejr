<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventSubject;
use App\EventType;
use App\EventUser;
use App\EventStatus;
use App\province;
use App\City;
use App\Core;
use App\User;
use App\Image;
use App\EventImage;

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
            'description'=>'required|max:60000',
            'long_description'=>'required',
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
            'xplace'=>'nullable|numeric',
            'yplace'=>'nullable|numeric',
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:10000000000',

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
            'xplace.numeric'=>'لطفا به صورت عددی وارد کنید',
            'yplace.numeric'=>'لطفا به صورت عددی وارد کنید',
            'image.image'=>'لطفا فقط عکس انتخاب کنید',
            'image.mimes'=>'نوع فایل انتخاب شده مناسب نمی باشد',
        ]);

        $admin = \Auth::guard('admin')->user();
        $request['operator_user_id'] = $admin->id;
        $address_point=[$request->xplace,$request->yplace];
        $address_point=json_encode($address_point);
        $event=Event::create($request->except(['information','address_point']));
        $event->update(['address_point'=>$address_point]);

        /*image upload*/
        $imagename = time() . '.' . $request['image']->getClientOriginalExtension();
        $main_folder = 'images/events/'.$request['name'].'/';
        $url = $main_folder;
        $request['image']->move($url, $imagename);
        //store in images table
        $image = new Image();
        $image = $image->create([
            'image_type' => $request['image']->getClientOriginalExtension(),
            'image_original' => $imagename,
            'image_path' => $url . $imagename,
        ]);     

        //attach in eventImages table
        $event->images()->attach($image->id);  

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
            $event->load('images');
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
            'description'=>'required|max:60000',
            'long_description'=>'required',
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
            'xplace'=>'nullable|numeric',
            'yplace'=>'nullable|numeric',
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:10000000000',

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
            'xplace.numeric'=>'لطفا به صورت عددی وارد کنید',
            'yplace.numeric'=>'لطفا به صورت عددی وارد کنید',
            'image.image'=>'لطفا فقط عکس انتخاب کنید',
            'image.mimes'=>'نوع فایل انتخاب شده مناسب نمی باشد',
        ]);

        $event->update($request->except(['information','address_point']));
        $address_point=[$request->xplace,$request->yplace];
        $address_point=json_encode($address_point);
        $event->update(['address_point'=>$address_point]);

        if(!empty($request['image'])){
            /*image upload*/
            $imagename = time() . '.' . $request['image']->getClientOriginalExtension();
            $main_folder = 'images/events/'.$request['name'].'/';
            $url = $main_folder;
            $request['image']->move($url, $imagename);
            //store in images table
            $image = new Image();
            $image = $image->create([
                'image_type' => $request['image']->getClientOriginalExtension(),
                'image_original' => $imagename,
                'image_path' => $url . $imagename,
            ]);     

            //attach in eventImages table
            $event->images()->sync($image->id);  
        }

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
                //Delete the event
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

    public function getDetails(Request $request)
    {
        $event = Event::find($request['event_id']);
        $event->province = $event->provinces->name;
        $event->city = $event->cities->name;
        return response($event);
    }



    /***Add user functions ***/
    public function addUser()
    {
        $events = Event::all();
        return view('admin.event.addUser' , compact('events'));
    }

    public function selectEvent(Request $request)
    {
        $this->validate($request , [
            'event'=>'required|numeric'
        ],[
            'event.required'=>'لطفا رویداد را انتخاب کنید',
            'event.numeric'=>'مشکلی رخ داده است'
        ]);
        
        $event = Event::find($request['event']);
        $cores = Core::all();
        $users = User::all();
        foreach ($users as $user)
        {
            $check = EventUser::where('user_id',$user->id)->where('event_id',$event->id)->first();
            if(!empty($check))
                $user->added = $event->id;
        }
        return view('admin.event.addUser' , compact('event','users','cores'));
    }

    public function loadUsersByCore(Request $request)
    {
        $core = Core::find($request['core_id']);
        return response($core->users);
    }

    public function storeUser(Request $request)
    {
        $user = User::find($request['user_id']);
        $user_information = ['name'=>$user->name.' '.$user->lastname , 'email'=>$user->email , 'username'=>$user->username , 'phonenumber'=>$user->phonenumber];
        $user_information = json_encode($user_information);
        $eventUser = EventUser::create([
            'user_id'=>$request['user_id'],
            'event_id'=>$request['event_id'],
            'user_information'=>$user_information,
            'status'=>1,
        ]);
        return response($eventUser);
    }

    public function removeUser(Request $request)
    {
        $eventUser = EventUser::where('user_id',$request['user_id'])->where('event_id',$request['event_id'])->first();
        EventUser::destroy($eventUser->id);
        return response($eventUser);
    }

    public function showResult(Request $request)
    {
        $event = Event::find($request['event_id']);
        return response($event->users);
    }

    public function selectAll(Request $request)
    {
        $user_ids = $request['user_ids'];
        foreach ($user_ids as $key => $user_id) {
            $eventUser = EventUser::where('user_id',$user_id)->where('event_id',$request['event_id'])->first();
            if(empty($eventUser))
            {
                $user = User::find($user_id);
                $user_information = ['name'=>$user->name.' '.$user->lastname , 'email'=>$user->email , 'username'=>$user->username , 'phonenumber'=>$user->phonenumber];
                $user_information = json_encode($user_information);
                $eventUser = EventUser::create([
                    'user_id'=>$user_id,
                    'event_id'=>$request['event_id'],
                    'user_information'=>$user_information,
                    'status'=>1,
                ]);
            }
        }
        return redirect()->route('admin.event.addUser');
    }
}
