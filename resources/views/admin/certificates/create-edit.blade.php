@extends('admin.layouts.app')

@section('title')
   Add new Certificate
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Certificate</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($certificate)? action('Admin\CertificateController@update',$certificate):action('Admin\CertificateController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($certificate))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    Certificate Information
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_{{$key}}">Address {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="name_{{$key}}"
                                               placeholder="Name in {{$locale->native()}}.. "
                                               value="{{ isset($certificate) ? isset($certificate->translate($key)->name) ? $certificate->translate($key)->name : old("name_". $key) ?? '' : old("name_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">2</span>
                                   Description
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
                                                placeholder="{{$locale->native()}}.. ">{{ isset($certificate) ? isset($certificate->translate($key)->description) ? $certificate->translate($key)->description : old('description_'. $key) ?? '' : old('description_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">3</span>
                                   Social Media
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="facebook"
                                           placeholder="Link"
                                           value="{{isset($certificate)?$certificate->facebook:old('facebook')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site">Website</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="site"
                                           placeholder="الرابط هنا"
                                           value="{{isset($certificate)?$certificate->site:old('site')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="phone"
                                           placeholder="الرقم هنا"
                                           value="{{isset($certificate)?$certificate->phone:old('phone')??''}}"
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
                                           {{ isset($certificate) ? 'data-editable data-action=' . action('Admin\CertificateController@featured', $certificate) : '' }} type="checkbox"
                                           id="featured" {{ isset($certificate) ? $certificate->featured ? 'checked' : '' : '' }} />
                                    <label for="featured"> مميز</label>
                                    <br>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">5</span>
                                            الصورة {{ isset($certificate) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(isset($certificate->image_path) && $certificate->image_path != "")
                                <div class="col-md-12" style="margin: 10px">
                                    <div class="row el-element-overlay">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $certificate->image_path) }}" alt="Main Page" style="background-color: white; max-width: 150px" />
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url('/storage/' . $certificate->image_path) }}" target="_blank"><i class="icon-magnifier"></i></a></li>
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
