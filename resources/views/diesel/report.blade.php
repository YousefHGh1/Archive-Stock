@extends('layout.master')

@section('title', 'تقارير الوارد')

@section('page_title', 'لوحة التحكم')

@section('sub_main', 'التقارير')

@section('sub_title', 'وارد المحروقات')

@section('css')
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.foundation.min.css') }}">
    <style>
        .dataTables_wrapper .dataTable th,
        .dataTables_wrapper .dataTable td {
            padding-right: 50px !important;
            margin: 10px !important;
        }

        .dataTables_wrapper .dataTable thead th {
            background-color: #E4E6EF;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="flex-wrap pt-5 pb-0 border-0 card-header">
                <div class="card-title">
                    <h3 class="card-label">تقارير وارد المحروقات</h3>
                </div>
                <div style="direction: ltr;" class="pt-5">
                    <a class="px-6 btn btn-light-primary font-weight-bold" href="{{ route('diesel.index') }}">رجوع للرئيسية</a>
                </div>
            </div>

            <!-- Advanced Search -->
            <div class="accordion accordion-light" id="accordionExample5">
                <div class="card">
                    <div class="pl-5 card-header" style="cursor: auto" id="headingOne5">
                        <div class="card-title">
                            <button class="btn btn-primary advance_search font-weight-bolder" data-toggle="collapse"
                                data-target="#collapseOne5">
                                <i class="flaticon-search"></i> بحــــــث متــقـــــــــدم
                            </button>
                        </div>
                    </div>
                    <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5">
                        <div class="row card-body1">


                            <div class="col-lg-12">
                                <form action="{{ route('diesel.report') }}" method="POST" class="pr-5 form-group">
                                    @csrf
                                    <!-- Date Range Inputs -->
                                    <div class="mb-3 input-group">

                                            <label class="m-2">التاريخ:</label>
                                            <input name="start_date" type="date" class="form-control col-4"
                                                value="{{ old('start_date') }}" />
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                            <input name="end_date" type="date" class="form-control col-4"
                                                value="{{ old('end_date') }}" />
                                            <button type="submit" class="btn btn-primary">بحث</button>

                                        <div class="col-lg-1"></div>

                                            <label class="m-2">السند:</label>
                                            <input name="start_voucher" type="text" class="form-control col-4"
                                                value="{{ old('start_voucher') }}" />
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                            <input name="end_voucher" type="text" class="form-control col-4"
                                                value="{{ old('end_voucher') }}" />

                                            <button type="submit" class="btn btn-primary">بحث</button>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diesel Report Table -->
            <div class="card-body">
                <table id="example" class="table table-striped dt-responsive" style="width:100%">
                    <thead class="thead_dark">
                        <tr>
                            <th>نوع المحروقات</th>
                            <th>اسم المورد</th>
                            <th>كمية التوريد</th>
                            <th>جهة التوريد</th>
                            <th>سند التوريد</th>
                            <th>رقم الفاتورة</th>
                            <th>تاريخ التوريد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dieselEntries as $entry)
                            <tr>
                                <td>{{ $entry->typesfuel->name ?? 'N/A' }}</td>
                                <td>{{ $entry->supplier->name_supplier ?? 'N/A' }}</td>
                                <td>{{ $entry->quantity }}</td>
                                <td>{{ $entry->type }}</td>
                                <td>{{ $entry->voucher }}</td>
                                <td>{{ $entry->invoice_num }}</td>
                                <td>{{ $entry->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>مجموع المحروقات الوارد</th>
                            <th><span>{{ $totalReceived }}</span></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Fuel Quantities Table -->
        <div class="text-center card">
            <div class="card-body">
                <h4 class="mb-0 alert bg-primary-o-50 text-primary">كميات المحروقات</h4>
                <table class="table table-striped table-hover table-checkable" id="myTable">
                    <thead class="text-white bg-primary">
                        <tr>
                            <th>رصيد سابق</th>
                            @for ($i = 1; $i <= 12; $i++)
                                <th>شهر {{ $i }}</th>
                            @endfor
                            <th>عدد الوارد</th>
                            <th>مجموع الوارد</th>
                            <th>المتبقي من السولار</th>
                            <th>المتبقي من البنزين</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $previousBalance }} لتر</td>
                            @for ($i = 1; $i <= 12; $i++)
                                <td>{{ $dieselData[$i] ?? 0 }} لتر</td>
                            @endfor
                            <td>{{ $totalEntries }}</td>
                            <td>{{ $totalReceived }} لتر</td>
                            <td>{{ $remainingDiesel }} لتر</td>
                            <td>{{ $remainingGasoline }} لتر</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
