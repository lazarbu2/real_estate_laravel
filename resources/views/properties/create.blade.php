@extends('layouts.admin-layout')


@section('content')
        <h1>Dodaj nekretninu</h1>
        {!! Form::open(['action' => 'AdminController@store', 'method' => 'POST', 'files' => true]) !!}

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
                {{Form::label('transaction', 'Tip usluge')}}

                <select class="form-control"  name="transaction">
                        <option disabled selected hidden>Tip usluge</option>
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
                        <option disabled selected hidden>Tip nekretnine</option>
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
                        <option disabled selected hidden>Struktura</option>
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
                        <option disabled selected hidden>Lokacija</option>
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
                {{Form::text('area', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>
        <div class="form-group">
                {{Form::label('title', 'Naslov')}}
                {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>
        <div class="form-group">
                {{Form::label('description', 'Opis')}}
                {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>
        <div class="form-group">
                {{Form::label('bedrooms', 'Spavaće sobe')}}
                {{Form::text('bedrooms', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>

        <div class="form-group">
                {{Form::label('bathrooms', 'Kupatila')}}
                {{Form::text('bathrooms', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>

        <div class="form-group">
                {{Form::label('heating', 'Grejanje')}}

                <select class="form-control"  name="heating">
                        <option disabled selected hidden>Grejanje</option>
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
                {{Form::text('floor', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>
        <div class="form-group">
                {{Form::label('last_floor', 'Poslednji sprat')}}
                {{Form::text('last_floor', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>
        <div class="form-group">
                {{Form::label('newbuilt', 'Novogradnja')}}
                {{ Form::checkbox( 'newbuilt', 1, false ) }}
        </div>


        <div class="form-group">
                {{Form::label('price', 'Cena')}}
                {{Form::text('price', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>
        <div class="form-group">
                {{Form::label('parking', 'Parking')}}

                <select class="form-control"  name="parking">
                        <option disabled selected hidden>Izaberite parking</option>
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
                {{Form::text('adress', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>


        <div class="form-group">
                {{Form::label('video', 'Video')}}
                {{Form::text('video', '', ['class'=>'form-control', 'placeholder'=>''])}}
        </div>




        <div class="form-group">
                <label for=""><b>Dodajte slike (Prva slika je naslovna)</b></label><br>
                <input required type="file" name="images[]" multiple>
        </div>



        {{Form::submit('Potvrdi', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection




