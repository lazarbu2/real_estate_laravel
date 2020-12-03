<style>
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;

    }</style>

<script src="{{ asset('js/app.js') }}"></script>

<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>


<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">

    <a class="navbar-brand" href="/">Nekretnine</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
                 <a class="nav-link" href="/">Početna <span class="sr-only">(current)</span></a>
             </li>-->



            <div class="nav-item">
                <a class="nav-link" href="/sale">Prodaja</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="/rent">Izdavanje</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="/newbuilt">Novogradnja</a>
            </div>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/about">O nama</a>
                    <a class="dropdown-item" href="/contact">Kontakt</a>
                </div>
            </li>



        </ul>

        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odjavi se</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

                    @endauth
                </div>
            @endif


        </div>
</nav>