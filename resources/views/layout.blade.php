<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link
        rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{env('YANDEX_GEOLOCATION_API_KEY')}}&lang=ru_RU"></script>
    <title>{{$title ?? 'Work Hunter'}}</title>
</head>
<body class="bg-gray-100">
    <x-header />
    @if(request()->is('/'))
        <x-hero />
        <x-top-banner />
    @endif
    <main class="container mx-auto p-4 mt-4">
        @if (session('success'))
            <x-alert type="success" message="{{session('success')}}"/>
        @endif
        @if (session('error'))
            <x-alert type="error" message="{{session('error')}}"/>
        @endif

        {{$slot}}
    </main>
</body>
</html>