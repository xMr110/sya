<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- logo begin -->
            @if(isset($settings->logo))
            <div id="logo">
                <a href="/">
                    <img id="Logo" class="logo" style="width: 180px;" src="{{ url('/storage/' . $settings->logo) }}" alt="">
                    {{--<img class="logo-2" src="/assets/frontend/images/logo-dark.png" alt="">--}}
                </a>
            </div>
                <style>
                    @media only screen and (max-width: 500px) {
                        #mainmenu li a {
                            color: #47454b!important;
                        }
                    }
                </style>
            <script>


                window.onscroll = function() {
                    growShrinkLogo();

                    function growShrinkLogo() {
                        var Logo = document.getElementById("Logo");
                        var mew1 = document.getElementById("me1");
                        var mew2 = document.getElementById("me2");
                        var mew3 = document.getElementById("me3");
                        var mew4 = document.getElementById("me4");
                        var mew5 = document.getElementById("me5");
                        var mew6 = document.getElementById("me6");
                        var mew7 = document.getElementById("me7");

                        if (document.body.scrollTop > 3 || document.documentElement.scrollTop > 3) {

                            Logo.style.width = '120px';
                            Logo.setAttribute('src', '{{url('/storage/' . $settings->logo)}}');
                            mew1.setAttribute('style','color:rgba(50,50,50,.60)');
                            mew2.setAttribute('style','color:rgba(50,50,50,.60)');
                            mew3.setAttribute('style','color:rgba(50,50,50,.60)');
                            mew4.setAttribute('style','color:rgba(50,50,50,.60)');
                            mew5.setAttribute('style','color:rgba(50,50,50,.60)');
                            mew6.setAttribute('style','color:rgba(50,50,50,.60)');
                            mew7.setAttribute('style','color:rgba(50,50,50,.60)');


                        } else {
                            Logo.style.width = '180px';
                            Logo.setAttribute('src', '{{ url('/storage/' . $settings->logo) }}');

                            mew1.setAttribute('style','color:rgba(255,255,255,.95)');
                            mew2.setAttribute('style','color:rgba(255,255,255,.95)');
                            mew3.setAttribute('style','color:rgba(255,255,255,.95)');
                            mew4.setAttribute('style','color:rgba(255,255,255,.95)');
                            mew5.setAttribute('style','color:rgba(255,255,255,.95)');
                            mew6.setAttribute('style','color:rgba(255,255,255,.95)');
                            mew7.setAttribute('style','color:rgba(255,255,255,.95)');

                        }
                    }
                }
            </script>
            <!-- logo close -->
@endif
            <!-- small button begin -->
            <span id="menu-btn"></span>
            <!-- small button close -->

            <!-- mainmenu begin -->
            <nav>
                <ul id="mainmenu">
                    <li>
                        <a id="me1" href="/"><b>@lang('navbar.home')</b><span></span></a>
                    </li>
                    <li><a id="me4"href="/about"><b>@lang('navbar.about')</b><span></span></a></li>
                    <li><a id="me5" href="/what_we_do"><b>@lang('navbar.what')</b><span></span></a></li>
                     <li><a id="me7"href="/initiative"><b>@lang('navbar.initiatives')</b><span></span></a></li>
                    <li><a id="me6" href="/programs"><b>@lang('navbar.programs')</b><span></span></a></li>
                    <li><a id="me2" href="/post"><b>@lang('navbar.blog')</b><span></span></a></li>
                    <li><a id="me3" href="{{action('GuestblogController@index')}}"><b>@lang('navbar.guest')</b><span></span></a></li>
                    @if(config('app.locale') == "ar")
                        <li><a style="color: #3f9aff" href="/lang/en"><b>@lang('navbar.english')</b><span></span></a></li>
                    @elseif(config('app.locale') == "en")
                        <li><a style="color: #3f9aff" href="/lang/ar"><b>@lang('navbar.arabic')</b><span></span></a></li>
                    @endif
                </ul>
            </nav>

        </div>
        <!-- mainmenu close -->

    </div>
</div>
