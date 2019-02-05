@extends('layouts.app')

@section('content')
    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <!-- section begin -->
        <section aria-label="section-404" class="full-height relative no-top no-bottom text-light" data-stellar-background-ratio=".2" data-bgimage="url(/assets/frontend/images/background/6.html">

            <div id="particles-js"></div>

            <div class="overlay-bg t80">
                <div class="center-y fadeScroll relative text-center" data-scroll-speed="4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="spacer-single"></div>
                                <div class="mask">
                                    <h4 class="s1 wow fadeInUp" data-wow-delay=".5s"><span class="id-color">Page not found</span></h4>
                                </div>
                                <div class="spacer-single"></div>
                                <div class="mask">
                                    <h1 class="wow fadeInUp ultra-big" data-wow-delay="1s">404!</h1>
                                </div>
                                <div class="spacer-double"></div>
                                <a href="/" class="wow fadeIn btn btn-custom" data-wow-delay="1.5s">Back to homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- section close -->
    </div>
    <!-- content close -->

@endsection
