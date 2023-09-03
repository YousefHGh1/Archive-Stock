@extends('layout.master')

@section('title')
    عرض القسم
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
<style>
    .form-label:focus {
        border-color: #df10e667;
        box-shadow: 0 0 0 0.2rem rgba(7, 125, 221, 0.25);
    }
</style>
@endsection

@section('content')
    <!-- Main content -->
<div class="m-content">
@include('layout.error')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">بيانات القسم</h3>
            </div>
            <!--begin::Form-->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label"><h5><strong> القسم</strong></h5></label>
                        <div class="col-6">
                            <input  name="name_section" type="text" class="form-control" id="name_section" value="{{ $subSection->section->name_section }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label"><h5><strong> القسم الفرعي</strong></h5> </label>
                        <div class="col-6">
                            <input name="name" type="text" class="form-control" id="name" value="{{ $subSection->name }}" disabled />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <a type="submit" href="{{ route('subSection.index') }}" class="btn btn-primary mr-2">عودة</a>
                            <a type="submit" href="{{ route('subSection.create') }}" class="btn btn-success">الإضافة</a>
                        </div>
                    </div>
                </div>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
</div>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection



