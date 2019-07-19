<?php

namespace App\Http\Controllers;


use App\Area;
use App\City;
use App\Core;
use App\EventStatus;
use App\EventSubject;
use App\EventType;
use App\Field;
use App\Grade;
use App\Imports\UsersImport;
use App\Job;
use App\Province;
use App\SoldierServices;
use App\University;
use App\UniversityTypes;
use App\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use App\Event;
use App\EventUser;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('admin')->only(['index','create','edit','store','update','index','multiple','multiple_store','show_users']);
         $this->middleware('auth')->only(['panel','profile','createEvent']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        $cores=Core::where('status',1)->get();
        $areas=Area::all();
        $provinces=Province::all();
        $soldier_services=SoldierServices::all();
        $grades=Grade::all();
        $fields=Field::where('status',1);
        $universities=University::all();
        $jobs=Job::all();
        return view('admin.users.user_single_add',compact('cores','areas','soldier_services','grades','fields','universities','jobs','cities','provinces'));
    }

    public function edit(User $user)
    {
        $cores=Core::where('status',1)->get();
        $areas=Area::all();
        $provinces=Province::all();
        $soldier_services=SoldierServices::all();
        $grades=Grade::all();
        $fields=Field::where('status',1);
        $universities=University::all();
        $jobs=Job::all();
        return view('admin.users.user_single_edit',compact('cores','areas','soldier_services','grades','fields','universities','jobs','cities','provinces','user'));
    }


    public function store(Request $request)
    {
$this->validate($request,[
    'name'=>'required',
    'lastname'=>'required',
    'username'=>'required|unique:users',
    'password'=>'required',
    'email'=>'email',


],[
    'name.required'=>'نام اجباری است.',
     'lastname.required'=>'نام خانوادگی اجباری است.',
     'password.required'=>'رمزعبور اجباری است.',
        'username.required'=>'نام کاربری اجباری است.',
    'username.unique'=>'نام کاربری تکراری است.'


]);
if(isset($request->birthday)) {
    /*$date = explode('/', $request->birthday);
    $date = Verta::getGregorian($date[0], $date[1], $date[2]);
    $dated = $date[0] . '-' . $date[1] . '-' . $date[2];*/
    $dated=Convertnumber2english($request->birthday);
}else{
    $dated=null;
}
/*dd($request->all());*/
        $user=User::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'bio'=>$request->bio,
   /*         'city_id'=>$request->city_id,
            'province_id'=>$request->province_id,*/
            'grade_id'=>$request->grade_id,
            'soldier_service_id'=>$request->soldier_service_id,
            'field_id'=>$request->field_id,
            'university_id'=>$request->university_id,
            'core_id'=>$request->core_id,
            'area_id'=>$request->area_id,
            'job_id'=>$request->job_id,
            'nationcode'=>$request->nationcode,
            'father_name'=>$request->father_name,
            'phonenumber'=>$request->phonenumber,
            'image_path'=>$request->image_path,
            'birthday'=>$dated,
            'martial'=>$request->martial,
            'status'=>$request->status,
            'address'=>$request->address,
            'konkor_grade'=>$request->konkor_grade

        ]);
    flashs('عضو با موفقیت افزوده شد.','success');
    return back();
    }

    public function update(Request $request,User $user)
    {
        $this->validate($request,[
            'name'=>'required',
            'lastname'=>'required',
            'username'=>'required|unique:users,username,'.$user->id,
/*            'password'=>'required',*/
            'email'=>'required|unique:users,email,'.$user->id,


        ],[
            'name.required'=>'نام اجباری است.',
            'lastname.required'=>'نام خانوادگی اجباری است.',
/*            'password.required'=>'رمزعبور اجباری است.',*/
            'username.required'=>'نام کاربری اجباری است.',
            'username.unique'=>'نام کاربری تکراری است.',
            'email.required'=>'ایمیل را وارد کنید.'

        ]);
        if(isset($request->birthday)) {
           /* $date = explode('/', $request->birthday);
            $date = Verta::getGregorian($date[0], $date[1], $date[2]);
            $dated = $date[0] . '-' . $date[1] . '-' . $date[2];*/
           $dated=Convertnumber2english($request->birthday);
        }else{
            $dated=null;
        }
        if(isset($request->password)) {

            /*dd($request->all());*/
            $user->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'bio' => $request->bio,
/*                'city_id' => $request->city_id,*/
/*                'province_id' => $request->province_id,*/
                'grade_id' => $request->grade_id,
                'soldier_service_id' => $request->soldier_service_id,
                'field_id' => $request->field_id,
                'university_id' => $request->university_id,
                'core_id' => $request->core_id,
                'area_id'=>$request->area_id,
                'job_id'=>$request->job_id,
                'nationcode' => $request->nationcode,
                'father_name' => $request->father_name,
                'phonenumber' => $request->phonenumber,
                'image_path' => $request->image_path,
                'birthday' => $dated,
                'martial'=>$request->martial,
                'status'=>$request->status,
                'address'=>$request->address,
                 'konkor_grade'=>$request->konkor_grade

            ]);
        }else{
            $user->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
/*                'password' => bcrypt($request->password),*/
                'bio' => $request->bio,
/*                'city_id' => $request->city_id,*/
/*                'province_id' => $request->province_id,*/
                'grade_id' => $request->grade_id,
                'soldier_service_id' => $request->soldier_service_id,
                'field_id' => $request->field_id,
                'university_id' => $request->university_id,
                'core_id' => $request->core_id,
                'area_id'=>$request->area_id,
                'job_id'=>$request->job_id,
                'nationcode' => $request->nationcode,
                'father_name' => $request->father_name,
                'phonenumber' => $request->phonenumber,
                'image_path' => $request->image_path,
                'birthday' => $dated,
                'martial'=>$request->martial,
                'status'=>$request->status,
                'address'=>$request->address,
                'konkor_grade'=>$request->konkor_grade

            ]);
        }
        flashs('عضو با موفقیت ویرایش شد.','success');
        return back();
    }

    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function show_cities(Request $request)
    {
            $cities=City::where('province_id',$request->id)->get();
            return response($cities);
    }

    public function panel()
    {
        return view('user.dashboard');
    }

    public function multiple()
    {
        return view('admin.users.user_multiple_add');
    }

    public function multiple_store(Request $request)
    {
        $file= $request->file;
        $file=str_replace('/storage','storage',$file);
        $file=str_replace('//','/',$file);
        $file = str_replace('storage/files/','',$file);
/*        dd($file);*/
       $res = Excel::import(new UsersImport(),$file,'files');
/*       dd($res);*/
        flashs('کاربران با موفقیت ذخیره شدند.','success');
        return redirect(route('admin.user.all'));
    }

    public function profile()
    {
        $areas=Area::all();
        $grades=Grade::all();
        $universities=University::where('status',1)->get();
        $soldier_services=SoldierServices::all();
        $jobs=Job::where('status',1)->get();
        $provinces = Province::all();
        return view('user.profile',compact('areas','grades','universities','soldier_services','jobs', 'provinces'));
    }

    public function checkemail(Request $request)
    {
        $user=\Auth::guard('web')->user();
        $email=Validator::make($request->all(),[
            'email'=>'unique:users,email,'.$user->id,
        ]);
        if($email->fails()) {
            return response()->json(false, 200);
        }else{
            return response()->json(true, 200);
        }
}
    public function checkusername(Request $request)
    {
        $user=\Auth::guard('web')->user();
        $username=Validator::make($request->all(),[
            'username'=>'unique:users,username,'.$user->id,
        ]);
        if($username->fails()) {
            return response()->json(false, 200);
        }else{
            return response()->json(true, 200);
        }
    }
    public function profile_edit(Request $request)
    {
/*        dd($request->all());*/
        $user=\Auth::guard('web')->user();
        if(isset($request->date)){
            $dated=Convertnumber2english($request->date);
        }else{
            $dated=null;
        }
        $this->validate($request,[
            'username'=>'unique:users,username,'.$user->id,
            'email'=>'unique:users,email,'.$user->id,
            'name'=>'required',
            'lastname'=>'required',
        ]);

        if(isset($request->password)) {
$res=Validator::make($request->all(),[
    'password'=>'required|min:8|max:20|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*\d).+$/'
]);
if($res->fails()){return response()->json('مشکل',200);}
            /*dd($request->all());*/
            $user->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'bio' => $request->bio,
                /*                'city_id' => $request->city_id,*/
                /*                'province_id' => $request->province_id,*/
                'grade_id' => $request->grade_id,
                'soldier_service_id' => $request->soldier_service_id,
                'field_id' => $request->field_id,
                'university_id' => $request->university_id,
/*                'core_id' => $request->core_id,*/
                'area_id'=>$request->area_id,
                'job_id'=>$request->job_id,
                'nationcode' => $request->nationcode,
                'father_name' => $request->father_name,
                'phonenumber' => $request->phonenumber,
/*                'image_path' => $request->image_path,*/
                'birthday' => $dated,
                'martial'=>$request->martial,
/*                'status'=>$request->status,*/
                'address'=>$request->address,
                'konkor_grade'=>$request->konkor_grade

            ]);
        }else{
            $user->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                /*                'password' => bcrypt($request->password),*/
                'bio' => $request->bio,
                /*                'city_id' => $request->city_id,*/
                /*                'province_id' => $request->province_id,*/
                'grade_id' => $request->grade_id,
                'soldier_service_id' => $request->soldier_service_id,
                'field_id' => $request->field_id,
                'university_id' => $request->university_id,
/*                'core_id' => $request->core_id,*/
                'area_id'=>$request->area_id,
                'job_id'=>$request->job_id,
                'nationcode' => $request->nationcode,
                'father_name' => $request->father_name,
                'phonenumber' => $request->phonenumber,
/*                'image_path' => $request->image_path,*/
                'birthday' => $dated,
                'martial'=>$request->martial,
/*                'status'=>$request->status,*/
                'address'=>$request->address,
                'konkor_grade'=>$request->konkor_grade

            ]);
        }
        return response()->json(['status',1],200);

    }

    public function uploadpic(Request $request)
    {
/*        dd($request->all());*/
/*        return $request->File('image');*/
$this->validate($request,[
    'image'=>'required|image|max:2048'
],['image.image'=>'عکس انتخاب کنید.','image.max'=>'حداکثر 2 مگابایت ']);
    $path='storage/photos';
/*    $path2='storage/photos/thumbs2/';*/
       $tthumbs=public_path('tthumbs').'/';
       $thumb='storage/photos/thumbs/';
    $image=$request->file('image');

    $filename=date('YmdHis').sha1(date('YmdHis').rand(1,50000).$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
    $filepath= $path.'/'.$filename;
        $image->move($path,$filepath);
         $tfilepath = $tthumbs . $filename;
        $realtpath= $thumb.$filename;

            // path does not exist
            $img = Image::make($filepath)->resize(200, 200)->save($tfilepath);
            $movetthum= File::move($tfilepath, $realtpath);
            if($movetthum == true) {
            $user=\Auth::user()->update(['image_path'=>'/storage/photos//'.$filename]);

                /*        $img->save($path2,$filepath2);*/

                return 1;

            }
    }

    public function show_users(Request $request)
    {
        $users=User::whereIn('core_id',$request->core_id)->get();
        return $users;
    }

    public function show_events()
    {
        $events = Event::all();
        return view('user.event.index' , compact('events'));
    }


    public function createEvent()
    {
        $user=\Auth::user();
        if($user->can('create-event')){
            $event_subjects = EventSubject::where('status' , 1)->get();
            $event_types = EventType::where('status' , 1)->get();
            $event_statuses = EventStatus::where('status' , 1)->get();
            $provinces = Province::all();
            $cores = Core::where('status' , 1)->get();
            return view('user.event.event_create',compact('event_subjects' , 'event_types' , 'event_statuses' , 'provinces' , 'cores'));
        }else{
            abort('404');
        }
    }

    public function storeEvent(Request $request)
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
           // 'image'=>'nullable|mimes:png,jpg,jpeg|max:10000000000',

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
          //  'image.mimes'=>'نوع فایل انتخاب شده مناسب نمی باشد',
        ]);
        $user = \Auth::guard('web')->user();
        $request['eventable_id'] = $user->id;
        $request['eventable_type'] = 'user';
        $address_point=[$request->xplace,$request->yplace];
        $address_point=json_encode($address_point);
        $event=Event::create($request->except(['information','address_point']));
        $event->update(['address_point'=>$address_point]);
        $event=$user->createdEvents()->save($event);


        /*image upload*/

        /*$imagename = time() . '.' . $request['image']->getClientOriginalExtension();
        $main_folder = 'images/events/'.$request['name'].'/';
        $url = $main_folder;
        $request['image']->move($url, $imagename);*/

        //store in images table

        /*$image = new \App\Image();
        $image = $image->create([
            'image_type' => $request['image']->getClientOriginalExtension(),
            'image_original' => $imagename,
            'image_path' => $url . $imagename,
        ]);*/

        //attach in eventImages table

        //$event->images()->attach($image->id);

        flashs('رویداد مورد نظر با موفقیت ثبت گردید','success');
        return redirect()->route('user.events.index');
    }

    public function updateEvent(Request $request,Event $event)
    {
        //dd($event);
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

      /*  if(!empty($request['image'])){
            $imagename = time() . '.' . $request['image']->getClientOriginalExtension();
            $main_folder = 'images/events/'.$request['name'].'/';
            $url = $main_folder;
            $request['image']->move($url, $imagename);
            $image = new \App\Image();
            $image = $image->create([
                'image_type' => $request['image']->getClientOriginalExtension(),
                'image_original' => $imagename,
                'image_path' => $url . $imagename,
            ]);
            $event->images()->sync($image->id);
        }*/

        flashs('تغییرات با موفقیت اعمال گردید');
        return redirect()->route('user.events.index');
    }

    public function indexCreatedEvents()
    {
        $user=\Auth::guard('web')->user()->id;
        $user=User::find($user);
        return view('user.event.index_created_events',compact('user'));
    }

    public function editCreatedEvents(Event $event)
    {
        $event_subjects = EventSubject::where('status' , 1)->get();
        $event_types = EventType::where('status' , 1)->get();
        $event_statuses = EventStatus::where('status' , 1)->get();
        $provinces = Province::all();
        $cores = Core::where('status' , 1)->get();
        $adrresspoint=json_decode($event->address_point);
        $xplace=$adrresspoint[0];
       $yplace=$adrresspoint[1];
       return view('user.event.event_edit',compact('event','event_statuses','event_subjects','event_types','provinces','cores','xplace','yplace'));
    }
    public function registerEvent(Request $request)
    {
        $event = Event::find($request['event_id']);
        $user = \Auth::guard('web')->user();
        $user_information = ['name'=>$user->name.' '.$user->lastname , 'email'=>$user->email , 'username'=>$user->username , 'phonenumber'=>$user->phonenumber];
        $user_information = json_encode($user_information);
        $event_information = ['name'=>$event->name , 'description'=>$event->description , 'start_date'=>$event->start_date , 'end_date'=>$event->end_date , 'price'=>$event->price , 'capacity'=>$event->capacity];
        $event_information = json_encode($event_information);
        $eventUser = EventUser::create([
            'user_id'=>$user->id,
            'event_id'=>$request['event_id'],
            'user_information'=>$user_information,
            'event_information'=>$event_information,
            'status'=>1,
        ]);
        return response($eventUser);
    }

    public function showregistered_event($eventUser_id)
    {
        $eventUser = EventUser::find($eventUser_id);
      //  dd($eventUser);
        $user = \Auth::guard('web')->user();
        if(!empty($eventUser) && $eventUser->user_id == $user->id){/**event peyda shode va male in shakhs hast**/
            if(!empty($eventUser->event)){
                $eventUser->load('event');
            }
            else{
                $event->event = $eventUser->event_information;
            }
            if(!empty($eventUser->user)){
                $eventUser->load('user');
            }
            else{
                $eventUser->user = $eventUser->user_information;
            }
            return view('user.event.show_registered', compact('eventUser'));
        }
        else{/**ya safhe peyda nashode, ya male in shakhs nist**/
            dd('safhe 404 biad');
        }
    }

    public function showAllRegistered()
    {
        $user = \Auth::guard('web')->user();
        $events = $user->events;
       // dd($events);
        return view('user.event.show_AllRegistered' , compact('user','events'));
    }

    public function uni_details(Request $request)
    {
        $uni = University::find($request['uni_id']);
        return response($uni);
    }

    public function university_update(Request $request)
    {
        $this->validate($request, [
            'province_id' =>'required',
            'bio'=>'max:255'
        ],[
            'province_id.required' => 'استان و شهر را انتخاب کنید',
            'bio.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است'
        ]);
        
        $uni = University::find($request['id']);
        $uni->update($request->all());
        return response('updated');
    }

    public function university_add(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255|unique:universities',
            'province_id' =>'required',
            'bio'=>'max:255'
        ],[
            'name.required'=>'لطفا نام دانشگاه را وارد کنید',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'name.unique'=>'این دانشگاه قبلا وارد شده است',
            'province_id.required' => 'استان و شهر را انتخاب کنید',
            'bio.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است'
        ]);
        
        $uni = new University();
        $uni = $uni->create($request->all());
        return response($uni);
    }
}
