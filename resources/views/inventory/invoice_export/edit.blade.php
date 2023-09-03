@extends('layout.master')

@section('title')
    تعديل فاتورة صرف
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الفواتير
@endsection

@section('sub_title')
    تعديل فاتورة صرف
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
                            <h3 class="card-label"> تعديل بيانات الفواتير <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/inventory/invoice_export') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض فاتورة صرف</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('invoice_export.update', $invoiceExport->id) }}" method="post"
                        class="form needs-validation " novalidate enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        <div class="card-body">
                            <div class="p-3 form-group row">
                                <label for="voucher_no" class="col-lg-2 col-form-label ">
                                    <h6> رقم السند:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="voucher_no" name="voucher_no"
                                            value="{{ $invoiceExport->voucher_no }}">
                                    </div>
                                </div>

                                <div class="col-lg-1"></div>

                                <label for="voucher_date" class="col-lg-2 col-form-label ">
                                    <h6> تاريخ السند:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="voucher_date" name="voucher_date"
                                            value="{{ $invoiceExport->voucher_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">

                                <label for="invoice_no" class="col-lg-2 col-form-label ">
                                    <h6> رقم الفاتورة:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                                            value="{{ $invoiceExport->invoice_no }}">
                                    </div>
                                </div>

                                <div class="col-lg-1"></div>


                                <label for="subSection_id" class="col-lg-2 col-form-label ">
                                    <h6> الأقسام:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select class="form-control selectpicker" data-size="7" tabindex="null"
                                            data-live-search="true" title="أدخل اسم القسم" name="subSection_id"
                                            id="subSection_id"  selected>
                                            @foreach ($subSection as $subSections)
                                                <option value="{{ $subSections->id }}" {{ $invoiceExport->subSection_id == $subSections->id ? 'selected' : '' }}>
                                                    {{ $subSections->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('inventory/sub_section/create') }}" title="اضافة قسم جديد">
                                    <i class="p-3 ki ki-solid-plus icon-md"></i>
                                </a>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50%">الصنف</th>
                                        <th>الكمية</th>
                                        {{-- <th>السعر</th> --}}
                                        <th width="5%">جديد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoiceExport->InvoiceExport_product as $index => $InvoiceExport_product)
                                        <tr>
                                            <td>
                                                <select name="product[]" class="form-control selectpicker">
                                                    <option value="" disabled selected>اختر المنتج</option>

                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $InvoiceExport_product->item_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->item_num }} {{ $product->item_name }} {{ "الرصيد:". $product->balance }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="quantity[]"
                                                    value="{{ $InvoiceExport_product->quantity }}" class="form-control"></td>
                                            {{-- <td><input type="number" name="price[]"
                                                    value="{{ $InvoiceExport_product->price }}" class="form-control"></td> --}}
                                    @endforeach
                                    <td> <button type="button" class="btn btn-primary" id="add-row">+</button>
                                    </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="ml-5 btn btn-success">حفظ</button>

                                    <x-add-resource-button />

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
<script>
    $(document).ready(function() {
        // السماح بحذف صف من جدول المنتجات
        $(document).on('click', '.delete-row', function() {
            $(this).closest('tr').remove();
        });

        // إضافة زر "delete-row" إلى كل صف في جدول المنتجات
        $("table tbody tr").each(function() {
            var deleteBtnHtml = '<td><button type="button" class="btn btn-danger delete-row">حذف</button></td>';
            $(this).append(deleteBtnHtml);
        });

        // تحويل الزر "add-row" لإضافة الصف إلى جدول المنتجات
        $("#add-row").click(function() {
            var html = "<tr>";
            html +=
                "<td><select name='product[]' title='اختر الصنف' class='form-control' data-live-search='true'>";
            @foreach ($products as $product)
                html +=
                    "<option value='{{ $product->id }}'>{{ $product->item_num }} {{ $product->item_name }} {{ $product->balance }}</option>";
            @endforeach
            html += "</select></td>";
            html += "<td><input type='text' name='quantity[]' class='form-control'></td>";
            html += "<td><button type='button' class='btn btn-danger delete-row'>حذف</button></td>";
            html += "</tr>";
            $("table tbody").append(html);
        });
    });
</script>
@endsection
