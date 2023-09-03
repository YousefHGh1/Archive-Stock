@extends('layout.master')

@section('title')
    تعديل المخازن
@endsection

@section('page_title')
    لوحة التحكم
@endsection

@section('sub_main')
المخازن
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

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="col-md-11 card">
            <!--begin::Card body-->
            <div class=" card-body">

                <div class="card-header">
                    <h3 class="card-title">تعديل بيانات المخزن {{$store->store_name}}</h3>
                </div>
                <!--begin::Form-->
                <form action="{{route('store.update', $store->id)}}" method="post" class="needs-validation" novalidate
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {!! csrf_field() !!}

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="store_num" class="col-2 col-form-label"><h5><strong>رقم المخزن</strong></h5> </label>
                            <div class="col-6 primary">
                                <input name="store_num" type="number" value="{{$store->store_num}}" class="form-control" id="store_num" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="store_name" class="col-2 col-form-label"><h5><strong>اسم المخزن</strong></h5> </label>
                            <div class="col-6 primary">
                                <input name="store_name" type="text" value="{{$store->store_name}}" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="address" class="col-2 col-form-label"><h5><strong>عنوان المخزن</strong></h5> </label>
                            <div class="col-6 primary">
                                <input name="address" type="text" value="{{$store->address}}" class="form-control" />
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
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>



@endsection

@section('scripts')

@endsection



