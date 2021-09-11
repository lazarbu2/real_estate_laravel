@extends('layouts.admin-layout')

<script src="{{ asset('js/app.js') }}"></script>
@section('content')

    <h1>Brisanje slika</h1>
    <?php

    $id = $property->id;

    $connect = mysqli_connect("localhost", "root", "", "zavrsni");

    $result = $connect->query("SELECT image, id FROM property_images where property_id = $id ");
    ?><div class="row"><?php

        foreach ($result as $item) {

        ?>

        <div class="col-3">
            <img src="/uploads/<?= $item['image']?>" width="100%" style="margin-bottom: 10px;"><br>
            {!! Form::open(['action' => ['PropertyImagesController@destroy', $item['id']], 'method' => 'POST', 'class' => 'pull-right',]) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Obriši', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
        <?php
        }
        ?>
    </div>

    <h1>Izmeni nekretninu</h1>
    {!! Form::open(['action' => ['AdminController@update', $property->id], 'method' => 'POST', 'files' => true]) !!}

    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'zavrsni');
    mysqli_set_charset($mysqli,"utf8");
    $result_location = $mysqli->query("select * from location");
    $result_transaction = $mysqli->query("select * from transaction");
    $result_type = $mysqli->query("select * from property_type");
    $result_structure =$mysqli->query("select * from structure");
    $result_heating =$mysqli->query("select * from heating");
    $result_parking =$mysqli->query("select * from parking");
    ?>

    <div class="form-group">
        {{Form::label('type', 'Tip usluge')}}

        <select class="form-control"  name="transaction">
            <option selected hidden value={{$property->transaction_id}}>{{$property->transaction->name}}</option>
            <?php
            while($rows = $result_transaction->fetch_assoc()){
                $name = $rows['name'];
                $id = $rows ['id'];
                echo "<option value='.$id.'>$name</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        {{Form::label('type', 'Tip nekretnine')}}

        <select class="form-control"  name="type">
            <option selected hidden value={{$property->property_type_id}}>{{$property->property_type->type}}</option>
            <?php
            while($rows = $result_type->fetch_assoc()){
                $name = $rows['type'];
                $id = $rows ['id'];
                echo "<option value='.$id.'>$name</option>";
            }
            ?>
        </select>

    </div>

    <div class="form-group">
        {{Form::label('structure', 'Struktura')}}

        <select class="form-control"  name="structure">
            <option selected hidden value={{$property->structure_id}}>{{$property->structure->name}}</option>
            <?php
            while($rows = $result_structure->fetch_assoc()){
                $name = $rows['name'];
                $id = $rows ['id'];
                echo "<option value='.$id.'>$name</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        {{Form::label('location', 'Lokacija')}}

        <select class="form-control"  name="location">
            <option selected hidden value={{$property->location_id}}>{{$property->location->name}}</option>
            <?php
            while($rows = $result_location->fetch_assoc()){
                $name = $rows['name'];
                $id = $rows ['id'];
                echo "<option value='.$id.'>$name</option>";
            }
            ?>
        </select>
    </div>



    <div class="form-group">
        {{Form::label('area', 'Površina')}}
        {{Form::text('area', $property->area, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Naslov')}}
        {{Form::text('title', $property->title, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Opis')}}
        {{Form::textarea('description', $property->description, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>
    <div class="form-group">
        {{Form::label('bedrooms', 'Spavaće sobe')}}
        {{Form::text('bedrooms', $property->bedrooms, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>

    <div class="form-group">
        {{Form::label('bathrooms', 'Kupatila')}}
        {{Form::text('bathrooms', $property->bathrooms, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>

    <div class="form-group">
        {{Form::label('heating', 'Grejanje')}}

        <select class="form-control"  name="heating">
            <option selected hidden value={{$property->heating_id}}>{{$property->heating->name}}</option>
            <?php
            while($rows = $result_heating->fetch_assoc()){
                $name = $rows['name'];
                $id = $rows ['id'];
                echo "<option value='.$id.'>$name</option>";
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        {{Form::label('floor', 'Sprat')}}
        {{Form::text('floor', $property->floor, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>
    <div class="form-group">
        {{Form::label('last_floor', 'Poslednji sprat')}}
        {{Form::text('last_floor', $property->last_floor, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>

    <div class="form-group">
        {{Form::label('newbuilt', 'Novogradnja')}}
        {{ Form::checkbox( 'newbuilt', $property->newbuilt ) }}
    </div>


    <div class="form-group">
        {{Form::label('price', 'Cena')}}
        {{Form::text('price', $property->price, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>
    <div class="form-group">
        {{Form::label('parking', 'Parking')}}

        <select class="form-control"  name="parking">
            <option selected hidden value={{$property->parking_id}}>{{$property->parking->name}}</option>
            <?php
            while($rows = $result_parking->fetch_assoc()){
                $name = $rows['name'];
                $id = $rows ['id'];
                echo "<option value='.$id.'>$name</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        {{Form::label('adress', 'Adresa')}}
        {{Form::text('adress', $property->adress, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>
    {{--<div class="form-group">
        {{Form::label('map', 'Mapa')}}
        <input type="text" id="searchmap">
        <div id="map-canvas"></div>
    </div>
    <div class="form-group">
        <label for="">Lat</label>
        <input type="text" class="form-control input-sm" name="lat" id="lat">
    </div>
    <div class="form-group">
        <label for="">Lng</label>
        <input type="text" class="form-control input-sm" name="lng" id="lng">
    </div>--}}

    <?php


    /*$mysqli = new mysqli('localhost', 'root', '', 'zavrsni');
    $result = $mysqli->query("select * from property_images where property_id = '".$id."'");

            while($rows = $result->fetch_assoc()){
                $name = $rows['image'];

                */?>



    <div class="form-group">
        {{Form::label('video', 'Video')}}
        {{Form::text('video', $property->video, ['class'=>'form-control', 'placeholder'=>''])}}
    </div>

    <div class="form-group">
        <label for=""><b>Dodajte slike</b></label><br>
        <input type="file" name="images[]" multiple>
    </div>





    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Potvrdi izmene', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    <br><br>

@endsection
