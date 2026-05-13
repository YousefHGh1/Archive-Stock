@extends('layout.master')

@section('title')
    الأرشيف المركزي
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الرئيسة
@endsection
@section('sub_title')
    الأرشيف المركزي + المخازن
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .dashboard-card {
            transition: all 0.3s ease;
            border-radius: 15px;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin: 0 auto 10px;
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #4CAF50 0%, #73ed7a 100%);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #FF9800 0%, #ebae72 100%);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #17a2b8 0%, #8be3f1 100%);
        }

        .analytics-summary {
            border: 1px solid #EBEDF3;
            border-radius: 8px;
            background: #ffffff;
            min-height: 118px;
        }

        .analytics-summary .summary-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .dashboard-chart {
            min-height: 320px;
        }

        .dashboard-chart-sm {
            min-height: 260px;
        }

        .chart-empty-state {
            min-height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7E8299;
            font-weight: 600;
        }
    </style>
@endsection


@section('content')
    @php
        $dashboardStats = $dashboardStats ?? [];
        $dashboardCharts = $dashboardCharts ?? [];
    @endphp
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Nav Tabs-->
                        <ul class="p-0 m-0 dashboard-tabs nav nav-pills nav-danger row row-paddingless flex-column flex-sm-row"
                            role="tablist">

                            <!-- الأرشيف المركزي -->
                            <li class="flex-shrink-0 mb-3 mr-3 nav-item d-flex col-sm flex-grow-1 mb-lg-0 animate-on-scroll">
                                <a class="py-10 border rounded nav-link active d-flex flex-grow-1 flex-column align-items-center dashboard-card bg-gradient-primary text-white animate-slide-in-left"
                                    data-toggle="pill" href="#tab_forms_widget_1">
                                    <span class="w-auto py-2 nav-icon">
                                        <i class="fas fa-archive fa-3x text-white icon-bounce"></i>
                                    </span>
                                    <span class="py-2 text-center nav-text font-size-lg font-weight-bold">
                                        الأرشيف المركزي :
                                    </span>
                                    <span class="font-size-h6 opacity-75">
                                        {{ \App\Models\Archive::count() }} وارد &
                                        {{ \App\Models\ArchiveExport::count() }} صادر
                                    </span>
                                </a>
                            </li>

                            <!-- الحاسوب -->
                            <li
                                class="flex-shrink-0 mb-3 mr-3 nav-item d-flex col-sm flex-grow-1 mb-lg-0 animate-on-scroll">
                                <a class="py-10 border rounded nav-link d-flex flex-grow-1 flex-column align-items-center dashboard-card bg-gradient-success text-white animate-slide-in-right"
                                    data-toggle="pill" href="#tab_forms_widget_2">
                                    <span class="w-auto py-2 nav-icon">
                                        <i class="fas fa-laptop fa-3x text-white icon-bounce"></i>
                                    </span>
                                    <span class="py-2 text-center nav-text font-size-lg font-weight-bolder">
                                        الحاسوب :
                                    </span>
                                    <span class="font-size-h6 opacity-75">
                                        {{ \App\Models\Computer::count() }} وارد &
                                        {{ \App\Models\ComputerExport::count() }} صادر
                                    </span>
                                </a>
                            </li>

                            <!-- الرقابة (تم التعديل) -->
                            <li
                                class="flex-shrink-0 mb-3 mr-3 nav-item d-flex col-sm flex-grow-1 mb-lg-0 animate-on-scroll">
                                <a class="py-10 border rounded nav-link d-flex flex-grow-1 flex-column align-items-center dashboard-card bg-gradient-info text-white animate-slide-in-right"
                                    data-toggle="pill" href="#tab_forms_widget_3">
                                    <span class="w-auto py-2 nav-icon">
                                        <i class="fas fa-eye fa-3x text-white icon-bounce"></i>
                                    </span>
                                    <span class="py-2 text-center nav-text font-size-lg font-weight-bolder">
                                        الرقابة :
                                    </span>
                                    <span class="font-size-h6 opacity-75">
                                        وارد : {{ \App\Models\Censorship::count() }} &
                                        صادر : {{ \App\Models\CensorshipExport::count() }}
                                    </span>
                                </a>
                            </li>

                            <!-- الشؤون القانونية -->
                            <li
                                class="flex-shrink-0 mb-3 mr-3 nav-item d-flex col-sm flex-grow-1 mb-lg-0 animate-on-scroll">
                                <a class="py-10 border rounded nav-link d-flex flex-grow-1 flex-column align-items-center dashboard-card bg-gradient-danger text-white animate-slide-in-right"
                                    data-toggle="pill" href="#tab_forms_widget_4">
                                    <span class="w-auto py-2 nav-icon">
                                        <i class="fas fa-gavel fa-3x text-white icon-bounce"></i>
                                    </span>
                                    <span class="py-2 text-center nav-text font-size-lg font-weight-bolder">
                                        الشؤون القانونية :
                                    </span>
                                    <span class="font-size-h6 opacity-75">
                                        {{ \App\Models\Legal::count() }} وارد &
                                        {{ \App\Models\LegalExport::count() }} صادر
                                    </span>
                                </a>
                            </li>

                            <!-- الجباية (تم التعديل) -->
                            <li
                                class="flex-shrink-0 mb-3 mr-0 nav-item d-flex col-sm flex-grow-1 mb-lg-0 animate-on-scroll">
                                <a class="py-10 border rounded nav-link d-flex flex-grow-1 flex-column align-items-center dashboard-card bg-gradient-warning text-white animate-slide-in-right"
                                    data-toggle="pill" href="#tab_forms_widget_5">
                                    <span class="w-auto py-2 nav-icon">
                                        <i class="fas fa-hand-holding-usd fa-3x text-white icon-bounce"></i>
                                    </span>
                                    <span class="py-2 text-center nav-text font-size-lg font-weight-bolder">
                                        الجباية :
                                    </span>
                                    <span class="font-size-h6 opacity-75">
                                        وارد : {{ \App\Models\Jibaya::count() }} &
                                        صادر : {{ \App\Models\JibayaExport::count() }}
                                    </span>
                                </a>
                            </li>

                        </ul>
                        <!--end::Nav Tabs-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Nav Panel Widget 1-->
            </div>
        </div>
        <!--End::Row-->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="p-6 mb-7 analytics-summary d-flex align-items-center justify-content-between animate-on-scroll">
                    <div>
                        <div class="text-muted font-weight-bold">إجمالي معاملات الأرشيف</div>
                        <div class="mt-2 text-dark font-weight-bolder font-size-h2">
                            {{ number_format($dashboardStats['totalArchiveTransactions'] ?? 0) }}
                        </div>
                    </div>
                    <span class="summary-icon bg-light-primary text-primary">
                        <i class="fas fa-folder-open"></i>
                    </span>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="p-6 mb-7 analytics-summary d-flex align-items-center justify-content-between animate-on-scroll">
                    <div>
                        <div class="text-muted font-weight-bold">حركة المخازن</div>
                        <div class="mt-2 text-dark font-weight-bolder font-size-h2">
                            {{ number_format($dashboardStats['totalInventoryTransactions'] ?? 0) }}
                        </div>
                    </div>
                    <span class="summary-icon bg-light-success text-success">
                        <i class="fas fa-boxes"></i>
                    </span>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="p-6 mb-7 analytics-summary d-flex align-items-center justify-content-between animate-on-scroll">
                    <div>
                        <div class="text-muted font-weight-bold">المراسلات الداخلية</div>
                        <div class="mt-2 text-dark font-weight-bolder font-size-h2">
                            {{ number_format($dashboardStats['internalMessages'] ?? 0) }}
                        </div>
                    </div>
                    <span class="summary-icon bg-light-warning text-warning">
                        <i class="fas fa-envelope-open-text"></i>
                    </span>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="p-6 mb-7 analytics-summary d-flex align-items-center justify-content-between animate-on-scroll">
                    <div>
                        <div class="text-muted font-weight-bold">الأصناف والعهد</div>
                        <div class="mt-2 text-dark font-weight-bolder font-size-h2">
                            {{ number_format(($dashboardStats['inventoryItems'] ?? 0) + ($dashboardStats['custodies'] ?? 0)) }}
                        </div>
                    </div>
                    <span class="summary-icon bg-light-danger text-danger">
                        <i class="fas fa-clipboard-check"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                <div class="card card-custom gutter-b">
                    <div class="border-0 card-header">
                        <div class="card-title">
                            <h3 class="card-label font-weight-bolder text-dark">إجمالي الحركات الشهرية لجميع المعاملات</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="overall-monthly-chart" class="dashboard-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card card-custom gutter-b">
                    <div class="border-0 card-header">
                        <div class="card-title">
                            <h3 class="card-label font-weight-bolder text-dark">حجم المعاملات حسب القسم</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="department-totals-chart" class="dashboard-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="card card-custom gutter-b">
                    <div class="border-0 card-header">
                        <div class="card-title">
                            <h3 class="card-label font-weight-bolder text-dark">حركة الوارد والصادر خلال السنة</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="archive-monthly-chart" class="dashboard-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card card-custom gutter-b">
                    <div class="border-0 card-header">
                        <div class="card-title">
                            <h3 class="card-label font-weight-bolder text-dark">توزيع معاملات الدوائر</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="archive-distribution-chart" class="dashboard-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card card-custom gutter-b">
                    <div class="border-0 card-header">
                        <div class="card-title">
                            <h3 class="card-label font-weight-bolder text-dark">حركة المخازن الشهرية</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="inventory-flow-chart" class="dashboard-chart-sm"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card card-custom gutter-b">
                    <div class="border-0 card-header">
                        <div class="card-title">
                            <h3 class="card-label font-weight-bolder text-dark">المراسلات حسب القسم</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="messages-chart" class="dashboard-chart-sm"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ******************************************************************************************************* --}}
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-6">
                <!--begin::Mixed Widget 1-->
                <div class="bg-gray-100 card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="py-5 border-0 card-header bg-danger">
                        <h3 class="text-white card-title font-weight-bolder">
                            المخــــــــــــــــــــــــــــــــازن </h3>
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#"
                                    class="px-5 btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الصفحات</a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi nav-hover">
                                        <li class="nav-item">
                                            <a href="{{ url('inventory/unit/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة وحدة
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/category/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة عائلة
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/item/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة صنف
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/store/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة مخزن
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/supplier_item/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة مورد
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/invoice/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة صنف وارد
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/invoice_export/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة صنف صادر
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/inventory/custody/create') }}" class="nav-link">
                                                <i class="nav-icon flaticon2-add-1"></i> إضافة عهدة </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="p-0 overflow-hidden card-body position-relative">
                        <!--begin::Chart-->
                        <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px">
                        </div>
                        <!--end::Chart-->
                        <!--begin::Stats-->
                        <div class="card-spacer mt-n25">
                            <!--begin::Row-->
                            <div class="m-0 row">
                                <div class="px-6 col bg-light-warning py-13 rounded-xl mr-7 mb-7">
                                    <span class="my-2 svg-icon svg-icon-3x svg-icon-warning d-block">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                    height="16" rx="1.5" />
                                                <rect fill="#000000" x="8" y="9" width="3" height="11"
                                                    rx="1.5" />
                                                <rect fill="#000000" x="18" y="11" width="3" height="9"
                                                    rx="1.5" />
                                                <rect fill="#000000" x="3" y="13" width="3" height="7"
                                                    rx="1.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="{{ url('inventory/item') }}"
                                        class="text-warning font-weight-bold font-size-h6">الأصناف:
                                        {{ \App\Models\Item::count() }}</a>

                                    {{-- <a href="#" class="text-warning font-weight-bold font-size-h6">الوارد:
                                        {{ \App\Models\Diesel::sum('quantity') }} <span>لتر</span> </a> --}}
                                </div>
                                <div class="px-6 py-8 col bg-light-primary rounded-xl mb-7">
                                    <span class="my-2 svg-icon svg-icon-3x svg-icon-primary d-block">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="{{ url('/inventory/invoice') }}"
                                        class="text-primary font-weight-bold font-size-h6">الأصناف الواردة:
                                        {{ \App\Models\Invoice::count() }}</a>
                                    {{-- <a href="#" class="mt-2 text-primary font-weight-bold font-size-h6">الصادر:
                                        {{ \App\Models\DieselExport::sum('quantity') }} <span>لتر</span> </a> --}}
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="m-0 row">
                                <div class="px-6 col bg-light-danger py-13 rounded-xl mr-7">
                                    <span class="my-2 svg-icon svg-icon-3x svg-icon-danger d-block">
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
                                    <a href="{{ url('/inventory/invoice_export') }}"
                                        class="text-danger font-weight-bold font-size-h6">الأصناف الصادرة:
                                        {{ \App\Models\InvoiceExport::count() }}</a>
                                    {{-- <a href="#" class="mt-2 text-danger font-weight-bold font-size-h6">المتبقي:
                                        {{ \App\Models\Diesel::sum('quantity') - \App\Models\DieselExport::sum('quantity') }}
                                        <span>لتر</span> </a> --}}
                                </div>
                                <div class="px-6 py-8 col bg-light-success rounded-xl">
                                    <span class="my-2 svg-icon svg-icon-3x svg-icon-success d-block">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <a href="{{ url('/inventory/totalreport') }}"
                                        class="mt-2 text-success font-weight-bold font-size-h6">تقارير المجاميع
                                    </a>
                                    <br />
                                    <a href="{{ url('/inventory/transactions_report') }}"
                                        class="mt-2 text-success font-weight-bold font-size-h6">تقارير حركة الصنف
                                    </a>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 1-->
            </div>

            <div class="col-12 col-lg-6">
                <!--begin::List Widget 11-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="border-0 card-header">
                        <h3 class="card-title font-weight-bolder text-dark">المراســــــــــــــــــــــــــلات
                            الداخليـــــــــــــــــــــــــة</h3>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="pt-0 card-body">
                        <!--begin::Item-->
                        <div class="p-5 rounded d-flex align-items-center mb-9 bg-light-warning">
                            <!--begin::Icon-->
                            <span class="mr-5 svg-icon svg-icon-warning">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Library.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                fill="#000000"></path>
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                x="16.3255682" y="2.94551858" width="3" height="18"
                                                rx="1"></rect>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                <a href="{{ url('/sendNotification/archiveNot') }}"
                                    class="mb-1 font-weight-bold text-dark-75 text-hover-primary font-size-lg">مراسلات
                                    الأرشيف</a>
                            </div>
                            <!--end::Title-->

                            <!--begin::Lable-->
                            <span
                                class="py-1 font-weight-bolder text-warning font-size-lg">{{ \App\Models\archiveNot::count() }}</span>
                            <!--end::Lable-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="p-5 rounded d-flex align-items-center bg-light-success mb-9">
                            <!--begin::Icon-->
                            <span class="mr-5 svg-icon svg-icon-success">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Write.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                            </path>
                                            <path
                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                <a href="{{ url('/sendNotification/legalNot') }}"
                                    class="mb-1 font-weight-bold text-dark-75 text-hover-primary font-size-lg">مراسلات
                                    الشؤون القانونية</a>
                            </div>
                            <!--end::Title-->

                            <!--begin::Lable-->
                            <span
                                class="py-1 font-weight-bolder text-success font-size-lg">{{ \App\Models\legalNot::count() }}</span>
                            <!--end::Lable-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="p-5 rounded d-flex align-items-center bg-light-danger mb-9">
                            <!--begin::Icon-->
                            <span class="mr-5 svg-icon svg-icon-danger">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group-chat.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                fill="#000000"></path>
                                            <path
                                                d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                <a href="{{ url('/sendNotification/computerNot') }}"
                                    class="mb-1 font-weight-bold text-dark-75 text-hover-primary font-size-lg">مراسلات
                                    الحاسوب</a>
                            </div>
                            <!--end::Title-->

                            <!--begin::Lable-->
                            <span
                                class="py-1 font-weight-bolder text-danger font-size-lg">{{ \App\Models\computerNot::count() }}</span>
                            <!--end::Lable-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="p-5 rounded d-flex align-items-center bg-light-primary mb-9">
                            <!--begin::Icon-->
                            <span class="mr-5 svg-icon svg-icon-primary">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group-chat.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                fill="#000000"></path>
                                            <path
                                                d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                <a href="{{ url('/sendNotification/censorshipNot') }}"
                                    class="mb-1 font-weight-bold text-dark-75 text-hover-primary font-size-lg">مراسلات
                                    الرقابة</a>
                            </div>
                            <!--end::Title-->

                            <!--begin::Lable-->
                            <span
                                class="py-1 font-weight-bolder text-primary font-size-lg">{{ \App\Models\censorshipNot::count() }}</span>
                            <!--end::Lable-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="p-5 mb-0 rounded d-flex align-items-center bg-light-info">
                            <!--begin::Icon-->
                            <span class="mr-5 svg-icon svg-icon-info">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Attachment2.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                                                fill="#000000" opacity="0.3"
                                                transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) ">
                                            </path>
                                            <path
                                                d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                                                fill="#000000"
                                                transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) ">
                                            </path>
                                            <path
                                                d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                                                fill="#000000" opacity="0.3"
                                                transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) ">
                                            </path>
                                            <path
                                                d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                                                fill="#000000" opacity="0.3"
                                                transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) ">
                                            </path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span> </span>
                            <!--end::Icon-->

                            <!--begin::Title-->
                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                <a href="{{ url('/sendNotification/jibayaNot') }}"
                                    class="mb-1 font-weight-bold text-dark-75 text-hover-primary font-size-lg">مراسلات
                                    الجباية</a>
                            </div>
                            <!--end::Title-->

                            <!--begin::Lable-->
                            <span
                                class="py-1 font-weight-bolder text-info font-size-lg">{{ \App\Models\jibayaNot::count() }}</span>
                            <!--end::Lable-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 11-->
            </div>
        </div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
