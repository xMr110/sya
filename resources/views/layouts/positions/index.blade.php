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
                        <h1>@lang('navbar.positions')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section-services">
            <div class="container" style="width: 100%!important;">
                @if($positions->count())
                    <div class="ui link cards" >
                    @foreach($positions as $position)
                          <div  class="card" style="margin-right: auto;margin-left: auto">
                              <a href="{{action('HomeController@position',$position)}}"><div class="image" style="width: 100%; background-color: white; margin: auto; margin-top: 10%;margin-bottom: 10% ">
                                        <img style="max-width: 100%; max-height: 100%" src="{{url('/storage/'.$position->image_path)}}">
                                    </div></a>
                                    <div class="content utest">
                                        <div class="header">{{$position->name}}</div>

                                    </div>

                                </div>
                       @endforeach
                        </div>
                @endif

                {{--if emptye--}}
                @if(!$positions->count())
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


                <div class="row">
                    <div class="col-md-6">
                      </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
@endsection

