@extends('layout.master')

@section('title')
    تقارير الوارد
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    التقارير
@endsection

@section('sub_title')
    وارد المحروقات
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
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-5 pb-0">
                <div class="card-title">
                    <h3 class="card-label">تقارير وارد المحروقات </h3>
                </div>

                <div style="direction: ltr;" class="pt-5 ">
                    <!--begin::Dropdown-->
                    <a class="btn btn-light-primary px-6 font-weight-bold" href="{{ url('/dashboard') }}">رجوع للرئيسية </a>
                    <!--end::Button-->
                </div>

            </div>
            <!-- search date -->
            <div class="accordion accordion-light " id="accordionExample5">
                <div class="card">
                    <div class="card-header pl-5" style="cursor: auto" id="headingOne5">
                        <div class="card-title">
                            <div data-toggle="collapse" data-target="#collapseOne5"
                                class="btn btn-primary advance_search font-weight-bolder "><i class="flaticon-search"></i>
                                بحــــــث متــقـــــــــدم</div>
                        </div>
                    </div>
                    <div id="collapseOne5" class="collapse pl-5" data-parent="#accordionExample5">
                        <div class="card-body1 row">
                            <div class="col-lg-5 mb-6">
                                <label>التاريخ:</label>
                                <form action="{{ url('diesel/searchdate') }}" method="POST" class="form-group pr-5">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="col-4 p-0">
                                            <input name="start_date" type="date" class="form-control" id="start_date" />
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <div class="col-4 p-0">
                                            <input name="end_date" type="date" class="form-control" id="end_date" />
                                        </div>
                                        <div class="col-lg-2 mt-auto mb-auto">
                                            <input type="submit" class="btn btn-primary btn-primary--icon"
                                                value="بحث" />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-5 mb-6">
                                <label>السند:</label>
                                <form action="{{ url('diesel/searchvou') }}" method="POST" class="form-group pr-5">
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
            <!-- search date /-->

            <div class="card-body">
                <table id="example" class="table table-striped dt-responsive " style="width:100%">
                    <thead class="thead_dark">
                        <tr>
                            <th>{{ 'اسم المورد' }}</th>
                            <th>{{ 'كمية التوريد' }}</th>
                            <th>{{ 'جهة التوريد' }}</th>
                            <th>{{ 'سند التوريد ' }} </th>
                            <th>{{ 'رقم الفاتورة' }}</th>
                            <th>{{ 'تاريخ التوريد' }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($diesel as $diesels)
                            <tr>
                                <td> {{ $diesels->supplier->name_supplier }}</td>
                                <td>{{ $diesels->quantity }}</td>
                                <td>{{ $diesels->type }}</td>
                                <td>{{ $diesels->voucher }}</td>
                                <td>{{ $diesels->invoice_num }}</td>
                                <td>{{ $diesels->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th style="font-size:12px; font-weight: bold; ">{{ 'مجموع المحروقات  الوارد ' }}</th>
                            <th style="font-size:18px;"><span
                                    style=" padding:5px; border: 1px solid rgb(161, 161, 161);">{{ $diesel->sum('quantity') }}</span>
                            </th>
                        </tr>

                    </tfoot>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <div class="card text-center">

            <div class="card-body">
                <h4 class="alert bg-primary-o-50 text-primary mb-0">كميات المحروقات</h4>
                <table class="table table-striped  table-hover table-checkable" id="myTable">
                    <thead class="bg-primary text-white">
                        <tr>

                            <th>{{ 'رصيد سابق' }} </th>
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
                            <th>{{ 'عدد الوارد' }}</th>
                            <th>{{ 'مجموع الوارد' }}</th>
                            <th>{{ 'مجموع المتبقي من المحروقات' }} </th>


                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('YEAR(diesels.date) = 2022')->sum('quantity') -\App\Models\DieselExport::select('quantity')->whereRaw('YEAR(diesel_exports.date) = 2022')->sum('quantity') }}
                                <span>لتر</span>
                                </li>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 1 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                                </li>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 2 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 3 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 4 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 5 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 6 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 7 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 8 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>


                            <td>
                                {{-- <li class="list-group-item"> --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 9 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 10 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 11 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 12 && YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{ \App\Models\Diesel::select('id')->whereRaw('YEAR(diesels.date) = 2023')->count('id') }}
                                </li>
                            </td>
                            <td> {{ \App\Models\Diesel::select('quantity')->whereRaw('YEAR(diesels.date) = 2023')->sum('quantity') }}
                                <span>لتر</span> </li>
                            </td>
                            <td> {{ \App\Models\Diesel::sum('quantity') - \App\Models\DieselExport::sum('quantity') }}
                                {{-- <td>   {{ \App\Models\Diesel::select('quantity')->whereRaw('YEAR(diesels.date) = 2022')->sum('quantity') - \App\Models\DieselExport::select('quantity')->whereRaw('YEAR(diesel_exports.date) = 2022')->sum('quantity') }} --}}

                                <span>لتر</span>
                                </li>
                            </td>



                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
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
