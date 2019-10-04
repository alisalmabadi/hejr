@extends('layouts.app_master')
@section('styles')
    <style>
        p {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
</style>

    @endsection
@section('content')


                <!-- BEGIN: Subheader -->
                <div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="margin-right-auto">
                            <h3 class="m-subheader__title ">داشبورد</h3>
                        </div>
                       {{-- <div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
                        </div>--}}
                    </div>
                </div>

                <!-- END: Subheader -->
                <div class="m-content">

<dashboard-portlet :data="{{json_encode($data)}}"></dashboard-portlet>


<dashboard-article></dashboard-article>

  <!-- The Modal -->
    <div class="modal fade" id="article_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">  
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">توضیحات کامل خبر</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="desc"></div>
                        <hr/>
                        <div class="author"></div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>

</div>
    @endsection


@section('scripts')

{{--    <!--begin::Page Vendors -->
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

    <!--end::Page Vendors -->--}}

    <!--begin::Page Scripts -->
   {{-- <script src="{{asset('js/dashboard.js')}}" type="text/javascript"></script>--}}

    <!--end::Page Scripts -->


    <script type="application/javascript">
        $(document).ready(function () {
            $(".btn-show-article").on("click", function () {
                var title = $(this).closest('.article_shows').find(".article_title").html();
                var desc = $(this).closest('.article_shows').find(".article_desc").find('p').text();
                var author = $(this).closest('.article_shows').find(".article_author").html();

                $("#article_modal").find(".modal-header").find(".modal-title").html('');
                $("#article_modal").find(".modal-body").find(".desc").html('');
                $("#article_modal").find(".modal-body").find(".author").html('');

                $("#article_modal").find(".modal-header").find(".modal-title").html(title);
                $("#article_modal").find(".modal-body").find(".desc").html(desc);
                $("#article_modal").find(".modal-body").find(".author").html('نویسنده: ' + author);

                $("#article_modal").modal("show");
            });

            function escapeHtml(text) {
                var map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };

                return text.replace(/[&<>"']/g, function (m) {
                    return map[m];
                });
            }
        });
    </script>
@endsection