@extends('layout.master')

@section('title')
    إضافة المخازن
@endsection

@section('page_title')
    إضافة المخازن
@endsection

@section('sub_main')
    المخازن
@endsection

@section('sub_title')
    صفحة المخازن
@endsection

@section('css')
    <style>
        .form-label:focus {
            border-color: #df10e667;
            box-shadow: 0 0 0 0.2rem rgba(7, 125, 221, 0.25);
        }
    </style>
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->

            <!--begin::Card body-->
            <div class=" card-body">

                <div class="card card-custom gutter-b example example-compact ">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> بيانات المخازن <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/inventory/store') }}" class="btn btn-info font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="9" cy="13" r="6" />
                                            <path
                                                d="M8.8012943,7.00241933 C9.83837773,3.20768121 11.7781343,4 14,4 C17.3137083,4 20,6.6862913 20,10 C20,12.2218437 18.7923188,14.1616223 16.9973803,13.1987037 C16.9991904,13.1326638 17,13.0664274 17,13 C17,10.381722 13.418278,7 9,7 C8.93337236,7 8.86733422,7.00080962 8.8012943,7.00241933 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>عرض المخازن </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form action="{{ route('store.store') }}" method="POST" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="store_num" class="col-2 col-form-label">
                                    <h5><strong>رقم المخزن</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="store_num" type="number" min="0"
                                        class="@error('store_num') is-invalid @enderror form-control" id="store_num"
                                        placeholder="ادخل رقم المخزن " />
                                    @error('store_num')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label for="store_name" class="col-2 col-form-label">
                                    <h5><strong>اسم المخزن</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="store_name" type="text" min="0"
                                        class="@error('store_name') is-invalid @enderror form-control" id="store_name"
                                        placeholder="ادخل اسم المخزن " />
                                    @error('store_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-2 col-form-label">
                                    <h5><strong>عنوان المخزن</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="address" type="text"
                                        class="@error('address') is-invalid @enderror form-control" id="address"
                                        placeholder="ادخل عنوان المخزن " />
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">

                                <div class="col-3"></div>
                                {{-- action --}}
                                <div class="col-9">
                                    <button type="save"
                                        class="mr-2 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">حفظ</button>
                                    <button type="reset"
                                        class="mr-2 btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">الغاء</button>
                                        <x-add-resource-button />

                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>
            <!--end::Card body-->
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
@endsection
