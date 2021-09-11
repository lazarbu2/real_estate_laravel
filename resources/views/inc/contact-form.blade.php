<section class="mb-4">
    <!--Section heading-->
    <h3 class="h2-responsive my-4">Pošalji upit za ovu nekretninu</h3>
    <!--Section description-->

    <div class="row">

        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="/contact" method="POST">


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
                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea"></textarea>
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
        </div>
    </div>
</section>