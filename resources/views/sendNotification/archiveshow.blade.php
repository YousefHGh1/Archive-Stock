@extends('layout.master')

@section('title')
    عرض مراسلة
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الأرشـــيف
@endsection
@section('sub_title')
    صفحة العرض
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
    </style>
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Invoice-->
                <div class="overflow-hidden card card-custom position-relative">
                    <!--begin::Invoice header-->
                    <div class="px-8 py-8 row justify-content-center bg-primary">
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
                                        <span>شمال غزة , جباليا</span>
                                        <span>مقابل  مركز شهداء جباليا الصحي</span>
                                    </span>
                                </div>
                                <h6 class="order-1 text-white font-weight-boldest order-md-2">نظام المراسلات
                                    الداخلية</h6>
                            </div>
                        </div>
                    </div>
                    <!--end::Invoice header-->
                    <div class="p-5 row justify-content-center">
                        <div class="col-md-9">
                            <!--begin::Invoice body-->
                            <div class="pb-5 row">
                                <div class="col-md-4 border-right-md pr-md-10 py-md-10">
                                    <!--begin::عرض المراسلة-->
                                    <div class="mb-3 text-dark-50 font-size-lg font-weight-bold">عرض المراسلة :
                                        {{ $archiveNot->id }}</div>
                                    <!--end::عرض المراسلة-->
                                    <br />
                                    <!--begin::المرسل-->
                                    <div class="mb-10 font-size-lg font-weight-bold">المرسل : {{ $archiveNot->sender }}
                                    </div>
                                    <!--end::المرسل-->
                                    <!--begin::اسم الموظف-->
                                    <div class="mb-10 font-size-lg font-weight-bold">
                                        المرسل اليه:
                                        <br/>
                                        @php
                                            $recipients = explode(', ', $archiveNot->reciver);
                                        @endphp
                                        @foreach($recipients as $recipient)
                                            <li>{{ $recipient }} <br/></li>
                                        @endforeach
                                    </div>
                                    
                                    <!--end::اسم الموظف-->
                                    <!--begin::التاريخ-->
                                    <div class="mb-10 font-size-lg font-weight-bold">التاريخ :
                                        <td>{{ date_format($archiveNot->created_at, 'd M Y') }}</td>
                                    </div>
                                    <!--end::التاريخ-->

                                </div>
                                <div class="py-10 col-md-8 pl-md-10">
                                    <div class="table-responsive">
                                        <div class="inbox-view">
                                            <p class="pt-5" style="text-align: right; font-weight:900;">الموضوع :
                                                {{ $archiveNot->title }}</p>
                                            الشروحات :
                                            <textarea class="p-5" style="font-weight: 900; width: 100%;" name="" id="" rows="5" disabled>{{ $archiveNot->description }}</textarea>
                                        </div>

                                        <div class="inbox-attached no-print">
                                            <div class="p-5 margin-bottom-15" style="display: flex;">
                                                <a class="pt-2 mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cloud-download"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                                                        <path
                                                            d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                                                    </svg>
                                                </a>
                                                <h5 class="pt-2 mr-2">المرفقات : </h5>

                                                <div class="margin-bottom-25">
                                                    <div class="pt-2 mr-2">
                                                        <div>
                                                            @if ($archiveNot->files)
                                                                @foreach (json_decode($archiveNot->files) as $file)
                                                                    <a href="{{ asset('filearchiveNot/' . $file) }}"
                                                                        target="_blank"
                                                                        style="color:black">{{ $file }}</a><br>
                                                                @endforeach
                                                            @endif
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
                                    onclick="window.print();">طباعة المراسلة</button>

                                <a type="button" href="{{ url('sendNotification/archiveNot/create') }}"
                                    class="btn btn-warning font-weight-bolder ml-sm-auto">انشاء مراسلة جديدة</a>
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
    <!--end::Content-->
@endsection

@section('scripts')
@endsection
