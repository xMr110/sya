@extends('layouts.app')



@section('content')
    <!-- subheader -->
    <section id="AboutUs-subheader"
             @if(isset($settings->About_subheader))
             style="background: url({{'/storage/' .$settings->About_subheader}}) fixed;"
             @endif
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
                    <div class="jetpack-video-wrapper"><span class="embed-youtube" style="text-align:center; display: block;"><iframe class='youtube-player' type='text/html' width='825' height='465' src='http://www.youtube.com/embed/Map8Mli8oDs?version=3&#038;rel=1&#038;fs=1&#038;autohide=2&#038;showsearch=0&#038;showinfo=1&#038;iv_load_policy=1&#038;wmode=transparent' allowfullscreen='true' style='border:0;'></iframe></span></div>
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
                </div>
                <p>&nbsp;</p>
            </div>
        </section>
    </div>

    @endsection