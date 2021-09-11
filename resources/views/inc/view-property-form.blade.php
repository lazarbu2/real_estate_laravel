<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<section class="mb-4 pull-right">
    <!--Section heading-->
    <h3 class="h2-responsive my-4">Zakaži gledanje ove nekretnine</h3>
    <form id="contact-form" name="contact-form" action="/viewproperty" method="POST">
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
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <label for="tel">Kontakt telefon</label><br>
                    <input class="form-control" id="tel" name="tel">
                </div>
            </div>
        </div>
        <label>Odaberite datum</label>
        <input id="datepicker" name="date" width="276" />
        <label>Unesite vreme</label>
        <input class="form-control" name="time" width="276" placeholder="hh:mm"/>

        <input type="text" name="url" value="{{url()->current()}}" hidden/>


        @csrf
        <br>
        <div class="text-center text-md-left">
            <input class="btn btn-primary" type="submit" value="Pošalji"/>
        </div>
    </form>
</section>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });


</script>
</body>
</html>


