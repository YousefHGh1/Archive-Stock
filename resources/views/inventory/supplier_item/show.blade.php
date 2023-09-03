@extends('layout.master')

@section('title')
    عرض الموردين
@endsection

@section('page_title')
الموردين
@endsection

@section('sub_main')
الموردين
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
                <h3 class="card-title">بيانات الموردين</h3>
            </div>
            <!--begin::Form-->
                <div class="card-body">

                    <div class="form-group row">
                        <label for="supplier_item_num" class="col-3 col-form-label"><h5><strong>رقم المورد</strong></h5> </label>
                        <div class="col-6 primary">
                            <input name="supplier_item_num" type="number" class="form-control" id="supplier_item_num" value="{{ $supplier_item->supplier_item_num }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label for="supplier_item_name" class="col-3 col-form-label"><h5><strong>اسم المورد</strong></h5> </label>
                        <div class="col-6">
                            <input name="supplier_item_name" type="text" class="form-control" id="supplier_item_name" value="{{ $supplier_item->supplier_item_name }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label for="address" class="col-3 col-form-label"><h5><strong>اسم المورد</strong></h5> </label>
                        <div class="col-6">
                            <input name="address" type="text" class="form-control" id="address" value="{{ $supplier_item->address }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label for="phone" class="col-3 col-form-label"><h5><strong>اسم المورد</strong></h5> </label>
                        <div class="col-6">
                            <input name="phone" type="text" class="form-control" id="phone" value="{{ $supplier_item->phone }}" disabled/>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <a type="submit" href="{{ route('supplier_item.index') }}" class="btn btn-primary mr-2">عودة</a>
                            <a type="submit" href="{{ route('supplier_item.create') }}" class="btn btn-success">الإضافة</a>
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



