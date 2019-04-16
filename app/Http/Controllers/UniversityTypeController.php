<?php

namespace App\Http\Controllers;

use App\UniversityTypes;
use Illuminate\Http\Request;

class UniversityTypeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.university_types.university_type_add');
    }

    public function store(Request $request)
    {
        $area=UniversityTypes::create($request->all());
        flashs('نوع دانشگاه مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $university_types=UniversityTypes::all();
        /*        dd($areas);*/
        return view('admin.university_types.university_type_index',compact('university_types'));
    }

    public function destroy(Request $request){
        $universitytype=new UniversityTypes();
        $universitytype->destroy($request->input('selected'));
        flashs('نوع دانشگاه مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(UniversityTypes $university_type)
    {
        return view('admin.university_types.university_type_edit',compact('university_type'));
    }

    public function update(Request $request,UniversityTypes $university_type)
    {
        $university_type->update($request->all());
        flashs('نوع دانشگاه مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.university-type.index'));
    }
}
