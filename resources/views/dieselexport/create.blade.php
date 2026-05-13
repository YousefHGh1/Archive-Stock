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
                            <x-add-resource-button />

                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('dieselexport.store') }}" method="post" class="form needs-validation" novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}

                        <div class="card-body" style="margin:20px;">
                            <!-- Section Selection -->
                            <div class="pb-5 form-group row">
                                <label for="section_id" class="col-lg-2 col-form-label text-lg-right">الدائرة:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select name="section_id" id="section_id"
                                            class="@error('section_id') is-invalid @enderror form-control selectpicker"
                                            data-size="7" data-live-search="true">
                                            <option value="">اختر الدائرة</option>
                                            @foreach ($section as $sections)
                                                <option value="{{ $sections->id }}"
                                                    {{ old('section_id') == $sections->id ? 'selected' : '' }}>
                                                    {{ $sections->name_section }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('section_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <label for="sub_section_id" class="col-lg-2 col-form-label text-lg-right">القسم:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select name="sub_section_id" id="sub_section_id"
                                            class="@error('sub_section_id') is-invalid @enderror form-control"
                                            data-size="7" data-live-search="true">
                                            <option value="">اختر القسم</option>
                                            @foreach ($subSection as $subSections)
                                                <option value="{{ $subSections->id }}"
                                                    {{ old('sub_section_id') == $subSections->id ? 'selected' : '' }}>
                                                    {{ $subSections->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sub_section_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Receipt and Note Number -->
                            <div class="pb-5 form-group row">
                                <label for="num_section" class="col-lg-2 col-form-label text-lg-right">رقم الإيصال:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="num_section" id="num_section" type="number"
                                            class="@error('num_section') is-invalid @enderror form-control"
                                            placeholder="ادخل رقم الإيصال" value="{{ old('num_section') }}">
                                    </div>
                                </div>
                                <label for="num_note" class="col-lg-2 col-form-label text-lg-right">رقم الدفتر:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="num_note" id="num_note" type="number"
                                            class="@error('num_note') is-invalid @enderror form-control"
                                            placeholder="ادخل رقم الدفتر" value="{{ old('num_note') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Quantity and Voucher -->
                            <div class="pb-5 form-group row">
                                <label for="quantity" class="col-lg-2 col-form-label text-lg-right">كمية الصادر:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="quantity" id="quantity" type="number"
                                            class="@error('quantity') is-invalid @enderror form-control" min="0"
                                            placeholder="ادخل كمية الصادر" value="{{ old('quantity') }}">
                                    </div>
                                </div>
                                <label for="voucher" class="col-lg-2 col-form-label text-lg-right">سند الصادر:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="voucher" type="number" min="0"
                                            class="@error('voucher') is-invalid @enderror form-control" id="voucher"
                                            placeholder="ادخل سند الصادر" value="{{ old('voucher') }}" />
                                    </div>
                                </div>
                            </div>

                            <!-- Export Date and Fuel Type -->
                            <div class="form-group row">
                                <label for="date" class="col-lg-2 col-form-label text-lg-right">تاريخ التصدير:</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" type="date"
                                            class="@error('date') is-invalid @enderror form-control" id="date"
                                            value="{{ old('date', date('Y-m-d')) }}">
                                    </div>
                                </div>

                                <label for="typesfuel_id" class="col-lg-2 col-form-label text-lg-right">
                                    <h6>نوع المحروقات:</h6>
                                </label>
                                <div class="col-3">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select name="typesfuel_id" id="typesfuel_id"
                                            class="@error('typesfuel_id') is-invalid @enderror form-control selectpicker"
                                            data-size="7" data-live-search="true">
                                            <option value="">اختر نوع المحروقات</option>
                                            @foreach ($typesfuel as $typesfuels)
                                                <option value="{{ $typesfuels->id }}"
                                                    {{ old('typesfuel_id') == $typesfuels->id ? 'selected' : '' }}>
                                                    {{ $typesfuels->name }}
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

                        <!-- Submit & Reset Buttons -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="btn btn-danger">إلغاء</button>

                                    <!-- Section Buttons -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary font-weight-bolder">الأقسام</button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">
                                                <li class="nav-item"><a href="{{ route('section.create') }}"
                                                        class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i> انشاء قسم رئيسي</a></li>
                                                <li class="nav-item"><a href="{{ route('subSection.create') }}"
                                                        class="nav-link">
                                                        <i class="nav-icon flaticon2-add-1"></i>انشاء قسم فرعي</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Fuel Types Button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary font-weight-bolder">أنواع
                                            المحروقات</button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="nav nav-hover flex-column">
                                                <li class="nav-item"><a href="{{ route('TypesFuel.index') }}"
                                                        class="nav-link">
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
    <script>
        $(document).ready(function() {
            $('select[name="section_id"]').on('change', function() {
                var section_id = $(this).val();
                if (section_id) {
                    $.ajax({
                        url: "{{ URL::to('getsub_section') }}/" + section_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_section_id"]').empty();
                            $.each(data, function(id, name) {
                                // Append the correct value (ID) for sub_section_id
                                $('select[name="sub_section_id"]').append(
                                    '<option value="' + id + '">' + name +
                                    '</option>'
                                );
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
