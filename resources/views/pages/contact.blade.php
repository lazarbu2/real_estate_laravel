@extends('layouts.app')

<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
<script src="{{ asset('js/app.js') }}"></script>
@section('content')



    <!--Section: Contact v.2-->

    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Kontaktirajte nas</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Očekujte brz odgovor</p>

        <div class="row">

            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="/contact" method="POST">


                    <div class="row">

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Vaše ime</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Vaš e-mail</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Predmet</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Vaša poruka</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>
                    </div>
                    <input type="text" name="url" value="{{url()->current()}}" hidden/>

                    @csrf
                    <br>
                            <div class="text-center text-md-left">
                                <input class="btn btn-success" type="submit" value="Pošalji"/>
                            </div>
                </form>


                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fa fa-map-marker "></i>
                        <p>Bulevar Oslobodjenja bb, Beograd</p>
                    </li>

                    <li><i class="fa fa-phone"></i>
                        <p>+381 63 555 666</p>
                    </li>

                    <li><i class="fa fa-envelope"></i>
                        <p>office@nekretnine.rs</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div><br>


    </section>
    <!--Section: Contact v.2-->

@endsection