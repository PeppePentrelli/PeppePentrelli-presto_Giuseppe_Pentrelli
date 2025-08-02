<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto</title>
    {{-- direttiva blade @vite() per css --}}
    @vite(['resources/css/app.css'])
</head>

<body>
    {{-- Inizio Navbar --}}
    <x-navbar />

    {{-- Inizio contenuto $slot --}}
    <div class="min-vh-100">
        {{ $slot }}
    </div>
    
    {{-- Inizio Footer --}}
    <x-footer />
    {{-- direttiva blade @vite() per js --}}
    @vite(['resources/js/app.js'])
</body>

</html>
