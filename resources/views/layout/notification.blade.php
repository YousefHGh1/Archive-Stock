<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::إشعارات غير مقروءة-->
                <div class="p-5">
                    {{-- @if (count(Auth::user()->unreadNotifications) > 0)
                        <div class="alert alert-info">
                            لديك {{ count(Auth::user()->unreadNotifications) }} مراسلة غير مقروءة
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div>
                    @endif --}}
                </div>
                <!--end::إشعارات غير مقروءة-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Search-->
            <div class="dropdown" id="kt_quick_search_toggle">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="mr-1 btn btn-icon btn-clean btn-lg btn-dropdown">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="p-0 m-0 dropdown-menu dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                        <!--begin:Form-->
                        <form method="get" class="quick-search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search..." />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                        <!--begin::Scroll-->
                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325"
                            data-mobile-height="200"></div>
                        <!--end::Scroll-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Search-->

            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="mr-1 btn btn-icon btn-clean btn-dropdown btn-lg pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="p-0 m-0 dropdown-menu dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="pt-12 d-flex flex-column bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">الاشعارات </span>
                                <span
                                    class="ml-2 btn btn-text btn-success btn-sm font-weight-bold btn-font-md">{{ Auth::User()->unreadNotifications->count() }}
                                    new</span>
                            </h4>
                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <ul class="px-5 mt-3 nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab"
                                        href="#topbar_notifications_archive">الأرشيف</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#topbar_notifications_computer">الحاسوب</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#topbar_notifications_jibaya">الجباية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#topbar_notifications_censorship">الرقابة</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#topbar_notifications_legal">الشؤون</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::الأرشيف-->
                            <div class="p-8 tab-pane active show" id="topbar_notifications_archive" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="pr-5 scroll mr-n7" data-scroll="true" data-height="300"
                                    data-mobile-height="200">
                                    <!--begin::Item-->
                                    @foreach (Auth::User()->unreadNotifications as $notification)
                                        <div class="mb-6 d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-5 symbol symbol-40 symbol-light-primary">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                    fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3"
                                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                    x="16.3255682" y="2.94551858" width="3"
                                                                    height="18" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <?php if (isset($notification->data['archiveNot_id'])) { ?>
                                                <a href="{{ route('archiveNot.show', $notification->data['archiveNot_id']) }}"
                                                    class="mb-1 text-dark text-hover-primary font-size-lg">
                                                    <?php } ?>

                                                    <?php
                                                    if (isset($notification->data['archiveNot_create'])) {
                                                        echo $archiveNot_create = $notification->data['archiveNot_create'];
                                                    } else {
                                                        $archiveNot_create = '';
                                                    }
                                                    ?></a>
                                                <?php if (isset($notification->data['archiveNot_id'])) { ?>
                                                <a href="{{ route('archiveNot.show', $notification->data['archiveNot_id']) }}"
                                                    class="text-muted">
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($notification->data['archiveNot_file'])) {
                                                        echo $archiveNot_file = $notification->data['archiveNot_file'];
                                                    } else {
                                                        $archiveNot_file = '';
                                                    }
                                                    ?></a>


                                                <a href="" class="text-muted"><?php
                                                if (isset($notification->data['archiveNot_description'])) {
                                                    echo $archiveNot_description = $notification->data['archiveNot_description'];
                                                } else {
                                                    $archiveNot_description = '';
                                                }
                                                ?></a>

                                            </div>
                                            <!--end::Text-->
                                        </div>
                                    @endforeach
                                    <!--end::Item-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Action-->
                                <div class="d-flex flex-center pt-7">
                                    <a href="#" class="text-center btn btn-light-primary font-weight-bold">See
                                        All</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::الأرشيف-->
                            <!--begin::الحاسوب-->
                            <div class="tab-pane" id="topbar_notifications_computer" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="pr-5 scroll mr-n7" data-scroll="true" data-height="300"
                                    data-mobile-height="200">
                                    <!--begin::Item-->
                                    @foreach (Auth::User()->unreadNotifications as $notification)
                                        <div class="mb-6 d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-5 symbol symbol-40 symbol-light-primary">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                    fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3"
                                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                    x="16.3255682" y="2.94551858" width="3"
                                                                    height="18" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <?php if (isset($notification->data['computerNot_id'])) { ?>
                                                <a href="{{ route('computerNot.show', $notification->data['computerNot_id']) }}"
                                                    class="mb-1 text-dark text-hover-primary font-size-lg">
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($notification->data['computerNot_create'])) {
                                                        echo $computerNot_create = $notification->data['computerNot_create'];
                                                    } else {
                                                        $computerNot_create = '';
                                                    }
                                                    ?></a>

                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['computerNot_file'])) {
                                                    echo $computerNot_file = $notification->data['computerNot_file'];
                                                } else {
                                                    $computerNot_file = '';
                                                }
                                                ?></a>

                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['computerNot_description'])) {
                                                    echo $computerNot_description = $notification->data['computerNot_description'];
                                                } else {
                                                    $computerNot_description = '';
                                                }
                                                ?></a>

                                            </div>
                                            <!--end::Text-->
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Action-->
                                <div class="d-flex flex-center pt-7">
                                    <a href="#" class="text-center btn btn-light-primary font-weight-bold">See
                                        All</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::الحاسوب-->
                            <!--begin::الجباية-->
                            <div class="tab-pane" id="topbar_notifications_jibaya" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="pr-5 scroll mr-n7" data-scroll="true" data-height="300"
                                    data-mobile-height="200">
                                    <!--begin::Item-->
                                    @foreach (Auth::User()->unreadNotifications as $notification)
                                        <div class="mb-6 d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-5 symbol symbol-40 symbol-light-primary">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                    fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3"
                                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                    x="16.3255682" y="2.94551858" width="3"
                                                                    height="18" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <?php if (isset($notification->data['jibayaNot_id'])) { ?>
                                                <a href="{{ route('jibayaNot.show', $notification->data['jibayaNot_id']) }}"
                                                    class="mb-1 text-dark text-hover-primary font-size-lg">
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($notification->data['jibayaNot_create'])) {
                                                        echo $jibayaNot_create = $notification->data['jibayaNot_create'];
                                                    } else {
                                                        $jibayaNot_create = '';
                                                    }
                                                    ?></a>
                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['jibayaNot_file'])) {
                                                    echo $jibayaNot_file = $notification->data['jibayaNot_file'];
                                                } else {
                                                    $jibayaNot_file = '';
                                                }
                                                ?>
                                                    <a href="#" class="text-muted"><?php
                                                    if (isset($notification->data['jibayaNot_description'])) {
                                                        echo $jibayaNot_description = $notification->data['jibayaNot_description'];
                                                    } else {
                                                        $jibayaNot_description = '';
                                                    }
                                                    ?></a>

                                            </div>
                                            <!--end::Text-->
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Action-->
                                <div class="d-flex flex-center pt-7">
                                    <a href="#" class="text-center btn btn-light-primary font-weight-bold">See
                                        All</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::الجباية-->
                            <!--begin::الرقابة-->
                            <div class="tab-pane" id="topbar_notifications_censorship" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="pr-5 scroll mr-n7" data-scroll="true" data-height="300"
                                    data-mobile-height="200">
                                    <!--begin::Item-->
                                    @foreach (Auth::User()->unreadNotifications as $notification)
                                        <div class="mb-6 d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-5 symbol symbol-40 symbol-light-primary">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                    fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3"
                                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                    x="16.3255682" y="2.94551858" width="3"
                                                                    height="18" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <?php if (isset($notification->data['censorshipNot_id'])) { ?>
                                                <a href="{{ route('censorshipNot.show', $notification->data['censorshipNot_id']) }}"
                                                    class="mb-1 text-dark text-hover-primary font-size-lg">
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($notification->data['censorshipNot_create'])) {
                                                        echo $censorshipNot_create = $notification->data['censorshipNot_create'];
                                                    } else {
                                                        $censorshipNot_create = '';
                                                    }
                                                    ?></a>
                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['censorshipNot_file'])) {
                                                    echo $censorshipNot_file = $notification->data['censorshipNot_file'];
                                                } else {
                                                    $censorshipNot_file = '';
                                                }
                                                ?></a>
                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['censorshipNot_description'])) {
                                                    echo $censorshipNot_description = $notification->data['censorshipNot_description'];
                                                } else {
                                                    $censorshipNot_description = '';
                                                }
                                                ?></a>

                                            </div>
                                            <!--end::Text-->
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Action-->
                                <div class="d-flex flex-center pt-7">
                                    <a href="#" class="text-center btn btn-light-primary font-weight-bold">See
                                        All</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::الرقابة-->
                            <!--begin::الشؤون-->
                            <div class="tab-pane" id="topbar_notifications_legal" role="tabpanel">
                                <!--begin::Scroll-->
                                <div class="pr-5 scroll mr-n7" data-scroll="true" data-height="300"
                                    data-mobile-height="200">
                                    <!--begin::Item-->
                                    @foreach (Auth::User()->unreadNotifications as $notification)
                                        <div class="mb-6 d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-5 symbol symbol-40 symbol-light-primary">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                    fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3"
                                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                    x="16.3255682" y="2.94551858" width="3"
                                                                    height="18" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <?php if (isset($notification->data['legalNot_id'])) { ?>
                                                <a href="{{ route('legalNot.show', $notification->data['legalNot_id']) }}"
                                                    class="mb-1 text-dark text-hover-primary font-size-lg">
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($notification->data['legalNot_create'])) {
                                                        echo $legalNot_create = $notification->data['legalNot_create'];
                                                    } else {
                                                        $legalNot_create = '';
                                                    }
                                                    ?></a>
                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['legalNot_file'])) {
                                                    echo $legalNot_file = $notification->data['legalNot_file'];
                                                } else {
                                                    $legalNot_file = '';
                                                }
                                                ?></a>
                                                <a href="#" class="text-muted"><?php
                                                if (isset($notification->data['legalNot_description'])) {
                                                    echo $legalNot_description = $notification->data['legalNot_description'];
                                                } else {
                                                    $legalNot_description = '';
                                                }
                                                ?></a>

                                            </div>
                                            <!--end::Text-->
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Action-->
                                <div class="d-flex flex-center pt-7">
                                    <a href="#" class="text-center btn btn-light-primary font-weight-bold">See
                                        All</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::الشؤون-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->

            <!--begin::User-->
            <div class="topbar-item">
                <div class="w-auto px-2 btn btn-icon btn-icon-mobile btn-clean d-flex align-items-center btn-lg"
                    id="kt_quick_user_toggle">
                    <span class="mr-1 text-muted font-weight-bold font-size-base d-none d-md-inline">مرحبا,</span>
                    <span
                        class="mr-3 text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">{{ Auth::user()->employee_name }}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">Eng</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>

