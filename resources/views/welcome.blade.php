<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/js/app.js', 'resources/css/app.scss'])
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h1 text-danger">Laravel Fortify </h1>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>
        </div>
    </body>
</html>
