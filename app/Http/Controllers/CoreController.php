<?php

namespace App\Http\Controllers;

use App\Area;
use App\Core;
use App\Province;
use App\User;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        $users=User::where('status',1)->get();
        $areas=Area::all();
        $provinces=Province::all();
        return view('admin.core.core_add',compact('provinces','users','areas'));
    }

    public function store(Request $request)
    {
        $core=Core::create($request->except('area'));

        $core->areas()->attach($request->area);

        flashs('هسته مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $cores=Core::all();
        return view('admin.core.core_index',compact('cores'));
    }

    public function destroy(Request $request){
        $core=new Core();
        $core->destroy($request->input('selected'));
        flashs('هسته های مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(Core $core)
    {
        $provinces=Province::all();
        $areas=Area::all();
        $users=User::where('status',1)->get();
      return view('admin.core.core_edit',compact('core','provinces','areas','users'));
    }

    public function update(Request $request,Core $core)
    {
        $core->update($request->except('area'));
        $core->areas()->sync($request->area);
        flashs('هسته مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.core.index'));
    }
}
