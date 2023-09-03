@extends('layout.master')

@section('title')
    عرض المستخدمين
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    المستخدمين
@endsection
@section('sub_title')
    عرض المستخدمين
@endsection
@section('css')
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.foundation.min.css') }}">

    <style>
        .dataTables_wrapper .dataTable th,
        .dataTables_wrapper .dataTable td {
            padding-right: 15px !important;
            /* margin: 10px !important; */
            text-align: right;

        }

        .dataTables_wrapper .dataTable tfoot th,
        .dataTables_wrapper .dataTable thead th {
            padding-right: 0px !important;
            padding-left: 0px !important;
            text-align: right;
        }

        div.dt-buttons {
            top: 50%;
            left: 8%;
            width: 200px;
            margin-left: -85px;
            margin-top: -35px;
            margin-bottom: -5px;
            text-align: center;
            padding: 1.8rem 0
        }

        div.dt-buttons .dt-button {
            margin: -2px !important;
        }

        .dataTables_wrapper .dataTable thead th {
            background-color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">عرض المستخدمين </h3>
                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->
                    <a href="{{ url('/user/create') }}" class="btn btn-primary font-weight-bolder">
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
                        </span>إنشاء مستخدم جديد</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table id="example" class="table table-striped dt-responsive" style="width:100%">
                    <thead class="thead_dark">
                        <tr>
                            <th width="10%">{{ ' الرقم الوظيفي' }}</th>
                            <th width="25%">{{ 'اسم الموظف  ' }}</th>
                            <th width="25%">{{ 'القسم الرئيسي  ' }}</th>
                            <th width="20%">{{ ' القسم الفرعي' }}</th>

                            <th width="10%">{{ 'الاجراءات ' }} </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user as $users)
                            <tr>
                                <td> {{ $users->name }}</td>
                                <td> {{ $users->employee_name }}</td>
                                <td> {{ $users->Section->name_section }}</td>
                                <td>{{ $users->subSection->name }}</td>


                                <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                    class="datatable-cell">
                                    <span style="overflow: visible; position: relative; width: 110px;">

                                        <a href="{{ url('/user/' . $users->id . '/edit') }}"
                                            class="btn btn-sm btn-clean btn-icon" title="Edit details"><i
                                                class="la la-edit"></i></a>

                                    </span>
                                </td>
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
