@extends('layouts.app')

@section('style')
    <style>
        .pagination>li>a, .pagination>li>span{
            padding:13px 17px !important;
        }

        .fixed-size{
            object-fit: cover;
            width: 570px;
            height: 380px;
        }
    </style>
@endsection

@section('content')
    <!-- subheader -->
    <section id="blog-subheader"
             @if(isset($settings->Blog_subheader))
             style="background: url({{'/storage/' .$settings->Blog_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('navbar.blog')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section-services">
            <div class="container">
                @if($posts->count())
                    @foreach($posts as $key => $post)
                        @if( $key % 2 != 0)
                            <div class="row table wow slideInLeft">
                                <div class="padding40">
                                    <div class="post-text" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}"
                                         lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                                        <h3><a href="{{action('BlogController@show',$post)}}">{{$post->title}}</a></h3>
                                        <p>{!!str_limit($post->body,300)!!}</p>
                                        <span class="post-date">{{$post->created_at}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-middle">
                                    <a href="{{action('BlogController@show',$post)}}">
                                        <img src="{{url('/storage/' .$post->image_path)}}" class="img-responsive fixed-size"
                                             alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="spacer-double hidden-md hidden-lg"></div>
                        @elseif($key % 2 == 0)
                            <div class="row table wow slideInRight">
                                <div class="col-md-6 text-middle">
                                    <a href="{{action('BlogController@show',$post)}}">
                                        <img src="{{url('/storage/' .$post->image_path)}}" class="img-responsive"
                                             alt="">
                                    </a>
                                </div>
                                <div class="col-md-6 text-middle">
                                    <div class="padding40">
                                        <div class="post-text" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}"
                                             lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                                            <h3><a href="{{action('BlogController@show',$post)}}">{{$post->title}}</a>
                                            </h3>
                                            <p>{!!str_limit($post->body,300)!!}</p>
                                            <span class="post-date">{{$post->created_at}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="spacer-double"></div>--}}

                        @endif
                    @endforeach
                    {{$posts->links()}}
                @endif
                @if(!$posts->count())
                    <article class="single-from-blog">
                        <figure>
                            <h4>Note</h4>
                        </figure>
                        <div class="blog-title">
                            <h2><a href="#">Come Back Later</a></h2>
                        </div>
                        <p>Sorry There is No Posts Right now ...</p>
                    </article>
                @endif
            </div>
        </section>
    </div>
    <!-- content close -->






@endsection
