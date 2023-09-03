@extends('layout.master')

@section('title')
    إضافة الوارد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الوارد
@endsection
@section('sub_title')
    صفحة الإضافة
@endsection

@section('css')
@endsection

@section('content')
    <!-- Main content -->

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

                            <a href="{{ route('diesel.index') }}" class="btn btn-info font-weight-bolder">
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
                    <form action="{{ route('diesel.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body" style="margin:20px;">
                            <div class="pb-2 form-group row">
                                <label for="exampleSelectd" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>اسم المورد:</h6>
                                </label>
                                <div class="col-8">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select
                                            class="@error('supplier_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="..."
                                            name="supplier_id" id="supplier_id">
                                            @foreach ($supplier as $suppliers)
                                                <option value="{{ $suppliers->id }}">{{ $suppliers->name_supplier }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('supplier_id')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="pb-2 form-group row">
                                <label for="quantity" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>كمية التوريد:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="quantity" id="quantity" type="number"
                                            class="@error('quantity') is-invalid @enderror form-control" min="0"
                                            placeholder="ادخل كمية التوريد">
                                    </div>
                                    @error('quantity')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label for="type" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>جهة التوريد:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="type" id="type" type="text"
                                            class="@error('type') is-invalid @enderror form-control"
                                            placeholder="ادخل جهة التوريد">
                                    </div>
                                    @error('type')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="pb-2 form-group row">
                                <label for="invoice_num" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>رقم الفاتورة:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="invoice_num" type="number" min="0"
                                            class="@error('invoice_num') is-invalid @enderror form-control" id="invoice_num"
                                            placeholder="ادخل رقم الفاتورة" />
                                    </div>
                                    @error('invoice_num')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label for="voucher" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>سند التوريد:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="voucher" type="number" min="0"
                                            class="@error('voucher') is-invalid @enderror form-control" id="voucher"
                                            placeholder="ادخل سند التوريد" />
                                    </div>
                                    @error('voucher')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>تاريخ التوريد:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" type="date"
                                            class="@error('date') is-invalid @enderror form-control" id="date"
                                            placeholder="ادخل تاريخ التوريد" value="{{ date('Y-m-d') }}" />
                                    </div>
                                    @error('date')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label for="typesfuel_id" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>نوع المحروقات:</h6>
                                </label>

                                <div class="col-3">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select
                                            class="@error('typesfuel_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="..."
                                            name="typesfuel_id" id="typesfuel_id">
                                            @foreach ($typesfuel as $typesfuels)
                                                <option value="{{ $typesfuels->id }}">{{ $typesfuels->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('typesfuel_id')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
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
                                            الموردين
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">

                                                <li class="nav-item">
                                                    <a href="{{ route('supplier.create') }}" class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i> إضافة مورد</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ route('supplier.index') }}" class="nav-link">
                                                        <i class="nav-icon flaticon-eye"></i>عرض الموردين
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary font-weight-bolder">
                                            أنواع المحروقات
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ route('TypesFuel.index') }}" class="nav-link">
                                                        <i class="nav-icon flaticon-eye"></i>عرض أنواع المحروقات
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
    <!-- /.content -->
@endsection

@section('scripts')
@endsection
