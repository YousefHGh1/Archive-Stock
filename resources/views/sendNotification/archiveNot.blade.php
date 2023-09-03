@extends('layout.master')

@section('title')
    إرســـال أرشــــيف
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    إرسال بريد
@endsection
@section('sub_title')
    الأرشيف
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
                            <h3 class="card-label"> بيانات المراسلات الداخلية <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('sendNotification/archiveNot') }}" class="m-5 btn btn-info font-weight-bolder">
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
                                </span>عرض المراســلات</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('archiveNot.store') }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}

                        <div class="card-body">

                            <div class="form-group row" hidden>
                                <label for="sender" class="mt-3 col-2 col-form-label">
                                    <h5><strong>المرسل</strong></h5>
                                </label>
                                <div class="col-8">
                                    <input name="sender" type="text"
                                        class="@error('sender') is-invalid @enderror form-control mb-4 mt-3" id="sender"
                                        value="{{ Auth::user()->employee_name }}" />
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="id" class="mt-3 col-2 col-form-label">
                                    <h5><strong>رقم المراسلة</strong></h5>
                                </label>
                                <div class="col-3">
                                    <input name="id" type="number"
                                        class="@error('id') is-invalid @enderror form-control mb-4 mt-3" id="id" />
                                </div>

                                <label for="type_id" class="mt-3 col-lg-2 col-form-label">
                                    <h6><strong>نوع المراسلة:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select class="mt-3 mb-4 form-control selectpicker" data-size="7" tabindex="null"
                                            data-live-search="true" title="أدخل نوع المراسلة" name="type_id" id="type_id">
                                            @foreach ($type as $types)
                                                <option value="{{ $types->id }}">
                                                    {{ $types->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            
                            </div>

                            <div class="form-group row">
                                <label for="reciver" class="col-2 col-form-label">
                                    <h5><strong>المرسل إليه</strong></h5>
                                </label>
                                <div class="col-3">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="form-control selectpicker" data-size="7" for="reciver"
                                            name="reciver[]" id="reciver" title="اختر المرسل إليه..." tabindex="null"
                                            data-live-search="true" style="border: 1px solid #d5c1ff !important;" multiple>
                                            @foreach ($user as $users)
                                                {{-- @if ($users->id !== auth()->id()) --}}
                                                <option style="border: 1px solid #d5c1ff !important;"
                                                    value="{{ $users->name }}">{{ $users->employee_name }}
                                                </option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <label for="file" class=" col-lg-2 col-form-label ">
                                    <h6><strong>مرفق الوارد:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group ">
                                        <input name="files[]" type="file" min="0"
                                            class="@error('file') is-invalid @enderror form-control" id="file"
                                            placeholder="ادخل مرفق الوارد" multiple />
                                    </div>
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-lg-2 col-form-label ">
                                    <h6><strong>عنوان الموضوع:</strong></h6>
                                </label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input name="title" id="title" type="text"
                                            class="@error('title') is-invalid @enderror form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="pb-0 mb-0 form-group row">
                                <label for="description" class="col-2 col-form-label">
                                    <h5><strong>الشروحات</strong></h5>
                                </label>
                                <div class="col-8">
                                    <textarea name="description" class="form-control" data-provide="markdown" rows="8"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="pt-0 mt-0 card-footer">
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-9">
                                    <button type="submit"
                                        class="mr-2 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">إرسال</button>
                                    <button type="reset"
                                        class="mr-2 btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">الغاء</button>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary font-weight-bolder">
                                            إنشاء
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">

                                                <li class="nav-item">
                                                    <a href="https://master/CoreArchive/public/type/create"
                                                        class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i> إضافة نوع مراسلة
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
            </div>
            <!--end::Card-->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Class definition

        var KTSummernoteDemo = function() {
            // Private functions
            var demos = function() {
                $('.summernote').summernote({
                    height: 150
                });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTSummernoteDemo.init();
        });
    </script>
    <script>
        "use strict";
        // Class definition

        var KTBootstrapMarkdown = function() {
            // Private functions
            var demos = function() {

            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTBootstrapMarkdown.init();
        });
    </script>
@endsection
