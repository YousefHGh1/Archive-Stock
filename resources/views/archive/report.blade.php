@extends('layout.master')

@section('title')
    عرض وارد الأرشيف
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    وارد الأرشيف
@endsection
@section('sub_title')
    صفحة العرض
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
            <div class="flex-wrap pb-0 border-0 card-header">
                <div class="card-title">
                    <h3 class="card-label">بيانات البريد الوارد: {{ App\Models\Archive::count() }} </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ url('/archive/create') }}" class="btn btn-primary font-weight-bolder">
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
                        </span>إنشاء وارد جديد</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin:Search Date-->
                <div class="accordion accordion-light " id="accordionExample5" style="direction: rtl;">
                    <div class="card">
                        <div class="card-header " id="headingOne5">
                            <div class="card-title">
                                <div data-toggle="collapse" data-target="#collapseOne5"
                                    class="btn btn-primary advance_search font-weight-bolder "><i
                                        class="flaticon-search"></i>
                                    بحــــــــــــث متــقـــــــــــــــــــــــدم</div>
                            </div>
                        </div>
                        <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5"
                            style="direction: rtl;">
                            <div class="card-body1">
                                <div class="mb-6 col-lg-9">
                                    <label>التاريخ:</label>
                                    <form action="{{ url('archive/searchdate') }}" method="POST" class="pr-5 form-group">
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
                <!--End:Search Date-->
                <!--begin: Datatable-->
                <table id="example" class="table dt-responsive" style="width:100%; padding:0%">
                    <thead class="thead_dark">
                        <tr>
                            <th width="8%">{{ 'رقم الوارد' }}</th>
                            <th width="10%">{{ 'تاريخ الوارد ' }} </th>
                            <th width="15%">{{ 'الجهة الوارد منها' }}</th>
                            <th width="20%">{{ 'عنون الموضوع' }}</th>
                            <th width="2%">{{ 'رقم الوزارة' }}</th>
                            <th width="20%">{{ 'مرفق الوارد' }}</th>
                            <th width="8%">{{ 'الاجراءات ' }} </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($archive as $archives)
                            {{-- @if (date('Y', strtotime($archives->date)) == $selectedYear) --}}
                                <tr>
                                    <td>{{ $archives->number }}</td>
                                    <td>{{ $archives->date }}</td>
                                    <td> {{ $archives->import->import_name }}</td>
                                    <td> {{ $archives->title }}</td>
                                    <td>{{ $archives->num_Ministry }}</td>

                                    <td>
                                        @if ($archives->files)
                                            @foreach (json_decode($archives->files) as $file)
                                                <a href="{{ asset('uploads/' . $file) }}"
                                                    target="_blank">{{ $file }}</a><br>
                                            @endforeach
                                        @endif
                                    </td>


                                    <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                        class="datatable-cell">
                                        <span style="overflow: visible; position: relative; width: 110px;">

                                            {{-- <a href="#" onclick="confirmDelete('{{ $archives->id }}', this)"
                                        class="btn btn-sm btn-clean btn-icon" title="Delete"><i
                                            class="la la-trash"></i></a> --}}

                                            <form method="POST" action="{{ url('/archive' . '/' . $archives->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-clean btn-icon"
                                                    title="Delete archive"
                                                    onclick="return confirm('هل تريد تأكيد عملية الحذف؟؟؟')"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg></button>
                                            </form>

                                            <a href="{{ url('/archive/' . $archives->id . '/edit') }}"
                                                class="btn btn-sm btn-clean btn-icon" title="Edit details"><i
                                                    class="la la-edit"></i></a>

                                        </span>
                                    </td>
                                </tr>
                            {{-- @endif --}}
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