@endsection

@section('scripts')
    <script>
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, observerOptions);

            // Observe all animate-on-scroll elements
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });

        // Dashboard card hover effects
        document.querySelectorAll('.dashboard-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Counter animation for statistics
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 20);
        }

        // Animate counters on page load
        document.addEventListener('DOMContentLoaded', function() {
            // You can add counter animations here if needed
            console.log('Dashboard loaded with animations');
        });

        document.addEventListener('DOMContentLoaded', function() {
            var dashboardCharts = @json($dashboardCharts);

            if (typeof ApexCharts === 'undefined') {
                return;
            }

            function sumValues(values) {
                return (values || []).reduce(function(total, value) {
                    return total + Number(value || 0);
                }, 0);
            }

            function renderEmpty(selector) {
                var target = document.querySelector(selector);
                if (target) {
                    target.innerHTML = '<div class="chart-empty-state">لا توجد بيانات كافية لعرض المخطط</div>';
                }
            }

            function renderChart(selector, options, dataGroups) {
                var target = document.querySelector(selector);
                var hasData = (dataGroups || []).some(function(values) {
                    return sumValues(values) > 0;
                });

                if (!target || !hasData) {
                    renderEmpty(selector);
                    return;
                }

                new ApexCharts(target, options).render();
            }

            var monthLabels = dashboardCharts.monthLabels || [];
            var archiveMonthly = dashboardCharts.monthlyArchive || {};
            var archiveDistribution = dashboardCharts.archiveDistribution || {};
            var inventoryFlow = dashboardCharts.inventoryFlow || {};
            var messages = dashboardCharts.messages || {};
            var overallMonthly = dashboardCharts.overallMonthly || {};
            var departmentTotals = dashboardCharts.departmentTotals || {};

            renderChart('#overall-monthly-chart', {
                series: [{
                    name: 'المعاملات الكلية وارد',
                    data: overallMonthly.incoming || []
                }, {
                    name: 'المعاملات الكلية صادر',
                    data: overallMonthly.outgoing || []
                }],
                chart: {
                    type: 'area',
                    height: 320,
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'inherit'
                },
                colors: ['#009EF7', '#50CD89'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 0.28,
                        opacityTo: 0.05
                    }
                },
                grid: {
                    borderColor: '#EBEDF3',
                    strokeDashArray: 4
                },
                xaxis: {
                    categories: monthLabels,
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' معاملة';
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                }
            }, [overallMonthly.incoming, overallMonthly.outgoing]);

            renderChart('#department-totals-chart', {
                series: departmentTotals.values || [],
                chart: {
                    type: 'donut',
                    height: 320,
                    fontFamily: 'inherit'
                },
                labels: departmentTotals.labels || [],
                colors: ['#009EF7', '#50CD89', '#F64E60', '#FFA800', '#3699FF', '#5867DD'],
                dataLabels: {
                    enabled: true,
                    formatter: function(value) {
                        return Math.round(value) + '%';
                    }
                },
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '64%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'الإجمالي',
                                    formatter: function(chart) {
                                        return chart.globals.seriesTotals.reduce(function(total,
                                        value) {
                                            return total + value;
                                        }, 0);
                                    }
                                }
                            }
                        }
                    }
                }
            }, [departmentTotals.values]);

            renderChart('#archive-monthly-chart', {
                series: [{
                    name: 'الوارد',
                    data: archiveMonthly.incoming || []
                }, {
                    name: 'الصادر',
                    data: archiveMonthly.outgoing || []
                }],
                chart: {
                    type: 'area',
                    height: 320,
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'inherit'
                },
                colors: ['#3699FF', '#F64E60'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 0.32,
                        opacityTo: 0.04
                    }
                },
                grid: {
                    borderColor: '#EBEDF3',
                    strokeDashArray: 4
                },
                xaxis: {
                    categories: monthLabels,
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' معاملة';
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                }
            }, [archiveMonthly.incoming, archiveMonthly.outgoing]);

            renderChart('#archive-distribution-chart', {
                series: [{
                    name: 'الوارد',
                    data: archiveDistribution.incoming || []
                }, {
                    name: 'الصادر',
                    data: archiveDistribution.outgoing || []
                }],
                chart: {
                    type: 'bar',
                    height: 320,
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'inherit'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        borderRadius: 4,
                        barHeight: '58%'
                    }
                },
                colors: ['#1BC5BD', '#FFA800'],
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: archiveDistribution.labels || [],
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#3F4254'
                        }
                    }
                },
                grid: {
                    borderColor: '#EBEDF3',
                    strokeDashArray: 4
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                }
            }, [archiveDistribution.incoming, archiveDistribution.outgoing]);

            renderChart('#inventory-flow-chart', {
                series: [{
                    name: 'الوارد',
                    data: inventoryFlow.incoming || []
                }, {
                    name: 'الصادر',
                    data: inventoryFlow.outgoing || []
                }],
                chart: {
                    type: 'bar',
                    height: 260,
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'inherit'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        columnWidth: '44%'
                    }
                },
                colors: ['#8950FC', '#F64E60'],
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: monthLabels,
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#7E8299'
                        }
                    }
                },
                grid: {
                    borderColor: '#EBEDF3',
                    strokeDashArray: 4
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                }
            }, [inventoryFlow.incoming, inventoryFlow.outgoing]);

            renderChart('#messages-chart', {
                series: messages.series || [],
                chart: {
                    type: 'donut',
                    height: 260,
                    fontFamily: 'inherit'
                },
                labels: messages.labels || [],
                colors: ['#FFA800', '#1BC5BD', '#F64E60', '#3699FF', '#8950FC'],
                dataLabels: {
                    enabled: true,
                    formatter: function(value) {
                        return Math.round(value) + '%';
                    }
                },
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '62%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'الإجمالي',
                                    formatter: function(chart) {
                                        return chart.globals.seriesTotals.reduce(function(total,
                                        value) {
                                            return total + value;
                                        }, 0);
                                    }
                                }
                            }
                        }
                    }
                }
            }, [messages.series]);
        });
    </script>
@endsection
