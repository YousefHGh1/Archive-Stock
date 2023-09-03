@extends('layout.master')

@section('title')
    عرض الوحدة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الوحدات
@endsection
@section('sub_title')
    صفحة العرض
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
                            <h3 class="card-label"> عرض بيانات الوحدة <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="p-3 form-group row">
                            <label for="unit_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم الوحدة:</strong></h6>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input name="unit_name" id="unit_name" type="text" class="form-control"
                                        value="{{ $unit->unit_name }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 form-group row">
                            <label for="unit_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم الوحدة:</strong></h6>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input name="unit_num" id="unit_num" type="number" min="0" class="form-control"
                                        value="{{ $unit->unit_num }}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <a type="submit" href="{{ route('unit.create') }}" class="mr-2 btn btn-success">عودة</a>
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
