@extends('layouts.app')
@section('title')
    <title>    {{ isset($gpost) ? 'SYA | ' : 'SYA' }} {{ $gpost->title }}
    </title>
    @endsection

@section('content')
    <!-- subheader -->
    <section class="subheader dark no-top no-bottom" data-bgimage="url({{ url('/storage/' .$gpost->image_path) }}) fixed" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$gpost->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-read">

                            <img src="{{ url('/storage/' .$gpost->image_path) }}" class="img-responsive" alt="">

                            <div class="post-text">
                                <h3><a href="news-single.html">{{$gpost->title}}</a></h3>
                                <p>{{$gpost->body}}.</p>
                                <span class="post-date">{{$gpost->created_at}}</span>
                                <span class="post-auther">{{$gpost->name}}</span>
                            </div>
                        </div>
                        <div class="addthis_inline_share_toolbox">
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bae883d1e36b8c5"></script>
                        </div>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    </div>

                    <div id="sidebar" class="col-md-3">
                        @if($populars->count())
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <ul>
                                @foreach($populars as $popular)
                                <li><span class="date">{{$popular->created_at->format('d M')}}</span><a href="{{action('GuestblogController@show',$popular)}}">{{str_limit($popular->title,20)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="widget widget-text">
                            <h4>@lang('footer.about_title')</h4>
                            <div>
                                 @lang('footer.about_lorem')
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->

@endsection
