@extends('layout.master')

@section('title')
    تعديل الوارد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الوارد
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
                            <h3 class="card-label"> تعديل بيانات التوريد <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('archive.update', $archive->id) }}" method="post" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="title" class="col-lg-2 col-form-label ">
                                    <h6><strong>عنوان الموضوع:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="title" id="title" type="text" class="form-control"
                                            value="{{ $archive->title }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="import_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الجهة الوارد منها:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group1">
                                        <select class="form-control selectpicker" data-size="7" tabindex="null"
                                            data-live-search="true" title="ادخل الجهة الوارد منها ..." name="import_id"
                                            id="import_id">
                                            @foreach ($import as $imports)
                                                <option value="{{ $imports->id }}"
                                                    {{ $archive->import_id == $imports->id ? 'selected' : '' }}>
                                                    {{ $imports->import_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <label for="date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ الوارد:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" type="date" class="form-control" id="date"
                                            value="{{ $archive->date }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="number" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم وارد البلدية:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="number" type="number" min="0" class="form-control"
                                            id="number" value="{{ $archive->number }}" />
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <label for="num_Ministry" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم وارد الوزارة:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="num_Ministry" type="text" min="0" class="form-control"
                                            id="num_Ministry" value="{{ $archive->num_Ministry }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="file" class="col-lg-2 col-form-label ">
                                    <h6><strong>مرفق الوارد:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="files[]" type="file" min="0" class="form-control"
                                            id="file" value="{{ $archive->files }}" multiple />
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success mr-2">تعديل</button>
                                    <a href="{{url('archive')}}" class="btn btn-danger">إلغاء</a>
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
