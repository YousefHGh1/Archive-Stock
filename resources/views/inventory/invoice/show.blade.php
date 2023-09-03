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
                <div class="card card-custom position-relative overflow-hidden">
                    <!--begin::Invoice header-->
                    <div class="row justify-content-center p-5  bg-primary">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                <div class="d-flex flex-column px-0 order-2 order-md-1">
                                    <!--begin::Logo-->
                                    <a href="{{ url('dashboard') }}" class="mb-5 max-w-115px">
                                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}"
                                            width="200px" />
                                    </a>
                                    <!--end::Logo-->
                                    <span class="d-flex flex-column font-size-h5 font-weight-bold text-white">
                                        <span>شمال غزة حباليا </span>
                                        <span>بالقرب من مركز شهداء الأقصى الطبي</span>
                                    </span>
                                </div>
                                <h1 class="display-3 font-weight-boldest text-white order-1 order-md-2">
                                    فاتورة شراء</h1>
                            </div>
                        </div>
                    </div>
                    <!--end::Invoice header-->
                    <div class="row justify-content-center p-5">
                        <div class="col-md-9">
                            <!--begin::Invoice body-->
                            <div class="row pb-5">
                                <div class="col-md-3 border-right-md pr-md-10 py-md-10">
                                    <!--begin::Invoice To-->
                                    <div class="text-dark-50 font-size-lg font-weight-bold mb-3">تفاصيل الفاتورة :
                                        {{ $invoice->id }}
                                    </div><br />
                                    <div class="font-size-lg font-weight-bold mb-10">رقم السند :
                                        {{ $invoice->voucher_no }}
                                    </div>
                                    <div class="font-size-lg font-weight-bold mb-10">رقم الفاتورة :
                                        {{ $invoice->invoice_no }}
                                    </div>
                                    <div class="font-size-lg font-weight-bold mb-10">تاريخ السند :
                                        {{ $invoice->voucher_date }}
                                    </div>
                                    <div class="font-size-lg font-weight-bold mb-10">اسم المورد :
                                        {{ $invoice->supplier_item->supplier_item_name }}
                                    </div>

                                    <div class="font-size-lg font-weight-bold mb-10">معامل الصرف :
                                        {{ $invoice->currency->name }}
                                    </div>
                                </div>
                                <div class="col-md-9 py-10 pl-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="pt-1 pb-9 pl-0 pl-md-5 font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        اسم الصنف</th>
                                                    <th
                                                        class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        الكمية</th>
                                                    <th
                                                        class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        السعر</th>
                                                    <th
                                                        class="pt-1 pb-9 text-right pr-0 font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        الاجمالي</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($invoiceProducts as $invoiceProduct)
                                                    <tr class="font-weight-bolder font-size-lg">
                                                        <td
                                                            class="border-top-0 pl-0 pl-md-5 pt-7 d-flex align-items-center">
                                                            {{ $invoiceProduct->item->item_name }}</td>
                                                        <td class="text-right pt-7">{{ $invoiceProduct->quantity }}</td>
                                                        <td class="text-right pt-7">{{ $invoiceProduct->price }}</td>
                                                        <td class="pr-0 pt-7 font-size-h6 font-weight-boldest text-right">
                                                            {{ $subtotal = $invoiceProduct->quantity * $invoiceProduct->price * $invoice->currency->value }}
                                                            @php
                                                                $total += $subtotal;
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-7-center pt-md-10 pb-5">
                                            <div
                                                class="bg-primary rounded d-flex align-items-center justify-content-between text-white max-w-350px position-relative ml-auto p-7">
                                                <!--begin::Shape-->
                                                <div class="position-absolute opacity-30 top-0 right-0">
                                                    <span class="svg-icon svg-icon-2x svg-logo-white svg-icon-flip">
                                                        <!--begin::Svg Icon | path:assets/media/svg/shapes/abstract-8.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="176"
                                                            height="165" viewBox="0 0 176 165" fill="none">
                                                            <g clip-path="url(#clip0)">
                                                                <path
                                                                    d="M-10.001 135.168C-10.001 151.643 3.87924 165.001 20.9985 165.001C38.1196 165.001 51.998 151.643 51.998 135.168C51.998 118.691 38.1196 105.335 20.9985 105.335C3.87924 105.335 -10.001 118.691 -10.001 135.168Z"
                                                                    fill="#AD84FF" />
                                                                <path
                                                                    d="M28.749 64.3117C28.749 78.7296 40.8927 90.4163 55.8745 90.4163C70.8563 90.4163 83 78.7296 83 64.3117C83 49.8954 70.8563 38.207 55.8745 38.207C40.8927 38.207 28.749 49.8954 28.749 64.3117Z"
                                                                    fill="#AD84FF" />
                                                                <path
                                                                    d="M82.9996 120.249C82.9996 144.964 103.819 165 129.501 165C155.181 165 176 144.964 176 120.249C176 95.5342 155.181 75.5 129.501 75.5C103.819 75.5 82.9996 95.5342 82.9996 120.249Z"
                                                                    fill="#AD84FF" />
                                                                <path
                                                                    d="M98.4976 23.2928C98.4976 43.8887 115.848 60.5856 137.249 60.5856C158.65 60.5856 176 43.8887 176 23.2928C176 2.69692 158.65 -14 137.249 -14C115.848 -14 98.4976 2.69692 98.4976 23.2928Z"
                                                                    fill="#AD84FF" />
                                                                <path
                                                                    d="M-10.0011 8.37466C-10.0011 20.7322 0.409554 30.7493 13.2503 30.7493C26.0911 30.7493 36.5 20.7322 36.5 8.37466C36.5 -3.98287 26.0911 -14 13.2503 -14C0.409554 -14 -10.0011 -3.98287 -10.0011 8.37466Z"
                                                                    fill="#AD84FF" />
                                                                <path
                                                                    d="M-2.24881 82.9565C-2.24881 87.0757 1.22081 90.4147 5.50108 90.4147C9.78135 90.4147 13.251 87.0757 13.251 82.9565C13.251 78.839 9.78135 75.5 5.50108 75.5C1.22081 75.5 -2.24881 78.839 -2.24881 82.9565Z"
                                                                    fill="#AD84FF" />
                                                                <path
                                                                    d="M55.8744 12.1044C55.8744 18.2841 61.0788 23.2926 67.5001 23.2926C73.9196 23.2926 79.124 18.2841 79.124 12.1044C79.124 5.92653 73.9196 0.917969 67.5001 0.917969C61.0788 0.917969 55.8744 5.92653 55.8744 12.1044Z"
                                                                    fill="#AD84FF" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <!--end::Shape-->
                                                <div class="font-weight-boldest font-size-h5">اجمالي الفاتورة</div>
                                                <div class="text-right d-flex flex-column">
                                                    <span
                                                        class="font-weight-boldest font-size-h3 line-height-sm">{{ $total }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <table class="table mt-5">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="pt-1 pb-9 pl-0 pl-md-5 font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        الاسم</th>
                                                    <th
                                                        class="pt-1 pb-9 text-center font-weight-bolder text-muted font-size-lg text-uppercase">
                                                        التوقيع</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr class="font-weight-bolder font-size-lg">
                                                    <td class="border-top-0 pl-0 pl-md-5 pt-7 d-flex ">
                                                        {{ 'رئيس قسم المخازن' }}  </td>

                                                    <td class="text-right pt-7">
                                                     

                                                    </td>

                                                </tr>



                                                <tr class="font-weight-bolder font-size-lg">
                                                    <td class="border-top-0 pl-0 pl-md-5 pt-7 d-flex align-items-center">
                                                        {{ 'أمين المخازن' }}</td>

                                                    <td class="text-right pt-7">
                                                        {{-- <img src="{{ asset($invoice->amen_sign) }}" alt="Amen sign"
                                                            height="100px" width="400px"> --}}

                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end::Invoice body-->

                        </div>
                    </div>
                    <!-- begin: Invoice action-->
                    <div class="row justify-content-center border-top p-5">
                        <div class="col-md-9">
                            <div class="d-flex font-size-sm flex-wrap">
                                <button type="button" onclick="window.print();"
                                    class="btn btn-light-primary font-weight-bolder mr-3 my-1">طباعة الفاتورة</button>
                                <a href="{{ url('inventory/invoice/create') }}" type="button"
                                    class="btn btn-warning font-weight-bolder ml-sm-auto my-1">انشاء فاتورة</a>
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
