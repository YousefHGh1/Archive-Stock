@extends('layouts.admin')
@section('title')
عرض التفاصيل
@endsection
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">لوحة التحكم</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">عرض أعضاء البلدية</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">عرض تفاصيل {{@$getMunicipalMember->name}} </span>
                        </a>
                    </li>


                </ul>
            </div>
            <div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <ul id="errors"></ul>


    <div class="m-portlet m-portlet--bordered m-portlet--unair">

        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--bordered m-portlet--unair">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    عرض التفاصيل

                                </h3>

                            </div>
                        </div>
                    </div>
                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input"  class="col-2 col-form-label  "> الاسم </label>
                                        <div class="col-10">
                                            <input class="form-control m-input " type="text" disabled value="{{@$getMunicipalMember->name}}" id="example-text-input">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input"  class="col-2 col-form-label  ">التخصص الجامعي</label>
                                        <div class="col-10">
                                            <input class="form-control m-input "  type="text" disabled value="{{@$getMunicipalMember->certification}}" id="example-text-input">

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input"  class="col-2 col-form-label  "> المنصب الوظيفي</label>
                                        <div class="col-10">
                                            <input class="form-control m-input "  type="text" disabled value="{{@$getMunicipalMember->categoryMember->name}}" id="example-text-input">

                                        </div>
                                    </div>
                                    <hr>
                                     <div class="form-group m-form__group row">
                                                                   <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك فيسبوك</label>
                                                                   <div class="col-10">
                                                                       <input class="form-control m-input " placeholder="ادخل لينك فيسبوك" type="text"  disabled value="{{  @$getMunicipalMember->facebook }}" id="example-text-input">
                                                                   </div>
                                                               </div>
                                                               <hr>
                                                               <div class="form-group m-form__group row">
                                                                   <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك تويتر</label>
                                                                   <div class="col-10">
                                                                       <input class="form-control m-input " placeholder="ادخل لينك تويتر" type="text" value="{{  @$getMunicipalMember->twitter }}" disabled id="example-text-input">
                                                                   </div>
                                                               </div>
                                                               <hr>
                                                               <div class="form-group m-form__group row">
                                                                   <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك انستجرام</label>
                                                                   <div class="col-10">
                                                                       <input class="form-control m-input " placeholder="ادخل لينك انستجرام" disabled value="{{  @$getMunicipalMember->instagram }}"  name="instagram" id="example-text-input">
                                                                   </div>
                                                               </div>
                                                               <hr>
                                                               <div class="form-group m-form__group row">
                                                                   <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك لينكدإن</label>
                                                                   <div class="col-10">
                                                                       <input class="form-control m-input " placeholder="ادخل لينك لينكدإن" type="text" value="{{  @$getMunicipalMember->linkedin }}" disabled id="example-text-input">
                                                                   </div>
                                                               </div>
                                                               <hr>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label  "> صورة شخصية</label>
                                        <div class="col-10">
                                            <img src="{{ asset('storage/municipalMember/' . @$getMunicipalMember->image) }}" width="200" height="200" class="img-responsive" align="center" />

                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input"  class="col-2 col-form-label  ">{{ ' كلمة (رؤية) الشخص' }}</label>
                                        <div class="col-10">
                                            <textarea disabled class="form-control m-input" style=" height: 300px;">{{@$getMunicipalMember->description}}</textarea>
                                        </div>
                                    </div>


                                </div>



                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>



        <!--end::Portlet-->
    </div>
@endsection





