@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.eventUser.events')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
        </div>
        <h1>
           گزارشات رویداد ها
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>گزارش ثبت نام در رویداد {{$event_users[0]->event->name}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>گزارش ثبت نام در رویداد {{$event_users[0]->event->name}}</h3>
            </div>
            <div class="panel-body">
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <table class="table table-bordered table-hover" id="m_table_1" style="width:100% !important;">
                            <thead>
                            <tr>
                                <td class="text-center">#</td>
                                <td class="text-center">نام کاربر</td>
                      {{--          <td class="text-center">کدملی کاربر</td>--}}

                                <td class="text-center">ایمیل کاربر</td>
                                <td class="text-center">شماره تلفن کاربر</td>
                                <td class="text-center">
                                    وضعیت پرداخت
                                </td>
                                <td class="text-center">وضعیت</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($event_users))
                            @php($index = 1)
                                @foreach($event_users as $item)
                                    <tr class="tr_{{$item->id}}">
                                        <td class="text-center iranyekan"> {{$index}} </td>
                                        <td class="text-center">{{$item->user->name}} {{$item->user->lastname}}</td>
                                        {{--<td class="text-center">{{$item->user->nationalcode}}</td>--}}
                                        <td class="text-center">{{$item->user->email}}</td>
                                        <td class="text-center">{{$item->user->phonenumber}}</td>

                                        <td class="text-center">
                                            @if($item->payment()->exists())
                                                @if($item->payment->state == 1)
                                                    <div class="btn btn-success" type="button">پرداخت شده</div>
                                                    @else
                                                    <div class="btn btn-warning" type="button">پرداخت ناموفق</div>
                                                @endif

                                                @else
                                                <div class="btn btn-danger" type="button">پرداخت نشده</div>
                                                @endif
                                        </td>

                                        <td class="text-center">
                                            <img src="{{asset('gif/35.gif')}}" style="width: 95px;height: 30px;position: absolute;display:none;" class="gif_{{$item->id}}">
                                            <select class="change_status select_item_{{$item->id}}" data-event_user_id="{{$item->id}}">
                                                <option value="" class="none_item">انتخاب کنید</option>
                                                @if(!empty($event_user_statuses))
                                                    @foreach($event_user_statuses as $e_u_s)
                                                        <option value="{{$e_u_s->id}}" @if($e_u_s->id == $item->status) selected @endif>{{$e_u_s->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
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

@section('admin-footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    {{-- change status --}}
    <script>
        $(".change_status").on("change", function(){
            var new_status = $(this).val();

            //agar انتخاب کنید ra select karde bood, behesh peygham bede!
            if(new_status == ''){
                swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'مورد انتخاب شده اشتباه است, مجدد تلاش کنید',
                    showConfirmButton: false,
                    timer: 3000
                })
                return false;
            }

            $(this).find(".none_item").attr('disabled', 'disabled');
            var event_user_id = $(this).data('event_user_id');
            $(".gif_"+event_user_id).fadeIn("slow");
            var url = "{{route('admin.eventUser.changeStatus')}}";
            $.ajax({
                data:{'status':new_status, 'event_user_id':event_user_id},
                url:url,
                type:"GET",
                success:function(data){
                    $(".gif_"+event_user_id).fadeOut("slow");
                    swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'تغییر وضعیت با موفقیت انجام شد!',
                        showConfirmButton: false,
                        timer: 1000
                    })

                    setTimeout(function(){
                        $(".tr_"+event_user_id).animate({
                            backgroundColor:'green',
                        }, 500);
                        $(".tr_"+event_user_id).animate({
                            backgroundColor:'#ffffff',
                        }, 500);
                    }, 800);
                },
                error:function(){
                    console.log('error in changing status');
                    $(".gif_"+event_user_id).fadeOut("slow");
                }
            });
        });
    </script>
    {{-- end of change status --}}

    <script src="{{asset('js/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var table = $('#m_table_1');
        table.DataTable({
            responsive: true,
        });
    </script>

@endsection
