<!DOCTYPE html>
<html lang="ar" dir="rtl" style="direction: rtl">
<!--begin::Head-->

<head>
    @yield('title')
    {{-- <title>CoreArchive</title> --}}
    @include('layout.head')
    <link href="{{ asset('../assets/media/logos/favicon.ico') }}" rel="shortcut icon" type="text/css">

</head>


<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="flex-row d-flex flex-column-fluid page">

            <!--begin::Aside-->
            @includeIf('layout.main-sidebar')
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                {{-- @includeIf('layout.headerbar_test') --}}

                @includeIf('layout.notification')
                <!--end::Header-->

                <!--begin::Content-->
                <div class="pt-0 pb-0 content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="py-2 subheader py-lg-4 subheader-solid" id="kt_subheader">
                        <div
                            class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="flex-wrap mr-2 d-flex align-items-center">
                                <!--begin::Page Title-->
                                <h5 class="mt-2 mb-2 mr-5 text-dark font-weight-bold">@yield('page_title')</h5>
                                <!--end::Page Title-->
                                <!--begin::Actions-->
                                <div class="mt-2 mb-2 mr-4 bg-gray-200 subheader-separator subheader-separator-ver">
                                </div>
                                <ul
                                    class="p-0 my-2 breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold font-size-sm">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="" class="text-muted">@yield('sub_main')</a>
                                    </li>
                                    <li class="breadcrumb-item text-muted">
                                        <a href="" class="text-muted">@yield('sub_title')</a>
                                    </li>
                                </ul>
                                <!--end::Actions-->
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>


                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="row" style="padding-right:200px; width:700px;">
                        @includeIf('layout.error')
                    </div>



                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        @yield('content')
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>

                <!--end::Content-->

                <!--begin::Footer-->
                @include('layout.footer')
                <!--end::Footer-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!-- begin::User Panel الصفحة الشخصية-->
    <!-- end::User Panel-->

    <!--begin::Quick Cart-->
    <!--end::Quick Cart-->

    <!--begin::Quick Panel-->
    <!--end::Quick Panel-->

    <!--begin::Chat Panel-->
    <!--end::Chat Panel-->

    <!--begin::Scrolltop السهم الأزرق -->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10"
                        rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Sticky Toolbar الأزرار ال4 يلي عالجنب-->
    {{-- <ul class="pt-3 pb-3 pl-2 pr-2 mt-4 sticky-toolbar nav flex-column">
		<!--begin::Item-->
		<li class="mb-2 nav-item" id="kt_demo_panel_toggle" data-toggle="tooltip" title="Check out more demos"
			data-placement="right">
			<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="#">
				<i class="flaticon2-drop"></i>
			</a>
		</li>
		<!--end::Item-->
		<!--begin::Item-->
		<li class="mb-2 nav-item" data-toggle="tooltip" title="Layout Builder" data-placement="left">
			<a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary"
				href="#" >
				<i class="flaticon2-gear"></i>
			</a>
		</li>
		<!--end::Item-->
		<!--begin::Item-->
		<li class="mb-2 nav-item" data-toggle="tooltip" title="Documentation" data-placement="left">
			<a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning"
				href="#" >
				<i class="flaticon2-telegram-logo"></i>
			</a>
		</li>
		<!--end::Item-->
		<!--begin::Item-->
		<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example"
			data-placement="left">
			<a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger" href="#" data-toggle="modal"
				data-target="#kt_chat_modal">
				<i class="flaticon2-chat-1"></i>
			</a>
		</li>
		<!--end::Item-->
	</ul> --}}
    <!--end::Sticky Toolbar-->

    <!--begin::Demo Panel-->
    <!--end::Demo Panel-->

    <!--begin::Page Scripts -->
    @include('layout.script')
    <!--end::Page Scripts -->

</body>
<!--end::Body-->

</html>
