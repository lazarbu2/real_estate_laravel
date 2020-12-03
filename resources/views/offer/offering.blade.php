@extends("layouts.app")

<script src="{{ asset('js/app.js') }}"></script>

@section('content')
<section class="mb-4">
<!--Section heading-->
<h3 class="h2-responsive my-4">Ponudi nekretninu</h3>
<!--Section description-->

<div class="row">

    <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="offer" method="POST">

            <h5>Vaši podaci</h5>
            <div class="row">
                <?php
                if($user = Auth::user())
                {
                    $name = $user->name;
                    $email = $user->email;
                }
                else{
                    $name = "";
                    $email = "";
                }?>

                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="name" class="">Vaše ime</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$name}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="email" class="">Vaš e-mail</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{$email}}">
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="tel">Kontakt telefon</label><br>
                            <input class="form-control" id="tel" name="tel">
                        </div>
                    </div>
            </div>
            <br>
            <h5>Podaci o nekretnini</h5>
            <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <label for="adress" class="">Adresa nekretnine</label>
                    <input type="text" id="adress" name="adress" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="md-form mb-0">
                    <label for="area" class="">Površina (m²)</label>
                    <input type="text" id="area" name="area" class="form-control">
                </div>
            </div>
                <div class="col-md-3">
                    <div class="md-form mb-0">
                        <label for="bedrooms" class="">Broj spavaćih soba</label>
                        <input type="text" id="bedrooms" name="bedrooms" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="md-form mb-0">
                        <label for="floor" class="">Sprat</label>
                        <input type="text" id="floor" name="floor" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="md-form mb-0">
                        <label for="price" class="">Cena (€)</label>
                        <input type="text" id="price" name="price" class="form-control">
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">

                    <div class="md-form">
                        <label for="message">Opis nekretnine</label>
                        <textarea type="text" id="description" name="description" rows="6" class="form-control md-textarea"></textarea>
                    </div>

                </div>
            </div>




            {{--<div class="row">

                <div class="col-md-12">

                    <label>Attachment (dodajte slike ili pdf/word fajl)</label><br>
                    <div class="md-form">

                        <input type="file" name="files[]" accept="file_extension|image/*|media_type" multiple>
                    </div>

                </div>
            </div>--}}

            @csrf
            <br>
            <div class="text-center text-md-left">
                <input class="btn btn-success" type="submit" value="Pošalji"/>
            </div>
        </form>
    </div>
</div>
</section>
@endsection