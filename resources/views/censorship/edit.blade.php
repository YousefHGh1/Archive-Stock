@extends('layout.master')

@section('title')
    تعديل الوارد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الوارد
@endsection
@section('sub_title')
    صفحة التعديل
@endsection
@section('css')
<style>
    input{
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
                        <h3 class="card-label"> تعديل بيانات التوريد <i class="mr-2"></i></h3>
                        </div>                       
                       
                </div>
                <!--begin::Form-->
                <form action="{{ route('censorship.update',$censorship->id) }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                {!! csrf_field() !!}
                @method('PUT')
                    <div class="card-body" >
                       
                      <div class="form-group row p-3">
                            <label for="title" class="col-lg-2 col-form-label "><h6><strong>عنوان الموضوع:</strong></h6></label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input name="title" id="title" type="text" class="form-control"  min="0"  value="{{ $censorship->title }}" >
                                </div>
                            </div>
                      </div>
  
                        <div class="form-group row p-3">
                            <label for="sender" class="col-lg-2 col-form-label "><h6><strong>الجهة الوارد منها:</strong></h6></label>
                            <div class="dropdown bootstrap-select form-control dropup col-lg-9" >
                                <select class="form-control selectpicker" name="import_id" required id="import_id">
                                    <option value="option_select" disabled selected>الجهات الموردة</option>
                                    @foreach($import as $imports)
                                    <option value="{{ $imports->id }}" {{$censorship->import_id == $imports->id  ? 'selected' : ''}}>{{ $imports->import_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    
  
                        <div class="form-group row p-3">
                            <label for="number" class="col-lg-2 col-form-label "><h6><strong>رقم الوارد:</strong></h6></label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input  name="number" type="number" min="0" class="form-control" id="number" value="{{ $censorship->number }}"  />
                                </div>
                            </div>
                        </div>
  
                   
                        <div class="form-group row p-3">
                            <label for="date" class="col-lg-2 col-form-label "><h6><strong>تاريخ الوارد:</strong></h6></label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input  name="date" type="date"  class="form-control" id="date"  value="{{ $censorship->date }}"  />
                                </div>
                            </div>
                        </div>
  
                        <div class="form-group row p-3">
                          <label for="file" class="col-lg-2 col-form-label "><h6><strong>مرفق الوارد:</strong></h6></label>
                          <div class="col-lg-9">
                              <div class="input-group">
                                  <input  name="file" type="file" min="0" class="form-control" id="file"  value="{{ $censorship->file }}"  />       
                              </div>
                          </div>
                      </div>
                  
                    
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-success mr-2">تعديل</button>
                                <button type="reset" class="btn btn-danger">إلغاء</button>
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



