@extends('layout.master')

@section('title', 'اضافة الأصناف')

@section('page_title', 'لوحة التحكم')

@section('sub_main', 'الأصناف')

@section('sub_title', 'اضافة الأصناف')

@section('css')
    <style>
        input,
        .btn.dropdown-toggle.btn-light.bs-placeholder,
        .btn.btn-light:hover:not(.btn-text):not(:disabled):not(.disabled),
        .btn.btn-light:focus:not(.btn-text),
        .btn.btn-light.focus:not(.btn-text) {
            border: 1px solid #d5c1ff !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">بيانات الأصناف</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('item.index') }}" class="btn btn-info font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <svg><!-- your SVG here --></svg>
                                </span>
                                عرض الأصناف
                            </a>
                            <x-add-resource-button />
                        </div>
                    </div>

                    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data" id="kt_form"
                        class="form needs-validation">
                        @csrf
                        <div class="card-body">

                            {{-- Category and Unit --}}
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label"><strong>العائلة:</strong></label>
                                <div class="col-lg-3">
                                    <select name="category_id" id="category_id" class="form-control selectpicker"
                                        data-live-search="true" title="اختر العائلة">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }} - {{ $category->category_num }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <a href="{{ route('category.create') }}"><i class="p-3 ki ki-solid-plus icon-md"></i></a>

                                <label class="col-lg-2 col-form-label"><strong>الوحدة:</strong></label>
                                <div class="col-lg-3">
                                    <select name="unit_id" id="unit_id" class="form-control selectpicker"
                                        data-live-search="true" title="اختر الوحدة">
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                                {{ $unit->unit_name }} - {{ $unit->unit_num }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <a href="{{ route('unit.create') }}"><i class="p-3 ki ki-solid-plus icon-md"></i></a>
                            </div>

                            {{-- Item Name and Number --}}
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label"><strong>اسم الصنف:</strong></label>
                                <div class="col-lg-3">
                                    <input type="text" name="item_name"
                                        class="form-control @error('item_name') is-invalid @enderror"
                                        placeholder="ادخل اسم الصنف" value="{{ old('item_name') }}">
                                    @error('item_name')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label class="col-lg-2 col-form-label"><strong>رقم الصنف:</strong></label>
                                <div class="col-lg-3">
                                    <input type="number" name="item_num" id="item_num"  class="form-control @error('item_num') is-invalid @enderror"
                                        placeholder="ادخل رقم الصنف" value="{{ old('item_num') }}">
                                    @error('item_num')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Open Balance and Low Limit --}}
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label"><strong>الرصيد الافتتاحي:</strong></label>
                                <div class="col-lg-3">
                                    <input type="number" name="open_balance"
                                        class="form-control @error('open_balance') is-invalid @enderror"
                                        placeholder="ادخل الرصيد" value="{{ old('open_balance') }}">
                                    @error('open_balance')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label class="col-lg-2 col-form-label"><strong>الحد الأدنى:</strong></label>
                                <div class="col-lg-3">
                                    <input type="number" name="low_limit"
                                        class="form-control @error('low_limit') is-invalid @enderror"
                                        placeholder="ادخل الحد الأدنى" value="{{ old('low_limit') }}">
                                    @error('low_limit')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Hidden Balance --}}
                            <input type="hidden" name="balance" id="balance" value="0">
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-2">
                                    <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                    <button type="reset" class="btn btn-danger">إلغاء</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
{{-- 
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                const categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: "{{ route('last_item', ':id') }}".replace(':id', categoryId),
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data && data.last_item_num !== undefined) {
                                // زيادة الرقم بمقدار 1 على الرقم الأخير
                                const newItemNum = parseInt(data.last_item_num) + 1;
                                $('#item_num').val(newItemNum);
                            } else {
                                // إذا لم يكن هناك صنف سابق، تعيين الرقم الافتراضي بناءً على رقم العائلة
                                $('#item_num').val(categoryId + '1');
                            }
                        },
                        error: function() {
                            $('#item_num').val('');
                        }
                    });
                }
            });
        });
    </script> --}}
@endsection
