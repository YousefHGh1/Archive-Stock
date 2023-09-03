@extends('/layout.master')

@section('title')
    اضافة الأصناف
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الأصناف
@endsection

@section('sub_title')
    اضافة الأصناف
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
                            <h3 class="card-label"> بيانات الأصناف <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/inventory/item') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض الأصناف </a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('item.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        {{-- 'category_id', 'unit_id', 'item_num', 'item_name','open_balance', 'low_limit', --}}
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="item_name" class="col-lg-2 col-form-label ">
                                    <h6><strong>اسم الصنف:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="item_name" type="text" class="form-control" id="item_name"
                                            placeholder="ادخل اسم الصنف" />
                                    </div>
                                </div>

                                
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الصنف:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="item_num" id="item_num" type="number" min="0"
                                            class="form-control" placeholder="ادخل رقم الصنف">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6> <strong>العائلة:</strong> </h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select class="form-control selectpicker " data-size="7" tabindex="null"
                                            data-live-search="true" title="أدخل اسم العائلة" name="category_id"
                                            id="category_id">
                                            @foreach ($category as $categorys)
                                                <option value="{{ $categorys->id }}">
                                                    {{ $categorys->category_name }}  {{ $categorys->category_num }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('inventory/category/create') }}">
                                    <i class="ki ki-solid-plus icon-md p-3"></i>
                                </a>

                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6> <strong>الوحدة:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select class="form-control selectpicker " data-size="7" tabindex="null"
                                            data-live-search="true" title="أدخل اسم الوحدة" name="unit_id" id="unit_id">
                                            @foreach ($unit as $units)
                                                <option value="{{ $units->id }}">
                                                    {{ $units->unit_name }}  {{ $units->unit_num }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('inventory/unit/create') }}">
                                    <i class="ki ki-solid-plus icon-md p-3"></i>
                                </a>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="open_balance" class="col-lg-2 col-form-label ">
                                    <h6><strong>رصيد الافتتاحي:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="open_balance" id="open_balance" type="number" min="0"
                                            class="form-control" placeholder="ادخل رصيد الافتتاحي">
                                    </div>
                                </div>
                                <label for="low_limit" class="col-lg-2 col-form-label ">
                                    <h6><strong>الحد الأدنى:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="low_limit" id="low_limit" type="number" min="0"
                                            class="form-control" placeholder="ادخل الحد الأدنى">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row" hidden>
                                <label for="balance" class="col-lg-2 col-form-label">
                                    <h6><strong>الرصيد:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="balance" id="balance" type="number" min="0"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>
                                    <x-add-resource-button />

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
