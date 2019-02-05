@extends('layouts.app')

@section('style')
    {{--semantic ui--}}
    <link href="/assets/frontend/semantic/card.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- subheader -->
    <section id="blog-subheader"
             @if(isset($settings->Blog_subheader))
             style="background: url({{'/storage/' .$settings->Blog_subheader}}) fixed;"
             @endif
             class="subheader dark no-top no-bottom" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('navbar.initiatives')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section-services">
            <div class="container">
                @if($initiatives->count())
                    <div class="ui link cards" >
                    @foreach($initiatives as $initiative)
                          <div class="Pass-id card" style="margin-right: auto;margin-left: auto" data-id="{{$initiative}}"  data-toggle="modal" data-target="#MyModal">
                                    <div class="image" style="width: 200px; height: 200px; background-color: white; margin: auto; margin-top: 10%;margin-bottom: 10% ">
                                        <img src="{{url('/storage/'.$initiative->image_path)}}">
                                    </div>
                                    <div class="content utest">
                                        <div class="header">{{$initiative->name}}</div>
                                        <div class="meta">
                                            <a>{{$initiative->phone}}</a>
                                        </div>
                                        <div class="description">
                                            {{str_limit($initiative->description,100)}}
                                        </div>
                                    </div>

                                </div>
                       @endforeach
                        </div>
                @endif

                {{--if emptye--}}
                @if(!$initiatives->count())
                    <article class="single-from-blog">
                        <figure>
                            <h4>Note</h4>
                        </figure>
                        <div class="blog-title">
                            <h2><a href="#">Come Back Later</a></h2>
                        </div>
                        <p>Sorry There is No Posts Right now ...</p>
                    </article>
                @endif


                <div class="row">
                    <div class="col-md-6">
                      </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->






    <div id="MyModal"  class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="border-bottom: 1px solid grey; padding: 20px; margin: 10px;" class="row">
                    <h1 id="title"></h1>
                </div>
                <div  class="row" style="padding: 30px;">
                    <div id="image"  class="col-md-4">
                    </div>
                    <div  class=" col-md-6">
                        <h5 id="site"></h5>
                        <h5 id="facebook"></h5>
                        <p id="description"></p>
                        <div style="display: none" id="mapinfo"></div>
                        <div style="padding: 10px;" class="mapouter" id="mapouter">

                            <div  class="map" id="map"></div>


                            <style>
                                .mapouter {
                                    text-align: right;
                                    height: 500px;
                                    width: 135%;
                                }
                                .map {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 135%;
                                }
                            </style>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        $('.Pass-id').click(function () {
            document.getElementById("title").innerText =$(this).data('id').name;
            document.getElementById("description").innerText =$(this).data('id').description;
            document.getElementById("site").innerText ="SITE: "+$(this).data('id').site;
            document.getElementById("facebook").innerText ="FB Page: "+$(this).data('id').facebook;
            $.ajax({
                url: '/initiative/{id}/image',
                type: 'GET',
                data: $(this).data('id'),
                success: function(response)
                {
                    $('#image').html(response);
                }
            });
            $.ajax({
                url: '/initiative/{id}/map',
                type: 'GET',
                data: $(this).data('id'),
                success: function(response)
                {
                    $('#mapinfo').html(response);
                    initMap();

                }
            });

        });

        var map;
        function initMap() {
            var latitude =parseFloat($("input[name='lat']").val()); // YOUR LATITUDE VALUE
            var longitude =parseFloat($("input[name='long']").val()); // YOUR LONGITUDE VALUE
            var myLatLng = {lat: latitude, lng: longitude};

            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 10
            });
            var marker = new google.maps.Marker({position: myLatLng, map: map});
        }
    </script>

    <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX2YTXGETKmbutCt94wZaiZcGp_Jif_C0&callback=initMap&libraries=places"></script>

    @endsection