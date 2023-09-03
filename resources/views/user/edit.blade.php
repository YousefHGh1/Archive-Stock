@extends('layout.master')

@section('title')
    تعديل الموظف
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
الموظفين
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
                            <h3 class="card-label"> تعديل بيانات الموظف <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('user.update', $user->id) }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="name" class="col-lg-2 col-form-label ">
                                    <h6><strong>الرقم الوظيفي:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="name" id="name" type="number" class="form-control"
                                            value="{{ $user->name }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="employee_name" class="col-lg-2 col-form-label ">
                                    <h6><strong>اسم الموظف:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="employee_name" id="employee_name" type="text" 
                                            class="form-control" value="{{ $user->employee_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="section_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الدائرة:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <select class="form-control selectpicker " data-size="7" tabindex="null"
                                        data-live-search="true" title="أدخل اسم الدائرة" name="section_id" id="section_id">
                                        <option value="0" disabled selected>الدائرة</option>
                                        @foreach ($section as $sections)
                                            <option value="{{ $sections->id }}" {{ $user->section_id == $sections->id ? 'selected' : '' }}>
                                                {{ $sections->name_section }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="sub_section_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>اسم القسم:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <select class="form-control selectpicker " data-size="7" tabindex="null"
                                        data-live-search="true" title="أدخل اسم القسم" name="sub_section_id" id="sub_section_id">
                                        <option value="0" disabled selected>القسم</option>
                                        @foreach ($subSection as $subSections)
                                            <option value="{{ $subSections->id }}" {{ $user->sub_section_id == $subSections->id ? 'selected' : '' }}>
                                                {{ $subSections->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
