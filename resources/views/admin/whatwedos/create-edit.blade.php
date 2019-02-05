@extends('admin.layouts.app')
@section('title')
    إضافة منشور
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
                          action="{{ isset($Project_Activit) ? action('Admin\WhatwedoController@update', $Project_Activit) : action('Admin\WhatwedoController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($Project_Activit))
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
                                               value="{{ isset($Project_Activit) ? isset($Project_Activit->translate($key)->title) ? $Project_Activit->translate($key)->title : old("title_". $key) ?? '' : old("title_". $key) ?? '' }} "/>
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
                                            المحتوى {{$locale->native()}}
                                        </label>
                                        <textarea class="form-control form-control-line" rows="5"
                                                  name="body_{{$key}}"
                                                  placeholder=" محتوى المنشور {{$locale->native()}}.. ">{{ isset($Project_Activit) ? isset($Project_Activit->translate($key)->body) ? $Project_Activit->translate($key)->body : old('body_'. $key) ?? '' : old('body_'. $key) ?? '' }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">3</span>
                                            الصورة {{ isset($Project_Activit) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="label label-info">4</span>
                                    <label for="Date">التاريخ</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="Date"
                                           placeholder="التاريخ"
                                           value="{{isset($Project_Activit)?$Project_Activit->Date:old('Date')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="label label-info">5</span>
                                    <label for="type">النوع</label>
                                    <select name="type" id="type" class="form-control" onchange="showDiv(this)">
                                        <option value="0">أختر نوع</option>
                                        <option value="1" {{ isset($Project_Activit) ? $Project_Activit->type == 1 ? 'selected' : '' : '' }}>مشروع</option>
                                        <option value="2" {{ isset($Project_Activit) ? $Project_Activit->type == 2 ? 'selected' : '' : '' }}>نشاط</option>
                                         </select>
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


