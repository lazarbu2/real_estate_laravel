<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="/css/app.css"/>
    <title>Nekretnine</title>
</head>
<body>

@include('inc.navbar')

@include('inc.welcome-search')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Agencija za nekretnine</h1>
        <p class="lead text-muted">SEO - optimizacija pocetne strane</p>

    </div>
</section>
    <div class="container-fluid">
        {{--<form action="/search1" method="GET">
            <div class="container bg-light ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-2 pt-3">
                        <div class="form-group ">
                            <select id="usluga123" class="form-control">
                                <option value="" selected disabled>Usluga</option>
                                <option value="1">Prodaja</option>
                                <option value="2">Izdavanje</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 pt-3">
                        <div class="form-group">
                            <select id="tip123" class="form-control">
                                <option disabled selected>Tip nekretnine</option>
                                <option value="1">Stan</option>
                                <option value="2">Kuća</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Pretraži</button>
                    </div>
                </div>
            </div>
        </form>--}}


        <div class="dropdown-header"><center><h1>Najnoviji oglasi</h1></center></div>
        <div class="container">
            <div class="row">
            <?php
                $property = App\Property::orderBy('created_at', 'desc')->take(6)->get();

                foreach($property as $p){

                    ?><div class="col-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/uploads/{{$p->featured_image}}">
                        <div class="card-body">
                            <h3><a href="/properties/{{$p->id}}">{{$p->adress}}</a></h3>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center card-deck">
                                <div class="btn-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="fa fa-home">{{$p->area}} m2</i>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-bed"> {{$p->bedrooms}} sobe</i>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-building"> {{$p->floor}} sprat</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 style="color: #2fa360; font-family: Verdana;"><strong>{{$p->price}}€</strong></h4>
                                    </div>
                                    <div class="col-4">
                                        <p>ID: {{$p->id}}</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                ?></div>

        </div>
        </div>

    @include('inc.footer')
</body>

</html>
