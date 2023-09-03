@extends('layout.master')

@section('title')
    تعديل المورد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
المورد 
@endsection
@section('sub_title')
    صفحة التعديل
@endsection
@section('css')
<style>
    .form-label:focus {
        border-color: #df10e667;
        box-shadow: 0 0 0 0.2rem rgba(7, 125, 221, 0.25);
    }
</style>
@endsection

@section('content')
    <!-- Main content -->
<div class="m-content">
@include('layout.error')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">تعديل بيانات الموردين</h3>
            </div>
            <!--begin::Form-->
            <form action="{{route('subCensorship.update', $subCensorship->id)}}" method="post" class="needs-validation" novalidate
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {!! csrf_field() !!}
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label"><h5><strong>اسم المورد</strong></h5></label>
                        <div class="col-6">
                            <input  name="name" type="text" class="form-control" id="name" value="{{ $subCensorship->name }}"  />
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label"><h5><strong>رقم المورد</strong></h5> </label>
                        <div class="col-6">
                            <input name="number" type="number" class="form-control" id="number" value="{{ $subCensorship->number }}"   />
                        </div>
                    </div>
                

                   
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary mr-2">تعديل</button>
                            <button type="reset" class="btn btn-secondary">الغاء</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
</div>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection



