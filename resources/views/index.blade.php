@extends('layouts.app')

@section('style')

    {{--semantic ui--}}
    <link href="/assets/frontend/semantic/card.css" rel="stylesheet" type="text/css">


@endsection

@section('content')
    <!-- content begin -->
    <div id="content" class="no-bottom no-top">
        <div id="top"></div>

        <!-- section begin -->
        <section id="section-hero-2"  @if(isset($settings->main_Background)) style="background: linear-gradient(rgba(0,0,0,0.30), rgba(0,0,0,0.30)), url({{'/storage/' . $settings->main_Background}}) top;" @endif class="full-height relative no-top no-bottom text-light " dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">

            <div id="particles-js"></div>

            <div class="overlay-bg t0">
                <div class="center-y fadeScroll relative" data-scroll-speed="4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8"  @if(config('app.locale') == "ar") style=" float: none;" @endif >
                                {{--<div class="mask">--}}
                                    {{--<h4 class="s1 wow fadeInUp" data-wow-delay=".5s"><span class="id-color2">Lorem</span>--}}
                                    {{--</h4>--}}
                                {{--</div>--}}
                                <div class="mask">
                                    <h1 class="wow fadeInUp big" data-wow-delay="1s">@lang('homepage.Main_title')<span
                                            class="id-color">.</span></h1>
                                </div>
                            </div>

                            <div class="spacer-half"></div>

                            <div class="col-md-6"  @if(config('app.locale') == "ar") style=" float: none;" @endif >
                                <div class="mask">
                                    <p class="wow fadeInUp big" data-wow-delay="1.5s">@lang('homepage.Main_subitile')
                                    </p>
                                </div>
                                <div class="spacer-half"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-about" >
            <div class="container"  style="width: 100%!important;">
                <div class="row" >
                    <div class="col-md-12" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                        <div class="col-md-12 text-center" style="padding-left: 0">
                            <h2 style="text-align: center; font-size: 30px; margin-bottom: 10px;">@lang('homepage.OutEducational_title')</h2>
                        </div>

                        <div class="row">

                            @if($programs->count())
                                <div class="col-md-12" style="text-align: center;">

                                    <div class="ui link cards"  style="margin: 10px;">
                                        @foreach($programs as $program)
                                            <div class="card"  style="margin-right: auto;margin-left: auto">
                                                <a href="{{action('HomeController@program',$program)}}">  <div class="image" style="width: 100%;  background-color: white; margin: auto; margin-top: 10%;margin-bottom: 10% ">
                                                    <img style="max-width: 100%;max-height: 100%;" src="{{url('/storage/'.$program->image_path)}}">
                                                </div>
                                                </a>
                                                <div class="content utest" style="text-align: center;">
                                                    <div class="header">{{$program->name}}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a href="/programs" target="_blank"
                                       class="btn btn-custom color-1" id="button">See More</a>
                                </div>

                            @endif
                        </div>
                    </div>


                 </div>
            </div>
        </section>
        <!-- section close -->


        <!-- section begin 2 -->
        <section id="section-process"  class="text-red no-top no-bottom" data-bgcolor="#333"
                @if(isset($settings->Joinus_Background))  style="background:url({{'/storage/' . $settings->Joinus_Background}}) fixed;"
                 @endif
                 data-stellar-background-ratio=".2" >
            <div class="overlay-bg t30">
                <div class="container">
                    <div class="row">
                        <div class="text-light col-md-12 text-center" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                            <h2><span class="uptitle" style="color: #ff4836;">@lang('homepage.JoinUs_title')</span>@lang('homepage.JoinUs_subtitle')</h2>
                           </div>


                        <div class="col-md-12">
                            <div class="de_tab tab_steps style-2">
                                <ul class="de_nav">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="active"><span style="display:block;margin: 0px auto;"><img
                                                            src="/assets/frontend/images/icons/2.png" style=" margin-left:15px; width: 50px;height: 50px; display: block;">@lang('homepage.JoinUs_Organisation')</span>
                                                <div class="arrow"></div>
                                                <div id="tab1" style="color: #fff;" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                                                   {{$company->body}}
                                                </div>
                                                <a href="{{$company->link}}" target="_blank"
                                                   class="btn btn-custom color-2" id="button">Join</a>


                                            </li>
                                        </div>
                                        <div class="col-md-6">
                                            <li class="active"><span style="display:block;margin: 0px auto;"><img
                                                            src="/assets/frontend/images/icons/1.png" style=" margin-left:15px; width: 50px;height: 50px; display: block;">@lang('homepage.JoinUs_Person')</span>
                                                <div class="arrow"></div>
                                                <div id="tab2" style="color: #fff;" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                                                  {{$person->body}}
                                                </div>
                                                <a href="{{$person->link}}" target="_blank"
                                                   class="btn btn-custom color-2">Join</a>
                                            </li>
                                        </div>
                                    </div>

                                </ul>

                                <div class="de_tab_content">


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

