<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormType;

class FormTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form_types = FormType::all();
        return view('admin.form.type.index', compact('form_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.type.create');
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
            'name' => 'required|unique:form_types|max:190',
            'status'=>'required|numeric'
        ],[
            'name.required'=>'نام را وارد کنید',
            'name.unique'=>'این نام قبلا استفاده شده است',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'status.required'=>'وضعیت را انتخاب کنید'
        ]);

        $type = new FormType();
        $type = $type->create($request->all());
        return redirect()->route('admin.form.type.index');
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
        $type = FormType::find($id);
        return view('admin.form.type.edit', compact('type'));
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
        $type = FormType::find($id);
        $this->validate($request, [
            'name' => 'required|max:190|unique:form_types,name,'.$type->id,
            'status'=>'required|numeric'
        ],[
            'name.required'=>'نام را وارد کنید',
            'name.unique'=>'این نام قبلا استفاده شده است',
            'name.max'=>'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'status.required'=>'وضعیت را انتخاب کنید'
        ]);

        $type->update($request->all());
        return redirect()->route('admin.form.type.index');
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
        FormType::destroy($id);
        return redirect()->route('admin.form.type.index');
    }
}
