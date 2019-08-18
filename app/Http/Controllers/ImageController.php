<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\EventImage;
use App\event;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function index()
    {
        $images = Image::all();
        $events = Event::all();
        return view('admin.image.index' , compact('images','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10000000000'
        ],[
            'image.required'=>'انتخاب تصویر الزامی ست',
            'image.image'=>'لطفا عکس انتخاب کنید',
            'image.mimes'=>'فرمت وارد شده پشتیبانی نمیشود',
            'image.max'=>'حجم فایل بیش از حد مجاز می باشد',
        ]);

        $imagename = time() . '.' . $request['image']->getClientOriginalExtension();
        $main_folder = 'images/';
        $url = $main_folder;
        $request['image']->move($url, $imagename);
        //store in images table
        $image = new Image();
        $image = $image->create([
            'image_type' => $request['image']->getClientOriginalExtension(),
            'image_original' => $imagename,
            'image_path' => $url . $imagename,
        ]);     

        flashs('تصویر با موفقیت ذخیره شد');
        return redirect()->route('admin.image.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function delete(Request $request)
    {
        $image =new Image();
        $image->destroy($request->input('selected'));
        flashs('تضاویر حذف شدند','danger');
        return back();
    }

    public function show_event_images(Request $request)
    {
        $image = Image::find($request['image_id']);
        return response($image->events);    
    }

    public function add_event_image(Request $request)
    {
        $e_i = new EventImage();
        $e_i = $e_i->create([
            'event_id'=>$request['event_id'],
            'image_id'=>$request['image_id']
        ]);
        $event = Event::find($request['event_id']);
        return response($event);
    }

    public function delete_event_image(Request $request)
    {
        $e_i = EventImage::where('event_id',$request['event_id'])->where('image_id',$request['image_id'])->first();
        $q = 'DELETE FROM event_images where event_id = '.$request['event_id'].' AND image_id = '.$request['image_id'];
        \DB::delete($q);
        return response('deleted');
    }
}
