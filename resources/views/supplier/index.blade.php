@extends('layout.master')

@section('title')
    عرض الموردين
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الموردين
@endsection
@section('sub_title')
    صفحة العرض
@endsection
@section('css')
@endsection

@section('content')
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="flex-wrap pt-6 pb-0 border-0 card-header">
                <div class="card-title">
                    <h3 class="card-label">عرض الموردين </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="mr-2 dropdown dropdown-inline">
                        <a href="{{ route('diesel.create') }}" class="btn btn-success font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect fill="#000000" x="4" y="11" width="16" height="2"
                                            rx="1" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                            x="4" y="11" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                                <!--end::Svg Icon-->
                            </span>
                            إنشاء وارد المحروقات</a>
                        <!--begin::Dropdown Menu-->

                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="{{ route('supplier.create') }}" class="btn btn-primary font-weight-bolder">
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
                        </span>إنشاء مورد جديد</a>
                    <!--end::Button-->

                </div>


            </div>
            <div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="my-2 col-md-4 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="ابحث..."
                                            id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-5 col-lg-3 col-xl-4 mt-lg-0">
                                    <a href="#" class="px-6 btn btn-light-primary font-weight-bold">البحث</a>
                                </div>
                                {{-- <div class="my-2 col-md-4 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mb-0 mr-3 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div> --}}
                                {{-- <div class="my-2 col-md-4 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mb-0 mr-3 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select>
                                </div>
                            </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ 'اسم المورد' }}</th>
                            <th>{{ 'رقم المورد' }}</th>
                            {{-- <th title="Field #7">Status</th> --}}
                            <th>{{ 'الإجراءات' }}</th>


                        </tr>
                    </thead>

                    <tbody class="datatable-body" style="">
                        @foreach ($supplier as $suppliers)
                            <tr data-row="0" class="datatable-row" style="left: 0px;">
                                <td data-field="OrderID" aria-label="0374-5070" class="datatable-cell"><span
                                        style="width: 10px;">{{ $suppliers->id }}</span></td>
                                <td data-field="OrderID" aria-label="0374-5070" class="datatable-cell"><span
                                        style="width: 137px;">{{ $suppliers->name_supplier }}</span></td>
                                <td data-field="OrderID" aria-label="0374-5070" class="datatable-cell"><span
                                        style="width: 137px;">{{ $suppliers->num_supplier }}</span></td>


                                {{-- <td class="text-right">3</td> --}}

                                <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                    class="datatable-cell">
                                    <span style="overflow: visible; position: relative; width: 110px;">

                                        <a href="#" onclick="confirmDelete('{{ $suppliers->id }}', this)"
                                            class="btn btn-sm btn-clean btn-icon" title="Delete"><i
                                                class="la la-trash"></i></a>
                                        <a href="{{ url('/supplier/' . $suppliers->id . '/edit') }}"
                                            class="btn btn-sm btn-clean btn-icon" title="Edit details"><i
                                                class="la la-edit"></i></a>

                                        <div class="dropdown dropdown-inline">
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                                data-toggle="dropdown">
                                                <i class="la la-cog"></i>
                                            </a>

                                            {{-- <a href="#" onclick="confirmDelete('{{$user->id}}', this)"
                                                    class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="nav nav-hoverable flex-column">
                                                    <li class="nav-item"><a class="nav-link" href="#"><i
                                                                class="nav-icon la la-edit"></i><span
                                                                class="nav-text">Edit Details</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#"><i
                                                                class="nav-icon la la-leaf"></i><span
                                                                class="nav-text">Update Status</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#"><i
                                                                class="nav-icon la la-print"></i><span
                                                                class="nav-text">Print</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
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
    <script>
        function confirmDelete(id, reference) {
            Swal.fire({
                title: 'هل تريد الحذف؟',
                text: "لن تتمكن من التراجع عن هذا",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'نعم, احذف!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id, reference);
                }
            });
        }

        function performDelete(id, reference) {
            axios.delete('/supplier/' + id)
                .then(function(response) {
                    console.log(response);
                    // toastr.success(response.data.message);
                    reference.closest('tr').remove();
                    showMessage(response.data);
                })
                .catch(function(error) {
                    console.log(error.response);
                    // toastr.error(error.response.data.message);
                    showMessage(error.response.data);
                });
        }

        function showMessage(message) {
            Swal.fire(
                'تم الحذف بنجاح!',
                'تم حذف ملفك.',
                'success'
            );
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#kt_datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });
        });
    </script>
@endsection
