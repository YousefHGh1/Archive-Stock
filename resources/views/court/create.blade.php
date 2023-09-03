@extends('layout.master')

@section('title')
    اضافة إخطار
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الإخطارات
@endsection

@section('sub_title')
    اضافة إخطار
@endsection

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }

        .btn.btn-light:hover:not(.btn-text):not(:disabled):not(.disabled),
        .btn.btn-light:focus:not(.btn-text),
        .btn.btn-light.focus:not(.btn-text) {
            border: 1px solid #d5c1ff !important;

        }

        .btn.dropdown-toggle.btn-light.bs-placeholder {
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
                            <h3 class="card-label"> بيانات الإخطارات <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/court') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض الإخطارات</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('court.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        {{-- <div class="card-body">

                            <div class="p-3 form-group row">
                                <label for="ido" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الهوية:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="ido" type="number" min="0"
                                            class="@error('ido') is-invalid @enderror form-control" id="ido"
                                            placeholder="ادخل رقم الهوية" />
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>

                                <label for="def" class="col-lg-2 col-form-label ">
                                    <h6><strong>المدعي:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="attack" id="def" type="text"
                                            class="@error('def') is-invalid @enderror form-control"
                                            placeholder="ادخل المدعي عليه">
                                    </div>
                                </div>
                            </div>


                        </div> --}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right"><h6><strong>رقم الاشتراك:</strong></h6></label>
                                <div class="col-lg-7">
                                    <input type="number" class="form-control @error('jibaya_id') is-invalid @enderror" name="jibaya_id"  required oninvalid="this.setCustomValidity('يرجى إدخال رقم اشتراك الجباية')" oninput="this.setCustomValidity('')" value="{{old('jibaya_id')}}" placeholder="رقم اشتراك الجباية"/>
                                    @error('jibaya_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div id="kt_repeater_1" style="position: relative">
            
                                <div class="row">
                                    <label class="col-lg-2 col-form-label text-right"><h6><strong>المدعي:</strong></h6></label>
                                    <div data-repeater-list="summoner" class="col-lg-10">
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-3">
                                                {{--<label>Number:</label>--}}
                                                <input type="number" class="form-control" name="idno_summoner" placeholder="رقم الهوية"/>
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4">
                                                {{--<label>Name:</label>--}}
                                                <input type="text" class="form-control" required oninvalid="this.setCustomValidity('يرجى إدخال اسم المدعي')" oninput="this.setCustomValidity('')" name="summoner" placeholder="الاسم رباعي"/>
                                                <div class="d-md-none mb-2"></div>
                                            </div>
            
            
                                            <div class="col-md-1">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" style="position: absolute;top: 2px;left: 27%;">
                                    <label class="col-lg-2 col-form-label text-right"></label>
                                    <div class="col-lg-4 p-0 ml-auto">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
            
                            <div id="kt_repeater_4" style="position: relative">
                                <div class="row">
                                    <label class="col-lg-2 col-form-label text-right"><h6><strong>المستدعى ضده:</strong></h6></label>
                                    <div data-repeater-list="idno_defendant" class="col-lg-10">
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-3">
                                                {{--<label>Number:</label>--}}
                                                <input type="number" class="form-control" name="idno_defendant" placeholder="رقم الهوية"/>
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-md-4">
                                                {{--<label>Name:</label>--}}
                                                <input type="text" class="form-control" required oninvalid="this.setCustomValidity('يرجى إدخال اسم المستدعى ضده')" oninput="this.setCustomValidity('')" name="defendant" placeholder="الاسم رباعي"/>
                                                <div class="d-md-none mb-2"></div>
                                            </div>
            
            
                                            <div class="col-md-1">
                                                <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" style="position: absolute;top: 2px;left: 27%;">
                                    <label class="col-lg-2 col-form-label text-right"></label>
                                    <div class="col-lg-4 p-0 ml-auto">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right"><h6><strong>المبلغ:</strong></h6></label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control @error('amount') is-invalid @enderror" required oninvalid="this.setCustomValidity('يرجى إدخال  المبلغ')" oninput="this.setCustomValidity('')" name="amount" value="{{old('amount')}}" placeholder="يرجى إدخال  المبلغ"/>
                                    @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
            
            
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right"><h6><strong>العنوان:</strong></h6></label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="العنوان"/>
            
                                </div>
            
            
                            </div>
                    
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                        <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>

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

@section('scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>

@endsection
