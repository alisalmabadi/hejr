<?php

namespace App\Http\Controllers;

use App\SoldierServices;
use Illuminate\Http\Request;

class SoldierServicesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.soldier_services.soldier_service_add');
    }

    public function store(Request $request)
    {
        $area=SoldierServices::create($request->all());
        flashs('وضعیت خدمت سربازی مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $soldier_services =SoldierServices::all();
        return view('admin.soldier_services.soldier_service_index',compact('soldier_services'));
    }

    public function destroy(Request $request){
        $soldierservice=new SoldierServices();
        $soldierservice->destroy($request->input('selected'));
        flashs('وضعیت خدمت سربازی مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(SoldierServices $soldier_service)
    {
        return view('admin.soldier_services.soldier_service_edit',compact('soldier_service'));
    }

    public function update(Request $request,SoldierServices $soldier_service)
    {
        $soldier_service->update($request->all());
        flashs('وضعیت خدمت سربازی مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.soldier-service.index'));
    }
}
