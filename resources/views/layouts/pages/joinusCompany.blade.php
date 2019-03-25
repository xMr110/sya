@extends('layouts.app')



@section('content')
    <!-- subheader -->
    <section id="Company-subheader"
             @if(isset($settings->Company_subheader))
             style="background: url({{'/storage/' .$settings->Company_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom"
             data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('JoinusCompany.title')</h1>
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
                    <div class="col-md-12">
                        <h1>@lang('JoinusCompany.title')</h1>
                        <br>
    <p class="lead"><span style="font-weight: 600;">@lang('JoinusCompany.header_text')</span></p>
    <p class="lead"><span style="font-weight: 400;">@lang('JoinusCompany.title2')</span></p>
    <ul>
        <li style="font-weight: 600; font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line1')</span></li>
        <li style="font-weight: 600;font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line2')</span></li>
        <li style="font-weight: 600;font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line3')</span></li>
        <li style="font-weight: 600;font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line4')</span></li>
        <li style="font-weight: 600;font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line5')</span></li>
        <li style="font-weight: 600;font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line6')</span></li>
        <li style="font-weight: 600;font-size: 14px;"><span style="font-weight: 600;">@lang('JoinusCompany.line7')</span></li>
    </ul>
                        <br>
    <p class="lead"><span style="font-weight: 400;">@lang('JoinusCompany.lorem')</span></p>
    <p class="lead"><span style="font-weight: 600;">@lang('JoinusCompany.lorem2_part1')</span><strong><a href="https://goo.gl/forms/CtaestpbRf4B6d2J3" target="_blank">@lang('JoinusCompany.lorem2_part2')</a>.</strong></p>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->



@endsection