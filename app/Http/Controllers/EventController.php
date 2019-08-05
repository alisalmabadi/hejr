<?php

namespace App\Http\Controllers;

use App\Notifications\NotifySignedUpEvent;
use App\Notifications\SignedUpEvent;
use Carbon\Carbon;
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
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image as ImageChange;

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
          /*   'image'=>'nullable|image|mimes:png,jpg,jpeg|max:10000000000',*/

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
        /*    'image.image'=>'لطفا فقط عکس انتخاب کنید',
            'image.mimes'=>'نوع فایل انتخاب شده مناسب نمی باشد',*/
        ]);
        $admin = \Auth::guard('admin')->user();
        $request['eventable_id'] = $admin->id;
        $request['eventable_type'] = 'admin';
        $event=Event::create($request->except(['information','address_point']));
        if($request->xplace != null) {
            $address_point = [$request->xplace, $request->yplace];
            $address_point = json_encode($address_point);
            $event->update(['address_point' => $address_point]);
        }
       $event=$admin->events()->save($event);

        /*image upload*/
        foreach ($request->image as $key=>$image) {
        $imagename = time() . '-' . sha1(time() . "_" . rand(21321, 465465465456)).'.'. $image->getClientOriginalExtension();
        $main_folder = 'images/events/';
        $url = $main_folder;
        $image->move($url, $imagename);
/***thumbnail ***/
                $path = public_path('images/events/thumbnails') . "/" . $imagename;
                $img = ImageChange::make(public_path('images/events/') . $imagename)->resize(324,202)->save($path);
            $images = Image::create([
                'image_type' => $image->getClientOriginalExtension(),
                'image_original' => $imagename,
                'image_path' => $url . $imagename,
                'thumbnail_path'=>$img->basename,
            ]);

            if($key==0){
                $event->update(['thumbnail_id'=>$images->id]);
            }
            /***thumbnail ***/
            $event->images()->attach($images->id);

        }



        flashs('رویداد با موفقیت ثبت گردید');
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
       // if(Gate::allows('edit-event',$event)) {
            $cities = City::where('province_id', $event->province_id)->get();
            $event_subjects = EventSubject::where('status', 1)->get();
            $event_types = EventType::where('status', 1)->get();
            $event_statuses = EventStatus::where('status', 1)->get();
            $provinces = Province::all();
            $cores = Core::where('status', 1)->get();
            $event['information'] = json_decode($event->information);
            $event->load('images');
            return view('admin.event.edit', compact('event', 'cities', 'event_subjects', 'event_types', 'event_statuses', 'provinces', 'cores'));
        /*}
        else{
            flashs('شما قادر به ویرایش این رویداد نمی باشید');
            return redirect()->route('admin.event.index');
        }*/
        

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
       /*     'image'=>'nullable|image|mimes:png,jpg,jpeg|max:10000000000',*/

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
           /* 'image.image'=>'لطفا فقط عکس انتخاب کنید',
            'image.mimes'=>'نوع فایل انتخاب شده مناسب نمی باشد',*/
        ]);



        $event->update($request->except(['information','address_point']));
        if($request->xplace != null) {
            $address_point = [$request->xplace, $request->yplace];
            $address_point = json_encode($address_point);
            $event->update(['address_point' => $address_point]);
        }

        if(!empty($request['image'])){
            foreach ($request->image as $key=>$image) {
                $imagename = time() . '-' . sha1(time() . "_" . rand(21321, 465465465456)).'.'. $image->getClientOriginalExtension();
                $main_folder = 'images/events/';
                $url = $main_folder;
                $image->move($url, $imagename);
                /***thumbnail ***/
                $path = public_path('images/events/thumbnails') . "/" . $imagename;
                $img = ImageChange::make(public_path('images/events/') . $imagename)->resize(324,202)->save($path);
                $images = Image::create([
                    'image_type' => $image->getClientOriginalExtension(),
                    'image_original' => $imagename,
                    'image_path' => $url . $imagename,
                    'thumbnail_path'=>$img->basename,
                ]);
                if($key==0){
                    $event->update(['thumbnail_id'=>$images->id]);
                }
                $event->images()->attach($images->id);
            }


        }

        flashs('تغییرات با موفقیت اعمال گردید');
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

        //Delete the event
        Event::destroy($event->id);
        flashs('رویداد حذف گردید');
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

    public function showAllEvents(Request $request)
    {
        $events = Event::all();
        foreach($events as $event){
            foreach($event->images as $item){
                if($item->id == $request['image_id']){
                    $event->has_this_image = 'YES';
                }
            }
        }
        return response($events);
    }

    public function getDetails(Request $request)
    {
        $event = Event::find($request['event_id']);
        $event->load('images');
        $user = \Auth::guard('web')->user();
        $event->subject = $event->event_subject->name;
        $event->type = $event->event_type->name;
        $event->province = $event->provinces->name;
        $event->city = $event->cities->name;
        $event->fulled =$event->fulled_capacity;

        $event->start =$event->start_dates;
        $event->end =$event->end_dates;

        $event->ended =$event->fulled_capacity;

        /***check kone ke in rooydad ghablan entekhab shode ya na***/
        foreach($user->events as $u_event){
            if($u_event->id == $event->id){
                $event_user_id = EventUser::where('event_id',$event->id)->where('user_id',$user->id)->first()->id;
                $event->registered_me = 'YES';
                $event->registered_id = $event_user_id;
            }
        }
        
        //leaflet points
        if($event->address_point != null){
            $event->address_point = json_decode($event->address_point);
        }
        return response($event);
    }



    /***Add user functions ***/
    public function addUser()
    {
        $events = Event::all();
        $cores = Core::all();
        return view('admin.event.addUser' , compact('events','cores'));
    }

    public function selectEvent(Request $request)
    {
        $this->validate($request , [
            'event'=>'required|numeric',
            'core' => 'required|numeric'
        ],[
            'event.required'=>'لطفا رویداد را انتخاب کنید',
            'event.numeric'=>'مشکلی رخ داده است',
            'core.required'=>'لطفا هسته را مشخص کنید',
            'core.numeric'=>'لطفا مجدد تلاش کنید'
        ]);

        $event = Event::find($request['event']);
        $core = Core::find($request['core']);
        $users = $core->users;
        foreach ($users as $user)
        {
            $check = EventUser::where('user_id',$user->id)->where('event_id',$event->id)->first();
            if(!empty($check))
                $user->added = $event->id;
        }
        return view('admin.event.addUser' , compact('event','users','core'));
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
        $event = Event::find($request['event_id']);
        $event_information = ['name'=>$event->name , 'description'=>$event->description , 'start_date'=>$event->start_date , 'end_date'=>$event->end_date , 'price'=>$event->price , 'capacity'=>$event->capacity];
        $user_information = json_encode($user_information);
        $event_information = json_encode($event_information);
        $eventUser = EventUser::create([
            'user_id'=>$request['user_id'],
            'event_id'=>$request['event_id'],
            'user_information'=>$user_information,
            'event_information'=>$event_information,
            'status'=>1,
        ]);
        $when = Carbon::now()->addSecond();
       \Notification::send(\Auth::user(),(new NotifySignedUpEvent($event,'شما با موفقیت در رویداد NAME رزرو شدید،لطفا برای قطعی شدن ثبت نام،پرداخت را انجام دهید.'))->delay($when));

      // dd($res);

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
        if(!empty($request['user_ids'])){
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
        }
        return redirect()->route('admin.event.addUser');
    }
}
