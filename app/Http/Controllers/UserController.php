<?php

namespace App\Http\Controllers;


use App\Area;
use App\City;
use App\Core;
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

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('admin')->only(['index','create','edit','store','update','index','multiple','multiple_store','show_users']);
         $this->middleware('auth')->only(['panel','profile']);
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
        return view('user.profile',compact('areas','grades','universities','soldier_services','jobs'));
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
}
