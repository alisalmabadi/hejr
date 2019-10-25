<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\FormStatus;
use App\FormType;
use App\FormField;
use App\Form_FormField;
use App\Form_FormField_answere;
use App\Core;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        return view('admin.form.form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_types = FormType::where('status', 1)->get();
        $form_statuses = FormStatus::where('form_type', 1)->get();
        return view('admin.form.form.create', compact('form_types', 'form_statuses'));
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
            'name' => 'required|unique:forms|max:190',
            'form_type_id' => 'required|numeric',
            'form_status_id' => 'required|numeric'
        ],[
            'name.required' => 'نام فرم را وارد کنید',
            'name.unique' => 'این نام قبلا استفاده شده است',
            'name.max' => 'تعداد کاراکتر وارد دشه بیش از حد مجاز است',
            'form_type_id.required' => 'این فیلد را خالی رها نکنید',
            'form_status_id.required' => 'این فیلد را خالی رها نکنید'
        ]);

        $form = new Form();
        $form = $form->create($request->all());

        return redirect()->route('admin.form.form.edit', $form);
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
    public function edit(Form $form)
    {//dd($form->form_form_fields[2]->field);
        $fields = FormField::where('status', 1)->get();
        foreach($fields as $key=>$field)
        {
            if($field->type == 1)
                $fields[$key]->type_name = "text Box";
            elseif($field->type == 2)
                $fields[$key]->type_name = "check Box";
            elseif($field->type == 3)
                $fields[$key]->type_name = "Drop Down";
            else
                $fields[$key]->type_name = "Undefined";
        }
        $cores = Core::where('status', 1)->get();
        $form_types = FormType::where('status', 1)->get();
        $form_statuses = FormStatus::where('form_type', 1)->get();
        return view('admin.form.form.edit', compact('form', 'form_types', 'form_statuses', 'fields', 'cores'));
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

    public function update_general(Request $request, $id)
    {
        $form = Form::find($id);
        $this->validate($request, [
            'name' => 'required|max:190|unique:forms,name,'.$form->id,
            'form_type_id' => 'required|numeric',
            'form_status_id' => 'required|numeric'
        ],[
            'name.required' => 'نام فرم را وارد کنید',
            'name.unique' => 'این نام قبلا استفاده شده است',
            'name.max' => 'تعداد کاراکتر وارد دشه بیش از حد مجاز است',
            'form_type_id.required' => 'این فیلد را خالی رها نکنید',
            'form_status_id.required' => 'این فیلد را خالی رها نکنید'
        ]);

        $form = $form->update($request->all());

        return response('general update completed');
    }

    public function add_field(Request $request)
    {
        if(!empty($request['id']))
        {
            $form_form_field = Form_FormField::find($request['id']);
            $form_form_field->update($request->all());
            if(!empty($request['options']))
            {
                $option_array = array();
                foreach($request['options'] as $option)
                {
                    $option_array[] = ['option'=>$option];
                }
                if(!empty($request['multi']))
                {
                    $option_array[] = ['multiple_select'];
                }
                $option_array = json_encode($option_array);
                $form_form_field->update(['attribute'=>$option_array]);
            }
        }
        else
        {
            $form_form_field = new Form_FormField();
            $form_form_field = $form_form_field->create($request->all());
            if(!empty($request['options']))
            {
                $option_array = array();
                foreach($request['options'] as $option)
                {
                    $option_array[] = ['option'=>$option];
                }
                if(!empty($request['multi']))
                {
                    $option_array[] = ['multiple_select'];
                }
                $option_array = json_encode($option_array);
                $form_form_field->update(['attribute'=>$option_array]);
            }
        }
        return response($form_form_field->id);
    }

    public function del_field($id)
    {
        Form_FormField::destroy($id);
        return response('deleted');
    }


    public function loadUsersByCore(Request $request)
    {
        $form = Form::find($request['form_id']);
        $core = Core::find($request['core_id']);
        $core_users = $core->users;
        if(!empty($core_users)){
            foreach($core_users as $key=>$user){
                foreach($user->forms as $u_f){
                    if($u_f->id == $form->id){
                        $core_users[$key]->used = 'yes';
                    }
                }
            }
        }
        $users = $core_users;
        $cores = Core::where('status', 1)->get();
        $fields = FormField::where('status', 1)->get();
        foreach($fields as $key=>$field)
        {
            if($field->type == 1)
                $fields[$key]->type_name = "text Box";
            elseif($field->type == 2)
                $fields[$key]->type_name = "check Box";
            elseif($field->type == 3)
                $fields[$key]->type_name = "Drop Down";
            else
                $fields[$key]->type_name = "Undefined";
        }
        return view('admin.form.form.edit', compact('users', 'form', 'cores', 'fields'));
    }

    public function addUser(Request $request)
    {
        $form = Form::find($request['form_id']);
        $form->users()->attach($request['user_id']);
        return response($request['user_id']);
    }
    public function removeUser(Request $request)
    {
        $form = Form::find($request['form_id']);
        $form->users()->detach($request['user_id']);
        return response($request['user_id']);
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
        dd('del', $id);;
    }
}
