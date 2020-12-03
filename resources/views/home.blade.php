@extends('layouts.app')

<script src="{{ asset('js/app.js') }}"></script>

@section('content')
    <div class="container-fluid">

        <h1>Lista omiljenih nekretnina</h1><br>
    <div class="row">
@if(count($wishlists) > 0)
    @foreach($wishlists as $wishlist)
        <div class="col-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/uploads/{{$wishlist->property->featured_image}}">
                <div class="card-body">
                    <h3><a href="/properties/{{$wishlist->property->id}}">{{$wishlist->property->adress}}</a></h3>
                    <hr>
                    <div class="d-flex justify-content-center align-items-center card-deck">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa fa-home"></i>{{$wishlist->property->id}}m2
                            </div>
                            <div class="col-4">
                                <i class="fa fa-bed"></i>{{$wishlist->property->bedrooms}} sobe
                            </div>
                            <div class="col-4">
                                <i class="fa fa-building"></i>{{$wishlist->property->floor}} sprat
                            </div>
                        </div>




                    </div>
                    <hr>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-8">
                                <h5 style="color: #2fa360"><strong>{{$wishlist->property->price}}€</strong></h5>
                            </div>
                            <div class="col-4">
                                {!! Form::open(['action' => ['WishlistController@destroy', $wishlist->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{--{{$wishlist->links()}}--}}
@else

    <h3>Nema nekretnina</h3>
        @endif</div></div>



    @endsection