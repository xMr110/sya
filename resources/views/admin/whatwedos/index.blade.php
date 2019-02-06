@extends('admin.layouts.app')
@section('title')
    ماذا نفعل
@endsection

@section('bread')
    <li class="breadcrumb-item active">ماذا نفعل</li>
@endsection


@section('content')
    <div class="row">
        @if(!count($Project_Activits))
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="card-body">
            <h1 class="text-danger">لم تقم بإضافة مشاريع حتى لأن<i class="mdi mdi-emoticon-neutral"></i>
            </h1><br>
            <a href="{{action('Admin\WhatwedoController@create')}}"><h4><i class="mdi mdi-plus"></i>أضف</h4></a>
                </div>
            </div>
         </div>
    @else
            @foreach($Project_Activits as $Project_Activit)
        <!-- column -->
        <div class="col-lg-3 col-md-6">
            <!-- Card -->
            <div class="card">
                <img class="card-img-top img-responsive" src="{{ url('/storage/' . $Project_Activit->image_path) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$Project_Activit->translate('ar')->title }}</h4>
                    <p class="card-text">{{str_limit($Project_Activit->translate('ar')->body ,25)}}</p>
                    <p class="card-text">{{$Project_Activit->Date }}</p>
                    <p class="card-text">{{$Project_Activit->type }}</p>
                    <a href="{{action('Admin\WhatwedoController@edit',$Project_Activit)}}" class="btn btn-primary">تعديل</a>
                    {{--<a href="{{action('Admin\WhatwedoController@destroy',$Project_Activit)}}" class="btn btn-danger">حذف</a>--}}
                    <div style="display: inline-block"><a class="btn btn btn-outline"  data-delete href="javascript:void(0);"><i class="btn btn-danger">حذف</i></a>
                    <form action="{{ action('Admin\WhatwedoController@destroy', $Project_Activit) }}"
                          method="post" id="delete">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                    </form></div>
                </div>
            </div>
            <!-- Card -->
        </div>
        @endforeach
            @endif
    </div>
    @endsection
