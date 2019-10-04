<template>
<div class="m-portlet  m-portlet--unair">
    <div class="m-portlet__body  m-portlet__body--no-padding">
        <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::Total Profit-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            تعداد رویداد ها
                        </h4><br>
                        <span class="m-widget24__desc">
												تعداد کل رویداد های ایجاد شده
												</span>
                        <span class="m-widget24__stats m--font-brand">
                                                    {{data.events_count}}

												</span>
                        <div class="m--space-10"></div>
                        <!--  <div class="progress m-progress--sm">
                        <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                        <span class="m-widget24__change">
													رویداد های ثبت نام شده
												</span>
                        <span class="m-widget24__number">
												10
												</span>-->
                    </div>
                </div>

                <!--end::Total Profit-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Feedbacks-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            رویداد های ثبت نام شده
                        </h4><br>
                     <!--
                        <span class="m-widget24__desc">

												</span>
                        -->
                        <span class="m-widget24__stats m--font-info">
                                                    {{data.events_registered_count}}

												</span>
                        <div class="m--space-10"></div>
                        <!-- <div class="progress m-progress--sm">
                        <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                        <span class="m-widget24__change">
                                                تعداد کل شبکه
												</span>
                        <span class="m-widget24__number">
													10
												</span> -->
                    </div>
                </div>

                <!--end::New Feedbacks-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Orders-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            تعداد هسته ها
                        </h4><br>
                        <!--   <span class="m-widget24__desc">
													Fresh Order Amount
												</span> -->
                        <span class="m-widget24__stats m--font-danger">
													{{data.cores_count}}
												</span>
                        <div class="m--space-10"></div>
                        <!-- <div class="progress m-progress--sm">
                        <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                        <span class="m-widget24__change">
													Change
												</span>
                        <span class="m-widget24__number">
													69%
												</span> -->
                    </div>
                </div>

                <!--end::New Orders-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Users-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            تعداد کل شبکه
                        </h4><br>
                        <span class="m-widget24__desc">
													کاربران ثبت شده تا الان
												</span>
                        <span class="m-widget24__stats m--font-success">
																									{{data.users_count}}
												</span>
                        <div class="m--space-10"></div>
                        <!-- <div class="progress m-progress--sm">
                        <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                        <span class="m-widget24__change">
													Change
												</span>
                        <span class="m-widget24__number">
													90%
												</span> -->
                    </div>
                </div>

                <!--end::New Users-->
            </div>
        </div>
    </div>
</div>
</template>

<script type="application/javascript">
    export default {
        name: "dashboard-porlet",
        props : ['data'],
    }

</script>