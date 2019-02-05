@extends('admin.layouts.app')

@section('title')
    اضافة برنامج
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">برنامج جديد</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($program)? action('Admin\ProgramController@update',$program):action('Admin\ProgramController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($program))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    معلومات البرنامج *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_{{$key}}">العنوان {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="name_{{$key}}"
                                               placeholder="الاسم ب {{$locale->native()}}.. "
                                               value="{{ isset($program) ? isset($program->translate($key)->name) ? $program->translate($key)->name : old("name_". $key) ?? '' : old("name_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">2</span>
                                    الوصف *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description_{{$key}}">

                                            المحتوى ({{$locale->native()}})

                                        </label>

                                        <textarea
                                                class="form-control form-control-line mymce"
                                                rows="5"
                                                name="description_{{$key}}"
                                                placeholder="{{$locale->native()}}.. ">{{ isset($program) ? isset($program->translate($key)->description) ? $program->translate($key)->description : old('description_'. $key) ?? '' : old('description_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">3</span>
                                    وسائل التواصل  *
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="facebook"
                                           placeholder="الرابط هنا"
                                           value="{{isset($program)?$program->facebook:old('facebook')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site">الموقع الالكتروني الخاص بالبرنامج</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="site"
                                           placeholder="الرابط هنا"
                                           value="{{isset($program)?$program->site:old('site')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="phone"
                                           placeholder="الرقم هنا"
                                           value="{{isset($program)?$program->phone:old('phone')??''}}"
                                    />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">4</span>
                                    معلومات إضافية
                                </h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="featured"
                                           {{ isset($program) ? 'data-editable data-action=' . action('Admin\ProgramController@featured', $program) : '' }} type="checkbox"
                                           id="featured" {{ isset($program) ? $program->featured ? 'checked' : '' : '' }} />
                                    <label for="featured"> مميز</label>
                                    <br>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">5</span>
                                            الصورة {{ isset($program) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(isset($program->image_path) && $program->image_path != "")
                                <div class="col-md-12" style="margin: 10px">
                                    <div class="row el-element-overlay">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $program->image_path) }}" alt="Main Page" style="background-color: white; max-width: 150px" />
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url('/storage/' . $program->image_path) }}" target="_blank"><i class="icon-magnifier"></i></a></li>
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
