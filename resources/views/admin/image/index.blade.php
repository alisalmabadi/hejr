@extends('layouts.admin_master_full')

@section('content-header')
    <section class="content-header">
        <div class="pull-left">
            <a href="{{route('admin.image.create')}}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="افزودن"><i class="fa fa-plus"></i></a> <a href="{{route('admin.image.index')}}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="بازسازی"><i class="fa fa-refresh"></i></a>
            <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('آیا مطمئن هستید؟') ? $('#form-material').submit() : false;" data-original-title="حذف"><i class="fa fa-trash-o"></i></button>
        </div>
        <h1>
            تصاویر
        </h1>
        <ol class="breadcrumb">

            <li class="active"><i class="fa fa-th"></i>مدیریت تصاویر</li>
        </ol>
    </section>
@endsection

@section('content')

    <section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>لیست تصاویر</h3>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.image.delete')}}" method="post" enctype="multipart/form-data" id="form-material">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                                <td class="text-center">#</td>
                                <td class="text-center">آدرس عکس</td>
                                <td class="text-center">عکس</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($images))
                            @php($sharp = 1)
                                @foreach($images as $item)
                                    <tr>
                                        <td class="text-center">
                                            <input name="selected[]" value="{{$item->id}}" type="checkbox">
                                        </td>
                                        <td class="text-center iranyekan"> {{$sharp}} </td>
                                        <td class="text-center iranyekan"> {{$item->image_path}} </td>
                                        <td class="text-center iranyekan">
                                            <img src="{{asset($item->image_path)}}" style="width: 200px; height: 200px;">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="show_event_images btn btn-default form-control" data-image_id="{{$item->id}}">نمایش جرئیات</button>
                                        </td>
                                    </tr>
                                    @php($sharp += 1)
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </form>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <label>رویدادهایی که از این تصویر استفاده کرده اند:</label>
            <div class="row show_events">
                
            </div>
            <hr/>
            <label>انتخای این تصویر برای رویداد جدید</label>
            <div class="row select_event">
                <select class="form-control eventor">
                    @foreach($events as $event)
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-success form-control add_eventor">ذخیره</button>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end of modal -->
      
    </div>

            </div>
        </div>

    </section>

@endsection
@section('admin-footer')
    <!-- show modal -->
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".show_event_images").on('click' , function(){
            var id = $(this).data('image_id');
            var url = "{{route('admin.image.show_event_images')}}";
            $.ajax({
                data:{'image_id':id},
                url:url,
                type:"POST",
                success:function(data){
                    $("#myModal").find(".modal-body").find(".show_events").html('');
                    $.each(data , function(event){
                        $("#myModal").find(".modal-body").find(".show_events").append('<div class="col-md-12 col-lg-12 event_id_'+data[event].id+'" style="border: 1px solid black;border-radius: 50px;margin-bottom: 10px;text-align: center;"><div class="col-md-9 col-lg-9"><label class=" label-primary form-control" style="    border-radius: 5px;margin-top: 3px;">'+data[event].name+'</label></div><div class="col-lg-3 col-md-3"><button style="    margin-top: 3px;" class="btn btn-danger delete_event_image" data-image="'+id+'" data-event="'+data[event].id+'">حذف</button></div></div>');
                    });
                    $("#myModal").find(".modal-body").find(".show_events").append('<input type="hidden" id="modal_image_id" value="'+id+'">');
                    $("#myModal").modal("show");
                },
                error:function(){
                    console.log('error');
                }
            });
        });
    </script>
    <!-- end of show modal -->

    <!-- event select -->
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
         $(".add_eventor").on('click',function(){
            var image_id = $("#modal_image_id").val();
            var event_id = $(".eventor").val();
            var url = "{{route('admin.image.add_event_image')}}";
            $.ajax({
                data:{'image_id':image_id, 'event_id':event_id},
                url:url,
                type:"POST",
                success:function(data){
                    $("#myModal").find(".modal-body").find(".show_events").append('<div class="col-md-12 col-lg-12 event_id_'+data.id+'" style="border: 1px solid black;border-radius: 50px;margin-bottom: 10px;text-align: center;"><div class="col-md-9 col-lg-9"><label class=" label-primary form-control" style="    border-radius: 5px;margin-top: 3px;">'+data.name+'</label></div><div class="col-lg-3 col-md-3"><button style="    margin-top: 3px;" class="btn btn-danger delete_event_image" data-image="'+image_id+'" data-event="'+data.id+'">حذف</button></div></div>');
                },
                error:function(){
                    console.log('error in adding the event_image');
                }
            });
         });
    </script>
    <!-- end of event_select -->

    <!-- delete event_image -->
    <script>
        $(document).on("click" , ".delete_event_image" , function(){
            var image_id = $(this).data('image');
            var event_id = $(this).data('event');
            var url = "{{route('admin.image.delete_event_image')}}";
            $.ajax({
                data:{'image_id':image_id , 'event_id':event_id},
                url:url,
                type:"POST",
                success:function(data){
                    $(".event_id_"+event_id).fadeOut("slow");
                },
                error:function(){
                    console.log('error in deleting event_image');
                }
            });
        });
    </script>
    <!-- end of delete event_image -->
@stop
