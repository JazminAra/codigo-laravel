
<head>
    <title>@yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav>
    <table class="table">
        @include('partials.navbar')
        @include('partials.sesion-estado')
        @yield('content')
        @include('partials.footer')
    </table>
    </nav>
</body>   


