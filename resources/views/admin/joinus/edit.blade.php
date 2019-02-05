@extends('admin.layouts.app')

@section('title')
    تعديل البيانات
    @endsection

@section('bread')
    <li class="breadcrumb-item">إنضم إلينا</li>
    <li class="breadcrumb-item active">تعديل البيانات</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{ isset($joinus) ? action('Admin\JoinusController@update', $joinus) : action('Admin\JoinusController@store') }}"
                          method="post">
                        {{ csrf_field() }}

                        @if(isset($joinus))
                            {{ method_field('PATCH') }}
                        @endif
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    المحتوى *
                                </h3>
                            </div>
                            @foreach(Localization::getSupportedLocales() as $key => $locale)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="body_{{$key}}">المحتوى {{$locale->native()}}</label>
                                        <input type="text" class="form-control form-control-line"
                                               name="body_{{$key}}"
                                               placeholder="body for {{$locale->native()}}.. "
                                               value="{{ isset($joinus) ? isset($joinus->translate($key)->body) ? $joinus->translate($key)->body : old("body_". $key) ?? '' : old("body_". $key) ?? '' }} "/>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <h3>
                                    <span class="label label-info">1</span>
                                    الرابط الخاص بفورم الإنضمام *
                                </h3>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link">الرابط</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="link"
                                           placeholder="link for form.. "
                                           value="{{ isset($joinus) ? isset($joinus->link) ? $joinus->link : old("link") ?? '' : old("link") ?? '' }} "/>
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
