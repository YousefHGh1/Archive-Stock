@extends('layout.master')

@section('title')
    عرض مراسلة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الجباية
@endsection
@section('sub_title')
    صفحة العرض
@endsection
@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> بيانات الجباية المرسلة <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="https://master/CoreArchive/public/sendNotification/jibayaNot"
                                class="btn btn-info font-weight-bolder">
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
                                </span>عرض المراسلات</a>
                        </div>
                    </div>
                    <!--begin::Form-->

                    <div class="card-body" style="margin:20px;">

                        <div class="form-group row pb-5">
                            <label for="sender" class="col-lg-2 col-form-label text-lg-right">المرسل :</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="sender" id="sender" type="text" class="form-control"
                                        value="{{ $jibayaNot->sender }}" disabled>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row pb-5">
                            <label for="reciver" class="col-lg-2 col-form-label text-lg-right"> المستقبل:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="reciver" type="text" class="form-control" id="reciver"
                                        value="{{ $jibayaNot->reciver }}" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-lg-2 col-form-label text-lg-right"> الملف:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="file" type="text" class="form-control" id="file"
                                        value="{{ $jibayaNot->file }}" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-2 col-form-label text-lg-right"> الموضوع:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="description" type="text" class="form-control" id="description"
                                        value="{{ $jibayaNot->description }}" disabled />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
