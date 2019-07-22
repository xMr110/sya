@extends('admin.layouts.app')
@section('title')
    {{ isset($post) ? 'تعديل' : 'إضافة منشور' }}
@endsection
@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\PostController@index') }}">جميع المنشورات</a></li>
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
                          action="{{ isset($post) ? action('Admin\PostController@update', $post) : action('Admin\PostController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($post))
                            {{ method_field('PATCH') }}
                        @endif

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
                                               value="{{ isset($post) ? isset($post->translate($key)->title) ? $post->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
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
                                                placeholder="{{$locale->native()}}.. ">{{ isset($post) ? isset($post->translate($key)->body) ? $post->translate($key)->body : old('body_'. $key) ?? '' : old('body_'. $key) ?? '' }}</textarea>

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">3</span>
                                            الصورة {{ isset($post) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                    <div class="help-block">طول 380 بكسل وعرض 570 بكسل</div>
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


