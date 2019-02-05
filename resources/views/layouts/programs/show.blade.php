@extends('layouts.app')

@section('style')
    {{--semantic ui--}}
    <link href="/assets/frontend/semantic/card.css" rel="stylesheet" type="text/css">
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
                        <h1>{{$program->name}}</h1>
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
                    <div class="col-md-12">
                        <div class="blog-read">

                            <div style="width: 100%; text-align: center;">
                                <img  src="{{ url('/storage/' .$program->image_path) }}" class="img-responsive" alt="">
                            </div>

                            <div class="post-text">
                                <h3>{{$program->name}}</h3>
                                <p style="word-break: break-all">{!! $program->description !!}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->



@endsection