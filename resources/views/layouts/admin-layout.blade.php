<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css"/>
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Document</title>
</head>
<body>

@include('inc.admin-navbar')


<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

</div>
@include('inc.footer')

</body>
</html>