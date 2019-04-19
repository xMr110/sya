@extends('layouts.app')

@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection

@section('content')
    <!-- subheader -->
    <section id="Guest-subheader"  @if(isset($settings->Guest_subheader)) style="background: url({{'/storage/' .$settings->Guest_subheader}}) fixed;" @endif class="subheader dark no-top no-bottom"  data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('navbar.guest')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section aria-label="section-services">
            <div
            class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="form-group" >
                            <a href="/write_with_us" target="_blank"
                               class="btn btn-custom color-1">Write a Blog</a>
                        </div>
                    </div>

                </div>
                @if($gposts->count())
                    <div class="row el-element-overlay">
                    @foreach($gposts as $gpost)
                    @if($gpost->body != Null)
                        <div class="col-lg-3 col-md-6">
                            <div class="card" style="background-color: #fff3cd">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="{{ url('/storage/' . $gpost->image_path) }}" alt="image" />
                                        <div class="el-overlay">
                                            <ul class="el-info">
                                                <li><a class="btn default btn-outline" href="{{action('GuestblogController@show',$gpost)}}"><i class="fa fa-search"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h3 class="box-title">{{$gpost->title}}</h3>
                                        <h3 class="box-title"><span>By </span>{{$gpost->name}}</h3>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                @else
               <h1>Sorry there is no Guests Blog to Show</h1>
                @endif
            </div>
        </section>
    </div>
    <!-- content close -->



@endsection