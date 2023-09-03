@extends('layout.master')

@section('title')
    تعديل العملة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    العملات
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
                            <h3 class="card-label"> تعديل بيانات العملة <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('currency.update', $currency->id) }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="name" class="col-lg-2 col-form-label ">
                                    <h6><strong>اسم العملة:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="name" id="name" type="text" class="form-control"
                                        value="{{$currency->name}}">
                                        @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
 
                                <!-- نموذج HTML لإدخال قيمة value -->

                                    <label for="value" class="col-lg-2 col-form-label">
                                        <h6><strong>قيمة العملة:</strong></h6>
                                    </label>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <input name="value" type="number" min="0" class="form-control"
                                                id="value" value="{{$currency->value}}"    />
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
