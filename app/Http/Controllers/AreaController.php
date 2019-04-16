<?php

namespace App\Http\Controllers;

use App\Area;
use App\Province;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        $provinces=Province::all();
        return view('admin.areas.area_add',compact('provinces'));
    }

    public function store(Request $request)
    {
        $area=Area::create($request->all());
        flashs('منطقه مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $areas=Area::all();
/*        dd($areas);*/
        return view('admin.areas.area_index',compact('areas'));
    }

    public function destroy(Request $request){
        $area=new Area();
        $area->destroy($request->input('selected'));
        flashs('مناطقه مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(Area $area)
    {
            $provinces=Province::all();
            return view('admin.areas.area_edit',compact('area','provinces'));
    }

    public function update(Request $request,Area $area)
    {
        $area->update($request->all());
        flashs('منطقه مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.area.index'));
    }
}
