@extends('admin.layouts.app')

@section('title')
   Add new Position
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Position</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($position)? action('Admin\PositionController@update',$position):action('Admin\PositionController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($position))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    Position Information
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_{{$key}}">Address {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="name_{{$key}}"
                                               placeholder="Name in {{$locale->native()}}.. "
                                               value="{{ isset($position) ? isset($position->translate($key)->name) ? $position->translate($key)->name : old("name_". $key) ?? '' : old("name_". $key) ?? '' }} "/>
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
                                                placeholder="{{$locale->native()}}.. ">{{ isset($position) ? isset($position->translate($key)->description) ? $position->translate($key)->description : old('description_'. $key) ?? '' : old('description_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">4</span>
                                    معلومات إضافية
                                </h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="featured"
                                           {{ isset($position) ? 'data-editable data-action=' . action('Admin\PositionController@featured', $position) : '' }} type="checkbox"
                                           id="featured" {{ isset($position) ? $position->featured ? 'checked' : '' : '' }} />
                                    <label for="featured"> مميز</label>
                                    <br>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">5</span>
                                            الصورة {{ isset($position) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(isset($position->image_path) && $position->image_path != "")
                                <div class="col-md-12" style="margin: 10px">
                                    <div class="row el-element-overlay">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $position->image_path) }}" alt="Main Page" style="background-color: white; max-width: 150px" />
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url('/storage/' . $position->image_path) }}" target="_blank"><i class="icon-magnifier"></i></a></li>
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
