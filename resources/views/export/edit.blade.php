@extends('layout.master')

@section('title')
    تعديل الجهات الصادر اليها
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
الجهات الصادر اليها
@endsection
@section('sub_title')
    صفحة التعديل
@endsection
@section('css')
    <style>
        input {
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
                            <h3 class="card-label"> تعديل الجهات الصادر اليها <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('export.update', $export->id) }}" method="post" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">



                            <div class="form-group row p-3">
                                <label for="export_name" class="col-lg-2 col-form-label ">
                                    <h6><strong>الجهة الصادر منها:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="export_name" id="export_name" type="text" class="form-control"
                                            value="{{ $export->export_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row p-3">
                                <label for="export_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الجهة :</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="export_num" type="number" min="0" class="form-control"
                                            id="export_num" value="{{ $export->export_num }}" />
                                    </div>
                                </div>
                            </div>





                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success mr-2">تعديل</button>
                                    <button type="reset" class="btn btn-danger">إلغاء</button>
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
