@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.eventUser.events')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
           رویدادها
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>رویداد ها</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست رویداد ها</h3>
            </div>
            <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="m_table_1">
                            <thead>
                            <tr>
                                <td class="text-center">#</td>
                                <td class="text-center">نام رویداد</td>
                                <td class="text-center">موضوع رویداد</td>
                                <td class="text-center">قیمت</td>
                                <td class="text-center">جزئیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($events))
                            @php($index = 1)
                                @foreach($events as $item)
                                    <tr>
                                        <td class="text-center iranyekan"> {{$index}} </td>
                                        <td class="text-center">{{$item->name}}</td>
                                        <td class="text-center">{{$item->event_status->name}}</td>
                                        <td class="text-center">{{$item->price}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.eventUser.single_event', $item)}}"><button type="button" class="btn btn-default">جزئیات</button></a>
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

@section('admin_footer')
    <script src="{{asset('js/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var table = $('#m_table_1');
        table.DataTable({
            responsive: true,
        });
    </script>
@endsection
