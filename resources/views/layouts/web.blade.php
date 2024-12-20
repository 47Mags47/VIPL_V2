<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ### Заголовок страницы
    ################################################## --}}
    <title>ЦСВИ - @yield('page-name')</title>

    {{-- ### Подключаем стили
    ################################################## --}}
    @vite('resources/sass/app.sass')

    {{-- ### Подключаем Библиотеки
    ################################################## --}}
    @vite('resources/js/fontAwesome.js')

    {{-- ### Подключаем скрипты
    ################################################## --}}
    @vite('resources/js/app.js')
</head>

<body>
    @include('include/header')
    @yield('content')
</body>

</html>
