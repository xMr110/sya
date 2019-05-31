@extends('layouts.app')


@section('content')

    <!-- subheader -->
    <section id="Person-subheader"
             @if(isset($settings->Person_subheader))
             style="background: url({{'/storage/' .$settings->Person_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom"  data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('JoinusPerson.title')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section aria-label="section-timeline">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('JoinusPerson.title')</h1>
                        <p class="lead"><span style="font-weight: 400;">@lang('JoinusPerson.header_text')</span></p>
                        <ol>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.line1')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.line2')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.line3')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.line4')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.line5')</span></li>
                        </ol>
                        <p class="lead"><span style="font-weight: 400;">@lang('JoinusPerson.header_text2')</span></p>
                        <ol>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.text1')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.text2')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.text3')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.text4')</span></li>
                            <li style="font-weight: 600;"><span style="font-weight: 600;">@lang('JoinusPerson.text5')</span></li>
                        </ol>
                        <p class="lead">@lang('JoinusPerson.lorem')<a href="https://docs.google.com/forms/d/e/1FAIpQLSe2JjlKoWB1mNa6Vpfg67kcT8DlXwqySrxmu3K0tUfnPlXRyA/viewform"  target="_blank" style="font-weight: 600;" >@lang('JoinusPerson.lorem2_part2')</a></p>

                    </div>
                </div>

                <div>
                   @if(isset($positions) AND count($positions) > 0)
                        <p class="lead"><strong style="color: #c11515;!important">@lang('JoinusPerson.positions_title')</strong></p>
                        <ul>
                        @foreach($positions as $position)
                            <div class="col-md-2 col-xs-4" id="position" @if(config('app.locale') == "ar") style="float: right;" @endif>
                                <a href="{{action('HomeController@position',$position)}}" target="_blank">
                                <p style="font-weight: 600; font-size: 16px; color: #7f4eca">@lang($position->name)</p>
                                <img style="max-width: 200px;max-height: 100px;" src="{{url('/storage/'.$position->image_path)}}" title="@lang($position->name)" label="@lang($position->name)">
                                </a>
                            </div>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->



@endsection