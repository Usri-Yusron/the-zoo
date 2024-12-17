<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>the zoo</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="styles.css">

    {{-- icon --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    {{-- tailwind --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body class="antialiased">

    {{-- main container --}}
    @include('components.MainContainer')
    {{-- main container selesai --}}

    {{-- main musik --}}
    @include('components.Musik')
    {{-- main musik selesai --}}

    


    <script src="script.js"></script>

</body>

</html>
