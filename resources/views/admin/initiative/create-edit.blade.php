@extends('admin.layouts.app')

@section('title')
    اضافة مبادرة
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">مبادرة جديد</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($initiative)? action('Admin\InitiativeController@update',$initiative):action('Admin\InitiativeController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($initiative))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    معلومات المبادرة *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_{{$key}}">الاسم {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="name_{{$key}}"
                                               placeholder="الاسم ب {{$locale->native()}}.. "
                                               value="{{ isset($initiative) ? isset($initiative->translate($key)->name) ? $initiative->translate($key)->name : old("name_". $key) ?? '' : old("name_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_{{$key}}">التوصيف {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="type_{{$key}}"
                                               placeholder="الاسم ب {{$locale->native()}}.. "
                                               value="{{ isset($initiative) ? isset($initiative->translate($key)->type) ? $initiative->translate($key)->type : old("type_". $key) ?? '' : old("type_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description_{{$key}}">الوصف {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="description_{{$key}}"
                                               placeholder="description for {{$locale->native()}}.. "
                                               value="{{ isset($initiative) ? isset($initiative->translate($key)->description) ? $initiative->translate($key)->description : old("description_". $key) ?? '' : old("description_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_{{$key}}">العنوان {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="address_{{$key}}"
                                               placeholder="الاسم ب {{$locale->native()}}.. "
                                               value="{{ isset($initiative) ? isset($initiative->translate($key)->address) ? $initiative->translate($key)->address : old("address_". $key) ?? '' : old("address_". $key) ?? '' }} "/>
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
                                           value="{{isset($initiative)?$initiative->facebook:old('facebook')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="twitter"
                                           placeholder="الرابط هنا"
                                           value="{{isset($initiative)?$initiative->twitter:old('twitter')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site">الموقع الالكتروني الخاص بالشركة</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="site"
                                           placeholder="الرابط هنا"
                                           value="{{isset($initiative)?$initiative->site:old('site')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="phone"
                                           placeholder="الرقم هنا"
                                           value="{{isset($initiative)?$initiative->phone:old('phone')??''}}"
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
                                           {{ isset($initiative) ? 'data-editable data-action=' . action('Admin\InitiativeController@featured', $initiative) : '' }} type="checkbox"
                                           id="featured" {{ isset($initiative) ? $initiative->featured ? 'checked' : '' : '' }} />
                                    <label for="featured"> مميز</label>
                                    <br>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">5</span>
                                            الصورة {{ isset($initiative) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(isset($initiative->image_path) && $initiative->image_path != "")
                                <div class="col-md-12" style="margin: 10px">
                                    <div class="row el-element-overlay">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $initiative->image_path) }}" alt="Main Page" style="background-color: white; max-width: 150px" />
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url('/storage/' . $initiative->image_path) }}" target="_blank"><i class="icon-magnifier"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">

                                    <label for="location">
                                        <h3>
                                            <span class="label label-info">4</span>
                                            العنوان {{ isset($initiative) ? '' : '' }}
                                        </h3>
                                    </label>
                            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lat">Latitude :</label>
                                            <input type="text" class="form-control form-control-line"
                                                   name="lat"
                                                   placeholder="الاحداثيات هنا"
                                                   value="{{isset($initiative)?$initiative->lat:old('lat')??''}}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="long">Longitude :</label>
                                            <input type="text" class="form-control form-control-line"
                                                   name="long"
                                                   placeholder="الاحداثيات هنا"
                                                   value="{{isset($initiative)?$initiative->long:old('long')??''}}"
                                            />
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
