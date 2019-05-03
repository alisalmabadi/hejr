@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.eventUser.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
            event users
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>all event users</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>event User list</h3>
            </div>
            <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-center">ID</td>
                                <td class="text-center">event name</td>
                                <td class="text-center">user name</td>
                                <td class="text-center">اطلاعات کاربر</td>
                                <td class="text-center">وضعیت</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($event_users))
                                @foreach($event_user as $item)
                                    <tr>
                                        <td class="text-center iranyekan"> {{$item->id}} </td>
                                        <td class="text-center">{{$item->event->name}}</td>
                                        <td class="text-center">{{$item->user->name}}</td>
                                        <td class="text-center">{{$item->user_information}}</td>
                                        <td class="text-center">
                                            @if($item->status == 1)
                                                <a href="{{route('admin.eventType.changeStatus' , $item)}}"><button class="btn btn-info" type="button">فعال</button></a>
                                            @else
                                                <a href="{{route('admin.eventType.changeStatus' , $item)}}"><button class="btn btn-danger" type="button">غیر فعال</button></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection

