@extends('layout.master')

@section('title')
    تعديل العهد
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    الفواتير
@endsection

@section('sub_title')
    تعديل العهد
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
                            <h3 class="card-label"> ةتعديل العهد <i class="mr-2"></i></h3>
                        </div>
                        <div class="card-toolbar">

                            <a href="{{ url('/inventory/custody') }}" class="btn btn-info font-weight-bolder">
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
                                </span>عرض العهد</a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('custody.update', ['custody' => $custody->id]) }}" method="post"
                        class="form needs-validation " novalidate enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        <div class="card-body">
                            {{-- 1 --}}
                            <div class="p-3 form-group row">
                                <label for="section_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>القسم<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"
                                            class="@error('section_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" name="section_id"
                                            id="section_id">
                                            <option value="">اختر اسم القسم</option>

                                            @foreach ($section as $sections)
                                                <option value="{{ $sections->id }}"
                                                    {{ $custody->section_id == $sections->id ? 'selected' : '' }}>
                                                    {{ $sections->name_section }}
                                                </option>
                                            @endforeach
                                            {{-- هاي عشان تعمل تحقق لما تختار عائلة  ولازم تعطي القيمه تعت الاوبشن فاضية --}}
                                            @if ($errors->has('section_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('section_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <label for="sub_section_id " class="col-lg-2 col-form-label ">
                                    <h6><strong>القسم الفرعي <span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select data-size="7" tabindex="null"
                                            class="@error('sub_section_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم القسم الفرعي" name="sub_section_id"
                                            id="sub_section_id">
                                            <option value="{{ $custody->sub_section_id }}"> {{ $custody->sub_section_id }}
                                            </option>
                                            @if ($errors->has('sub_section_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sub_section_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                            {{-- 2 --}}
                            <div class="p-3 form-group row">
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6><strong> اسم الموظف<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select data-size="7" tabindex="null"
                                            class="@error('user_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم  الموظف" name="user_id" id="user_id">
                                            <option value="">اختر الموظف</option>
                                            @foreach ($user as $users)
                                                <option value="{{ $users->id }}"
                                                    {{ $custody->user_id == $users->id ? 'selected' : '' }}>
                                                    {{ $users->name }}
                                                </option>
                                            @endforeach
                                            @if ($errors->has('user_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>

                                <label for="custody_num" class="col-lg-2 col-form-label ">
                                    <h6><strong> رقم العهدة<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="custody_num"
                                            type="number"class="@error('custody_num') is-invalid @enderror form-control selectpicker "
                                            id="custody_num" value="{{ $custody->custody_num }}" />
                                        @error('custody_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- 3 --}}
                            <div class="p-3 form-group row">
                                <label for="date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ العهدة<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" id="date" type="date" min="0"
                                            value="{{ date('Y-m-d') }}"
                                            class="@error('date') is-invalid @enderror form-control"
                                            value="{{ $custody->date }}">
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50%">الصنف</th>
                                        <th>الكمية</th>

                                        <th width="5%">الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($custody->custodyproduct as $index => $custodyProduct)
                                        <tr>
                                            <td>
                                                <select name="product[]" class="form-control selectpicker">
                                                    <option value="" disabled selected>اختر المنتج</option>

                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $custodyProduct->item_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->item_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="quantity[]" min="0"
                                                    value="{{ $custodyProduct->quantity }}" class="form-control"></td>
                                    @endforeach
                                    <td> <button type="button" class="btn btn-primary" id="add-row">+</button>
                                        </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="d-flex mb-5" style="margin-right: 215px;">
                            <button type="submit" value="Submit" class="btn btn-success mr-5">حفظ البيانات</button>
                            <button type="reset" class="btn btn-danger mr-2">إلغاء</button>
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
            // $("table tbody tr").each(function() {
            //     var deleteBtnHtml =
            //         '<td><button type="button" class="btn btn-danger delete-row">حذف</button></td>';
            //     $(this).append(deleteBtnHtml);
            // });

            // تحويل الزر "add-row" لإضافة الصف إلى جدول المنتجات
            $("#add-row").click(function() {
                var html = "<tr>";
                html +=
                    "<td><select name='product[]' title='اختر الصنف' class='form-control' data-live-search='true'>";
                @foreach ($products as $product)
                    html +=
                        "<option value='{{ $product->id }}'>{{ $product->item_num }} {{ $product->item_name }}</option>";
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
