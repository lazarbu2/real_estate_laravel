@extends('layouts.admin-layout')

<script src="{{ asset('js/app.js') }}"></script>


@section('content')

    <h1>Admin panel</h1>

    <div class="jumbotron align-content-center">
        <div class="row">

            <div class="col-4">
                <a href="/admin/create" class="btn btn-info" role="button">Dodaj novu nekretninu</a>
            </div>
            <div class="col-8">
                <form class="form-inline my-2 my-lg-0" action="{{'adminSearch'}}" method="get">
                    <input class="form-control mr-sm-2" name="adminsearch" type="search" placeholder="Unesite ID" aria-label="Pretraga" style="width: 400px;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pretraga</button>
                </form>
            </div>
        </div>

    </div>

    <div class="row">


        @if(count($properties) > 0)
            @foreach($properties as $property)
                <div class="col-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/uploads/{{$property->featured_image}}">
                        <div class="card-body">
                            <h3><a href="/admin/{{$property->id}}">{{$property->adress}}</a></h3>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <i class="fa fa-home"> {{$property->area}} m2</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-bed"> {{$property->bedrooms}} sobe</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-building"> {{$property->floor}} sprat</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 style="color: #2fa360"><strong>{{$property->price}}€</strong></h5>
                                    </div>
                                    <div class="col-5">
                                        <h6><strong>ID: {{$property->id}}</strong></h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-primary"><a href="/admin/{{$property->id}}/edit" class="text-white">Izmeni</a></button>
                            {!! Form::open(['action' => ['AdminController@destroy', $property->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return ConfirmDelete()']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endforeach

                {{$properties->links()}}
        @else
            <h3>Nema nekretnina</h3>
        @endif

    </div>

@endsection

<script>

    function ConfirmDelete()
    {
        var x = confirm("Da li ste sigurni da želite da obrišete oglas?");
        if (x)
            return true;
        else
            return false;
    }

</script>
