@extends('layout.master')

@section('title')
    عرض الأقسام
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الأقسام
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
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">عرض الأقسام </h3></div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>تصدير</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">اختر:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">طباعة</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">نسخ</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">اكسل</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="https://master/CoreArchive/public/subcensorship/create" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>إنشاء قسم جديد</a>
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
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="ابحث..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">البحث</a>
                            </div>
                            {{-- <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
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
                            {{-- <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
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
                        <th >#</th>
                        <th>{{' القسم'}}</th>
                        <th>{{'رقم القسم'}}</th>
                        {{-- <th title="Field #7">Status</th> --}}
                        <th>{{'الإجراءات'}}</th>


                    </tr>
                </thead>

                <tbody class="datatable-body" style="">
                    @foreach($subCensorship as $subCensorships)

                    <tr data-row="0" class="datatable-row" style="left: 0px;">
                        <td data-field="OrderID" aria-label="0374-5070" class="datatable-cell"><span
                            style="width: 10px;">{{$subCensorships->id}}</span></td>
                    <td data-field="OrderID" aria-label="0374-5070" class="datatable-cell"><span
                        style="width: 137px;">{{$subCensorships->name}}</span></td>
                        <td data-field="OrderID" aria-label="0374-5070" class="datatable-cell"><span
                            style="width: 137px;">{{$subCensorships->number}}</span></td>


                            {{-- <td class="text-right">3</td> --}}

                            <td data-field="Actions" data-autohide-disabled="false" aria-label="null" class="datatable-cell">
                                <span style="overflow: visible; position: relative; width: 110px;">

                                             <a href="#" onclick="confirmDelete('{{$subCensorships->id}}', this)" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>
                                            <a href="{{ url('/subCensorship/' . $subCensorships->id . '/edit') }}" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>

                                            <div class="dropdown dropdown-inline">
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                                    <i class="la la-cog"></i>
                                                </a>

                                                {{-- <a href="#" onclick="confirmDelete('{{$user->id}}', this)"
                                                    class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                            <ul class="nav nav-hoverable flex-column">
                                                                <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>
                                                                <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>
                                                                <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>
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
        axios.delete('/subCensorship/'+id)
        .then(function (response) {
            console.log(response);
            // toastr.success(response.data.message);
            reference.closest('tr').remove();
            showMessage(response.data);
        })
        .catch(function (error) {
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
