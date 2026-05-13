@extends('layout.master')

@section('title')
    عرض الصادر التاريخي
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    التقارير
@endsection
@section('sub_title')
    صادر المحروقات
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

        <!-- search  /-->
        <div class="card card-custom">
            <div class="flex-wrap pt-5 pb-0 border-0 card-header">
                <div class="card-title">
                    <h3 class="card-label">تقارير صادر المحروقات التاريخي </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <a class="px-6 btn btn-light-primary font-weight-bold"
                        href="{{ route('historical.totalreport') }}">تقارير المجاميع
                    </a>
                    <!--end::Button-->
                </div>
            </div>

            <div class="accordion accordion-light " id="accordionExample5">
                <div class="card">
                    <div class="p-5 card-header" style="cursor: auto" id="headingOne5">
                        <div class="card-title">
                            <div data-toggle="collapse" data-target="#collapseOne5"
                                class="btn btn-primary advance_search font-weight-bolder "><i class="flaticon-search"></i>
                                بحــــــث متــقـــــــــدم</div>
                        </div>
                    </div>
                    <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5">
                        <div class="mb-6 row ">

                            <div class="col-lg-6">
                                <label>التاريخ:</label>
                                <form action="{{ route('historical.exportindex') }}" method="GET" class="pr-5 form-group">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="p-0 col-4">
                                            <input name="start_date" type="date" class="form-control"
                                                value="{{ old('start_date') }}" />
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <div class="p-0 col-4">
                                            <input name="end_date" type="date" class="form-control"
                                                value="{{ old('end_date') }}" />
                                        </div>
                                        <div class="mt-auto mb-auto col-lg-2">
                                            <input type="submit" class="btn btn-primary btn-primary--icon"
                                                value="بحث" />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-3">
                                <label>الايصال:</label>
                                <form action="{{ route('historical.exportindex') }}" method="GET" class="pr-5 form-group">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="p-0 col-4">
                                            <input name="startNum" type="text" class="form-control"
                                                value="{{ old('startNum') }}" />
                                        </div>
                                        *
                                        <div class="p-0 col-4">
                                            <input name="endNum" type="text" class="form-control"
                                                value="{{ old('endNum') }}" />
                                        </div>
                                        <div class="mt-auto mb-auto col-lg-2">
                                            <input type="submit" class="btn btn-primary btn-primary--icon"
                                                value="بحث" />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-3">
                                <label>السند:</label>
                                <form action="{{ route('historical.exportindex') }}" method="GET" class="pr-5 form-group">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="p-0 col-4">
                                            <input name="start_voucher" type="text" class="form-control"
                                                value="{{ old('start_voucher') }}" />
                                        </div>
                                        *
                                        <div class="p-0 col-4">
                                            <input name="end_voucher" type="text" class="form-control"
                                                value="{{ old('end_voucher') }}" />
                                        </div>
                                        <div class="mt-auto mb-auto col-lg-2">
                                            <input type="submit" class="btn btn-primary btn-primary--icon"
                                                value="بحث" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="mb-6 col-lg-12">
                            <form action="{{ route('historical.exportindex') }}" method="GET" class="pl-5 form-group">
                                @csrf
                                <div class="form-group row">
                                    <div class="p-0 col-2">
                                        <input name="start_date" type="date" class="form-control"
                                            value="{{ old('start_date') }}" />
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                    </div>
                                    <div class="p-0 col-2">
                                        <input name="end_date" type="date" class="form-control"
                                            value="{{ old('end_date') }}" />
                                    </div>

                                    <div class="pl-5 pr-5 col-3">
                                        <select name="section_id" id="section_id" class="form-control selectpicker"
                                            data-size="7" data-live-search="true">
                                            <option value="">اختر الدائرة</option>
                                            @foreach ($section as $sections)
                                                <option value="{{ $sections->id }}"
                                                    {{ old('section_id') == $sections->id ? 'selected' : '' }}>
                                                    {{ $sections->name_section }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="pl-2 pr-5 col-3">
                                        <select name="sub_section_id" id="sub_section_id" class="form-control"
                                            data-live-search="true">
                                            <option value="">اختر القسم </option>
                                            @foreach ($subSection as $subSections)
                                                <option value="{{ $subSections->id }}"
                                                    {{ old('sub_section_id') == $subSections->id ? 'selected' : '' }}>
                                                    {{ $subSections->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-auto mb-auto col-lg-1">
                                        <input type="submit" class="btn btn-primary btn-primary--icon" value="بحث" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            {{-- *********************** --}}
            <div class="card-body">
                <!--begin: Datatable-->
                <table id="example" class="table table-striped dt-responsive" style="width:100%">
                    <thead class="thead_dark">
                        <tr>
                            <th>{{ 'نوع المحروقات' }}</th>
                            <th>{{ 'الدائرة' }}</th>
                            <th>{{ 'القسم الفرعي' }}</th>
                            <th>{{ 'سند الصادر ' }} </th>
                            <th>{{ 'كمية الصادر ' }} </th>
                            <th>{{ 'رقم الإيصال' }}</th>
                            <th>{{ 'رقم الدفتر' }}</th>
                            <th>{{ 'تاريخ الصادر' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dieselExports as $dieselexport)
                            <tr>
                                <td>{{ $dieselexport->typesfuel->name }}</td>
                                <td>{{ $dieselexport->section->name_section }}</td>
                                <td>{{ $dieselexport->subSection->name }}</td>
                                <td>{{ $dieselexport->voucher }}</td>
                                <td>{{ $dieselexport->quantity }}</td>
                                <td>{{ $dieselexport->num_section }}</td>
                                <td>{{ $dieselexport->num_note }}</td>
                                <td>{{ $dieselexport->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>

            <div class="text-center card">
                <div class="card-body">
                    <h4 class="mb-0 alert bg-primary-o-50 text-primary">كميات المحروقات</h4>
                    <table class="table table-striped table-hover table-checkable" id="myTable">
                        <thead class="text-white bg-primary">
                            <tr>
                                {{-- <th>رصيد سابق</th> --}}
                                @for ($i = 1; $i <= 12; $i++)
                                    <th>شهر {{ $i }}</th>
                                @endfor
                                <th>عدد الصادر</th>
                                <th>مجموع الصادر</th>
                                {{-- <th>المتبقي من السولار</th> --}}
                                {{-- <th>المتبقي من البنزين</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>{{ $previousBalance }} لتر</td> --}}
                                @for ($i = 1; $i <= 12; $i++)
                                    <td>{{ $dieselData[$i] ?? 0 }} لتر</td>
                                @endfor
                                <td>{{ $totalEntries }}</td>
                                <td>{{ $totalExported }} لتر</td>
                                {{-- <td>{{ $remainingDiesel }} لتر</td> --}}
                                {{-- <td>{{ $remainingGasoline }} لتر</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
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
    <script>
        $(document).ready(function() {
            $('select[name="section_id"]').on('change', function() {
                var section_id = $(this).val();
                if (section_id) {
                    $.ajax({
                        url: "{{ URL::to('getsub_section') }}/" + section_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_section_id"]').empty();
                            $.each(data, function(id, name) {
                                // Append the correct value (ID) for sub_section_id
                                $('select[name="sub_section_id"]').append(
                                    '<option value="' + id + '">' + name +
                                    '</option>'
                                );
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
