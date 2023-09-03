@extends('layout.master')

@section('title')
    اضافة صادر الأرشيف
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الأرشيف
@endsection

@section('sub_title')
    اضافة صادر
@endsection
@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }

        .input-group1 {
            border: 1px solid #d5c1ff !important;
        }

        .input-group1:hover {
            border: none;
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
                            <h3 class="card-label"> بيانات الأرشيف الصادر <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/archiveExport') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض صادر الأرشيف</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('archiveExport.store') }}" method="post" class="form needs-validation "
                        novalidate enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="title" class="col-lg-2 col-form-label ">
                                    <h6><strong>عنوان الموضوع:</strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input name="title" id="title" type="text" class=" @error('title') is-invalid @enderror form-control"
                                            min="0" placeholder="ادخل عنوان الموضوع">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="export_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الجهة الصادر إليها:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group1">
                                        <select class="form-control selectpicker" data-size="7" tabindex="null"
                                            data-live-search="true" title="اختر الجهة الصادر اليها ..." name="export_id"
                                            id="export_id">
                                            @foreach ($export->sortBy('export_name') as $exports)
                                                <option value="{{ $exports->id }}">{{ $exports->export_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('export/create') }}">
                                    <i class="ki ki-solid-plus icon-md pt-3"></i>
                                </a>

                               
                                {{-- Seperator --}}
                                <div class="col-lg-1"></div>

                                <label for="number" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الصادر:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="number" type="number" min="0" class=" @error('number') is-invalid @enderror form-control"
                                            id="number" placeholder="ادخل رقم الصادر" />
                                    </div>
                                </div>
                            </div>


                            <div class="p-3 form-group row">
                                <label for="date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ الصادر:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" type="date" class=" @error('date') is-invalid @enderror form-control" id="date"
                                            placeholder="ادخل تاريخ الصادر" value="{{ date('Y-m-d') }}"/>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <label for="file" class="col-lg-2 col-form-label ">
                                    <h6><strong>مرفق الصادر:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="files[]" type="file" min="0" class=" @error('file') is-invalid @enderror form-control"
                                            id="file" placeholder="ادخل مرفق الصادر" multiple />
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="btn btn-danger">إلغاء</button>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary font-weight-bolder">
                                            الجهات الصادر إليها
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">

                                                <li class="nav-item">
                                                    <a href="{{ url('/export/create') }}" class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i> إضافة الجهات الصادر
                                                        إليها</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ url('/export') }}" class="nav-link">
                                                        <i class="nav-icon flaticon-eye"></i>عرض الجهات الصادر إليها
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
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
