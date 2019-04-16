<template>
    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click"
        m-dropdown-persistent="1">
        <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger iranyekan">{{notifications.length}}</span>
            <span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
        </a>
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__header m--align-center" style="background: url(../img/misc/notification_bg.jpg); background-size: cover;">
                    <span class="m-dropdown__header-title iranyekan">{{notifications.length}}</span>
                    <span class="m-dropdown__header-subtitle">اعلان جدید</span>
                </div>
                <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                    آخرین اعلان ها
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
       <div class="m-list-timeline__item" v-for="notification in notifications">
                                            <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                            <span class="m-list-timeline__text">{{notification.data.message.title}}</span>
                        <span class="m-list-timeline__time">{{notification.created_at}}</span>
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
        props:['notifications']
    }
</script>
