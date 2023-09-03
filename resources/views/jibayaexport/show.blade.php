@extends('layout.master')

@section('title')
     صادر الجباية
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
الجباية
@endsection
@section('sub_title')
     عرض توريدة 
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
                <h3 class="card-title">بيانات الصادر رقم : <span>{{$jibayaexport->id}}</span> </h3>
            </div>
            <!--begin::Form-->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label"><h5><strong>عنوان الموضوع</strong></h5></label>
                        <div class="col-6">
                            <input  name="title" type="text" class="form-control" id="title" value="{{ $jibayaexport->title }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label"><h5><strong> الجهة الصادر منها</strong></h5> </label>
                        <div class="col-6">
                            <input name="sender" type="text" class="form-control" id="sender" value="{{ $jibayaexport->sender }}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label"><h5><strong>رقم الصادر</strong></h5> </label>
                        <div class="col-6 primary">
                            <input name="number" type="number" class="form-control" id="number" value="{{ $jibayaexport->number }}" disabled/>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label"><h5><strong>تاريخ التوريد</strong></h5> </label>
                        <div class="col-6">
                            <input name="date" type="date" class="form-control" id="date" value="{{ $jibayaexport->date }}" disabled/>
                        </div>
                    </div>
                    {{-- multiple --}}
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label"><h5><strong>مرفق الصادر</strong></h5>  </label>
                        <div class="col-6">
                            <a name="file" type="file" class="form-control"  id="file" href="#" disabled>{{$jibayaexport->file}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <a type="submit" href="{{ route('jibayaexport.index') }}" class="btn btn-primary mr-2">عودة</a>
                            <a type="submit" href="{{ route('jibayaexport.create') }}" class="btn btn-success">الإضافة</a>
                        </div>
                    </div>
                </div>
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



