@extends('layout.master')

@section('title')
    اضافة صادر الأرشيف
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الأرشيف
@endsection

@section('sub_title')
    اضافة صادر
@endsection

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !exportant;
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
                            <h3 class="card-label"> بيانات الأرشيف الصادر <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="https://master/CoreArchive/public/export" class="btn btn-info font-weight-bolder">
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
                                </span>عرض صادر الأرشيف</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('export.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body">
                            <div class="form-group row p-3">
                                <label for="export_name" class="col-lg-2 col-form-label ">
                                    <h6><strong>الجهةالصادر منها :</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="export_name" id="export_name" type="text" class="form-control"
                                             placeholder="ادخل  الجهة الصادر منها">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row p-3">
                                <label for="export_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الجهة الصادر منها:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="export_num" type="number" min="0" class="form-control"
                                            id="export_num" placeholder="ادخل رقم الجهة الصادر منها" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success mr-2">حفظ</button>
                                    <button type="reset" class="btn btn-danger mr-2">إلغاء</button>
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
