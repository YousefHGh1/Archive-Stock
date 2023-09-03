@extends('layout.master')

@section('title')
    تعديل العائلة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    العائلات
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
                            <h3 class="card-label"> تعديل بيانات العائلة <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('category.update', $category->id) }}" method="post" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="category_name" class="col-lg-2 col-form-label ">
                                    <h6><strong>اسم العائلة:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="category_name" id="category_name" type="text" class="form-control"
                                            value="{{ $category->category_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="category_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم العائلة:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="category_num" id="category_num" type="number" min="0"
                                            class="form-control" value="{{ $category->category_num }}">
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
                                    <a type="submit" href="{{ route('category.create') }}"
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
