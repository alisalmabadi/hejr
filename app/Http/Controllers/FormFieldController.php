<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormField;

class FormFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form_fields = FormField::all();
        return view('admin.form.field.index', compact('form_fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.field.create');
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
            'name' => 'required|unique:form_fields|max:190',
            'type' => 'required|numeric',
            'status'=>'required|numeric'
        ],[
            'name.required'=>'نام را وارد کنید',
            'name.unique'=>'این نام قبلا استفاده شده است',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'type.required'=>'نوع فیلد را انتخاب کنید',
            'status.required'=>'وضعیت را انتخاب کنید'
        ]);

        $field = new FormField();
        $field = $field->create($request->all());
        return redirect()->route('admin.form.field.index');
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
        $field = FormField::find($id);
        return view('admin.form.field.edit', compact('field'));
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
        $field = FormField::find($id);
        $this->validate($request, [
            'name' => 'required|max:190|unique:form_fields,name,'.$field->id,
            'type' => 'required|numeric',
            'status'=>'required|numeric'
        ],[
            'name.required'=>'نام را وارد کنید',
            'name.unique'=>'این نام قبلا استفاده شده است',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'type.required'=>'نوع فیلد را انتخاب کنید',
            'status.required'=>'وضعیت را انتخاب کنید'
        ]);

        $field = $field->update($request->all());
        return redirect()->route('admin.form.field.index');
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
        $field = FormField::find($id);
        FormField::destroy($id);
        return redirect()->route('admin.form.field.index');
    }
}
