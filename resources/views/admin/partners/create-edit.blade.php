@extends('admin.layouts.app')

@section('title')
   @if(isset($partner))
    تعديل شريك
    @else
    شريك جديد
    @endif
    @endsection

@section('bread')
    <li class="breadcrumb-item">الشركاء</li>
    <li class="breadcrumb-item active">شريك جديد</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">شريك جديد</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($partner)? action('Admin\PartnersController@update',$partner):action('Admin\PartnersController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($partner))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">الاسم ( بالعربية او الأنكليزية )</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="name"
                                           placeholder="الاسم"
                                           value="{{isset($partner)?$partner->name:old('name')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">رابط موقع الشركة</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="link"
                                           placeholder="رابط الموقع"
                                           value="{{isset($partner)?$partner->link:old('link')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">لوغو الشركة</span>
                                            الصورة {{ isset($partner) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-success btn-rounded" type="submit">أدخل</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
