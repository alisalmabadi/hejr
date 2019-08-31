<?php

namespace App\Http\Controllers;

use App\Notifications\NotifyChangeStatusEventUser;
use App\Notifications\NotifySignedUpEvent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\EventUser;
use App\Event;
use App\EventUserStatus;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $event_users = EventUser::all();
        return view('admin.eventUser.index' , compact('event_user'));
    }

    public function events()
    {
        $events = Event::all();
        return view('admin.eventUser.events', compact('events'));
    }

    public function single_event(Event $event)
    {
        $event_users = $event->event_users;
        //dd($event_users);
        $event_user_statuses = EventUserStatus::all();
        //dd($event_users);
        return view('admin.eventUser.single_event', compact('event_users', 'event_user_statuses','event'));
    }

    public function changeStatus(Request $request)
    {
        $event_user_id = EventUser::find($request['event_user_id']);
        $event_user_id->update(['status'=>$request['status']]);
        $user=User::find($event_user_id->user_id);
        $title = "وضعیت رزرو رویداد NAME تغییر کرد.";
        $message = "کاربر گرامی،رزرو ثبت نام شما در رویداد NAME به STATUS تغییر کرد.";
        $type = 4;
        $when = Carbon::now()->addSecond();
        \Notification::send($user,(new NotifyChangeStatusEventUser($event_user_id,$title,$message,$type))->delay($when));
        return response('update_done!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
