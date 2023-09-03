@extends('layout.master')

@section('title')
    إرسال وارد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    إرسال بريد
@endsection
@section('sub_title')
    الجباية
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
                            <h3 class="card-label"> بيانات الجباية المرسلة <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="https://master/CoreArchive/public/jibaya" class="btn btn-info font-weight-bolder">
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
                                </span>عرض وارد الجباية</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('jibayaNot.store') }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}

                        <div class="card-body">
                            <div class="form-group row" hidden>
                                <label for="sender" class="col-2 col-form-label mt-3">
                                    <h5><strong>المرسل</strong></h5>
                                </label>
                                <div class="col-8">
                                    <input name="sender" type="text"
                                        class="@error('sender') is-invalid @enderror form-control mb-4 mt-3" id="sender"
                                        value="{{ Auth::user()->employee_name }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id" class="col-2 col-form-label mt-3">
                                    <h5><strong>رقم المراسلة</strong></h5>
                                </label>
                                <div class="col-8">
                                    <input name="id" type="number"
                                        class="@error('id') is-invalid @enderror form-control mb-4 mt-3" id="id" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="receiver" class="col-2 col-form-label">
                                    <h5><strong>المرسل إليه</strong></h5>
                                </label>
                                <div class="col-8">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="form-control selectpicker" data-size="7" for="reciver"
                                            name="reciver" id="reciver" title="اختر المرسل إليه..." tabindex="null"
                                            data-live-search="true" style="border: 1px solid #d5c1ff !important;">
                                            @foreach ($user as $users)
                                                @if ($users->id !== auth()->id())
                                                    <option style="border: 1px solid #d5c1ff !important;"
                                                        value="{{ $users->name }}">{{ $users->employee_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="file" class="col-2 col-form-label">
                                    <h5><strong>ارفاق المرفق</strong></h5>
                                </label>
                                <div class="col-8">
                                    <input name="file" type="file"
                                        class="@error('file') is-invalid @enderror form-control" id="file" />
                                </div>
                            </div>

                            {{-- <div class="form-group row p-3">
                                <label for="title" class="col-lg-2 col-form-label "><h6><strong>عنوان الموضوع:</strong></h6></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input name="title" id="title" type="text" class="@error('title') is-invalid @enderror form-control" >
                                    </div>
                                </div>
                          </div> --}}

                            <div class="form-group row">
                                <label for="description" class="col-2 col-form-label">
                                    <h5><strong>الشروحات</strong></h5>
                                </label>
                                <div class="col-8">
                                    <textarea name="description" class="form-control" data-provide="markdown" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-9">
                                    <button type="submit"
                                        class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">إرسال</button>
                                    <button type="reset"
                                        class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">الغاء</button>
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
