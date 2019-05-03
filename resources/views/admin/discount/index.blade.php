@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.discount.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <a href="{{route('admin.discount.create')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="ساخت تخفیف جدید"><i class="fa fa-plus"></i></a>
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
                            <td class="text-center">نام</td>
                            <td class="text-center">کد</td>
                            <td class="text-center">درصد</td>
                            <td class="text-center">قیمت شروع</td>
                            <td class="text-center">وضعیت</td>
                            <td class="text-center">عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($discounts))
                            @foreach($discounts as $item)
                                <tr>
                                    <td class="text-center iranyekan"> {{$item->id}} </td>
                                    <td class="text-center iranyekan"> {{$item->name}} </td>
                                    <td class="text-center iranyekan"> {{$item->code}} </td>
                                    <td class="text-center iranyekan"> {{$item->percent}} </td>
                                    <td class="text-center iranyekan"> {{$item->start_price}} </td>
                                    <td class="text-center iranyekan">
                                        @if($item->status == 0)
                                            <a href="{{route('admin.discount.changeStatus' , $item)}}"><button class="btn btn-danger">غیر فعال</button></a>
                                        @else
                                            <a href="{{route('admin.discount.changeStatus' , $item)}}"><button class="btn btn-success">فعال</button></a>
                                        @endif
                                    </td>
                                    <td class="text-center iranyekan">
                                        <a href="{{route('admin.discount.edit' , $item)}}"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                        <a href="{{route('admin.discount.delete' , $item->id)}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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

