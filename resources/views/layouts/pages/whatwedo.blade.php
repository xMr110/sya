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

    <!-- content begin -->
    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section aria-label="section-timeline">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <ul class="timeline s1">
                            @foreach($projects as $key => $project)
                            <li class="{{ $key % 2 != 0 ? 'timeline-inverted' : '' }}">
                                <div class="timeline-badge"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{url('/storage/' .$project->image_path)}}" class="img-shadow img-responsive" alt="">
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="id-color">{{$project->Date}}</h5>
                                                <p>{{$project->title}}</p>
                                                <p>
                                                    {{$project->body}}
                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->




@endsection
