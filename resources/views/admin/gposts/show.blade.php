@extends('admin.layouts.app')

@section('title')
    تدوينات الزوار
@endsection

@section('bread')
    <li class="breadcrumb-item active">تدوينات زوار الموقع</li>
@endsection
{{--@section('style')--}}
    {{--<link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">--}}
{{--@endsection--}}


@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">معلومات التدوينة</h4>
                <div class="row p-t-20">
                        <div class="col-md-6">
                        <label for="title">العنوان</label>
                        <textarea class="form-control form-control-line" rows="5"
                                  name="title"
                                  placeholder="العنوان" readonly>{{isset($gpost)?$gpost->title_origin:old('title')??''}}</textarea>
                        </div>
                        <div class="col-md-6">
                        <label for="body">المحتوى</label>
                        <textarea class="form-control form-control-line" rows="5"
                                  name="body"
                                  placeholder="المحتوى" readonly>{{isset($gpost)?$gpost->body_origin:old('body')??''}}</textarea>
                    </div>

                    <div class="col-md-4">
                        <br>
                        <label for="image">الصورة المرفقة</label>

                    </div>
                    <div class="col-md-4">
                        <br><br>

                        <div class="card">
                            <img class="card-img-top img-responsive" src="{{ url('/storage/' . $gpost->image_path) }}" alt="Card image cap">
                        </div>

                    </div>
                    <div class="col-md-4"></div>

                </div>

            </div>
        </div>
    </div>
    @endsection
