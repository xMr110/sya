@extends('admin.layouts.app')

@section('title')
    الإعدادت
@endsection

@section('bread')
    <li class="breadcrumb-item active">التحكم بصور الموقع</li>

@endsection

@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{  action('Admin\BackgroundController@store') }}" method="post" enctype="multipart/form-data" class="form-material">
                            {{csrf_field()}}
                        <div class="form-body">
                            <h3 class="card-title">التحكم بصور الموقع</h3>

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a  class="nav-link active" data-toggle="tab" href="#HomePageBackGround" role="tab"> <span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">صور الصفحة الرئيسية</span></a></li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#OtherPagesBackGround" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">صور الصفحات الفرعية</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="HomePageBackGround" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('main_Background') ? 'has-danger' : '' }}">
                                                <label class="control-label">الصورة الرئيسية</label>
                                                <input type="file" name="main_Background" class="form-control">
                                                @if ($errors->has('main_Background'))
                                                    <small class="form-control-feedback">{{ $errors->first('main_Background') }}</small>
                                                @endif

                                                @if(isset($settings->main_Background) && $settings->main_Background != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->main_Background) }}" alt="Main Page" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Joinus_Background') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة قسم أنضم الينا</label>
                                                <input type="file" name="Joinus_Background" class="form-control">
                                                @if ($errors->has('Joinus_Background'))
                                                    <small class="form-control-feedback">{{ $errors->first('Joinus_Background') }}</small>
                                                @endif
                                                @if(isset($settings->Joinus_Background) && $settings->Joinus_Background != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Joinus_Background) }}" alt="Join us" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Ourteam_Background') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة قسم فريقنا</label>
                                                <input type="file" name="Ourteam_Background" class="form-control">
                                                @if ($errors->has('Ourteam_Background'))
                                                    <small class="form-control-feedback">{{ $errors->first('Ourteam_Background') }}</small>
                                                @endif
                                                @if(isset($settings->Ourteam_Background) && $settings->Ourteam_Background != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Ourteam_Background) }}" alt="Our Team" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('contactus_Background') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة قسم تواصل معنا</label>
                                                <input type="file" name="contactus_Background" class="form-control">
                                                @if ($errors->has('contactus_Background'))
                                                    <small class="form-control-feedback">{{ $errors->first('contactus_Background') }}</small>
                                                @endif
                                                @if(isset($settings->contactus_Background) && $settings->contactus_Background != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->contactus_Background) }}" alt="Contact Us" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('initiative_Background') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة قسم مبادرات</label>
                                                <input type="file" name="initiative_Background" class="form-control">
                                                @if ($errors->has('initiative_Background'))
                                                    <small class="form-control-feedback">{{ $errors->first('initiative_Background') }}</small>
                                                @endif
                                                @if(isset($settings->initiative_Background) && $settings->initiative_Background != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->initiative_Background) }}" alt="initiative" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('donate_Background') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة قسم التبرع</label>
                                                <input type="file" name="donate_Background" class="form-control">
                                                @if ($errors->has('donate_Background'))
                                                    <small class="form-control-feedback">{{ $errors->first('donate_Background') }}</small>
                                                @endif
                                                @if(isset($settings->donate_Background) && $settings->donate_Background != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->donate_Background) }}" alt="Donate" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="OtherPagesBackGround" role="tabpanel">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Blog_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة  صفحة المدونة</label>
                                                <input type="file" name="Blog_subheader" class="form-control">
                                                @if ($errors->has('Blog_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('Blog_subheader') }}</small>
                                                @endif

                                                @if(isset($settings->Blog_subheader) && $settings->Blog_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Blog_subheader) }}" alt="Blog Subheader" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Guest_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة مدونة الزوار</label>
                                                <input type="file" name="Guest_subheader" class="form-control">
                                                @if ($errors->has('Guest_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('Guest_subheader') }}</small>
                                                @endif
                                                @if(isset($settings->Guest_subheader) && $settings->Guest_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Guest_subheader) }}" alt="Guest Blog" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('About_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة من نحن</label>
                                                <input type="file" name="About_subheader" class="form-control">
                                                @if ($errors->has('About_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('About_subheader') }}</small>
                                                @endif
                                                @if(isset($settings->About_subheader) && $settings->About_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->About_subheader) }}" alt="ِAbout Us" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('What_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة ماذا نفعل</label>
                                                <input type="file" name="What_subheader" class="form-control">
                                                @if ($errors->has('What_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('What_subheader') }}</small>
                                                @endif
                                                @if(isset($settings->What_subheader) && $settings->What_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->What_subheader) }}" alt="What We Do" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Apply_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة تقديم الطلب</label>
                                                <input type="file" name="Apply_subheader" class="form-control">
                                                @if ($errors->has('Apply_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('Apply_subheader') }}</small>
                                                @endif

                                                @if(isset($settings->Apply_subheader) && $settings->Apply_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Apply_subheader) }}" alt="Blog Subheader" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Write_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة كتابة تدوينة</label>
                                                <input type="file" name="Write_subheader" class="form-control">
                                                @if ($errors->has('Write_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('Write_subheader') }}</small>
                                                @endif
                                                @if(isset($settings->Write_subheader) && $settings->Write_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Write_subheader) }}" alt="Write a Blog" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Company_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة انضم الينا كـ منظمة</label>
                                                <input type="file" name="Company_subheader" class="form-control">
                                                @if ($errors->has('Company_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('Company_subheader') }}</small>
                                                @endif
                                                @if(isset($settings->Company_subheader) && $settings->Company_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Company_subheader) }}" alt="Support" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('Person_subheader') ? 'has-danger' : '' }}">
                                                <label class="control-label">صورة صفحة انضم الينا ك فرد</label>
                                                <input type="file" name="Person_subheader" class="form-control">
                                                @if ($errors->has('Person_subheader'))
                                                    <small class="form-control-feedback">{{ $errors->first('Person_subheader') }}</small>
                                                @endif
                                                @if(isset($settings->Person_subheader) && $settings->Person_subheader != "")
                                                    <div class="col-md-12" style="margin: 10px">
                                                        <div class="row el-element-overlay">
                                                            <div class="el-card-item">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ url('/storage/' . $settings->Person_subheader) }}" alt="Person" style="background-color: black; max-width: 150px" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection