@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.form.status.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.form.status.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
وضعیت فرم
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>لیست وضعیتهای فرم</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> لیست وضعیت های فرم </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">#</td>
                            <td class="text-center"> نام</td>
                            <td class="text-center">وضعیت</td>
                            <td class="text-center">عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($form_statuses))
                        @php($index = 1)
                        @foreach($form_statuses as $item)
                            <tr>
                                <td class="text-center iranyekan"> {{$index}} </td>
                                <td class="text-center iranyekan"> {{$item->name}} </td>
                                <td class="text-center">
                                    @if($item->form_type == 0)
                                        <label class="label-danger">پنهان</label>
                                    @else   
                                        <label class="label-primary">آشکار</label>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{route('admin.form.status.edit', $item)}}" class="btn btn-warning">ویرایش</a>
                                    <a onClick="return confirm('آیا اطمینان دارید؟');" href="{{route('admin.form.status.delete', $item)}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @php($index+=1)
                        @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </section>

@endsection

