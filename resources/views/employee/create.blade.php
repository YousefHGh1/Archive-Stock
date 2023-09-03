@extends('layout.master')
@section('title')
    اضافة مستخدم
@endsection
@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الموظفين
@endsection
@section('sub_title')
    صفحة الإضافة
@endsection
@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> بيانات الموظفين <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('employee') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض الموظفين </a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('employee.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form" autocomplete="off">
                        @csrf
                        {!! csrf_field() !!}

                        <center>
                            <!--begin::Form group-->
                            <div class="pt-5 pl-3 form-group row">
                                <label for="employee_name" class="col-lg-2 col-form-label "
                                    value="{{ __('employee_name') }}">
                                    <h6><strong> اسم الموظف:</strong></h6>
                                </label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="@error('employee_name') is-invalid @enderror form-control"
                                            id="employee_name" type="text" name="employee_name"
                                            :value="old('employee_name')" required autofocus autocomplete="employee_name" />

                                    </div>
                                </div>
                            </div>
                            <!--end::Form group-->



                            <!--begin::Form group-->
                            <div class="p-3 form-group row">
                                <label for="section_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الدائرة<span class="mr-1 tx-danger">:</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">

                                        <select name="section_id" id="section_id"
                                            class="@error('section_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم الدائرة">
                                            <option value="">اختر الدائرة</option>
                                            @foreach ($section as $sections)
                                                <option value="{{ $sections->id }}">
                                                    {{ $sections->name_section }}
                                                </option>
                                            @endforeach
                                            @if ($errors->has('section_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('section_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <label for="sub_section_id " class="col-lg-2 col-form-label ">
                                    <h6><strong>القسم <span class="mr-1 tx-danger">:</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select name="sub_section_id" id="sub_section_id"
                                            onclick="console.log($(this).val())" onchange="console.log('change is firing')"
                                            data-size="7" tabindex="null"
                                            class="@error('sub_section_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم القسم ">
                                            <option value="">اختر القسم </option>
                                            @foreach ($subSection as $subSections)
                                                <option value="{{ $subSections->id }}">
                                                    {{ $subSections->name }}
                                                </option>
                                            @endforeach
                                            @if ($errors->has('sub_section_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sub_section_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--end::Form group-->
                        </center>



                        <!--begin::Action-->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="btn btn-danger">إلغاء</button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary font-weight-bolder">
                                            {{-- <i class="ki ki-check icon-sm"></i> --}}
                                            الدوائر و الأقسام
                                        </button>
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">

                                                <li class="nav-item">
                                                    <a href="{{ url('/section/create') }}" class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i> انشاء دائرة</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ url('/subSection/create') }}" class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i>انشاء قسم
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('select[name="section_id"]').on('change', function() {
                var section_id = $(this).val();
                if (section_id) {
                    $.ajax({
                        url: "{{ URL::to('getsub_section') }}/" + section_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_section_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_section_id"]').append(
                                    '<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
