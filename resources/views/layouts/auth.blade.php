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
    @vite('resources/sass/layout/auth.sass')
</head>

<body>
    @yield('content')
</body>

</html>
