<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{--Asi se añaden rutas estaticas de css--}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="bg-main">
    @include('layouts.navbar')
    <div class="container mx-auto px-4 my-6 max-w-screen flex flex-col justify-center align-center">
        <h1 class="bg-white-200 p-2 text-center rounded-md font-semibold mb-4">@yield('title','')</h1>
        @yield('content')
    </div>

</body>

</html>
