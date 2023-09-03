@extends('layout.master')

@section('title')
    تعديل الموردين
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الموردين
@endsection

@section('sub_title')
    صفحة التعديل
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
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="col-md-12 card">

                <!--begin::Card body-->
                <div class="card-body">

                    <div class="card-header">
                        <h3 class="card-title">تعديل بيانات المورد : {{ $supplier_item->supplier_item_name }}</h3>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('supplier_item.update', $supplier_item->id) }}" method="post"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {!! csrf_field() !!}

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="supplier_item_num" class="col-2 col-form-label">
                                    <h5><strong>رقم المورد</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="supplier_item_num" type="number"
                                        value="{{ $supplier_item->supplier_item_num }}" class="form-control"
                                        id="supplier_item_num" />
                                </div>

                                <label for="supplier_item_name" class="col-2 col-form-label">
                                    <h5><strong>اسم المورد</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="supplier_item_name" type="text"
                                        value="{{ $supplier_item->supplier_item_name }}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-2 col-form-label">
                                    <h5><strong>عنوان المورد</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="address" type="text" value="{{ $supplier_item->address }}"
                                        class="form-control" />
                                </div>

                                <label for="phone" class="col-2 col-form-label">
                                    <h5><strong>هاتف المورد</strong></h5>
                                </label>
                                <div class="col-3 primary">
                                    <input name="phone" type="text" value="{{ $supplier_item->phone }}"
                                        class="form-control" />
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-9">
                                    <button type="submit" class="mr-2 btn btn-primary">تعديل</button>
                                    <button type="reset" class="btn btn-secondary">الغاء</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
@endsection

@section('scripts')
@endsection
