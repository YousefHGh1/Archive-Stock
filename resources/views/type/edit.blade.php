@extends('layout.master')

@section('title')
    تعديل نوع المراسلات
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    نوع المراسلات
@endsection
@section('sub_title')
    صفحة التعديل
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
                            <h3 class="card-label"> تعديل أنواع المراسلات <i class="mr-2"></i></h3>
                        </div>

                    </div>
                    <!--begin::Form-->
                    <form action="{{route('type.update', $type->id)}}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      {!! csrf_field() !!}
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="name" class="col-3 col-form-label"><h5><strong>نوع المراسلة</strong></h5></label>
                              <div class="col-6">
                                  <input  name="name" type="text" class="form-control" id="name" value="{{ $type->name }}"  />
                              </div>
                          </div>
      
                          <div class="form-group row mt-4">
                              <label class="col-3 col-form-label"><h5><strong>رقم نوع المراسلة</strong></h5> </label>
                              <div class="col-6">
                                  <input name="number" type="number" class="form-control" id="number" value="{{ $type->number }}"   />
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
    </div>
@endsection

@section('scripts')
@endsection
