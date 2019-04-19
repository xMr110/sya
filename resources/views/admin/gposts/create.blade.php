@extends('admin.layouts.app')
@section('title')
    {{ isset($post) ? 'تعديل' : 'إضافة منشور' }}
@endsection
@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\GpostController@index') }}">جميع المنشورات</a></li>
    <li class="breadcrumb-item active">منشور جديد</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">منشور جديد</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{action('Admin\GpostController@store')}}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($post))
                            {{ method_field('PATCH') }}
                        @endif

                        <input id="title" name="title" type="hidden" value="{{isset($gpost->title_origin) ? $gpost->title_origin : '_' }}">
                        <input id="body" name="body" type="hidden" value="{{isset($gpost->body_origin) ? $gpost->body_origin : '_' }}">

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-line" name="name" id="name" placeholder="Name.." value="{{ isset($gpost) ? isset($gpost->name) ? $gpost->name : old("name") ?? '' : old("name") ?? '' }}"/>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ isset($gpost) ? isset($gpost->email) ? $gpost->email : old("email") ?? '' : old("email") ?? '' }}"/>
                            </div>
                        </div>
                        <div class="row p-t-20">

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    العنوان *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_{{$key}}">العنوان {{$locale->native()}}</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="title_{{$key}}"
                                           placeholder="Title for {{$locale->native()}}.. "
                                           value="{{ isset($gpost) ? isset($gpost->translate($key)->title) ? $gpost->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">2</span>
                                    المحتوى *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="body_{{$key}}">

                                            المحتوى ({{$locale->native()}})

                                        </label>

                                        <textarea
                                                class="form-control form-control-line mymce"
                                                rows="5"
                                                name="body_{{$key}}"
                                                placeholder="{{$locale->native()}}.. ">{{ isset($gpost) ? isset($gpost->translate($key)->body) ? $gpost->translate($key)->body : old('body_'. $key) ?? '' : old('body_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">3</span>
                                            الصورة {{ isset($gpost) ? '' : '*' }}
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


