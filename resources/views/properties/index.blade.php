@extends('layouts.app')
<script src="{{ asset('js/app.js') }}"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1>Nekretnine</h1>
        </div>

        <div class="col-6">
            <form method="get" id="sort-form">
                <div class="row">
                    <div class="col-12">
                        <select class="browser-default custom-select" name="sort" id="sort" onchange="this.form.submit()">
                            <option value="0" hidden>Odaberi željeno sortiranje</option>
                            <option value="1">Sortiraj po datumu - novije</option>
                            <option value="2">Sortiraj po datumu - starije</option>
                            <option value="3">Sortiraj po ceni - jeftinije</option>
                            <option value="4">Sortiraj po ceni - skuplje</option>
                        </select>
                        <button type="submit" class="btn btn-primary" hidden></button>
                    </div>
                </div>
            </form>



        </div>

    </div>


    <div class="row">


        @if(count($properties) > 0)
            @foreach($properties as $property)

                <div class="col-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="/uploads/{{$property->featured_image}}">
                                    <div class="card-body">
                                        <h3><a href="/properties/{{$property->id}}">{{$property->adress}}</a></h3>
                                        <hr>
                                        <div class="d-flex justify-content-center align-items-center card-deck">
                                            <div class="row">
                                                <div class="col-4">
                                                    <i class="fa fa-home"></i>{{$property->area}}m2
                                                </div>
                                                <div class="col-4">
                                                    <i class="fa fa-bed"></i>{{$property->bedrooms}} sobe
                                                </div>
                                                <div class="col-4">
                                                    <i class="fa fa-building"></i>{{$property->floor}} sprat
                                                </div>
                                            </div>




                                        </div>
                                        <hr>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h5 style="color: #2fa360; font-family: Verdana;"><strong>{{$property->price}}€</strong></h5>

                                                </div>
                                                <div class="col-5">
                                                    <p>ID: {{$property->id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            @endforeach

                 {{$properties->links()}}



        @else
            <h3>Nema nekretnina</h3>




    @endif</div>

</div>
    @endsection



<script>

        $("heart").click(function(){
            $(this).find("i").removeClass("fa-heart-o").addClass("fa-heart");
        });

</script>


