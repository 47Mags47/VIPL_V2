<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ### Заголовок страницы
    ################################################## --}}
    <title>{{ $pageName }}</title>

    {{-- ### Подключаем стили
    ################################################## --}}
    @vite('resources/sass/app.sass')

</head>

<body>
    @isset($content)
        {{ $content }}
    @endisset
</body>

</html>
