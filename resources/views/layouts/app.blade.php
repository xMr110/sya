<!DOCTYPE html>


<html {{ config('app.locale') == 'fr' ? 'fr' : '' }}>

<!-- Mirrored from www.themenesia.com/themeforest/linea-new/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Aug 2018 08:16:09 GMT -->
<head>


    @yield('title')
    @yield('meta')
   @include('layouts.meta')
    @yield('style')
</head>

<body id="homepage">

    <!-- header begin -->
    <header>
        @include('layouts.navbar')
    </header>
    <!-- header close -->

@yield('content')

<!-- section service begin -->
    @if(isset($settings->contactus_Background))
    <style>
       #section-contact.side-bg .background-image{background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url({{'/storage/' .$settings->contactus_Background}});}
    </style>
    @endif
    <style>
        @media only screen and (max-width: 920px) {
            .imagebg {
                height: 45%!important;
                width: 100%!important;
            }
        }
    </style>
    <section id="section-contact"  dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}" class="side-bg left no-top np-bottom" data-bgcolor="#f6f6f6" >
        <div class="image-container col-md-7 pull-left imagebg"  data-delay="0">
            <div class="background-image" style="max-height: 100%;
    max-width: 100%;
    background-size: cover;
    background-position: center;"></div>
        </div>

        <div class="container-fluid" >
            <div class="row-fluid">
                <div class="col-md-7 text-white"  @if( config('app.locale') == "ar" ) style="float:right;" @endif>
                    <div  style="    padding-left: 33px;
    padding-top: 80px;
    padding-bottom: 68px;">
                        <h3>@lang('homepage.Contactus_title')</h3>
                        <div class="spacer-half"></div>
                        <div class="row" >
                             <blockquote class="s1">
                                 @lang('homepage.contact_blockquote')
                             </blockquote>
                                <h3>@lang('homepage.Contactus_subtitle')</h3>
                                <address class="s1">
                                    @if(isset($settings->address) && $settings->address != "")
                                    <span><i class="fa fa-map-marker fa-lg"></i>{{$settings->address}}</span>
                                         @endif
                                    <!-- @if(isset($settings->phone) && $settings->phone != "")
                                    <span><i class="fa fa-phone fa-lg"></i>{{$settings->phone}}</span>
                                        @endif -->
                                    @if(isset($settings->email) && $settings->email != "")
                                    <span><i class="fa fa-envelope-o fa-lg"></i><a
                                            href="mailto:contact@example.com">{{$settings->email}}</a></span>
                                        @endif
                                </address>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="col-md-5">
                    <div class="inner-padding">
                        <h3>@lang('homepage.Contactus_messageus')</h3>
                        <form name="contactForm" id='contact_form' class="form-underline" method="post"
                              action='{{action('HomeController@postContact')}}'>
                            {{ csrf_field() }}
                            <div class="field-set">
                                <input type='text' name='name' id='name' class="form-control"
                                       placeholder="@lang('homepage.Contactus_Name')">
                            </div>

                            <div class="field-set">
                                <input type='text' name='email' id='email' class="form-control"
                                       placeholder="@lang('homepage.Contactus_Email')">
                            </div>

                            <div class="field-set">
                                <input type='text' name='phone' id='phone' class="form-control"
                                       placeholder="@lang('homepage.Contactus_Phone')">
                            </div>

                            <div class="field-set">
                                    <textarea name='message' id='message' class="form-control"
                                              placeholder="@lang('homepage.Contactus_Message')"></textarea>
                            </div>

                            <div class="spacer-half"></div>

                            <button type="submit" data-text="SUBMIT" class="btn btn-custom color-2"><span>SUBMIT</span></button>


                        </form>

                    </div>

                </div>

            </div>


    </section>

    <footer dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <div class="container">

            <div class="row">
                <div class="col-md-4" @if(config('app.locale') == "ar") style="float: right;" @endif>
                    <div class="widget"  style="color: #000000; !important;">
                        <h5 style="color: #000000; !important;">@lang('footer.about_title')</h5>
                        <div class="tiny-border"><span></span></div>
                        <p>@lang('footer.about_lorem')</p>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-2" @if(config('app.locale') == "ar") style="float: right; margin-left: 0; margin-right: 15%;" @endif >
                    <div class="row">
                        <div class="col-md-4 col-xs-4" @if(config('app.locale') == "ar") style="float: right;" @endif>
                            <div class="widget" style="color: #000000; !important;">
                                <h5 style="color: #000000; !important;">@lang('footer.sya_title')</h5>
                                <div  class="tiny-border"><span></span></div>
                                <ul>
                                    <li><a style="color: #000000; !important;" href="/about">About Us</a></li>
                                    <li><a  style="color: #000000; !important;" href="/post">Blog</a></li>
                                    <li><a  style="color: #000000; !important;" href="/apply">Apply Now</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-4" @if(config('app.locale') == "ar") style="float: right;" @endif>
                            <div class="widget"  style="color: #000000; !important;">
                                <h5 style="color: #000000; !important;">@lang('footer.Join_us')</h5>
                                <div  class="tiny-border"><span></span></div>
                                <ul>
                                    <li><a  style="color: #000000; !important;" href="#">@lang('homepage.JoinUs_Person')</a></li>
                                    <li><a  style="color: #000000; !important;" href="#">@lang('homepage.JoinUs_Organisation')</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-4">
                            <div class="widget"  style="color: #000000; !important;">
                                <h5 style="color: #000000; !important;">@lang('footer.help_title')</h5>
                                <div  class="tiny-border"><span></span></div>
                                <ul>
                                    <li><a  style="color: #000000; !important;" href="#contact_form">@lang('footer.help_link')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="subfooter">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        &copy; Copyright 2018 - DirectGroup
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer close -->

    <a href="#" id="back-to-top"></a>
    <div id="preloader">
        <div class="s1">
            <span></span>
            <span></span>
        </div>
    </div>
    <style>
        .icon-bar {
            position: fixed;
            top: 50%;
            right: 0;
            z-index: 1;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /* Style the icon bar links */
        .icon-bar a {
            display: block;
            text-align: center;
            padding: 16px;
            transition: all 0.3s ease;
            color: white;
            font-size: 20px;
        }

        /* Style the social media icons with color, if you want */
        .icon-bar a:hover {
            background-color: #000;
        }

        .facebook {
            background: #3B5998;
            color: white;
        }

        .twitter {
            background: #55ACEE;
            color: white;
        }

        .google {
            background: #dd4b39;
            color: white;
        }

        .instgram {
            background: #ff686d;
            color: white;
        }

        .linkedin {
            background: #3B5998;
            color: white;
        }

        .youtube {
            background: #bb0000;
            color: white;
        }
    </style>
    <div class="icon-bar">
        @if(isset($settings->facebook))
            <a href="{{$settings->facebook}}" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
        @endif
        @if(isset($settings->twitter))
            <a href="{{$settings->twitter}}" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
        @endif
        <!-- <a href="#" class="google" target="_blank"><i class="fa fa-google"></i></a> -->
        @if(isset($settings->instagram))
            <a href="{{$settings->instagram }}" class="instgram" target="_blank"><i class="fa fa-instagram"></i></a>
        @endif
         @if(isset($settings->linkedin))
            <a href="{{$settings->linkedin}}" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
        @endif
        <a href="https://www.youtube.com/channel/UCjfusGgFgy4SSoV_lAfZOrg" class="youtube" target="_blank"><i class="fa fa-youtube" target="_blank"></i></a>
    </div>
@include('layouts.scripts')

@yield('script')
</body>

<script>
    $(document).ready(function () {
        $('#media').carousel({
            pause: true,
            interval: false,
        });
    });
</script>


</html>
