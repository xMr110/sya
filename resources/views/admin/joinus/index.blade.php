@extends('admin.layouts.app')
@section('title')
    إنضم إلينا
    @endsection

@section('bread')
    <li class="breadcrumb-item active">إنضم إلينا</li>
@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-boredered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>النوع</th>
                            <th>المحتوى</th>
                            <th>الرابط</th>
                            <th>أخر تعديل</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><span class="label label-info">{{$company->slug}}</span></td>
                            <td>{{str_limit($company->translate('ar')->body,30)}}</td>
                            <td>{{$company->link}}</td>
                            <td>{{$company->updated_at}}</td>
                            <td>
                                {{----}}
                                <a href="{{ action('Admin\JoinusController@edit', $company) }}" data-toggle="tooltip"
                                   data-original-title="تعديل"> <i
                                        class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><span class="label label-success">{{$person->slug}}</span> </td>
                            <td>{{str_limit($person->translate('ar')->body,30)}}</td>
                            <td>{{$person->link}}</td>
                            <td>{{$person->updated_at}}</td>
                            <td>
                                {{--{{ action('Admin\AboutController@edit', $user) }}--}}
                                <a href="{{ action('Admin\JoinusController@edit', $person) }}" data-toggle="tooltip"
                                   data-original-title="تعديل"> <i
                                        class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection
