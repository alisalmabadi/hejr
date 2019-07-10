<?php

namespace App\Http\Controllers;

use App\Area;
use App\comment;
use App\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields=Field::all();
        return view('admin.field.field_index',compact('fields'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.field.field_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field=Field::create($request->all());
        flashs('رشته مورد نظر با موفقیت افزوده شد.','success');
        return back();
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
    public function edit(Field  $field)
    {
        return view('admin.field.field_edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $field->update($request->all());
        flashs('رشته مورد نظر با موفقیت ویرایش شد.','success');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $field=new Field();
        $field->destroy($request->input('selected'));
        flashs('رشته ها پاک شدند.');
        return back();
    }


    public function search(Request $request)
    {
       $fields=Field::where([['name','LIKE','%'.$request['q']['term'].'%'],['status',1]])->get(['id','name']);
/*       $fields=array_pluck('name',$fields);*/
       $fields=json_encode($fields);
       return $fields;
    }
}
