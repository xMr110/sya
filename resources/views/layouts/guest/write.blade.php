@extends('layouts.app')

@section('content')
    <!-- subheader -->
    <section id="write-subheader"
             @if(isset($settings->Write_subheader))
             style="background: url({{'/storage/' .$settings->Write_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom" data-bgimage="url(/assets/frontend/images/misc/2.jpg)"
             data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>write with us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">

        <section class="visitor-post">
            <div class="container">
                <h1>Write with us</h1>
                <div class="write-post-form">
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{action('GuestblogController@store')}}"
                          method="POST">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Your Name..">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="title" id="inputAddress" placeholder="Title..">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="file">Upload Photo</label>
                                <input type="file" name="image_path" class="form-control" id="file">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="body" id="" placeholder="Write Your Post.."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-custom color-2">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

    </div>
    <!-- content close -->

    @endsection