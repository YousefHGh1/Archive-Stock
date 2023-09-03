@extends('layout.master')

@section('title')
    إضافة مورد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الموردين
@endsection
@section('sub_title')
    صفحة الإضافة
@endsection

@section('css')
@endsection

@section('content')
    <!-- Main content -->
    <div class="container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label"> بيانات الموردين <i class="mr-2"></i></h3>
                </div>

                <div class="card-toolbar">
                    <a href="{{ route('supplier.index') }}" class="btn btn-info font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>عرض الموردين</a>
                </div>


            </div>
            <!--begin::Form-->
            <form action="{{ route('supplier.store') }}" method="post" class="form needs-validation" novalidate
                enctype="multipart/form-data" id="kt_form">
                @csrf
                {!! csrf_field() !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                            <div class="my-5">
                                <div class="my-10 separator separator-dashed"></div>
                                <div class="form-group row">
                                    <label class="col-3">
                                        <h6>اسم المورد</h6>
                                    </label>
                                    <div class="col-9">
                                        <input name="name_supplier" type="text"
                                            class="@error('name_supplier') is-invalid @enderror form-control form-control-solid"
                                            id="name_supplier" placeholder="ادخل اسم المورد" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">
                                        <h6>رقم المورد</h6>
                                    </label>
                                    <div class="col-9">
                                        <input name="num_supplier" type="number"
                                            class="@error('num_supplier') is-invalid @enderror form-control form-control-solid"
                                            id="num_supplier" placeholder="ادخل رقم المورد" />

                                    </div>
                                </div>
                            </div>
                            <div class="my-10 separator separator-dashed"></div>

                        </div>
                        <div class="col-xl-2"></div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                <button type="reset" class="btn btn-danger">إلغاء</button>
                            </div>

                        </div>
                    </div>
            </form>


            <!--end::Form-->
        </div>
    </div>
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
@endsection
