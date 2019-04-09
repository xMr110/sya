@extends('admin.layouts.app')

@section('title')
    Certificate
@endsection


@section('bread')
    <li class="breadcrumb-item active">Certificate</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection



@section('content')
    <div class="row el-element-overlay">
        @if(!count($certificates))
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-danger">You haven't added any certificates yet<i class="mdi mdi-emoticon-neutral"></i>
                        </h1><br>
                        <a href="{{action('Admin\CertificateController@create')}}"><h4><i class="mdi mdi-plus"></i>Add</h4></a>
                    </div>
                </div>
            </div>
        @else
            @foreach($certificates as $certificate)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $certificate->image_path) }}" alt="user" />
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{action('Admin\CertificateController@edit', $certificate)}}"><i class="icon-pencil"></i></a></li>
                                        <li><a class="btn default btn-outline" data-delete
                                               href="javascript:void(0);"><i
                                                        class="icon-trash"></i></a>
                                            <form action="{{ action('Admin\CertificateController@destroy', $certificate) }}"
                                                  method="post" id="delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title">{{$certificate->name}}</h3> <small>
                                    <br/>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
