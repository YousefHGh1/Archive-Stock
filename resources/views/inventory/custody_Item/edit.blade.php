@extends('layout.master')

@section('title')
    تعديل الصنف
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الأصناف
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
                            <h3 class="card-label"> تعديل بيانات الصنف <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('item.update', $item->id) }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6> العائلة:</h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <select class="form-control selectpicker " data-size="7" tabindex="null"
                                            data-live-search="true" title="أدخل اسم العائلة" name="category_id" id="category_id">
                                            <option value="0" disabled selected>العائلات</option>
                                            @foreach ($category as $categorys)
                                                <option value="{{ $categorys->id }}" {{ $item->category_id == $categorys->id ? 'selected' : '' }}>
                                                    {{ $categorys->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 form-group row">
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6> الوحدات:</h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-grup">
                                        <select class="form-control selectpicker " data-size="7" tabindex="null"
                                            data-live-search="true" ر name="unit_id" id="unit_id">
                                            <option value="0" disabled selected>الوحدة</option>
                                            @foreach ($unit as $units)
                                                <option value="{{ $units->id }}"
                                                    {{ $item->unit_id == $units->id ? 'selected' : '' }}>
                                                    {{ $units->unit_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="p-3 form-group row">
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الصنف:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="item_num" id="item_num" type="number" min="0"
                                            class="form-control" value="{{ $item->item_num }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="item_name" class="col-lg-2 col-form-label ">
                                    <h6><strong>اسم الصنف:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="item_name" type="text" class="form-control" id="item_name"
                                            value="{{ $item->item_name }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="open_balance" class="col-lg-2 col-form-label ">
                                    <h6><strong>رصيد الصنف:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="open_balance" id="open_balance" type="number" min="0"
                                            class="form-control" value="{{ $item->open_balance }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="low_limit" class="col-lg-2 col-form-label ">
                                    <h6><strong>الحد الأدنى:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="low_limit" id="low_limit" type="number" min="0"
                                            class="form-control" value="{{ $item->low_limit }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">تعديل</button>
                                    <button type="reset" class="btn btn-danger">إلغاء</button>
                                    <a type="submit" href="{{ route('item.create') }}"
                                        class="ml-2 btn btn-primary">عودة</a>

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
