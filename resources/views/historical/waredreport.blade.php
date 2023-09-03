@extends('layout.master')

@section('title')
    تقارير الوارد التاريخي
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
            <div class="flex-wrap pt-6 pb-0 border-0 card-header">
                <div class="card-title">
                    <h3 class="card-label">تقارير وارد المحروقات </h3>

                </div>

                <div class="card-toolbar">

                    <a href="{{ route('diesel.index') }}" class="btn btn-info font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>عرض وارد المحروقات</a>
                </div>
            </div>



            <!-- search date -->
            <div class="accordion accordion-light " id="accordionExample5">
                <div class="card">
                    <div class="card-header" style="padding:1%;" id="headingOne5">
                        <div class="card-title">
                            <div data-toggle="collapse" data-target="#collapseOne5"
                                class="btn btn-primary advance_search font-weight-bolder "><i class="flaticon-search"></i>
                                بحــــــث متــقـــــــــدم</div>
                        </div>
                    </div>
                    <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5">
                        <div class="card-body1">
                            <div class="mb-6 col-lg-9">
                                <label>التاريخ:</label>
                                <form action="{{ route('historical.datewared') }}" method="POST" class="pr-5 form-group">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="p-0 col-4">
                                            <input name="start_date" type="date" class="form-control" id="start_date" />
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <div class="p-0 col-4">
                                            <input name="end_date" type="date" class="form-control" id="end_date" />
                                        </div>
                                        <div class="mt-auto mb-auto col-lg-2">
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
                            <th>{{ 'نوع المحروقات' }}</th>
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
                                <td> {{ $diesels->typesfuel->name }}</td>
                                <td> {{ $diesels->supplier->name_supplier }}</td>
                                <td>{{ $diesels->quantity }}</td>
                                <td>{{ $diesels->type }}</td>
                                <td>{{ $diesels->voucher }}</td>
                                <td>{{ $diesels->invoice_num }}</td>
                                <td>{{ $diesels->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <div class="text-center card">

            <div class="card-body">
                <h4 class="mb-0 alert bg-primary-o-50 text-primary">كميات المحروقات</h4>
                <table class="table table-striped table-hover table-checkable" id="myTable">
                    <thead class="text-white bg-primary">
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
                            <th>{{ 'عدد الوارد' }}</th>
                            <th>{{ 'مجموع الوارد' }}</th>
                            <th>{{ 'مجموع المتبقي من المحروقات' }} </th>


                        </tr>
                    </thead>


                    <tbody>
                        <tr>
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
                                {{-- <td>   {{ \App\Models\Diesel::select('quantity')->whereRaw('YEAR(diesels.date) = 2023')->sum('quantity') - \App\Models\DieselExport::select('quantity')->whereRaw('YEAR(diesel_exports.date) = 2023')->sum('quantity') }} --}}

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