{{--Partner--}}
        <!-- section begin -->

        <section  id="section-fun-facts" class="pt40 pb40 text-light" data-bgcolor="#404040">
            <div id="x_020_partner"
                 class=" partner  x_020_partner_control_button four_coloumns swipe_x ps_easeOutInCubic"
               style="border:0;">
                <div class="x_020_partner_header"><h1>@lang('homepage.OurPartner_title')<span>@lang('homepage.OurPartner_subtitle')</span></h1></div>
                    <div id="something" class="owl-carousel owl-theme" >
                        @foreach($partners as $partner)
                    <div class="item" style="transition-duration: 500ms;">
                            <div class="x_020_partner_image">
                                <a href="{{$partner->link}}"><img alt="" src="{{url('/storage/'.$partner->image_path)}}"></a>
                            </div>
                    </div>
                            @endforeach
                    </div>
               </div>


        </section>

        <!-- section close -->




        <!-- section begin 2 -->
        <section id="section-process"  class="text-red no-top no-bottom" data-bgcolor="#333"
                 @if(isset($settings->initiative_Background))  style="background:url({{'/storage/' . $settings->initiative_Background}}) fixed;"
                 @endif
                 data-stellar-background-ratio=".2" >
            <div class="overlay-bg t30">
                <div class="container"  style="width: 100%!important;">
                    <div class="row">
                        <div class="text-light col-md-12 text-center" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
                            <h2>@lang('homepage.initiative_subtitle')</h2>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        @if($initiatives->count())
                            <div class="col-md-12">
                                <div class="ui link cards">
                                    @foreach($initiatives as $initiative)
                                        <div  class="Pass-id card" data-id="{{$initiative}}"  data-toggle="modal" data-target="#MyModal" style="margin-right: auto;margin-left: auto">
                                            <div class="image" style="width: 100%;  background-color: white; margin: auto; margin-top: 10%;margin-bottom: 10% ">
                                                <img style="max-width: 100%; max-height: 100%" src="{{url('/storage/'.$initiative->image_path)}}">
                                            </div>
                                            <div class="content utest" style="text-align: center;">
                                                <div class="header">{{$initiative->name}}</div>
                                                <div class="meta">
                                                    <p>Phone : {{$initiative->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a style="    margin: 10px auto;
                                    border: 1px solid #fa6a2e;
                                    background: transparent;"
                                   href="/initiative" target="_blank" class="btn btn-custom color-2" id="button">More Details</a>
                            </div>

                        @endif
                    </div>

                </div>
                </div>
        </section>
        <!-- section close -->

        <div id="MyModal"  class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div style="border-bottom: 1px solid grey; padding: 20px; margin: 10px;" class="row">
                        <h1 id="title"></h1>
                    </div>
                    <div  class="row" style="padding: 30px;">
                        <div id="image"  class="col-md-4">
                        </div>
                        <div  class=" col-md-6">
                            <h5 id="site"></h5>
                            <h5 id="facebook"></h5>
                            <h5 id="phone"></h5>
                            <p id="description"></p>


                        </div>
                        <div class="row" style="padding: 20px;">
                            <div style="display: none" id="mapinfo"></div>
                            <div style="padding: 10px;" class="mapouter" id="mapouter">

                                <div  class="map" id="map"></div>


                                <style>
                                    .mapouter {
                                        text-align: right;
                                        height: 100%;
                                        width: 100%;
                                    }
                                    .map {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 100%px;
                                        width: 100%;
                                    }
                                </style>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- section begin -->
        <section id="section-fun-facts" class=" de_light pt40 pb40 ">
            <div class="container">

                <div class="row sequence">
                    <div class="col-md-3 col-sm-6 col-xs-6 sq-item wow">
                        <div class="de_count">
                            <h3 class="timer" data-to="{{isset($settings->statics1)?$settings->statics1:''}}" data-speed="2500">0</h3>
                            <span>@lang('homepage.numriecTitle1')</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 sq-item wow">
                        <div class="de_count">
                            <h3 class="timer" data-to="{{isset($settings->statics2)?$settings->statics2:''}}">0</h3>
                            <span>@lang('homepage.numriecTitle2')</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 sq-item wow" data-wow-delay=".5s">
                        <div class="de_count">
                            <h3 class="timer" data-to="{{isset($settings->statics3)?$settings->statics3:''}}">0</h3>
                            <span>@lang('homepage.numriecTitle3')</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 sq-item wow">
                        <div class="de_count">
                            <h3 class="timer" data-to="{{isset($settings->statics4)?$settings->statics4:''}}" data-speed="2500">0</h3>
                            <span>@lang('homepage.numriecTitle4')</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
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
        <!-- section close -->


    </div>
    <!-- content close -->
    <!-- Start popular-course Area -->
    <!-- End popular-course Area -->
@endsection


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




    <script>
        $('.Pass-id').click(function () {
            document.getElementById("title").innerText =$(this).data('id').name;
            document.getElementById("description").innerText =$(this).data('id').description;
            document.getElementById("site").innerText ="SITE: "+$(this).data('id').site;
            document.getElementById("facebook").innerText ="FB Page: "+$(this).data('id').facebook;
            document.getElementById("phone").innerText ="Phone: "+$(this).data('id').phone;
            $.ajax({
                url: '/initiative/{id}/image',
                type: 'GET',
                data: $(this).data('id'),
                success: function(response)
                {
                    $('#image').html(response);
                }
            });
            $.ajax({
                url: '/initiative/{id}/map',
                type: 'GET',
                data: $(this).data('id'),
                success: function(response)
                {
                    $('#mapinfo').html(response);
                    initMap();

                }
            });

        });

        var map;
        function initMap() {
            var latitude =parseFloat($("input[name='lat']").val()); // YOUR LATITUDE VALUE
            var longitude =parseFloat($("input[name='long']").val()); // YOUR LONGITUDE VALUE
            // var myLatLng = {lat: latitude, lng: longitude};
            var myLatLng = new google.maps.LatLng(latitude, longitude);

            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 10
            });

            var marker = new google.maps.Marker({position: myLatLng, map: map});
        }
    </script>
    <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX2YTXGETKmbutCt94wZaiZcGp_Jif_C0"></script>


@endsection



