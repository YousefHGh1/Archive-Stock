@extends('layout.master')

@section('title')
    تعديل الصادر
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الصادر
@endsection
@section('sub_title')
    صفحة التعديل
@endsection
@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !exportant;
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
                            <h3 class="card-label"> تعديل بيانات التصدير <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('archiveExport.update', $archiveExport->id) }}" method="post"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group row p-3">
                                <label for="title" class="col-lg-2 col-form-label ">
                                    <h6><strong>عنوان الموضوع:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="title" id="title" type="text" class="form-control"
                                            min="0" value="{{ $archiveExport->title }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row p-3">
                                <label for="export_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الجهة الصادر إليها:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group1">
                                        <select class="form-control selectpicker" data-size="7" tabindex="null"
                                            data-live-search="true" title="ادخل الجهة الوارد منها ..." name="export_id"
                                            id="export_id">
                                            @foreach ($export as $exports)
                                                <option value="{{ $exports->id }}"
                                                    {{ $archiveExport->export_id == $exports->id ? 'selected' : '' }}>
                                                    {{ $exports->export_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row p-3">
                                <label for="number" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الصادر:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="number" type="number" min="0" class="form-control"
                                            id="number" value="{{ $archiveExport->number }}" />
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row p-3">
                                <label for="date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ الصادر:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="date" type="date" class="form-control" id="date"
                                            value="{{ $archiveExport->date }}" />
                                    </div>
                                </div>
                            </div>



                            <div class="p-3 form-group row">
                                <label for="file" class="col-lg-2 col-form-label ">
                                    <h6><strong>مرفق الصادر:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="files[]" type="file" min="0" class="form-control"
                                            id="file" value="{{ $archiveExport->files }}" multiple />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success mr-2">تعديل</button>
                                    <a href="{{ url('archiveExport') }}" class="btn btn-danger">إلغاء</a>
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
