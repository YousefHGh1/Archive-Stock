<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="{{ url('dashboard') }}" class="brand-logo">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}" width="200px" />
        </a>

        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="px-0 brand-toggle btn btn-sm" id="kt_aside_toggle">
            <span class="svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="my-4 aside-menu" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">

            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{ url('dashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">لوحة التحكم</span>
                    </a>
                </li>
                {{-- ************************************************المخازن********************************************* --}}
                @can('stock')
                    <li class="menu-section">
                        <h4 class="menu-text">المخازن</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>
                    {{-- القوائم الفرعية --}}
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">المخازن</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">المخازن</span>
                                    </span>
                                </li>
                                <ul class="menu-subnav">
                                    {{-- ***********************************************المحروقات*********************************************** --}}
                                    @can('diesels')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                                                href="javascript:;" class="menu-link menu-toggle"><span
                                                    class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Bucket.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24"></rect>
                                                            <path
                                                                d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) ">
                                                            </path>
                                                            <path
                                                                d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                                fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span><span class="menu-text">
                                                    المحروقات</span><i class="menu-arrow"></i></a>
                                            <div class="menu-submenu " kt-hidden-height="80" style=""><i
                                                    class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true"><span
                                                            class="menu-link"><span class="menu-text">
                                                                المحروقات</span></span>
                                                    </li>
                                                    <li class="menu-item " aria-haspopup="true"><a
                                                            href="{{ route('TypesFuel.index') }}" class="menu-link "><i
                                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">أنواع المحروقات</span></a>
                                                    </li>

                                                    <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                        data-menu-toggle="hover">
                                                        <a href="javascript:;" class="menu-link menu-toggle">
                                                            <span class="svg-icon menu-icon">
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-fuel-pump-diesel" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.5 2a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5ZM4 14V9h1.796c.5 0 .913.098 1.237.293.325.195.567.479.725.85.161.371.242.82.242 1.344 0 .528-.08.98-.242 1.355a1.805 1.805 0 0 1-.732.861c-.324.198-.734.297-1.23.297H4Zm1.666-4.194h-.692v3.385h.692c.229 0 .427-.035.595-.103a.986.986 0 0 0 .412-.315c.108-.142.188-.318.241-.528.056-.21.083-.456.083-.74 0-.376-.048-.69-.144-.94a1.11 1.11 0 0 0-.436-.569c-.195-.127-.445-.19-.75-.19Z" />
                                                                    <path
                                                                        d="M3 0a2 2 0 0 0-2 2v13H.5a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1H11v-4a1 1 0 0 1 1 1v.5a1.5 1.5 0 0 0 3 0V8h.5a.5.5 0 0 0 .5-.5V4.324c0-.616 0-1.426-.294-2.081a1.969 1.969 0 0 0-.794-.907C14.534 1.111 14.064 1 13.5 1a.5.5 0 0 0 0 1c.436 0 .716.086.9.195a.97.97 0 0 1 .394.458c.147.328.19.746.201 1.222H13.5a.5.5 0 0 0-.5.5V7.5a.5.5 0 0 0 .5.5h.5v4.5a.5.5 0 0 1-1 0V12a2 2 0 0 0-2-2V2a2 2 0 0 0-2-2H3Zm7 2v13H2V2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1Z" />
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">المحروقات</span>
                                                            <i class="menu-arrow"></i>
                                                        </a>
                                                        <div class="menu-submenu">
                                                            <i class="menu-arrow"></i>
                                                            <ul class="menu-subnav">
                                                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                                    <span class="menu-link">
                                                                        <span class="menu-text">المحروقات</span>
                                                                    </span>
                                                                </li>

                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-submenu"
                                                                        aria-haspopup="true" data-menu-toggle="hover">
                                                                        <a href="javascript:;" class="menu-link menu-toggle">
                                                                            <span class="svg-icon menu-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                    width="24px" height="24px"
                                                                                    viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                        fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0"
                                                                                            width="24" height="24">
                                                                                        </rect>
                                                                                        <rect fill="#000000" opacity="0.3"
                                                                                            transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                                                            x="11" y="1"
                                                                                            width="2" height="12"
                                                                                            rx="1"></rect>
                                                                                        <path
                                                                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                            fill="#000000" fill-rule="nonzero"
                                                                                            opacity="0.3"></path>
                                                                                        <path
                                                                                            d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero"></path>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <span class="menu-text"> الوارد</span>
                                                                            <i class="menu-arrow"></i>
                                                                        </a>
                                                                        <div class="menu-submenu">
                                                                            <i class="menu-arrow"></i>
                                                                            <ul class="menu-subnav">
                                                                                <li class="menu-item menu-item-parent"
                                                                                    aria-haspopup="true">
                                                                                    <span class="menu-link">
                                                                                        <span class="menu-text"> الوارد</span>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ route('diesel.create') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="menu-bullet flaticon-add-circular-button"></i>
                                                                                        </span>

                                                                                        <span class="menu-text">إضافة وارد
                                                                                            المحروقات</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ route('diesel.index') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="menu-bullet flaticon-eye"></i>
                                                                                        </span>
                                                                                        <span class="menu-text">عرض وارد
                                                                                            المحروقات</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ route('diesel.report') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="menu-bullet flaticon-graphic"></i>
                                                                                        </span>
                                                                                        <span class="menu-text">تقارير
                                                                                            الوارد</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="menu-item menu-item-submenu"
                                                                        aria-haspopup="true" data-menu-toggle="hover">
                                                                        <a href="javascript:;" class="menu-link menu-toggle">
                                                                            <span class="svg-icon menu-icon">
                                                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                    width="24px" height="24px"
                                                                                    viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                        fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0"
                                                                                            width="24" height="24" />
                                                                                        <path
                                                                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                            fill="#000000" fill-rule="nonzero"
                                                                                            opacity="0.3" />
                                                                                        <rect fill="#000000" opacity="0.3"
                                                                                            transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                            x="11" y="2"
                                                                                            width="2" height="12"
                                                                                            rx="1" />
                                                                                        <path
                                                                                            d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                            fill="#000000" fill-rule="nonzero"
                                                                                            transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <span class="menu-text"> الصادر</span>
                                                                            <i class="menu-arrow"></i>
                                                                        </a>
                                                                        <div class="menu-submenu">
                                                                            <i class="menu-arrow"></i>
                                                                            <ul class="menu-subnav">
                                                                                <li class="menu-item menu-item-parent"
                                                                                    aria-haspopup="true">
                                                                                    <span class="menu-link">
                                                                                        <span class="menu-text"> الصادر</span>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ route('dieselexport.create') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="flaticon-add-circular-button"></i>
                                                                                            <!--end::Svg Icon-->
                                                                                        </span>
                                                                                        <span class="menu-text">إضافة صادر
                                                                                            المحروقات</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ route('dieselexport.index') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i class="flaticon-eye"></i>
                                                                                            <!--end::Svg Icon-->
                                                                                        </span>
                                                                                        <span class="menu-text">عرض صادر
                                                                                            المحروقات</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ route('dieselexport.report') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="menu-bullet flaticon-graphic"></i>
                                                                                        </span>
                                                                                        <span class="menu-text">تقارير
                                                                                            الصادر</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="menu-item menu-item-submenu"
                                                                        aria-haspopup="true" data-menu-toggle="hover">
                                                                        <a href="javascript:;" class="menu-link menu-toggle">
                                                                            <span class="svg-icon menu-icon">
                                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                    width="24px" height="24px"
                                                                                    viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                        fill="none" fill-rule="evenodd">
                                                                                        <polygon
                                                                                            points="0 0 24 0 24 24 0 24" />
                                                                                        <path
                                                                                            d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                                                            fill="#000000" fill-rule="nonzero"
                                                                                            opacity="0.3" />
                                                                                        <path
                                                                                            d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                                                            fill="#000000"
                                                                                            fill-rule="nonzero" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">الملف التاريخي</span>
                                                                            <i class="menu-arrow"></i>
                                                                        </a>
                                                                        <div class="menu-submenu">
                                                                            <i class="menu-arrow"></i>
                                                                            <ul class="menu-subnav">
                                                                                <li class="menu-item menu-item-parent"
                                                                                    aria-haspopup="true">
                                                                                    <span class="menu-link">
                                                                                        <span class="menu-text">الملف
                                                                                            التاريخي</span>
                                                                                    </span>
                                                                                </li>
                                                                                <ul class="menu-subnav">
                                                                                    <li class="menu-item menu-item-submenu"
                                                                                        aria-haspopup="true"
                                                                                        data-menu-toggle="hover">
                                                                                        <a href="javascript:;"
                                                                                            class="menu-link menu-toggle">
                                                                                            <span class="svg-icon menu-icon">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    width="24px"
                                                                                                    height="24px"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    version="1.1">
                                                                                                    <g stroke="none"
                                                                                                        stroke-width="1"
                                                                                                        fill="none"
                                                                                                        fill-rule="evenodd">
                                                                                                        <rect x="0"
                                                                                                            y="0"
                                                                                                            width="24"
                                                                                                            height="24" />
                                                                                                        <rect fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                                                                            x="11"
                                                                                                            y="1"
                                                                                                            width="2"
                                                                                                            height="12"
                                                                                                            rx="1" />
                                                                                                        <path
                                                                                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            opacity="0.3" />
                                                                                                        <path
                                                                                                            d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero" />
                                                                                                    </g>
                                                                                                </svg>
                                                                                                <!--end::Svg Icon-->
                                                                                            </span>
                                                                                            <!--end::Svg Icon-->
                                                                                            <span class="menu-text">
                                                                                                الوارد</span>
                                                                                            <i class="menu-arrow"></i>
                                                                                        </a>
                                                                                        <div class="menu-submenu">
                                                                                            <i class="menu-arrow"></i>
                                                                                            <ul class="menu-subnav">
                                                                                                <li class="menu-item menu-item-parent"
                                                                                                    aria-haspopup="true">
                                                                                                    <span class="menu-link">
                                                                                                        <span
                                                                                                            class="menu-text">
                                                                                                            الوارد</span>
                                                                                                    </span>
                                                                                                </li>
                                                                                                <li class="menu-item"
                                                                                                    aria-haspopup="true">
                                                                                                    <a href="{{ route('historical.waredindex') }}"
                                                                                                        class="menu-link">
                                                                                                        <i
                                                                                                            class="menu-bullet menu-bullet-dot">
                                                                                                            <span></span>
                                                                                                        </i>
                                                                                                        <span
                                                                                                            class="menu-text">عرض
                                                                                                            الملف
                                                                                                            التاريخي
                                                                                                            للوارد</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="menu-item menu-item-submenu"
                                                                                        aria-haspopup="true"
                                                                                        data-menu-toggle="hover">
                                                                                        <a href="javascript:;"
                                                                                            class="menu-link menu-toggle">
                                                                                            <span class="svg-icon menu-icon">
                                                                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    width="24px"
                                                                                                    height="24px"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    version="1.1">
                                                                                                    <g stroke="none"
                                                                                                        stroke-width="1"
                                                                                                        fill="none"
                                                                                                        fill-rule="evenodd">
                                                                                                        <rect x="0"
                                                                                                            y="0"
                                                                                                            width="24"
                                                                                                            height="24" />
                                                                                                        <path
                                                                                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            opacity="0.3" />
                                                                                                        <rect fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                                            x="11"
                                                                                                            y="2"
                                                                                                            width="2"
                                                                                                            height="12"
                                                                                                            rx="1" />
                                                                                                        <path
                                                                                                            d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                                                    </g>
                                                                                                </svg>
                                                                                                <!--end::Svg Icon-->
                                                                                            </span>
                                                                                            <span class="menu-text">
                                                                                                الصادر</span>
                                                                                            <i class="menu-arrow"></i>
                                                                                        </a>
                                                                                        <div class="menu-submenu">
                                                                                            <i class="menu-arrow"></i>
                                                                                            <ul class="menu-subnav">
                                                                                                <li class="menu-item menu-item-parent"
                                                                                                    aria-haspopup="true">
                                                                                                    <span class="menu-link">
                                                                                                        <span
                                                                                                            class="menu-text">
                                                                                                            الصادر</span>
                                                                                                    </span>
                                                                                                </li>
                                                                                                <li class="menu-item"
                                                                                                    aria-haspopup="true">
                                                                                                    <a href="{{ route('historical.exportindex') }}"
                                                                                                        class="menu-link">
                                                                                                        <i
                                                                                                            class="menu-bullet menu-bullet-dot">
                                                                                                            <span></span>
                                                                                                        </i>
                                                                                                        <span
                                                                                                            class="menu-text">عرض
                                                                                                            الملف
                                                                                                            التاريخي
                                                                                                            للصادر</span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('units')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-unity" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15 11.2V3.733L8.61 0v2.867l2.503 1.466c.099.067.099.2 0 .234L8.148 6.3c-.099.067-.197.033-.263 0L4.92 4.567c-.099-.034-.099-.2 0-.234l2.504-1.466V0L1 3.733V11.2v-.033.033l2.438-1.433V6.833c0-.1.131-.166.197-.133L6.6 8.433c.099.067.132.134.132.234v3.466c0 .1-.132.167-.198.134L4.031 10.8l-2.438 1.433L7.983 16l6.391-3.733-2.438-1.434L9.434 12.3c-.099.067-.198 0-.198-.133V8.7c0-.1.066-.2.132-.233l2.965-1.734c.099-.066.197 0 .197.134V9.8L15 11.2Z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> الوحدات</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> الوحدات</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('unit.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة وحدة </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('unit.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض الوحدات </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('categories')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> العائلات</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> العائلات</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('category.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة عائلة </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('category.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض العائلات </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('items')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> الأصناف</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> الأصناف</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('item.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة صنف </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('item.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض الأصناف </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('suppliers')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> الموردين</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> الموردين</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('supplier_item.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة مورد </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('supplier_item.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض الموردين </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('sections')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                                                        <path
                                                            d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z" />
                                                        <path
                                                            d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text">الأقسام</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text">الأقسام</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('section.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة قسم رئيسي </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('section.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض الأقسام الرئيسية </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('subSection.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة قسم فرعي </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('subSection.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض الأقسام الفرعية </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('invoices')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M21.4451171,17.7910156 C21.4451171,16.9707031 21.6208984,13.7333984 19.0671874,11.1650391 C17.3484374,9.43652344 14.7761718,9.13671875 11.6999999,9 L11.6999999,4.69307548 C11.6999999,4.27886191 11.3642135,3.94307548 10.9499999,3.94307548 C10.7636897,3.94307548 10.584049,4.01242035 10.4460626,4.13760526 L3.30599678,10.6152626 C2.99921905,10.8935795 2.976147,11.3678924 3.2544639,11.6746702 C3.26907199,11.6907721 3.28437331,11.7062312 3.30032452,11.7210037 L10.4403903,18.333467 C10.7442966,18.6149166 11.2188212,18.596712 11.5002708,18.2928057 C11.628669,18.1541628 11.6999999,17.9721616 11.6999999,17.7831961 L11.6999999,13.5 C13.6531249,13.5537109 15.0443703,13.6779456 16.3083984,14.0800781 C18.1284272,14.6590944 19.5349747,16.3018455 20.5280411,19.0083314 L20.5280247,19.0083374 C20.6363903,19.3036749 20.9175496,19.5 21.2321404,19.5 L21.4499999,19.5 C21.4499999,19.0068359 21.4451171,18.2255859 21.4451171,17.7910156 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text">سند ادخال</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> سند ادخال</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('invoice.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة سند ادخال </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('invoice.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض سند ادخال </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('invoice_exports')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Text/Redo.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M21.4451171,17.7910156 C21.4451171,16.9707031 21.6208984,13.7333984 19.0671874,11.1650391 C17.3484374,9.43652344 14.7761718,9.13671875 11.6999999,9 L11.6999999,4.69307548 C11.6999999,4.27886191 11.3642135,3.94307548 10.9499999,3.94307548 C10.7636897,3.94307548 10.584049,4.01242035 10.4460626,4.13760526 L3.30599678,10.6152626 C2.99921905,10.8935795 2.976147,11.3678924 3.2544639,11.6746702 C3.26907199,11.6907721 3.28437331,11.7062312 3.30032452,11.7210037 L10.4403903,18.333467 C10.7442966,18.6149166 11.2188212,18.596712 11.5002708,18.2928057 C11.628669,18.1541628 11.6999999,17.9721616 11.6999999,17.7831961 L11.6999999,13.5 C13.6531249,13.5537109 15.0443703,13.6779456 16.3083984,14.0800781 C18.1284272,14.6590944 19.5349747,16.3018455 20.5280411,19.0083314 L20.5280247,19.0083374 C20.6363903,19.3036749 20.9175496,19.5 21.2321404,19.5 L21.4499999,19.5 C21.4499999,19.0068359 21.4451171,18.2255859 21.4451171,17.7910156 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.254964, 11.721538) scale(-1, 1) translate(-12.254964, -11.721538) " />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> سند صرف</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> سند صرف</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('invoice_export.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة سند صرف </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('invoice_export.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض سند صرف </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('custody')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-database-check" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z" />
                                                        <path
                                                            d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> العهد</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> العهد</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('custody.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة العهد </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('custody.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض العهد </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('report')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-medical"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> التقارير</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> التقارير</span>
                                                        </span>
                                                    </li>

                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('inventory.totalreport') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">تقارير المجاميع </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('transactions_report') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">تقارير حركة الأصناف </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('currency')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-medical"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> معامل الصرف</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> معامل الصرف</span>
                                                        </span>
                                                    </li>

                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('currency.create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">إضافة معامل الصرف </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ route('currency.index') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض معامل الصرف </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('employee')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                        <path
                                                            d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="menu-text"> المستخدمين</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> المستخدمين</span>
                                                        </span>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ url('/employee/create') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-add-circular-button"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>

                                                            <span class="menu-text">إضافة المستخدمين </span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{ url('/employee') }}" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <i class="flaticon-eye"></i>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">عرض المستخدمين </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                </ul>
                            </ul>
                        </div>
                    </li>
                @endcan
                {{-- ************************************************الأرشيف******************************************************** --}}
                @can('archivecore')
                    <li class="menu-section">
                        <h4 class="menu-text">الأرشيف المركزي</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>
                    {{-- ************************************************الأرشيف******************************************************** --}}
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">الأرشيف المركزي</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">الأرشيف المركزي</span>
                                    </span>
                                </li>
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">المخازن</span>
                                        </span>
                                    </li>
                                    @can('archive')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-arrow-down"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z" />
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text">الأرشيف المركزي</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text">الأرشيف المركزي</span>
                                                        </span>
                                                    </li>
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                                                x="11" y="1" width="2"
                                                                                height="12" rx="1" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <path
                                                                                d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                                                fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <span class="menu-text">الأرشيف الوارد</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الأرشيف الوارد</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/archive/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة وارد الأرشيف</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/archive') }}" class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض وارد الأرشيف</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">الأرشيف الصادر</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الأرشيف الصادر</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/archiveExport/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة صادر الأرشيف</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/archiveExport') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض صادر الأرشيف</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-send" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">المراسلات الداخلية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الأرشيف المرسل</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/archiveNot/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">ارسال الأرشيف</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/archiveNot') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض المرسلات</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-three-dots" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">أخرى</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-submenu"
                                                                        aria-haspopup="true" data-menu-toggle="hover">
                                                                        <a href="javascript:;"
                                                                            class="menu-link menu-toggle">
                                                                            <span class="svg-icon menu-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-arrow-bar-down"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z" />
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">الجهات الوارد منها</span>
                                                                            <i class="menu-arrow"></i>
                                                                        </a>
                                                                        <div class="menu-submenu">
                                                                            <i class="menu-arrow"></i>
                                                                            <ul class="menu-subnav">
                                                                                <li class="menu-item menu-item-parent"
                                                                                    aria-haspopup="true">
                                                                                    <span class="menu-link">
                                                                                        <span class="menu-text">الجهات الوارد
                                                                                            منها</span>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ url('import/create') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="flaticon-add-circular-button"></i>
                                                                                            <!--end::Svg Icon-->
                                                                                        </span>
                                                                                        <span class="menu-text">اضافة الجهات
                                                                                            الوارد
                                                                                            منها</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ url('import') }}"
                                                                                        class="menu-link">
                                                                                        <i
                                                                                            class="menu-bullet menu-bullet-dot">
                                                                                            <span></span>
                                                                                        </i>
                                                                                        <span class="menu-text">عرض الجهات
                                                                                            الوارد
                                                                                            منها</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="menu-item menu-item-submenu"
                                                                        aria-haspopup="true" data-menu-toggle="hover">
                                                                        <a href="javascript:;"
                                                                            class="menu-link menu-toggle">
                                                                            <span class="svg-icon menu-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-arrow-bar-up"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">الجهات الصادر اليها</span>
                                                                            <i class="menu-arrow"></i>
                                                                        </a>
                                                                        <div class="menu-submenu">
                                                                            <i class="menu-arrow"></i>
                                                                            <ul class="menu-subnav">
                                                                                <li class="menu-item menu-item-parent"
                                                                                    aria-haspopup="true">
                                                                                    <span class="menu-link">
                                                                                        <span class="menu-text">الجهات الصادر
                                                                                            اليها</span>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ url('export/create') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="flaticon-add-circular-button"></i>
                                                                                            <!--end::Svg Icon-->
                                                                                        </span>
                                                                                        <span class="menu-text">اضافة الجهات
                                                                                            الصادر
                                                                                            اليها</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ url('export') }}"
                                                                                        class="menu-link">
                                                                                        <i
                                                                                            class="menu-bullet menu-bullet-dot">
                                                                                            <span></span>
                                                                                        </i>
                                                                                        <span class="menu-text">عرض الجهات
                                                                                            الصادر
                                                                                            اليها</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li class="menu-item menu-item-submenu"
                                                                        aria-haspopup="true" data-menu-toggle="hover">
                                                                        <a href="javascript:;"
                                                                            class="menu-link menu-toggle">
                                                                            <span class="svg-icon menu-icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor" class="bi bi-bricks"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M0 .5A.5.5 0 0 1 .5 0h15a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H14v2h1.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H14v2h1.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5H2v-2H.5a.5.5 0 0 1-.5-.5v-3A.5.5 0 0 1 .5 6H2V4H.5a.5.5 0 0 1-.5-.5v-3zM3 4v2h4.5V4H3zm5.5 0v2H13V4H8.5zM3 10v2h4.5v-2H3zm5.5 0v2H13v-2H8.5zM1 1v2h3.5V1H1zm4.5 0v2h5V1h-5zm6 0v2H15V1h-3.5zM1 7v2h3.5V7H1zm4.5 0v2h5V7h-5zm6 0v2H15V7h-3.5zM1 13v2h3.5v-2H1zm4.5 0v2h5v-2h-5zm6 0v2H15v-2h-3.5z" />
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">أنواع المراسلات</span>
                                                                            <i class="menu-arrow"></i>
                                                                        </a>
                                                                        <div class="menu-submenu">
                                                                            <i class="menu-arrow"></i>
                                                                            <ul class="menu-subnav">
                                                                                <li class="menu-item menu-item-parent"
                                                                                    aria-haspopup="true">
                                                                                    <span class="menu-link">
                                                                                        <span class="menu-text">أنواع
                                                                                            المراسلات</span>
                                                                                    </span>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ url('type/create') }}"
                                                                                        class="menu-link">
                                                                                        <span class="svg-icon menu-icon">
                                                                                            <i
                                                                                                class="flaticon-add-circular-button"></i>
                                                                                            <!--end::Svg Icon-->
                                                                                        </span>
                                                                                        <span class="menu-text">اضافة نوع
                                                                                            للمراسلات</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="menu-item" aria-haspopup="true">
                                                                                    <a href="{{ url('type') }}"
                                                                                        class="menu-link">
                                                                                        <i
                                                                                            class="menu-bullet menu-bullet-dot">
                                                                                            <span></span>
                                                                                        </i>
                                                                                        <span class="menu-text">عرض أنواع
                                                                                            المراسلات</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('legal')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text">الشؤون القانونية</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text">الشؤون القانونية</span>
                                                        </span>
                                                    </li>
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                                                x="11" y="1"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <path
                                                                                d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                                                fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <span class="menu-text"> وارد الشؤون القانونية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text"> وارد الشؤون
                                                                                القانونية</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/legal/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة وارد الشؤون
                                                                                القانونية</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/legal') }}" class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض وارد الشؤون
                                                                                القانونية</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text"> صادر الشؤون القانونية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text"> صادر الشؤون
                                                                                القانونية</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/legalexport/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة صادر الشؤون
                                                                                القانونية</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/legalexport') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض صادر الشؤون
                                                                                القانونية</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">المراسلات الداخلية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الشؤون القانونية
                                                                                المرسل</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/legalNot/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">ارسال الشؤون
                                                                                القانونية</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/legalNot') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض المرسلات</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('computer')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                                        <path
                                                            d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text"> الحاسوب</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> الحاسوب</span>
                                                        </span>
                                                    </li>
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                                                x="11" y="1"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <path
                                                                                d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                                                fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <span class="menu-text"> وارد الحاسوب</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text"> وارد الحاسوب</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/computer/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة وارد الحاسوب</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/computer') }}" class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض وارد الحاسوب</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">صادر الحاسوب</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">صادر الحاسوب</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/computerExport/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة صادر الحاسوب</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/computerExport') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض صادر الحاسوب</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">المراسلات الداخلية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الحاسوب المرسل</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/computerNot/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">ارسال الحاسوب</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/computerNot') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض المرسلات</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('jibaya')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                        <path
                                                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                        <path
                                                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                        <path
                                                            d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text"> الجباية</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> الجباية</span>
                                                        </span>
                                                    </li>
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                                        <path
                                                                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                                        <path
                                                                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                                        <path
                                                                            d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <span class="menu-text"> وارد الجباية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text"> وارد الجباية</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/jibaya/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة وارد الجباية</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/jibaya') }}" class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض وارد الجباية</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">صادر الجباية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">صادر الجباية</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/jibayaexport/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة صادر الجباية</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/jibayaexport') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض صادر الجباية</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">المراسلات الداخلية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الجباية المرسل</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/jibayaNot/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">ارسال الجباية</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/jibayaNot') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض المرسلات</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                    @can('censorship')
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text"> الرقابة</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">
                                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                        <span class="menu-link">
                                                            <span class="menu-text"> الرقابة</span>
                                                        </span>
                                                    </li>
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                                                x="11" y="1"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <path
                                                                                d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                                                fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <span class="menu-text"> وارد الرقابة</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text"> وارد الرقابة</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/censorship/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة وارد الرقابة</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/censorship') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض وارد الرقابة</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">صادر الرقابة</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">صادر الرقابة</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/censorshipExport/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">إضافة صادر الرقابة</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/censorshipExport') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض صادر الرقابة</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                                            data-menu-toggle="hover">
                                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                                <span class="svg-icon menu-icon">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Files/Export.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                                                x="11" y="2"
                                                                                width="2" height="12"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                                <span class="menu-text">المراسلات الداخلية</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                            <div class="menu-submenu">
                                                                <i class="menu-arrow"></i>
                                                                <ul class="menu-subnav">
                                                                    <li class="menu-item menu-item-parent"
                                                                        aria-haspopup="true">
                                                                        <span class="menu-link">
                                                                            <span class="menu-text">الرقابة المرسل</span>
                                                                        </span>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/censorshipNot/create') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-add-circular-button"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">ارسال الرقابة</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="menu-item" aria-haspopup="true">
                                                                        <a href="{{ url('/sendNotification/censorshipNot') }}"
                                                                            class="menu-link">
                                                                            <span class="svg-icon menu-icon">
                                                                                <i class="flaticon-eye"></i>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                            <span class="menu-text">عرض المرسلات</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan

                                </ul>
                            </ul>
                        </div>
                    </li>
                @endcan
                {{-- ************************************************المحكمة******************************************************** --}}
                @can('court')
                    <li class="menu-section">
                        <h4 class="menu-text">الشؤون القانونية</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ url('https://192.168.3.13/Court/public') }}" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">المحكمة</span>
                            <i class="menu-arrow"></i>
                        </a>

                    </li>
                @endcan
                {{-- ************************************************الموارد البشرية******************************************************** --}}
                @can('HR')

                    <li class="menu-section">
                        <h4 class="menu-text">الموارد البشرية</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    @can('user_admin')
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                        <path
                                            d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--end::Svg Icon-->
                                <span class="menu-text"> المستخدمين</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text"> المستخدمين</span>
                                        </span>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/user/create') }}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <i class="flaticon-add-circular-button"></i>
                                                <!--end::Svg Icon-->
                                            </span>

                                            <span class="menu-text">إضافة المستخدمين </span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/permissions/users') }}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <i class="flaticon-eye"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">عرض المستخدمين </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('permissions')
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                        <path
                                            d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--end::Svg Icon-->
                                <span class="menu-text">المسؤوليات</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text"> المسؤوليات</span>
                                        </span>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/permissions/permissions/create') }}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <i class="flaticon-add-circular-button"></i>
                                                <!--end::Svg Icon-->
                                            </span>

                                            <span class="menu-text">إضافة المسؤوليات </span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/permissions/permissions') }}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <i class="flaticon-eye"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">عرض المسؤوليات </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('roles')
                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                                        <path
                                            d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z" />
                                        <path
                                            d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z" />
                                    </svg>
                                    <!--end::Svg Icon-->
                                    <!--end::Svg Icon-->
                                </span>
                                <!--end::Svg Icon-->
                                <span class="menu-text">الأدوار</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">الأدوار</span>
                                        </span>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/permissions/roles/create') }}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <i class="flaticon-add-circular-button"></i>
                                                <!--end::Svg Icon-->
                                            </span>

                                            <span class="menu-text">إضافة الأدوار</span>
                                        </a>
                                    </li>
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/permissions/roles') }}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <i class="flaticon-eye"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text">عرض الأدوار </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @endcan
                @endcan
            </ul>

            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
