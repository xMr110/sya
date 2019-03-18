@extends('layouts.app')


@section('content')

    <!-- subheader -->
    <section id="what-subheader"
             @if(isset($settings->What_subheader))
             style="background: url({{'/storage/' .$settings->What_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom"
             data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('navbar.what')</h1>
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
                    <h1 >@lang('whatwedo.whatwedo_title')</h1>
                    <br>
                    <h4 class="lead"><strong>@lang('whatwedo.whatwedo_title_q1')</strong></h4>
                    <p style="font-weight: 600; font-size: 16px;">@lang('whatwedo.whatwedo_lorem_q1')</p>
                    <p style="font-weight: 600; font-size: 16px;">@lang('whatwedo.whatwedo_lorem2_q1')</p>
                    <p style="font-weight: 600; font-size: 16px;">@lang('whatwedo.whatwedo_lorem3_q1')</p>
                    <p class="lead"><strong>@lang('whatwedo.whatwedo_concerned_title')</strong></p>
                    <ul>
                        <li style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_1')</li>
                        <li style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_2')</li>
                        <li style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_3')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_4')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_5')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_6')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_7')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_8')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_9')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_10')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_11')</li>
                        <!-- <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_12')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_13')</li>
                        <li  style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_concerned_14')</li> -->
                    </ul>
                    <br>
                    <p class="lead"><strong>@lang('whatwedo.whatwedo_work_title')</strong></p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_1')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_2')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_3')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_4')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_5')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_6')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_7')</p>
                    <p style="font-weight: 400; font-size: 16px;">@lang('whatwedo.whatwedo_work_8')</p>
                </div>
                <p>&nbsp;</p>
            </div>
        </section>
    </div>
    
    <!-- content close -->




@endsection
