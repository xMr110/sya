@extends('admin.layouts.app')

@extends('admin.layouts.app')
@section('title')
 الشركاء
@endsection

@section('bread')
    <li class="breadcrumb-item active">الشركاء</li>
@endsection
@section('style')
<link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row el-element-overlay">
        @if(!count($partners))
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="card-body">
                        <h1 class="text-danger">لم تقم بإضافة شركاء حتى لأن<i class="mdi mdi-emoticon-neutral"></i>
                        </h1><br>
                        <a href="{{action('Admin\PartnersController@create')}}"><h4><i class="mdi mdi-plus"></i>أضف</h4></a>
                    </div>
                </div>
            </div>
        @else
            @foreach($partners as $partner)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $partner->image_path) }}" alt="user" />
                    <div class="el-overlay">
                        <ul class="el-info">
                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{action('Admin\PartnersController@edit',$partner)}}"><i class="icon-pencil"></i></a></li>
                            <li><a class="btn btn btn-outline"  data-delete href="javascript:void(0);"><i class="icon-trash"></i></a>
                                <form action="{{ action('Admin\PartnersController@destroy', $partner) }}"
                                      method="post" id="delete">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <h3 class="box-title">{{$partner->name}}</h3> <small><a href="http://{{$partner->link}}">رابط الموقع الخاص بالشريك</a></small>
                    <br/>
                </div>
            </div>
        </div>
    </div>
            @endforeach
            @endif
    </div>
    @endsection
