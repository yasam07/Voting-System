<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Voting System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="min-h-screen flex flex-col bg-gray-100">

    {{-- Header --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>
</html>
