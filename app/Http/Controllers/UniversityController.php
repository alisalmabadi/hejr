<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use App\University;
use App\UniversityTypes;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        $provinces=Province::all();
        $university_types=UniversityTypes::all();
        return view('admin.university.university_add',compact('provinces','university_types'));
    }

    public function store(Request $request)
    {
        $university=University::create($request->all());

        flashs('دانشگاه مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $universities=University::all();
        return view('admin.university.university_index',compact('universities'));
    }

    public function destroy(Request $request){
        $university=new University();
        $university->destroy($request->input('selected'));
        flashs('دانشگاه های مورد نظر حذف گردیدند.','danger');
        return back();
    }

    /**
     * @param Core $core
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(University $university)
    {
        $provinces=Province::all();
        $university_types=UniversityTypes::all();
        return view('admin.university.university_edit',compact('provinces','university_types','university'));
    }

    public function update(Request $request,University $university)
    {
        $university->update($request->all());
        flashs('دانشگاه مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.university.index'));
    }
}
