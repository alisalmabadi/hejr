<?php

namespace App\Http\Controllers;

use App\Core;
use App\Exports\UserExport;
use App\Field;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function users(Request $request)
    {
        $cores=Core::all();
        $jobs=Job::all();
        $fields = Field::all();
        $filter = array();

        if($request) {
            $filter['core_id'] = $request->core_id;
            $filter['field_id'] = $request->field_id;
            $filter['job_id'] = $request->job_id;
        }else{

            $filter['core_id'] = null;
            $filter['field_id'] = null;
            $filter['job_id'] = null;
        }

        if($request->core_id==0 && $request->job_id == 0 && $request->field_id == 0){
            $users=User::all();

        }elseif(
            $request->core_id!=0 && $request->job_id != 0 && $request->field_id != 0
        ){
            $users=User::where([['core_id',$request->core_id],['job_id',$request->job_id],['field_id',$request->field_id]])->get();

        }elseif($request->field_id == 0 && $request->job_id !=0 && $request->core_id != 0 ){

            $users=User::where([['core_id',$request->core_id],['job_id',$request->job_id]])->get();

        }elseif($request->field_id != 0 && $request->job_id ==0 && $request->core_id != 0){

            $users=User::where([['core_id',$request->core_id],['field_id',$request->field_id]])->get();

        }elseif($request->field_id != 0 && $request->job_id !=0 && $request->core_id == 0){

            $users=User::where([['job_id',$request->job_id],['field_id',$request->field_id]])->get();

        }elseif($request->field_id != 0 && $request->job_id ==0 && $request->core_id == 0){

            $users=User::where('field_id',$request->field_id)->get();

        }elseif($request->field_id == 0 && $request->job_id !=0 && $request->core_id == 0){

            $users=User::where('field_id',$request->job_id)->get();

        }elseif($request->field_id == 0 && $request->job_id ==0 && $request->core_id != 0){
            // dd($request->all());

            $users=User::where('core_id',$request->core_id)->get();

        }else{
            dd('Mage mishe?!');
        }

        $users->load('area');
        $users->load('core');
        $users->load('soldier_service');
        $users->load('grade');
        $users->load('university');
        $users->load('field');

        return view('admin.report.user_report',compact('users','cores','jobs','fields','filter'));
    }


    public function export(Request $request)
    {
        $users=$request->user;
        //dd($users);
        return Excel::download(new UserExport($users),'user.xls');

    }

}
