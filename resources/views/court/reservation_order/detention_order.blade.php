@extends('layout.master')

@section('title')
    منع سفر
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    المحكمة
@endsection
@section('sub_title')
    طلب تنفيذي
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
                    <div class="px-8 py-8 row justify-content-center">
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
                                    {{-- <div class="mb-10 font-size-lg font-weight-bold">عنوان المنفذ ضده :

                                    </div> --}}
                                    <!--end::التاريخ-->


                                    <div class=" font-size-lg font-weight-boldest">
                                        <h1>الموضوع : إصدار قرار بحضور فريق واحد باصدار أمر حبس على المستدعى ضده في القصية
                                            التنفيذية المرقومة أعلاه</h1>

                                    </div>

                                    <div class="pt-5">
                                        <center>
                                            <h2><strong> <u>التفاصيل</u> </strong></h2>
                                        </center>
                                        <ol class="font-weight-boldest mr-5 pb-5">
                                            <li class="" style="font-size: 24px">حيث أن المستدعية اقامت القضية
                                                التنفيذية المرقومة أعلاه .</li>

                                            <li style="font-size: 24px">حيث ان المستدعي ضده لم يلتزم بدفع قيمة القضية
                                                التنفيذية المرقومة أعلاه .
                                            </li>
                                        </ol>

                                        <h2 style="font-weight: 900" class="pb-5">- كل ذلك نلتمس من مقام محكمتكم الموقرة
                                        </h2>

                                        <h2 class="pt-5" style="text-align: center; font-weight: 700;"> إصدار قرار بحضور
                                            فريق واحد باصدار أمر حبس عل المستدعي ضده (المنفذ ضده) في
                                            القصية التنفيذية المرقومة أعلاه</h2>
                                    </div>

                                    <div class=" pt-5 font-weight-boldest">
                                        <h4 class="font-weight-boldest"> جبالبا تحريراً في :
                                            <input type="date">
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 font-size-lg font-weight-boldest" style="text-align: center;">
                                <div class="" style="float: left">
                                    <h4 class="font-weight-boldest">
                                        المستدعي / طالبة التنفيذ<br>
                                        بلديه جباليا النزله
                                    </h4>
                                </div>
                            </div>

                        </div>
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
