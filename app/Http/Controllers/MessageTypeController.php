<?php

namespace App\Http\Controllers;

use App\MessageType;
use Illuminate\Http\Request;

class MessageTypeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.messagetype.messagetype_add');
    }

    public function store(Request $request)
    {
        $message=MessageType::create($request->all());
        flashs('نوع پیام مورد نظر با موفقیت اضافه شد.','success');
        return back();
    }

    public function index()
    {
        $messagetypes=MessageType::all();
        /*        dd($areas);*/
        return view('admin.messagetype.messagetype_index',compact('messagetypes'));
    }

    public function destroy(Request $request){
        $area=new MessageType();
        $area->destroy($request->input('selected'));
        flashs('نوع پیام مورد نظر حذف گردیدند.','danger');
        return back();
    }

    public function edit(MessageType $messagetype)
    {
        return view('admin.messagetype.messagetype_edit',compact('messagetype'));
    }

    public function update(Request $request,MessageType $messagetype)
    {
        $messagetype->update($request->all());
        flashs('نوع پیام مورد نظر با موفقیت بروز شد.','success');
        return redirect(route('admin.messagetype.index'));
    }
}
