<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventStatus;

class EventStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_statuses = EventStatus::all();
        return view('admin.eventStatus.index' , compact('event_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventStatus.create');
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

        $eventStatus = new EventStatus();
        $eventStatus->create($request->all());

        flashs('با موفقیت ذخیره شد');
        return redirect()->route('admin.eventStatus.index');
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
        $event_status = EventStatus::find($id);
        return view('admin.eventStatus.edit' , compact('event_status'));
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

        $eventStatus = EventStatus::find($id);
        $eventStatus->update($request->all());

        flashs('با موفقیت به روزرسانی شد');
        return redirect()->route('admin.eventStatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event_status =new EventStatus();
        $event_status->destroy($request->input('selected'));
        flashs('موارد مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function changeStatus($id)
    {
        $event_status = EventStatus::find($id);
        if($event_status->status == 0){
            $event_status->update(['status' => 1]);
        }else{
            $event_status->update(['status' => 0]);
        }

        flashs('تغییر وضعیت انجام شد');
        return redirect()->route('admin.eventStatus.index');
    }
}
