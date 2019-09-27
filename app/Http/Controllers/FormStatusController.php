<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormStatus;

class FormStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form_statuses = FormStatus::all();
        return view('admin.form.status.index', compact('form_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:form_statuses|max:190',
            'form_type'=>'required|numeric'
        ],[
            'name.required'=>'نام را وارد کنید',
            'name.unique'=>'این نام قبلا استفاده شده است',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'form_type.required'=>'وضعیت را انتخاب کنید'
        ]);

        $status = new FormStatus();
        $status = $status->create($request->all());
        return redirect()->route('admin.form.status.index');
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
        $status = FormStatus::find($id);
        return view('admin.form.status.edit', compact('status'));
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
        $status = FormStatus::find($id);
        $this->validate($request, [
            'name' => 'required|max:190|unique:form_statuses,name,'.$status->id,
            'form_type'=>'required|numeric'
        ],[
            'name.required'=>'نام را وارد کنید',
            'name.unique'=>'این نام قبلا استفاده شده است',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'form_type.required'=>'وضعیت را انتخاب کنید'
        ]);

        $status->update($request->all());
        return redirect()->route('admin.form.status.index');
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

    public function delete($id)
    {
        FormStatus::destroy($id);
        return redirect()->route('admin.form.status.index');
    }
}
