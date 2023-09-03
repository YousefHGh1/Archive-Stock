@extends('layout.master')

@section('title')
    اضافة إخطار
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الإخطارات
@endsection

@section('sub_title')
اضافة إخطار
@endsection

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }

        .btn.btn-light:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-light:focus:not(.btn-text), .btn.btn-light.focus:not(.btn-text) {
            border: 1px solid #d5c1ff !important;

        }

        .btn.dropdown-toggle.btn-light.bs-placeholder{
            border: 1px solid #d5c1ff !important;

        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> بيانات الإخطارات <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/court') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض الإخطارات</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('court.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="ido" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الهوية:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="ido" type="number" min="0" class="@error('ido') is-invalid @enderror form-control"
                                            id="ido" placeholder="ادخل رقم الهوية" />
                                    </div>
                                </div>
                            </div>


                            <div class="p-3 form-group row">
                                <label for="defendant" class="col-lg-2 col-form-label ">
                                    <h6><strong>المدعي عليه:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="defendant" id="defendant" type="text" class="@error('defendant') is-invalid @enderror form-control"
                                            placeholder="ادخل المدعي عليه">
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>

                                <label for="defendant1" class="col-lg-2 col-form-label ">
                                    <h6><strong>المستفيد:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="defendant1" id="defendant1" type="text" class="@error('defendant1') is-invalid @enderror form-control"
                                            placeholder="ادخل المدعي عليه">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="address" class="col-lg-2 col-form-label ">
                                    <h6><strong>العنوان:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="address" id="address" type="text" class="@error('address') is-invalid @enderror form-control"
                                            placeholder="ادخل العنوان">
                                    </div>
                                </div>

                                <div class="col-lg-1"></div>
                                <label for="address_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الموقع:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="address_num" type="number" min="0" class="@error('address_num') is-invalid @enderror form-control"
                                            id="address_num" placeholder="ادخل رقم الموقع" />
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="jibaya_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم المشترك:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="jibaya_num" type="number" min="0" class="@error('jibaya_num') is-invalid @enderror form-control"
                                            id="jibaya_num" placeholder="ادخل رقم المشترك" />
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <label for="amount" class="col-lg-2 col-form-label ">
                                    <h6><strong>المبلغ:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="amount" type="number" min="0" class="@error('amount') is-invalid @enderror form-control"
                                            id="amount" placeholder="ادخل المبلغ" />
                                    </div>
                                </div>
                            </div>




                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>
                                
                                </div>

                            </div>
                        </div>


                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
