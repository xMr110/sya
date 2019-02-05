@extends('layouts.app')

@section('title')
    <title>    {{ isset($post) ? 'SYA | ' : 'SYA' }} {{ $post->title }}
    </title>
    @endsection
@section('meta')
    <meta property="og:url"           content="http://danial.directgroup.co/post/{{$post->id}}" />
    <meta property="og:type"          content="SYA" />
    <meta property="og:title"         content="{{$post->title}}" />
    <meta property="og:description"   content="syrian youth assembly" />
    <meta property="og:image"         content="{{ url('/storage/' .$post->image_path) }}" />
    @endsection
@section('content')


    <!-- subheader -->
    <section  class="subheader dark no-top no-bottom" data-bgimage="url({{ url('/storage/' .$post->image_path) }}) fixed" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$post->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->


    <!-- content begin -->
    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-read">

                            <img src="{{ url('/storage/' .$post->image_path) }}" class="img-responsive" alt="">

                            <div class="post-text">
                                <h3><a href="#">{{$post->title}}</a></h3>
                                <p>{!! $post->body !!}.</p>
                                <span class="post-date">{{$post->created_at}}</span>
                            </div>
                        </div>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox">

                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bae883d1e36b8c5"></script>

                        </div>
                    </div>

                    <div id="sidebar" class="col-md-3">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <ul>
                                @foreach($populars as $popular)
                                <li><span class="date">{{$popular->created_at->format('d M')}}</span><a href="{{action('BlogController@show',$popular)}}">{{str_limit($popular->title,20)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-text">
                            <h4>About Us</h4>
                            <div class="small-border"></div>
                            The Syrian Youth Assembly was set up by a group of Syrian youth who were present at the World Humanitarian Summit in 2016. We are a platform for young Syrians to work together to build peace. This initiative is fully youth-led and we want to engage as many Syrian youth (18-29 years old) around the world.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->

@endsection

