<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventType;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_types = EventType::all();
        return view('admin.eventType.index' , compact('event_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventType.create');
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
            'name' => 'required|max:255',
            'status' => 'required|numeric'
        ],[
            'name.required' => 'وارد کردن نام الزامی ست',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'status.required'=>'انتخاب کردن وضعیت الزامی ست',
            'status.numeric'=>'لطفا از لیست وضعیت یک مورد را انتخاب کنید'
        ]);

        $eventType = new EventType();
        $eventType->create($request->all());

        flash('با موفقیت ذخیره شد');
        return redirect()->route('admin.eventType.index');
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
        $event_type = EventType::find($id);
        return view('admin.eventType.edit' , compact('event_type'));
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
        $this->validate($request , [
            'name' => 'required|max:255',
            'status' => 'required|numeric'
        ],[
            'name.required' => 'وارد کردن نام الزامی ست',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'status.required'=>'انتخاب کردن وضعیت الزامی ست',
            'status.numeric'=>'لطفا از لیست وضعیت یک مورد را انتخاب کنید'
        ]);

        $eventType = EventType::find($id);
        $eventType->update($request->all());

        flash('با موفقیت به روزرسانی شد');
        return redirect()->route('admin.eventType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event_type =new EventType();
        $event_type->destroy($request->input('selected'));
        flashs('موارد مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function changeStatus($id)
    {
        $event_type = EventType::find($id);
        if($event_type->status == 0){
            $event_type->update(['status' => 1]);
        }else{
            $event_type->update(['status' => 0]);
        }

        flash('تغییر وضعیت انجام شد');
        return redirect()->route('admin.eventType.index');
    }
}
