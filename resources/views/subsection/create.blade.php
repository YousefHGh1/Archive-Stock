@extends('layout.master')

@section('title')
    إضافة قسم فرعي
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الأقسام الفرعية
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
        <h3 class="card-label"> بيانات الأقسام الفرعية <i class="mr-2"></i></h3>
        </div>

        <div class="card-toolbar">

            <a href="{{url('subSection')}}" class="btn btn-info font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>عرض الأقسام الفرعية</a>
        </div>


        </div>
           <!--begin::Form-->
        <form action="{{ route('subSection.store') }}" method="post" class="form needs-validation" novalidate enctype="multipart/form-data" id="kt_form">
            @csrf
            {!! csrf_field() !!}
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <div class="my-10 separator separator-dashed"></div>

                            <div class="form-group row">
                                <label for="exampleSelectd" class="text-lg col-lg-2 col-form-label"> القسم الرئيسي:</label>
                                <div class="col-10">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="@error('section_id') is-invalid @enderror form-control selectpicker"  data-size="7"  tabindex="null" data-live-search="true"
                                        title="..." name="section_id" id="section_id">
                                            @foreach ($section as $sections)
                                                <option value="{{$sections->id}}">{{$sections->name_section}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="text-lg col-lg-2 col-form-label">القسم الفرعي:</label>
                            <div class="col-10">
                            <input  name="name" type="text"  class="@error('name') is-invalid @enderror form-control" id="name" placeholder="ادخل القسم الفرعي" />
                            </div>
                            </div>

                        </div>
                        <div class="my-10 separator separator-dashed"></div>

                    </div>
                <div class="col-xl-2"></div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <button type="submit" class="mr-2 btn btn-success">حفظ</button>
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



