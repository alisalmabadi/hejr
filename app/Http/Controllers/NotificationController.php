<?php

namespace App\Http\Controllers;

use App\Notification;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get()
    {
       /* $notifications=\Auth::user()->notifications()->orderBy(DB::raw('read_at IS NOT NULL, read_at'), 'asc')->get();*/
          $notifications=\Auth::user()->notifications()->orderby('created_at')->get()->toArray();


        if(!empty($notifications)){
          foreach($notifications as $notify){
              $v=new Verta($notify['created_at']);
              $res=$v->format('%d %B %Y');
              $result[]=array_add($notify,'created',$res);
          }
        //  dd($result);
          return $result;
        }
        else{
            return null;
        }


    }

    public function unreadget()
    {
        /* $notifications=\Auth::user()->notifications()->orderBy(DB::raw('read_at IS NOT NULL, read_at'), 'asc')->get();*/
        $notifications=\Auth::user()->unreadnotifications()->orderby('created_at')->get()->toArray();


        if(!empty($notifications)){
            foreach($notifications as $notify){
                $v=new Verta($notify['created_at']);
                $res=$v->format('%d %B %Y');
                $result[]=array_add($notify,'created',$res);
            }
            //  dd($result);
            return $result;
        }
        else{
            return null;
        }


    }


    public function read(Request $request)
    {
        $notification=Notification::find($request->id);
        if($notification->read_at == null) {
            auth()->user()->unreadnotifications->find($request->id)->markAsRead();
        }
        return $notification;
    }
}
