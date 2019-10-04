<template>
    <div @if="!loading" class="row">
        <div class="col-xl-12 col-md-12">
            <!--begin:: Widgets/Best Sellers-->
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                اخبار سامانه
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <!-- <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab1_content" role="tab" aria-selected="false">
                                Last Month
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab" aria-selected="false">
                                last Year
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget5_tab3_content" role="tab" aria-selected="true">
                                All time
                            </a>
                        </li>
                    </ul>-->
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Content-->
                    <div class="tab-content_disabled">
                        <div class="tab-pane" id="m_widget5_tab1_content" aria-expanded="true">
                            <!--begin::m-widget5-->

                            <div v-for="article in articles" class="m-widget5 article_shows">
                                <div class="m-widget5__item">
    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" :src="article.img_thumbnail" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title article_title">
                                                {{article.title}}
                                            </h4>
                                            <span class="m-widget5__desc article_desc" v-html="article.body">

    </span>

                                            <div class="m-widget5__info">
   <span class="m-widget5__info-label">
         نویسنده:
    </span>
                                                <span class="m-widget5__info-author-name article_author">
           {{article.user.name}}                                                          {{article.user.lastname}}
       </span>

                                                |
                                                <span class="m-widget5__info-label">
                                                        تاریخ انتشار :
                                                    </span>
                                                <span class="m-widget5__info-date m--font-info">
                                                        {{article.persian_date}}
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
    <div class="m-widget5__content">
                                        <!--<div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales"><span class="m-widget5__votes"><button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-danger"><div class="m-demo-icon__class">
                                                    لایک		<i class="la la-thumbs-up"></i>
                                                </div>
                                                </button></span>
                                    </div>-->

                                        <div class="m-widget5__stats2">

   <span class="m-widget5__votes"><button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent btn-show-article">نمایش بیشتر</button>
   </span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>
    </div>
</template>

<script type="application/javascript">
    export default {
        name: "dashboard-article",
        data(){
            return {
                articles:[],
                loading : true
            }
        },
        beforeCreate(){
            axios.get('user/articles/get').then(response => {
                this.articles = response.data;
                this.loading = false;
            }).catch(error => console.log(error));
        }

    }
</script>

<style scoped>

</style>