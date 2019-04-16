<?php

namespace App\Http\Controllers;

use App\Core;
use App\Message;
use App\MessageType;
use App\Notifications\NotifyMessageOwner;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::all();
        return view('admin.message.message_index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cores=Core::where('status',1)->get();
        $messagetypes=MessageType::all();
        return view('admin.message.message_add',compact('cores','messagetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $admin_id = \Auth::guard('admin')->user()->id;
            $message = Message::create([
                'title' => $request->title,
                'text' => $request->text,
                'message_type_id' => $request->message_type_id,
                'status' => $request->status,
                'fuser_id' => $admin_id,
                'is_admin'=>1
            ]);
         $users=User::whereIn('id',$request->users)->get();
/*         dd($users);*/
        $when = Carbon::now()->addSecond();
            $message->users()->attach($request->users);
  \Notification::send($users,(new NotifyMessageOwner($message))->delay($when));
        flashs('پیام با موفقیت ارسال شد,نوتیفیکیشن ها در حال ارسال هستند.','success');
        return back();
/*        $user=Auth::admin()->messageusers()->save($message);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $cores=Core::where('status',1)->get();
        $messagetypes=MessageType::all();
        return view('admin.message.message_edit',compact('cores','message','messagetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $admin_id = \Auth::guard('admin')->user()->id;
        $message->update([
            'title'=>$request->title,
             'text'=>$request->text,
            'message_type_id'=>$request->message_type_id,
            'status'=>$request->status,
            'fuser_id' => $admin_id,
        ]);
        if($request->users!=null){
            $message->users()->sync($request->users);
        }
        flashs('پیام با موفقیت ویرایش شد ولی نوتیفیکیشن ارسال نشد.','danger');
        return redirect(route('admin.message.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
