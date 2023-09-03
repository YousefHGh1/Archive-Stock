@extends('layout.master')

@section('title')
    عرض المخازن
@endsection

@section('page_title')
    المخازن
@endsection

@section('sub_main')
المخازن
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

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="col-md-11 card">
            <!--begin::Card body-->
            <div class=" card-body">

            <div class="card-header">
                <h3 class="card-title">بيانات المخازن</h3>
            </div>
            <!--begin::Form-->
                <div class="card-body">

                    <div class="form-group row">
                        <label for="store_num" class="col-3 col-form-label"><h5><strong>رقم المخزن</strong></h5> </label>
                        <div class="col-6 primary">
                            <input name="store_num" type="number" class="form-control" id="store_num" value="{{ $store->store_num }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label for="store_name" class="col-3 col-form-label"><h5><strong>اسم المخزن</strong></h5> </label>
                        <div class="col-6">
                            <input name="store_name" type="text" class="form-control" id="store_name" value="{{ $store->store_name }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label for="address" class="col-3 col-form-label"><h5><strong>اسم المخزن</strong></h5> </label>
                        <div class="col-6">
                            <input name="address" type="text" class="form-control" id="address" value="{{ $store->address }}" disabled/>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <a type="submit" href="{{ route('store.index') }}" class="btn btn-primary mr-2">عودة</a>
                            <a type="submit" href="{{ route('store.create') }}" class="btn btn-success">الإضافة</a>
                        </div>
                    </div>
                </div>
            <!--end::Form-->


            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>

@endsection

@section('scripts')

@endsection



