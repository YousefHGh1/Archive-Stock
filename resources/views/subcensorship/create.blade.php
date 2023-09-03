@extends('layout.master')

@section('title')
    إضافة قسم
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الأقسام
@endsection
@section('sub_title')
    صفحة الإضافة
@endsection

@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="container">
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
        <div class="card-title">
        <h3 class="card-label"> بيانات الأقسام <i class="mr-2"></i></h3>
        </div>
 
  
        </div>
               <!--begin::Form-->
    <form action="{{ route('subcensorship.store') }}" method="post" class="form needs-validation" novalidate enctype="multipart/form-data" id="kt_form">
        @csrf
        {!! csrf_field() !!}
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <div class="separator separator-dashed my-10"></div>
                            <div class="form-group row">
                            <label class="col-3">القسم</label>
                            <div class="col-9">
                            <input  name="name" type="text"  class="@error('name') is-invalid @enderror form-control" id="name" placeholder="ادخل اسم القسم" />
                            </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-3">رقم القسم</label>
                            <div class="col-9">
                                <input  name="number" type="text"  class="@error('number') is-invalid @enderror form-control" id="number" placeholder="ادخل رقم القسم" />

                            </div>
                            </div>
                        </div> 
                        <div class="separator separator-dashed my-10"></div>

                    </div>
                <div class="col-xl-2"></div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-success mr-2">حفظ</button>
                        <button type="reset" class="btn btn-danger">إلغاء</button>
                    </div>
                   
                </div>
            </div>
    </form>

 
        <!--end::Form-->
        </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection



