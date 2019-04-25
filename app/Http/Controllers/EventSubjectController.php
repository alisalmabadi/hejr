<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventSubject;

class EventSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_subjects = EventSubject::all();
        return view('admin.eventSubject.index' , compact('event_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventSubject.create');
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

        $eventSubject = new EventSubject();
        $eventSubject->create($request->all());

        flash('با موفقیت ذخیره شد');
        return redirect()->route('admin.eventSubject.index');
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
        $event_subject = EventSubject::find($id);
        return view('admin.eventSubject.edit' , compact('event_subject'));
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

        $eventSubject = EventSubject::find($id);
        $eventSubject->update($request->all());

        flash('با موفقیت به روزرسانی شد');
        return redirect()->route('admin.eventSubject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $event_subject=new eventSubject();
        $event_subject->destroy($request->input('selected'));
        flashs('موارد مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function changeStatus($id)
    {
        $event_subject = eventSubject::find($id);
        if($event_subject->status == 0){
            $event_subject->update(['status' => 1]);
        }else{
            $event_subject->update(['status' => 0]);
        }

        flash('تغییر وضعیت انجام شد');
        return redirect()->route('admin.eventSubject.index');
    }
}
