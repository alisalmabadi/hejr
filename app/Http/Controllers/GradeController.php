<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.grade.grade_add');
    }

    public function store(Request $request)
    {
        $area=Grade::create($request->all());
        flashs('وضعیت تحصیلی مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $grades=Grade::all();
        /*        dd($areas);*/
        return view('admin.grade.grade_index',compact('grades'));
    }

    public function destroy(Request $request){
        $area=new Grade();
        $area->destroy($request->input('selected'));
        flashs('وضعیت تحصیلی مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(Grade $grade)
    {
        return view('admin.grade.grade_edit',compact('grade'));
    }

    public function update(Request $request,Grade $grade)
    {
        $grade->update($request->all());
        flashs('وضعیت تحصیلی مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.grade.index'));
    }
}
