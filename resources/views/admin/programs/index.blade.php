@extends('admin.layouts.app')

@section('title')
    برنامج تعليمي
@endsection


@section('bread')
    <li class="breadcrumb-item active">برنامج تعليمي</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection



@section('content')
    <div class="row el-element-overlay">
        @if(!count($programs))
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-danger">لم تقم بإضافة برامج حتى لأن<i class="mdi mdi-emoticon-neutral"></i>
                        </h1><br>
                        <a href="{{action('Admin\ProgramController@create')}}"><h4><i class="mdi mdi-plus"></i>أضف</h4></a>
                    </div>
                </div>
            </div>
        @else
            @foreach($programs as $program)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $program->image_path) }}" alt="user" />
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{action('Admin\ProgramController@edit', $program)}}"><i class="icon-pencil"></i></a></li>
                                        <li><a class="btn default btn-outline" data-delete
                                               href="javascript:void(0);"><i
                                                        class="icon-trash"></i></a>
                                            <form action="{{ action('Admin\ProgramController@destroy', $program) }}"
                                                  method="post" id="delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title">{{$program->name}}</h3> <small>
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
