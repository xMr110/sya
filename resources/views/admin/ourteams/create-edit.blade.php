@extends('admin.layouts.app')

@section('title')
    اضافة عنصر  للفريق
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">عضو جديد</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($ourteam)? action('Admin\OurteamsController@update',$ourteam):action('Admin\OurteamsController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($ourteam))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    معلومات العضو *
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">الاسم ( بالعربية او الأنكليزية )</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="name"
                                           placeholder="الاسم"
                                           value="{{isset($ourteam)?$ourteam->name:old('name')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_title">المركز الوظيفي</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="job_title"
                                           placeholder="المركز الوظيفي"
                                           value="{{isset($ourteam)?$ourteam->job_title:old('job_title')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">2</span>
                                    وسائل التواصل الاجتماعي *
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="facebook"
                                           placeholder="الرابط هنا"
                                           value="{{isset($ourteam)?json_decode($ourteam->social,true)['facebook']:old('facebook')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">instagram</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="instagram"
                                           placeholder="الرابط هنا"
                                           value="{{isset($ourteam)?json_decode($ourteam->social,true)['instagram']:old('instagram')??''}}"
                                    />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">v</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="linkedin"
                                           placeholder="الرابط هنا"
                                           value="{{isset($ourteam)?json_decode($ourteam->social,true)['linkedin']:old('linkedin')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="google">Google+</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="google"
                                           placeholder="الرابط هنا"
                                           value="{{isset($ourteam)?json_decode($ourteam->social,true)['google']:old('google')??''}}"
                                    />
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">الصورة الشخصية</span>
                                            الصورة {{ isset($ourteam) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(isset($ourteam->image_path) && $ourteam->image_path != "")
                                <div class="col-md-12" style="margin: 10px">
                                    <div class="row el-element-overlay">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $ourteam->image_path) }}" alt="Main Page" style="background-color: black; max-width: 150px" />
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url('/storage/' . $ourteam->logo) }}" target="_blank"><i class="icon-magnifier"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
