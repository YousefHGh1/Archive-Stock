@extends('layout.master')

@section('title')
    دفع كامل
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    المحكمة
@endsection
@section('sub_title')
طلب تنفيذي _ بعد الحجز
@endsection
@section('css')
    <style>
        .inbox-header {
            display: flex;
            justify-content: center;
        }

        .baladia {
            padding-top: 30px;
        }

        .sub-title {
            display: flex;
            justify-content: space-between;
        }

        .details {
            display: flex;
            justify-content: space-between;
        }

        input {
            border: 1px solid #000000 !important;
        }

        .btn.btn-light:hover:not(.btn-text):not(:disabled):not(.disabled),
        .btn.btn-light:focus:not(.btn-text),
        .btn.btn-light.focus:not(.btn-text) {
            border: 1px solid #000000 !important;

        }

        .btn.dropdown-toggle.btn-light.bs-placeholder {
            border: 1px solid #000000 !important;

        }
    </style>

    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container" id="container">
                <!--begin::Invoice-->
                <div class="overflow-hidden card card-custom position-relative">
                    <!--begin::Invoice header-->
                    <div class="px-8 py-8 row justify-content-center ">
                        <div class="col-md-9">
                            <div class="">
                                <h6 class="order-1 text-black font-weight-boldest order-md-2">
                                    <h2>لدى دائرة التنفيذ
                                        بمحكمة بداية شمال غزة</h2>
                                    <br>
                                    {{-- <input type="text" style="border-color: #ffffff"> --}}
                                    <h2> <u>في القضية التنفيذية رقم ............  / 2023</u> </h2>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!--end::Invoice header-->
                    <div class="p-5 row justify-content-center">
                        <div class="col-md-12">
                            <!--begin::Invoice body-->
                            <div class="pb-5 row">
                                <div class="col-md-8 border-right-md pr-md-10 py-md-10">
                                    <!--begin::عرض المراسلة-->
                                    <div class="  font-size-lg font-weight-bold d-flex justify-content-between"> طالب
                                        التنفيذ : بلدية جباليا النزلة _
                                        يمثلهاالسيد / أ.مازن النجار رئيس البلدية<br />بممثلها القاانوني /خطاب شهاب


                                        <div style="float: left;">
                                            {{ 'رقم الهوية : ' }}
                                            <input type="number">
                                        </div>

                                    </div>
                                    <!--end::عرض المراسلة-->
                                    <br />

                                    <!--begin::اسم الموظف-->
                                    <div class=" mb-10 font-size-lg font-weight-bold d-flex justify-content-between">
                                        اسم المنفذ ضده:
                                        عبد الشافعي
                                        {{-- @php
                                            $recipients = explode(', ', $archiveNot->reciver);
                                        @endphp
                                        @foreach ($recipients as $recipient)
                                            <li>{{ $recipient }} <br/></li>
                                        @endforeach --}}

                                        <div style="float: left;">
                                            {{ 'رقم الهوية : ' }}
                                            <input type="number">
                                        </div>
                                    </div>

                                    <!--begin::التاريخ-->
                                    <div class="mb-10 font-size-lg font-weight-bold">عنوان المنفذ ضده :
                                        {{-- <td>{{ date_format($archiveNot->created_at, 'd M Y') }}</td> --}}
                                    </div>
                                    <!--end::التاريخ-->


                                    <div class=" font-size-lg font-weight-boldest  ">

                                        الموضوع / إصدار قرار بحضور فريق واحد يقضي بتقسيط المبلغ في القضية التنفيذية


                                    </div>

                                    <div class="pt-5">

                                        <center>
                                            <h5><strong>التفاصيل</strong></h5></center> <br>
                                        <h6> حيث أن / المذكور أعلاه قسط المبلغ على القضية التنفيذية أعلاه وحيث أنه تبقى
                                            دفع رسوم القضية التنفيذية المرموقة أعلاه
                                        </h6>

                                    </div>

                            <div class=" pt-5 font-weight-boldest">
                                جبالبا تحريراً في :

                            </div>

                                </div>




                            </div>








                            <div class="mb-5 font-size-lg font-weight-boldest d-flex justify-content-around" style="text-align: center;">
                                قرار <br>
                                أقرر إجابة الطلب بذلك حسب الأصول<br>
                                قاضي التنفيذ

                                <div class="font-weight-boldest" >

                                    توقيع ممثل المستدعية / طالبة التنفيذ
                                </div>
                            </div>



                        </div>


                        <!--end::Invoice body-->
                    </div>
                </div>
                <!-- begin: Invoice action-->
                <div class="p-5 row justify-content-center border-top">
                    <div class="col-md-9">
                        <div class="flex-wrap d-flex font-size-sm">
                            <button type="button" class="py-4 my-1 mr-3 btn btn-primary font-weight-bolder mr-sm-14"
                                id="print_Button" onclick="window.print();">طباعة المراسلة</button>

                            {{-- <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                    class="mdi mdi-printer ml-1"></i>طباعة</button> --}}
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

    <!--end::Content-->
@endsection

@section('scripts')
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
