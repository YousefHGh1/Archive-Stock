@extends('layout.master')

@section('title')
    عرض الفاتورة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الفاتورة
@endsection
@section('sub_title')
    صفحة العرض
@endsection
@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }
    </style>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Invoice-->
                <div class="overflow-hidden card card-custom position-relative">
                    <!--begin::Invoice header-->
                    <div class="p-5 row justify-content-center bg-primary">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                <div class="order-2 px-0 d-flex flex-column order-md-1">
                                    <!--begin::Logo-->
                                    <a href="{{ url('dashboard') }}" class="mb-5 max-w-115px">
                                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}"
                                            width="200px" />
                                    </a>
                                    <!--end::Logo-->
                                    <span class="text-white d-flex flex-column font-size-h5 font-weight-bold">
                                        <span>شمال غزة حباليا </span>
                                        <span>بالقرب من مركز شهداء الأقصى الطبي</span>
                                    </span>
                                </div>
                                <h1 class="order-1 text-white display-3 font-weight-boldest order-md-2">
                                    فاتورة صرف</h1>
                            </div>
                        </div>
                    </div>
                    <!--end::Invoice header-->
                    <div class="p-5 row justify-content-center">
                        <div class="col-md-9">
                            <!--begin::Invoice body-->
                            <div class="pb-5 row">
                                <div class="col-md-3 border-right-md pr-md-10 py-md-10">
                                    <!--begin::Invoice To-->
                                    <div class="mb-3 text-dark-50 font-size-lg font-weight-bold">تفاصيل الفاتورة :
                                        {{ $invoiceExport->id }}
                                    </div><br />
                                    <div class="mb-10 font-size-lg font-weight-bold">رقم أمر التوريد :
                                        {{ $invoiceExport->voucher_no }}
                                    </div>
                                    <div class="mb-10 font-size-lg font-weight-bold">رقم الفاتورة :
                                        {{ $invoiceExport->invoice_no }}
                                    </div>
                                    <div class="mb-10 font-size-lg font-weight-bold">تاريخ التوريد :
                                        {{ $invoiceExport->voucher_date }}
                                    </div>
                                    <div class="mb-10 font-size-lg font-weight-bold">اسم القسم :
                                        {{ $invoiceExport->subSection->name }}
                                    </div>
                                    <div class="mb-10 font-size-lg font-weight-bold">اسم المستلم :
                                        {{ $invoiceExport->user_id }}
                                    </div>

                                </div>
                                <div class="py-10 col-md-9 pl-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="pt-1 pl-0 pb-9 pl-md-5 font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        اسم الصنف</th>
                                                    <th
                                                        class="pt-1 text-right pb-9 font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        الكمية</th>
                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($invoiceExport_products as $invoiceExport_product)
                                                    <tr class="font-weight-bolder font-size-lg">
                                                        <td
                                                            class="pl-0 border-top-0 pl-md-5 pt-7 d-flex align-items-center">
                                                            {{ $invoiceExport_product->item->item_name }}</td>
                                                        <td class="text-right pt-7">{{ $invoiceExport_product->quantity }}</td>
  
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <br>
                                    <table class="table mt-5">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="pt-1 pb-9 pl-0 pl-md-5 font-weight-bolder text-muted font-size-lg text-uppercase">
                                                    أمين المخازن</th>
                                                <th
                                                    class="pt-1 pb-9 text-center font-weight-bolder text-muted font-size-lg text-uppercase">
                                                    </th>

                                            </tr>
                                        </thead>
                                   
                                    </table>
                                </div>
                            </div>
                            <!--end::Invoice body-->

                        </div>
                    </div>
                    <!-- begin: Invoice action-->
                    <div class="p-5 row justify-content-center border-top">
                        <div class="col-md-9">
                            <div class="flex-wrap d-flex font-size-sm">
                                <button type="button" onclick="window.print();"
                                    class="my-1 mr-3 btn btn-light-primary font-weight-bolder">طباعة الفاتورة</button>
                                <a href="{{ url('inventory/invoice_export/create') }}" type="button"
                                    class="my-1 btn btn-warning font-weight-bolder ml-sm-auto">انشاء فاتورة</a>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice action-->
                </div>
                <!--end::Invoice-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('scripts')
@endsection
