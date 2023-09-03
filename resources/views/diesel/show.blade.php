@extends('layout.master')

@section('title')
    عرض توريدة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الوارد
@endsection
@section('sub_title')
    صفحة العرض
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
                            <h3 class="card-label"> بيانات المحروقات الوارد <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="http://127.0.0.1:8000/diesel" class="btn btn-info font-weight-bolder">
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
                                </span>عرض وارد المحروقات</a>
                        </div>
                    </div>
                    <!--begin::Form-->

                    <div class="card-body" style="margin:20px;">
                        <div class="form-group row pb-5">
                            <label for="exampleSelectd" class="col-lg-2 col-form-label text-lg-right">اسم المورد:</label>
                            <div class="col-8">
                                <div class="dropdown bootstrap-select form-control dropup">
                                    <select class="form-control selectpicker" name="supplier_id" required id="supplier_id"
                                        disabled>
                                        <option value="option_select" disabled selected>suppliers</option>
                                        @foreach ($supplier as $suppliers)
                                            <option value="{{ $suppliers->id }}"
                                                {{ $diesel->supplier_id == $suppliers->id ? 'selected' : '' }}>
                                                {{ $suppliers->name_supplier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row pb-5">
                            <label for="quantity" class="col-lg-2 col-form-label text-lg-right">كمية التوريد:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="quantity" id="quantity" type="number" class="form-control" min="0"
                                        value="{{ $diesel->quantity }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-5">
                            <label for="type" class="col-lg-2 col-form-label text-lg-right">جهة التوريد:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="type" id="type" type="text" class="form-control"
                                        value="{{ $diesel->type }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-5">
                            <label for="invoice_num" class="col-lg-2 col-form-label text-lg-right">رقم الفاتورة:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="invoice_num" type="number" min="0" class="form-control"
                                        id="invoice_num" value="{{ $diesel->invoice_num }}" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="voucher" class="col-lg-2 col-form-label text-lg-right">سند التوريد:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="voucher" type="number" min="0" class="form-control" id="voucher"
                                        value="{{ $diesel->voucher }}" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-lg-2 col-form-label text-lg-right">تاريخ التوريد:</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input name="date" type="date" class="form-control" id="date"
                                        value="{{ $diesel->date }}" disabled />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
