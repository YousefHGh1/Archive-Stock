@can('admin')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!--begin::Head-->

<head>
    <base href="../../../">
    <meta charset="utf-8" />
    <title>بلدية جباليا النزلة | @yield('title', $page_title ?? 'تسجيل الدخول')</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts--> --}}
    <link rel="stylesheet" href="{{ asset('assets/login/styles.rtl.css') }}" />

    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/login/login-1.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/login/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/login/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/login/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="{{ asset('assets/login/light.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/login/light1.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/login/dark1.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/login/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.png') }}" />
    <style>
        .form-control.form-control-solid {
            border: 1px solid #847676 !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $("#register").click(function() {
                $("#loader").hide();
                $("#spinner").show();
                setTimeout(function() {
                    window.location.href = "/home";
                }, 3000);
            });
        });
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="bg-white login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid"
            id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <!--begin::Aside header-->
                    <a href="#" class="mb-10 text-center">
                        <img src="{{ asset('assets/login/logo_login.png') }}" class="max-h-100px" alt="" />
                    </a>
                    <!--end::Aside header-->

                    <!--begin::Aside title-->
                    <h3 class="text-center font-weight-bolder font-size-h4 font-size-h1-lg" style="color: #986923;">
                        نظام بلدية جباليا النزلة
                    </h3>
                    <!--end::Aside title-->
                </div>
                <!--end::Aside Top-->

                <!--begin::Aside Bottom-->
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                    style="background-image: url(assets/login/login-visual-1.svg)"></div>
                <!--end::Aside Bottom-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div
                class="mx-auto overflow-hidden login-content flex-row-fluid d-flex flex-column justify-content-center position-relative p-7">
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('register') }}" id="loader">
                            @csrf
                            <!--begin::Title-->
                            <div class="pt-5 pb-13 pt-lg-0">
                                @include('layout.error')

                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">مرحباً بك</h3>
                                <span class="text-muted font-weight-bold font-size-h4">للتسجيل في النظام </span>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark" for="name"
                                    value="{{ __('Name') }}"> الاسم </label>
                                <input class="h-auto px-4 py-4 rounded-lg form-control form-control-solid"
                                    id="name" type="text" name="name" :value="old('name')" required
                                    autofocus autocomplete="name" />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark" for="email"
                                    value="{{ __('Email') }}"> البريد الالكتروني </label>
                                <input class="h-auto px-4 py-4 rounded-lg form-control form-control-solid"
                                    id="email" type="email" name="email" :value="old('email')" required
                                    autofocus />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark" for="password"
                                    value="{{ __('Password') }}"> كلمة المرور </label>
                                <input class="h-auto px-4 py-4 rounded-lg form-control form-control-solid"
                                    id="password" type="password" name="password" required
                                    autocomplete="new-password" />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark" for="password_confirmation"
                                    value="{{ __('Confirm Password') }}"> تأكيد كلمة المرور </label>
                                <input class="h-auto px-4 py-4 rounded-lg form-control form-control-solid"
                                    id="password_confirmation" type="password" name="password_confirmation" required
                                    autocomplete="new-password" />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark" for="section_id"
                                    value="{{ __('section_id') }}"> القسم الرئيسي </label>
                                <div class="input-group">
                                    <select class="h-auto rounded-lg form-control form-control-solid selectpicker "
                                        data-size="7" tabindex="null" data-live-search="true" title="القسم الرئيسي"
                                        name="section_id" id="section_id">
                                        @foreach ($section as $sections)
                                            <option value="{{ $sections->id }}">{{ $sections->name_section }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <center>
                                <div class="pb-5 pb-lg-0">
                                    <button type="submit" id="register"
                                        class="px-8 py-4 my-3 mr-3 btn btn-primary font-weight-bolder font-size-h6">{{ __('تسجيل الدخول') }}
                                    </button>
                                </div>
                            </center>

                            <!--end::Action-->
                        </form>
                        <!--end::Form-->

                        <!--begin::loader-->
                        <!-- Loading Spinner -->
                        <div id="spinner" style="display: none;">
                            <div class="d-flex align-items-center">
                                <div class="m-auto spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <!--begin::loader-->

                    </div>
                    <!--end::Signin-->
                    {{-- ************************************************************************************************************ --}}
                </div>
                <!--end::Content body-->

                <!--begin::Content footer-->
                <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                    <a href="#" class="text-primary font-weight-bolder font-size-h5">شروط الاستخدام</a>
                    <a href="#" class="ml-10 text-primary font-weight-bolder font-size-h5">سياسة الخصوصية</a>
                    <a href="#" class="ml-10 text-primary font-weight-bolder font-size-h5">اتصل بنا</a>
                </div>
                <!--end::Content footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->


    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('assets/js/login-general.js') }}"></script>
    <!--end::Page Scripts-->

    {{-- <!--begin::loader-->
    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault();

            document.getElementById('loader').style.display = 'block';

            setTimeout(function() {
                document.getElementById('form').submit();
            }, 3000); // 3 seconds
        });
    </script>
    <!--end::loader--> --}}

</body>
<!--end::Body-->

</html>
@endcan

