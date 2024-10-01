<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product catalog</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
@include('layouts.navbar')

<main class="py-4">
    @yield('content')
</main>

@include('partials.footer')
</body>
</html>
