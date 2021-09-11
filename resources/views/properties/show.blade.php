@extends('layouts.app')

<script src="{{ asset('js/app.js') }}"></script>


@section('content')


    <div class="container">

        <div class="row">
            <?php if($user = Auth::user())
            {
            ?>
            <form action="{{route('home.store')}}" id="contact_form" method="post">
                {{csrf_field()}}
                <input name="user_id" type="text" value="{{Auth::user()->id}}" hidden/>
                <input name="property_id" type="text" value="{{$property->id}}" hidden/>
                <button class="btn btn-secondary" type="submit">Dodaj u listu omiljenih</button>
            </form>
                <?php }
                ?>

                <div class="dropdown-header" style="margin-bottom: 10px;"> <h1>{{$property->title}}</h1></div>



                <?php

                    $id = $property->id;

                    $connect = mysqli_connect("localhost", "root", "", "zavrsni");

                    $result = $connect->query("SELECT image FROM property_images where property_id = $id ");

                ?>


                <div id="demo" class="carousel slide" data-ride="carousel" style="width: 100%;">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php
                            $i = 0;
                            foreach ($result as $row){
                                $actives = '';
                                if($i == 0){
                                    $actives = 'active';
                                }

                        ?>
                        <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

                        <?php $i++; }?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        foreach ($result as $row){
                            $actives = '';
                            if($i == 0){
                                $actives = 'active';
                            }

                            ?>
                        <div class="carousel-item <?= $actives; ?>">
                            <img src="/uploads/<?= $row['image']?>" width="100%">
                        </div>

                        <?php $i++; } ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>



            <div class="dropdown-header" style="margin-top: 30px;"><h2>Osnovni podaci</h2></div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID nekretnine: </th>
                    <th>{{$property->id}}</th>
                    <th>Cena</th>
                    <th>{{$property->price}}€</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Struktura</th>
                    <td>{{$property->structure->name}}</td>
                    <th scope="row">Površina</th>
                    <td>{{$property->area}}m2</td>
                </tr>
                <tr>
                    <th scope="row">Broj spavaćih soba</th>
                    <td>{{$property->bedrooms}}</td>
                    <th>Broj kupatila</th>
                    <td>{{$property->bathrooms}}</td>

                </tr>
                <tr>
                    <th scope="row">Opština</th>
                    <td>{{$property->location->name}}</td>
                    <th scope="row">Adresa</th>
                    <td>{{$property->adress}}</td>
                </tr>
                <tr>
                    <th scope="row">Grejanje</th>
                    <td>{{$property->heating->name}}</td>
                    <th scope="row">Parking</th>
                    <td>{{$property->parking->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Sprat</th>
                    <td>{{$property->floor}}</td>
                    <th scope="row">Poslednji sprat</th>
                    <td>{{$property->last_floor}}</td>
                </tr>


                </tbody>
            </table>


            <div class="dropdown-header" style="margin-top: 30px;"><h2>Opis</h2></div>

            <div class="jumbotron" style="width: 100%">{{$property->description}}</div>

                <?php
                    if(!is_null($property->video))
                        {
                ?>
                <div class="dropdown-header" style="margin-top: 30px;"><h2>Video nekretnine</h2></div>
                <div id="player"></div>

                <?php
                    }
                ?>



                <?php if($user = Auth::user())
                {
                    ?>
            <div class="row">
                <div class="col-6">
                    @include('inc.contact-form')
                </div>
                <div class="col-6">
                    @include('inc.view-property-form')
                </div>
            </div>

            <?php } else {?>
                <div class="row">
                        {{--@include('inc.contact-form')--}}
                </div>
            <?php } ?>

        </div>

    </div>




    @endsection





<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: '{{$property->video}}',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
        }
    }
    function stopVideo() {
        player.stopVideo();
    }
</script>

