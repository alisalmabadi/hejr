<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.job.job_add');
    }

    public function store(Request $request)
    {
        $area=Job::create($request->all());
        flashs('شغل مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $jobs=Job::all();
        /*        dd($areas);*/
        return view('admin.job.job_index',compact('jobs'));
    }

    public function destroy(Request $request){
        $area=new Job();
        $area->destroy($request->input('selected'));
        flashs('شغل مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(Job $job)
    {
        return view('admin.job.job_edit',compact('job'));
    }

    public function update(Request $request,Job $job)
    {
        $job->update($request->all());
        flashs('شغل مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.job.index'));
    }
}
