<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- TAilwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- CSS LINK --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <title>HOK @yield('title')</title>

</head>

<body class="bg-white dark:bg-gray-900">


<!-- Content -->

        @yield('content')



</div>

</body>
</html>
