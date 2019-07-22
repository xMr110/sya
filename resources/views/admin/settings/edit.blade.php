@extends('admin.layouts.app')
@section('title')
    الإعدادت
@endsection

@section('bread')
    <li class="breadcrumb-item active">الإعدادات</li>

@endsection

@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection


@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{  route('admin.settings.store') }}" method="post" enctype="multipart/form-data"
                          class="form-material">
                        {{ csrf_field() }}
                        <div class="form-body">

                            <h3 class="card-title">تعديل إعدادت الموقع</h3>

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basics"
                                                        role="tab"> <span class="hidden-sm-up"><i
                                                    class="ti-home"></i></span> <span class="hidden-xs-down">المحتويات الأساسية</span></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#social"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span class="hidden-xs-down">صفحات التواصل الاجتماعي</span></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">تواصل معنا</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#statics"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">الأحصائيات</span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#links"
                                                        role="tab"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">رابط الفورم</span></a></li>

                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="basics" role="tabpanel">
                                    <div class="row p-t-20">

                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                                                <label class="control-label">العنوان الأساسي</label>
                                                <input type="text" name="title" class="form-control"
                                                       value="{{ $settings->title ?? '' }}">
                                                @if ($errors->has('title'))
                                                    <small class="form-control-feedback">{{ $errors->first('title') }}</small>
                                            @endif

                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('favicon') ? 'has-danger' : '' }}">
                                                <label class="control-label">أيقونة الموقع</label>
                                                <input type="file" name="favicon" class="form-control">

                                                @if ($errors->has('favicon'))
                                                    <small class="form-control-feedback">{{ $errors->first('favicon') }}</small>
                                                @endif

                                                @if(isset($settings->favicon) && $settings->favicon != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1"><img
                                                                            src="{{ url('/storage/' . $settings->favicon) }}"
                                                                            alt="Main Page"
                                                                            style="background-color: black; max-width: 150px">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif
                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('logo') ? 'has-danger' : '' }}">
                                                <label class="control-label">الشعار</label>
                                                <input type="file" name="logo" class="form-control">
                                                @if ($errors->has('logo'))
                                                    <small class="form-control-feedback">{{ $errors->first('logo') }}</small>
                                                @endif
                                                @if(isset($settings->logo) && $settings->logo != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1"><img
                                                                            src="{{ url('/storage/' . $settings->logo) }}"
                                                                            alt="Main Page"
                                                                            style="background-color: black; max-width: 150px"/>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif

                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('paginationLimit') ? 'has-danger' : '' }}">
                                                <label class="control-label" for="paginationLimit">عدد المنشورات بكل صفحة في المدونة</label>
                                                <input id="paginationLimit" type="number" name="paginationLimit" class="form-control"
                                                       value="{{ $settings->paginationLimit ?? '' }}">
                                                @if ($errors->has('paginationLimit'))
                                                    <small class="form-control-feedback">{{ $errors->first('paginationLimit') }}</small>
                                            @endif

                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="social" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                                                <label class="control-label">فيسبوك</label>
                                                <input type="text" name="facebook" class="form-control"
                                                       value="{{ $settings->facebook ?? '' }}">
                                                @if ($errors->has('facebook'))
                                                    <small class="form-control-feedback">{{ $errors->first('facebook') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                                                <label class="control-label">تويتر</label>
                                                <input type="text" name="twitter" class="form-control"
                                                       value="{{ $settings->twitter ?? '' }}">
                                                @if ($errors->has('twitter'))
                                                    <small class="form-control-feedback">{{ $errors->first('twitter') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                                                <label class="control-label">انستغرام</label>
                                                <input type="text" name="instagram" class="form-control"
                                                       value="{{ $settings->instagram ?? '' }}">
                                                @if ($errors->has('instagram'))
                                                    <small class="form-control-feedback">{{ $errors->first('instagram') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('linkedin') ? 'has-danger' : '' }}">
                                                <label class="control-label">لينكد إن</label>
                                                <input type="text" name="linkedin" class="form-control"
                                                       value="{{ $settings->linkedin ?? '' }}">
                                                @if ($errors->has('linkedin'))
                                                    <small class="form-control-feedback">{{ $errors->first('linkedin') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contact" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                                <label class="control-label">العنوان</label>
                                                <input type="text" name="address" class="form-control"
                                                       value="{{ $settings->address ?? '' }}">
                                                @if ($errors->has('address'))
                                                    <small class="form-control-feedback">{{ $errors->first('address') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                                <label class="control-label">رقم الهاتف</label>
                                                <input type="text" name="phone" class="form-control"
                                                       value="{{ $settings->phone ?? '' }}">
                                                @if ($errors->has('phone'))
                                                    <small class="form-control-feedback">{{ $errors->first('phone') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                                <label class="control-label">الأيميل</label>
                                                <input type="text" name="email" class="form-control"
                                                       value="{{ $settings->email ?? '' }}">
                                                @if ($errors->has('email'))
                                                    <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="statics" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('statics1') ? 'has-danger' : '' }}">
                                                <label class="control-label">احصائيات 1</label>
                                                <input type="text" name="statics1" class="form-control"
                                                       value="{{ $settings->statics1 ?? '' }}">
                                                @if ($errors->has('statics1'))
                                                    <small class="form-control-feedback">{{ $errors->first('statics1') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('statics2') ? 'has-danger' : '' }}">
                                                <label class="control-label">احصائيات 2</label>
                                                <input type="text" name="statics2" class="form-control"
                                                       value="{{ $settings->statics2 ?? '' }}">
                                                @if ($errors->has('phone'))
                                                    <small class="form-control-feedback">{{ $errors->first('statics2') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('statics3') ? 'has-danger' : '' }}">
                                                <label class="control-label">إحصائيات 3</label>
                                                <input type="text" name="statics3" class="form-control"
                                                       value="{{ $settings->statics3 ?? '' }}">
                                                @if ($errors->has('statics3'))
                                                    <small class="form-control-feedback">{{ $errors->first('statics3') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('statics4') ? 'has-danger' : '' }}">
                                                <label class="control-label">إحصائيات 4</label>
                                                <input type="text" name="statics4" class="form-control"
                                                       value="{{ $settings->statics4 ?? '' }}">
                                                @if ($errors->has('statics4'))
                                                    <small class="form-control-feedback">{{ $errors->first('statics4') }}</small>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="links" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('RegisterForm') ? 'has-danger' : '' }}">
                                                <label class="control-label">رابط الفورم</label>
                                                <input type="text" name="RegisterForm" class="form-control"
                                                       value="{{ $settings->RegisterForm ?? '' }}">
                                                @if ($errors->has('RegisterForm'))
                                                    <small class="form-control-feedback">{{ $errors->first('RegisterForm') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> حفظ</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
