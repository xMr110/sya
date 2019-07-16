@extends('layouts.app')



@section('content')
    <!-- subheader -->
    <section id="AboutUs-subheader" style = "
             @if(isset($settings->About_subheader))
             background: url({{'/storage/' .$settings->About_subheader}}) fixed;
             @endif height: 350px;"
             class="subheader dark no-top no-bottom"   data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>WHO WE ARE</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->


    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section aria-label="section-timeline">
            <div class="container">
                <div class="row">
                    <h1 >@lang('aboutus.about_title')</h1>
                    <br>
                    <div class="jetpack-video-wrapper"><span class="embed-youtube" style="text-align:center; display: block;"><iframe class='youtube-player' type='text/html' width='100%' height='485px' src="https://www.youtube.com/embed/QAAE3-NBcvc" allowfullscreen='true' style='border:0;'></iframe></span></div>
                    <br>
                    <h4 class="lead"><strong>@lang('aboutus.about_title_q1')</strong></h4>
                    <p style="font-weight: 600; font-size: 16px;">@lang('aboutus.about_lorem_q1')</p>
                    <h3 class="lead"><strong>@lang('aboutus.about_title_q2')</strong></h3>
                    <p style="font-weight: 600; font-size: 16px;">@lang('aboutus.about_lorem_q2')</p>
                    <p style="font-weight: 600; font-size: 16px">@lang('aboutus.about_lorem2_q2')</p>
                    <p class="lead"><strong>@lang('aboutus.about_concerned_title')</strong></p>
                    <ol>
                        <li style="font-weight: 400; font-size: 16px;">@lang('aboutus.about_concerned_1')</li>
                        <li style="font-weight: 400; font-size: 16px;">@lang('aboutus.about_concerned_2')</li>
                        <li style="font-weight: 400; font-size: 16px;">@lang('aboutus.about_concerned_3')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('aboutus.about_concerned_4')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('aboutus.about_concerned_5')</li>
                    </ol>
                    @if(isset($certificates) AND count($certificates) > 0)
                        <p class="lead"><strong>@lang('aboutus.about_certificate_title')</strong></p>
                        @foreach($certificates as $certificate)
                            <div class="col-md-2 col-xs-4" id="certificate" @if(config('app.locale') == "ar") style="float: right;" @endif>
                                <a href="{{action('HomeController@certificate',$certificate)}}" target="_blank">
                                <div class="image" >
                                    <img style="max-width: 200px;max-height: 100px;" src="{{url('/storage/'.$certificate->image_path)}}" title="@lang($certificate->name)">
                                </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

    </div>    
    <!-- section begin -->
    <div id="content" class="no-bottom no-top">
        <div id="top"></div>
        <section id="section-team" class="text-red no-top no-bottom" data-bgcolor="#000"
                 @if(isset($settings->Ourteam_Background))  style="background:url({{'/storage/' . $settings->Ourteam_Background}}) fixed;" @endif
                 data-stellar-background-ratio=".1" >

            <div class="overlay-bg t30">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}"><span class="uptitle" style="color: #ff4836">@lang('homepage.OurTeam_title')</span>@lang('homepage.OurTeam_subtitle')</h2>
                        </div>
                        <div class="media-carousel carousel slide media-carousel" id="media">

                            <div class="carousel-inner">
                                @foreach($memmbers as $key => $memmber)
                                    @if($key < 4)
                                        @if($key ==0)
                                            <div class="item active">
                                                @endif
                                                <div class="col-md-3 col-sm-6 ">
                                                    <div class="our-team">
                                                        <div class="pic">
                                                            <img src="{{url('/storage/'.$memmber->image_path)}}">
                                                            <ul class="social">
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['facebook']}}"
                                                                       class="fa fa-facebook" target="_blank" ></a></li>
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['google']}}"
                                                                       class="fa fa-twitter" target="_blank"></a></li>
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['instagram']}}"
                                                                       class="fa fa-instagram" target="_blank"></a></li>
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['linkedin']}}"
                                                                       class="fa fa-linkedin" target="_blank"></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="team-content" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                                                            <h3 class="title">{{$memmber->name}}</h3>
                                                            <span class="post">{{$memmber->job_title}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($key == 3)
                                            </div>
                                        @endif
                                    @endif

                                    @if($key > 3 and $key % 4 == 0)
                                        <div class="item text-center">
                                            @endif
                                            @if($key > 3)
                                                <div class="col-md-3 col-sm-6 ">
                                                    <div class="our-team">
                                                        <div class="pic">
                                                            <img src="{{url('/storage/'.$memmber->image_path)}}">
                                                            <ul class="social">
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['facebook']}}"
                                                                       class="fa fa-facebook"></a></li>
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['google']}}"
                                                                       class="fa fa-google-plus"></a></li>
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['instagram']}}"
                                                                       class="fa fa-instagram"></a></li>
                                                                <li>
                                                                    <a href="http://{{json_decode($memmber->social,true)['linkedin']}}"
                                                                       class="fa fa-linkedin"></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="team-content" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                                                            <h3 class="title">{{$memmber->name}}</h3>
                                                            <span class="post">{{$memmber->job_title}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if(($key > 3 and $key % 4 == 3) )
                                        </div>
                                    @endif
                                @endforeach

                            </div>



                            <ol class="carousel-indicators">
                                @foreach($memmbers as $key => $memmber)
                                    @if($key % 4 == 0)
                                        <li data-target="#media" data-slide-to="{{ $key }}"
                                            class="{{ !$key ? 'active' : '' }}"></li>
                                    @endif
                                @endforeach
                            </ol>


                        </div>
                        <a data-slide="prev" href="#media" style="margin-top: 250px;" class="left carousel-control">‹</a>
                        <a data-slide="next" href="#media" style="margin-top: 250px;" class="right carousel-control">›</a>

                    </div>
                </div>
            </div>

        </section>
    </div>
        <!-- section close -->

    @endsection

    <style>
        #certificate{
            text-align: center;
            padding: 0;
        }

        #section-team{
            height: fit-content;
        }
    </style>

    @section('script')
    <script>

        $('#something').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:true,
            autoplay: true,
            smartSpeed: 500,
            autoplayTimeout:3000,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1

                },
                800:{
                    items:3

                },
                1000:{
                    items:4

                },
                1500:{
                    item:5

                }
            },

        });

    </script>
    @endsection