{{-- ********************************صفحة المستخدم********************************** --}}
<div id="kt_quick_user" class="p-10 offcanvas offcanvas-right">
    <!--begin::Header-->
    <div class="pb-5 offcanvas-header d-flex align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold"> صفحة المستخدم
            <small class="ml-2 text-muted font-size-sm">{{ Auth::User()->unreadNotifications->count() }}
                اشعارات</small>
        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="pr-5 offcanvas-content mr-n5">
        <!--begin::Header-->
        <div class="mt-5 d-flex align-items-center">
            <div class="mr-5 symbol symbol-100">
                <div class="symbol-label" style="background-image:url({{ asset('assets/media/users/300_21.jpg') }})">
                </div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#"
                    class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->employee_name }}</a>
                <div class="mt-1 text-muted"> {{ Auth::User()->subSection->name }}</div>
                <div class="mt-2 navi">
                    <a href="#" class="navi-item">
                        <span class="p-0 pb-2 navi-link">
                            <span class="mr-1 navi-icon">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                fill="#000000" />
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                r="2.5" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                    <br>
                    {{-- <a href="{{ route('logout') }}"
                        class="px-5 py-2 btn btn-sm btn-light-primary font-weight-bolder">{{ __('تسجيل الخروج') }}
                    </a> --}}

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            style="font-weight:bold; text-decoration: none; color:black;"
                            class="px-5 py-2 btn btn-sm btn-light-primary font-weight-bolder">
                            {{ __('تسجيل الخروج') }}

                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="mt-8 mb-5 separator separator-dashed"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="p-0 navi navi-spacer-x-0">
            <!--begin::Item-->
            <a href="{{ url('/profile') }}" class="navi-item">
                <div class="navi-link">
                    <div class="mr-3 symbol symbol-40 bg-light">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-warning">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="12" y="4"
                                            width="3" height="13" rx="1.5" />
                                        <rect fill="#000000" opacity="0.3" x="7" y="9"
                                            width="3" height="8" rx="1.5" />
                                        <path
                                            d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <rect fill="#000000" opacity="0.3" x="17" y="11"
                                            width="3" height="6" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold"> الحساب الشخصي</div>
                        <div class="text-muted">لتعديل البيانات الشخصية </div>
                    </div>
                </div>
            </a>
            <!--end:Item-->
        </div>
        <!--end::Nav-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->
        <!--begin::Notifications-->
        <!--end::Notifications-->
    </div>
    <!--end::Content-->
</div>
{{-- ****************************************************************** --}}
