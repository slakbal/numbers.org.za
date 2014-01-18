<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Numbers.org.za</title>
        <link type="text/css" rel="stylesheet" href="{{ asset("vendor/bootstrap.3.0.3/css/bootstrap.css") }}">
        <link type="text/css" rel="stylesheet" href="{{ asset("vendor/bootstrap.3.0.3/css/bootstrap.theme.css") }}">
    </head>
    <body>
        @yield("content")
        <script data-main="{{ asset("js/main.js") }}" src="{{ asset("vendor/require.2.1.10/require.js") }}"></script>
    </body>
</html>