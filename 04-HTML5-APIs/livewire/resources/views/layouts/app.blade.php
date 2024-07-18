<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Pagina de pelis'}}</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/jquery.js"></script>
    @livewireStyles
</head>
<body>
    <header>
        <h1>{{$title ?? 'Pagina de pelis'}}</h1>
    </header>
    <main>
        @yield('main-content')
    </main>
    @livewireScripts
</body>
</html>