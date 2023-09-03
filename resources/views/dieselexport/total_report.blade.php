@extends('layout.master')

@section('title')
    تقارير الصادر
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الصادر
@endsection
@section('sub_title')
    تقارير المجاميع
@endsection

@section('css')
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.foundation.min.css') }}">

    <style>
        .dataTables_wrapper .dataTable th,
        .dataTables_wrapper .dataTable td {
            padding-right: 50px !important;
            margin: 10px !important;
        }

        .dataTables_wrapper .dataTable tfoot th,
        .dataTables_wrapper .dataTable thead th {
            padding-right: 0px;
            padding-left: 0px;
            text-align: right;
        }

        div.dt-buttons {
            top: 50%;
            left: 8%;
            width: 200px;
            margin-left: -100px;
            margin-top: -20px;
            text-align: center;
            padding: 1rem 0
        }

        div.dt-buttons .dt-button {
            margin: -2px !important;
        }

        .dataTables_wrapper .dataTable thead th {
            background-color: #E4E6EF;
        }
    </style>
@endsection



@section('content')
    <!-- Main content -->
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-5 pb-0">
                <div class="card-title">
                    <h3 class="card-label"> تقارير المجاميع </h3>
                </div>

                <div style="direction: ltr;" class="pt-5 ">
                    <!--begin::Dropdown-->
                    <a class="btn btn-light-primary px-6 font-weight-bold" href="{{ url('/dashboard') }}">رجوع للرئيسية </a>
                    <!--end::Button-->
                </div>

            </div>

            <div class="accordion accordion-light " id="accordionExample5">
                <div class="card">
                    <div class="card-header p-5" style="cursor: auto" id="headingOne5">
                        <div class="card-title">
                            <div data-toggle="collapse" data-target="#collapseOne5"
                                class="btn btn-primary advance_search font-weight-bolder "><i class="flaticon-search"></i>
                                بحــــــث متــقـــــــــدم</div>
                        </div>

                    </div>
                    <div id="collapseOne5" class="collapse pl-5" data-parent="#accordionExample5">
                        <div class="card-body1">

                            <div class="col-lg-8 mb-6">
                                <label>السند:</label>
                                <form action="{{ url('dieselexport/searchtotal') }}" method="POST" class="form-group pr-5">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="col-4 p-0">
                                            <input name="start_voucher" type="text" class="form-control"
                                                id="start_voucher" />
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <div class="col-4 p-0">
                                            <input name="end_voucher" type="text" class="form-control"
                                                id="end_voucher" />
                                        </div>
                                        <div class="col-lg-2 mt-auto mb-auto">
                                            <input type="submit" class="btn btn-primary btn-primary--icon"
                                                value="بحث" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--begin: table Form -->
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-checkable" id="example">

                    <thead>
                        <tr>
                            <th>{{ 'سند الصادر' }} </th>
                            <th>{{ 'كمية الصادر' }} </th>
                            <th>{{ ' عدد الايصالات ' }} </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dieselexport->groupBy('voucher') as $group)
                            <tr>
                                <td>{{ $group->first()->voucher }}</td>
                                <td>{{ $group->count() }}</td>
                                <td>{{ $group->sum('quantity') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th style="font-size:16px; font-weight: bold; ">{{ 'مجموع المحروقات  لسندين ' }}</th>
                            <th style="font-size:18px;"><span
                                    style=" padding:5px; ">{{ $dieselexport->sum('quantity') }}</span> </th>
                            {{-- border: 1px solid black; --}}

                        </tr>

                    </tfoot>
                </table>

            </div>
        </div>

        <div class="card text-center">

            <div class="card-body">
                <h4 class="alert bg-primary-o-50 text-primary mb-0">كميات المحروقات</h4>
                <table class="table table-striped  table-hover table-checkable" id="myTable">
                    <thead class="bg-primary text-white">
                        <tr>

                            <th>{{ 'شهر 1' }} </th>
                            <th>{{ 'شهر 2' }}</th>
                            <th>{{ 'شهر 3' }} </th>
                            <th>{{ 'شهر 4' }} </th>
                            <th>{{ 'شهر 5' }} </th>
                            <th>{{ 'شهر 6 ' }} </th>
                            <th>{{ 'شهر 7 ' }} </th>
                            <th>{{ 'شهر 8 ' }} </th>
                            <th>{{ 'شهر 9 ' }} </th>
                            <th>{{ 'شهر 10 ' }} </th>
                            <th>{{ 'شهر 11 ' }} </th>
                            <th>{{ 'شهر 12 ' }} </th>
                            <th>{{ 'عدد الصادر' }}</th>
                            <th>{{ 'مجموع الصادر' }}</th>
                            <th>{{ 'مجموع المتبقي من المحروقات' }} </th>


                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 1 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                                </li>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 2 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 3 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 4 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 5 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 6 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 7 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 8 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>


                            <td>
                                {{-- <li class="list-group-item"> --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 9 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 10 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 11 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\DieselExport::select('quantity')->whereRaw('MONTH(diesel_exports.date) = 12 && YEAR(diesel_exports.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{ \App\Models\DieselExport::select('id')->whereRaw('YEAR(diesel_exports.date) = 2022')->count('id') }}
                                </li>
                            </td>
                            <td> {{ \App\Models\DieselExport::select('quantity')->whereRaw('YEAR(diesel_exports.date) = 2022')->sum('quantity') }}
                                <span>لتر</span> </li>
                            </td>
                            <td> {{ \App\Models\Diesel::sum('quantity') - \App\Models\DieselExport::sum('quantity') }}
                                {{-- <td>   {{ \App\Models\Diesel::select('quantity')->whereRaw('YEAR(diesel_exports.date) = 2022')->sum('quantity') - \App\Models\DieselExport::select('quantity')->whereRaw('YEAR(diesel_exports.date) = 2022')->sum('quantity') }} --}}

                                <span>لتر</span>
                                </li>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/data-json.js') }}" type="text/javascript"></script>

    <script>
        $('#kt_datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>',
            },
            format: 'dd-mm-yyyy',
        });
    </script>
@endsection
