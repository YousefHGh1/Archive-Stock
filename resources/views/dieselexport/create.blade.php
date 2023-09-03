@extends('layout.master')

@section('title')
    إضافة صادر
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الصادر
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
                            <h3 class="card-label"> بيانات المحروقات الصادر <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ route('dieselexport.index') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض صادر المحروقات</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('dieselexport.store') }}" method="post" class="form needs-validation "
                        novalidate enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body" style="margin:20px;">
                            <div class="pb-5 form-group row">
                                <label for="exampleSelectd" class="col-lg-2 col-form-label text-lg-right"> القسم:</label>
                                <div class="col-3">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="@error('section_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="..."
                                            name="section_id" id="section_id">
                                            @foreach ($section as $sections)
                                                <option value="{{ $sections->id }}">{{ $sections->name_section }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <label for="exampleSelectd" class="col-lg-2 col-form-label text-lg-right">القسم
                                    الفرعي:</label>
                                <div class="col-3">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select
                                            class="@error('sub_section_id') is-invalid @enderror form-control selectpicker "
                                            data-size="20" tabindex="null" data-live-search="true" title="..."
                                            name="sub_section_id" id="sub_section_id">
                                            @foreach ($subSection as $subSections)
                                                <option value="{{ $subSections->id }}">{{ $subSections->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="pb-5 form-group row">
                                <label for="num_section" class="col-lg-2 col-form-label text-lg-right">رقم الإيصال:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="num_section" id="num_section" type="number"
                                            class="@error('num_section') is-invalid @enderror form-control"
                                            placeholder="ادخل رقم الإيصال:">
                                    </div>
                                </div>
                                <label for="num_note" class="col-lg-2 col-form-label text-lg-right">رقم الدفتر:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="num_note" id="num_note" type="number"
                                            class="@error('num_note') is-invalid @enderror form-control"
                                            placeholder="ادخل رقم الدفتر">
                                    </div>
                                </div>
                            </div>

                            <div class="pb-5 form-group row">
                                <label for="quantity" class="col-lg-2 col-form-label text-lg-right">كمية الصادر:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="quantity" id="quantity" type="number"
                                            class="@error('quantity') is-invalid @enderror form-control" min="0"
                                            placeholder="ادخل كمية الصادر">
                                    </div>
                                </div>
                                <label for="voucher" class="col-lg-2 col-form-label text-lg-right">سند الصادر:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="voucher" type="number" min="0"
                                            class="@error('voucher') is-invalid @enderror form-control" id="voucher"
                                            placeholder="ادخل سند الصادر" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-lg-2 col-form-label text-lg-right">تاريخ التصدير:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" type="date"
                                            class="@error('date') is-invalid @enderror form-control" id="date"
                                            placeholder="ادخل تاريخ التصدير" value="{{ date('Y-m-d') }}" />
                                    </div>
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
                                            الأقسام
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">

                                                <li class="nav-item">
                                                    <a href="{{ route('section.create') }}" class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i> انشاء قسم رئيسي</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ route('subSection.create') }}" class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i>انشاء قسم فرعي
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
                                                        <i class="nav-icon flaticon2-add-1"></i> عرض أنواع المحروقات</a>
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
