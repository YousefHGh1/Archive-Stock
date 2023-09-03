@extends('layout.master')

@section('title')
    اضافة العهد
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
    العهد
@endsection

@section('sub_title')
    اضافة العهد
@endsection

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }

        .btn.btn-light:hover:not(.btn-text):not(:disabled):not(.disabled),
        .btn.btn-light:focus:not(.btn-text),
        .btn.btn-light.focus:not(.btn-text) {
            border: 1px solid #d5c1ff !important;

        }

        .btn.dropdown-toggle.btn-light.bs-placeholder {
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
                            <h3 class="card-label"> بيانات العهد <i class="mr-2"></i></h3>
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
                                </span>عرض العهد </a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('custody.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body">

                            {{-- 1 --}}
                            <div class="p-3 form-group row">
                                <label for="section_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الدائرة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">

                                        <select name="section_id" id="section_id"
                                            class="@error('section_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم الدائرة">
                                            <option value="">اختر الدائرة</option>
                                            @foreach ($section as $sections)
                                                <option value="{{ $sections->id }}">
                                                    {{ $sections->name_section }}
                                                </option>
                                            @endforeach
                                            @if ($errors->has('section_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('section_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <label for="sub_section_id " class="col-lg-2 col-form-label ">
                                    <h6><strong>القسم <span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select name="sub_section_id" id="sub_section_id"
                                            onclick="console.log($(this).val())" onchange="console.log('change is firing')"
                                            data-size="7" tabindex="null"
                                            class="@error('sub_section_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم القسم ">
                                            <option value="">اختر القسم </option>
                                            @foreach ($subSection as $subSections)
                                                <option value="{{ $subSections->id }}">
                                                    {{ $subSections->name }}
                                                </option>
                                            @endforeach
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
                                <label for="user_id" class="col-lg-2 col-form-label">
                                    <h6><strong>الموظف:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">

                                        <select name="user_id" id="user_id" data-size="7" tabindex="null"
                                            class="@error('user_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم القسم">


                                            {{-- @foreach ($user as $users)
                                                <option value="{{ $users->id }}">
                                                    {{ $users->employee_name }}
                                                </option>
                                            @endforeach --}}

                                            @if ($errors->has('user_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <label for="custody_num" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم العهدة:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="custody_num" type="number" min="0" class="form-control"
                                            id="custody_num" />
                                    </div>
                                </div>


                            </div>

                            <div class="p-3 form-group row">
                                <label for="date" class="col-lg-2 col-form-label ">
                                    <h6><strong> التاريخ:</strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" id="date" type="date" class="form-control"
                                            value="{{ date('Y-m-d') }}" placeholder="ادخل التاريخ">
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50%">الصنف
                                            <a href="{{ url('inventory/custody_Item/create') }}" title="اضافة صنف جديد"
                                                target="_blank">
                                                <i class="p-3 ki ki-solid-plus icon-md"></i>
                                            </a>
                                            <a href="{{ url('inventory/custody_Item') }}" title="عرض الأصناف"
                                                target="_blank">
                                                <i class="p-3 far fa-eye icon-md"></i>
                                            </a>
                                        </th>
                                        <th>الكمية</th>
                                        <th width="5%">جديد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control selectpicker" data-size="7" tabindex="null"
                                                title="أدخل الصنف" data-live-search="true" name="product[]"
                                                id="product[]">
                                                {{-- <option value="0">{{ 'اختر الصنف' }}</option> --}}
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="quantity[]" class="form-control"></td>
                                        <td> <button type="button" class="btn btn-primary" id="add-row">+</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>
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
        function myFunction() {
            var quantity = parseFloat(document.getElementById("quantity").value);
            var price = parseFloat(document.getElementById("price").value);
            var total = quantity * price;

            document.getElementById("Total").value = total;
        }
    </script>

    <script>
        $(document).ready(function() {
            // السماح بحذف صف من جدول المنتجات
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
                calculateTotalAll();
            });

            // تحويل الزر "add-row" لإضافة الصف إلى جدول المنتجات
            $("#add-row").click(function() {
                var html = "<tr>";
                html +=
                    "<td><select name='product[]' title='اختر الصنف' class='form-control' data-live-search='true'>";
                @foreach ($products as $product)
                    html +=
                        "<option value='{{ $product->id }}'>{{ $product->name }} </option>";
                @endforeach
                html += "</select></td>";
                html +=
                    "<td><input type='number' name='quantity[]' class='form-control'  onchange='calculateTotal(this); calculateTotalAll();'></td>";

                html += "<td><button type='button' class='btn btn-danger delete-row'>حذف</button></td>";
                html += "</tr>";
                $("table tbody").append(html);
            });

            // حساب الإجمالي الكلي
            function calculateTotalAll() {
                var total = 0;
                $("table tbody tr").each(function() {
                    var quantity = parseFloat($(this).find("input[name='quantity[]']").val());
                    var price = parseFloat($(this).find("input[name='price[]']").val());
                    var subtotal = quantity * price;
                    $(this).find("input[name='Total']").val(subtotal.toFixed(2));
                    total += subtotal;
                });
                $("#total-all").val(total.toFixed(2));
            }

        });

        function calculateTotal(element) {
            var tr = $(element).closest('tr');
            var quantity = parseFloat(tr.find("input[name='quantity[]']").val());
            var price = parseFloat(tr.find("input[name='price[]']").val());
            var total = quantity * price;
            tr.find("input[name='Total[]']").val(total);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="sub_section_id"]').on('change', function() {
                var sub_section_id = $(this).val();
                if (sub_section_id) {
                    $.ajax({
                        url: "{{ URL::to('getUsers') }}/" + sub_section_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="user_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="user_id"]').append(
                                    '<option value="' +
                                    value + '">' + value + '</option>');
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
