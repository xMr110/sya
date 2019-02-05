@extends('layouts.app')

@section('content')
    {{--subheader start--}}
    <section id="apply-subheader"
             @if(isset($settings->Apply_subheader))
             style="background: url({{'/storage/' .$settings->Apply_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('navbar.apply')</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--end of subheader--}}

    <!-- content begin -->
    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section id="pricing-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item pricing">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <iframe src="{{$settings->RegisterForm}}" width="1000" height="1600" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>



    </div>
    <!-- content close -->
    @endsection
