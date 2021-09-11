<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/css/app.css"/>
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Nekretnine</title>
</head>
<body>

            @include('inc.navbar')


    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                @include('inc.sidebar')
            </div>
            <div class="col-md-9 col-lg-9">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>

    </div>
    @include('inc.footer')

</body>
</html>