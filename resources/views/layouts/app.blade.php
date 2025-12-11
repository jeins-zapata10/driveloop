<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Driveloop') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Fuente Roboto desde Google Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Head -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Icon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/publicacion/pubVeh.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-roboto text-dl-txtone">
    <div class="min-h-screen img-background">
        <div class="mx-4 sm:mx-[5rem] sm:px-6 lg:px-8">
            <div class="py-[0.6rem]">
                <div class="p-3 text-gray-900">
                    @include('layouts.navigation')
                </div>
            </div>
            <!-- Page Heading -->
            <!-- @isset($header)
    <header class="shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
@endisset -->

            <!-- Page Content -->
            <main>
                <div class="py-5">
                    <div class="sm:rounded-lg">
                        <div class="p-3">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
