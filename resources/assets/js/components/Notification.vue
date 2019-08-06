<template>
    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click"
        m-dropdown-persistent="1">
        <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger iranyekan">{{unreadnotifications.length}}</span>
            <span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
        </a>
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__header m--align-center" v-bind:style="{backgroundImage : 'url('+backgroundimg+')' }">
                    <span class="m-dropdown__header-title iranyekan">{{notifications.length}}</span>
                    <span class="m-dropdown__header-subtitle">اعلان جدید</span>
                </div>
                <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                    تمامی اعلان ها
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_unread_notifications" role="tab">
                                    اعلان های خوانده نشده
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
       <div v-for="notification in sortedArray" :class='readnotification(notification.read_at)' @click="readnotify(notification.id)">
                                            <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                            <span class="m-list-timeline__text">{{notification.data.message.title}}</span>
                        <span class="m-list-timeline__time">{{notification.created}}</span>
                                        </div>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="topbar_unread_notifications" role="tabpanel">
                                <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                            <div v-for="notify in unreadnotifications" :class='readnotification(notify.read_at)' @click="readnotify(notify.id)">
                                                <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                <span class="m-list-timeline__text">{{notify.data.message.title}}</span>
                                                <span class="m-list-timeline__time">{{notify.created}}</span>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </li>

</template>
<script>
    export default {
        props:['notifications','backgroundimg','unreadnotifications'],
        methods:{
            readnotify:function(id){
                axios.post('/user/notification/read',{id:id}).then(response => {
                    Swal.fire({
                       // type: 'error',
                        title: JSON.parse(response.data.data).message.title,
                        html: JSON.parse(response.data.data).message.text,
                        confirmButtonText:
                            ' خواندم! <i class="fa fa-thumbs-up"></i>',
/*
                        footer: '<a href>Why do I have this issue?</a>'
*/
                    });
                }).catch(error => console.log(error));
            },
            readnotification:function(read){
                if(read != null){
                    return 'm-list-timeline__item m-list-timeline__item--read'
                }else{
                    return 'm-list-timeline__item'
                }
            },

    },
        computed:{
            /*  sortedArray: function() {
                return this.notifications.sort(this.compare);
            }*/
          sortedArray: function(){
              return _.orderBy(this.notifications, 'read_at', 'desc');
          }
        }
    }

</script>
