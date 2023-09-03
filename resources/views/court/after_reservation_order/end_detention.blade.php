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
        }

        .details {
            display: flex;
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

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }


        .paragraph {
            white-space: pre-line;
            word-wrap: break-word;
            line-height: 1.5;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <!--begin::Content-->

    <body onload="window.print()">
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
                                        <h2> <u>في القضية التنفيذية رقم ............ / 2023</u> </h2>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <!--end::Invoice header-->
                        <div class="p-5 row justify-content-center">
                            <div class="col-md-12 pl-9 ml-9">
                                <!--begin::Invoice body-->
                                <div class="pb-5 row">
                                    <div class="col-md-12  py-md-10">
                                        <!--begin::عرض المراسلة-->
                                        <div class="  font-size-lg font-weight-bold d-flex justify-content-between">
                                            <h4>المحكوم لها (طالبة التنفيذ) : بلدية جباليا النزلة يمثلها رئيس البلدية</h4>
                                        </div>
                                        <!--end::عرض المراسلة-->
                                        <br />

                                        <!--begin::اسم الموظف-->
                                        <div class=" mb-10 font-size-lg font-weight-bold d-flex ">
                                            <h4>
                                                المحكوم عليه (المنفذ ضده ) / :
                                                عبد الشافعي
                                            </h4>
                                            {{-- @php
                                                    $recipients = explode(', ', $archiveNot->reciver);
                                                @endphp
                                                @foreach ($recipients as $recipient)
                                                    <li>{{ $recipient }} <br/></li>
                                                @endforeach --}}

                                            <div class="ml-9 pl-9">
                                                {{ 'رقم الهوية : ' }}
                                                <input type="text">
                                            </div>
                                        </div>


                                        <div class=" font-size-lg font-weight-boldest ">
                                            <h2 class="paragraph">
                                                الموضوع / إصدار قرار بحضور فريق واحد يقضي باسترداد أمر الحبس الصادر بحق
                                                المستدعى ضده (المحكوم عليه ) أملا في الصلح .

                                            </h2>
                                        </div>

                                        <div class="pt-5">
                                            <h2> لكل ذلك نلتمس من مقام محكمتكم الموقرة :
                                                <br>
                                                أقرر استيرداد أمر الحبس الصادر بحق المستدعى ضده ( المحكوم عليه ) أملا في
                                                الصلح .

                                            </h2>
                                        </div>

                                    </div>
                                </div>

                                <br />

                                <div class="mb-5 font-size-lg font-weight-boldest" style="text-align: center;">
                                    <div class="">
                                        <h4 class="font-weight-boldest ">
                                            توقيع ممثل المستدعية / طالبة التنفيذ

                                        </h4>
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

    </body>

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
