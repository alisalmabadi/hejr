<?php

namespace App\Http\Controllers;

use App\Article;
use App\Core;
use App\Event;
use App\EventUser;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data = array();
        $data['users_count']= User::all()->count();
        $data['cores_count']= Core::all()->count();
        $data['events_count']= Event::all()->count();
        $data['events_registered_count']= EventUser::all()->count();
        $data['articles'] = Article::all();
        $users = User::OnlineUsers();
        $data['online_users'] = $users->count();
       return view('admin.index',['data'=>$data,'users'=>$users]);
    }
}
