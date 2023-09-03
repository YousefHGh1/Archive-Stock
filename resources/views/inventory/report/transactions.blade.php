@extends('layout.master')

@section('title')
    تقارير حركة الأصناف
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الأصناف
@endsection
@section('sub_title')
    صفحة التقارير
@endsection
@section('css')
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.foundation.min.css') }}">

    <style>
        .dataTables_wrapper .dataTable th,
        .dataTables_wrapper .dataTable td {
            padding-right: 10px !important;
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
            left: 10%;
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

        .card-body {
            padding: 10px 12px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="flex-wrap pt-6 pb-0 border-0 card-header">
                <div class="card-title">
                    <h3 class="card-label">تقارير حركة الأصناف</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ url('inventory/item/create') }}" class="btn btn-primary font-weight-bolder">
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
                        </span>إنشاء صنف جديد</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="pt-0 card-body">
                <div class="accordion accordion-light " id="accordionExample5" style="direction: rtl;">
                    <div class="card">
                        <div class="card-header"
                            id="headingOne5">
                            <div class="card-title">
                                <div data-toggle="collapse" data-target="#collapseOne5"
                                    class="btn btn-primary advance_search font-weight-bolder "><i
                                        class="flaticon-search"></i>
                                    بحــــــــث متــقـــــــــــــــدم</div>
                            </div>
                        </div>
                        <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5"
                            style="direction: rtl;">
                            <div class="card-body1">
                                <div class="mb-6 col-lg-9">
                                    <label>الرصيد:</label>
                                    <form action="{{ url('inventory/searchbalance') }}" method="POST"
                                        class="pr-5 form-group">
                                        @csrf
                                        <div class="input-daterange input-group">
                                            <div class="p-0 col-4">
                                                <input name="balance" type="number" class="form-control" id="balance" />
                                            </div>
                                            <div class="mt-auto mb-auto col-lg-2">
                                                <input type="submit" class="btn btn-primary btn-primary--icon"
                                                    value="بحث" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- <div class="card-body2">
                                <div class="mb-6 col-lg-9">
                                    <label>التاريخ:</label>
                                    <form action="{{ url('inventory/transactions_report/searchdate') }}" method="POST"
                                        class="pr-5 form-group">
                                        @csrf
                                        <div class="input-daterange input-group">
                                            <div class="p-0 col-4">
                                                <input name="start_date" type="date" class="form-control"
                                                    id="start_date" />
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                            </div>
                                            <div class="p-0 col-4">
                                                <input name="end_date" type="date" class="form-control"
                                                    id="end_date" />
                                            </div>
                                            <div class="mt-auto mb-auto col-lg-2">
                                                <input type="submit" class="btn btn-primary btn-primary--icon"
                                                    value="بحث" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>


              
                <!--begin: Datatable-->
                <table id="example" class="table table-striped dt-responsive" style="width:100%">
                    <thead>

                        <tr>
                            <th>رقم الصنف</th>
                            <th>الصنف</th>
                            <th>رقم الفاتورة</th>
                            <th>تاريخ الفاتورة</th>
                            <th>رقم السند</th>
                            <th>الكمية</th>
                            <th>المورد أو المستلم</th>
                            <th>نوع الحركة</th>
                            <th>رصيد الصنف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)


                            <tr>
                                <td>{{ $transaction->item_num }}</td>
                                <td>{{ $transaction->item_name }}</td>
                                <td>{{ $transaction->voucher_no }}</td>
                                <td>{{ $transaction->voucher_date }}</td>
                                <td>{{ $transaction->invoice_no }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>
                                    @if ($transaction->type == 'شراء')
                                        {{ $transaction->supplier_item_name }}
                                    @elseif ($transaction->type == 'صرف')
                                        {{ $transaction->name }}
                                    @endif
                                </td>
                                
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->balance }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/data-json.js') }}" type="text/javascript"></script>
@endsection
