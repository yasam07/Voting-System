<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer>
        window.ADMIN_BASE_URL = "{{ url('/admin') }}";
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex" x-data="{ sidebarOpen: false }">

    {{-- Sidebar --}}
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed z-30 inset-y-0 left-0 w-64 bg-gray-900 text-gray-200 transform md:translate-x-0 transition-transform duration-300 min-h-screen">
        <div class="px-6 py-4 text-xl font-bold border-b border-gray-700 flex justify-between items-center md:block">
            Admin Panel
            <button @click="sidebarOpen = false" class="md:hidden text-gray-400 cursor:pointer hover:text-white">
                ✕
            </button>
        </div>

        <nav class="mt-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-6 py-3 hover:bg-gray-800">
                Dashboard
            </a>

            <a href="{{ route('admin.voters.index') }}"
               class="block px-6 py-3 hover:bg-gray-800">
                Voter Management
            </a>

            <a href="{{ route('admin.candidates.index') }}"
               class="block px-6 py-3 hover:bg-gray-800">
                Candidate Management
            </a>

            

            <div x-data="{ open: false }" class="relative">
                <!-- Parent button -->
                <button @click="open = !open"
                        class="w-full text-left cursor-pointer px-6 py-3 hover:bg-gray-800 flex justify-between items-center">
                    Location Management
                    <!-- Optional arrow icon -->
                    <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" 
                    class="mt-1 bg-gray-700 rounded shadow-lg">
                    <a href="{{ route('admin.locations.provinces.index') }}"
                    class="block px-6 py-3 hover:bg-gray-800">
                    Provinces
                    </a>
                    <a href="{{ route('admin.locations.districts.index') }}"
                    class="block px-6 py-3 hover:bg-gray-800">
                    Districts
                    </a>
                    <a href="{{ route('admin.locations.municipalities.index') }}"
                    class="block px-6 py-3 hover:bg-gray-800">
                    Municipalities
                    </a>
                    <a href="{{ route('admin.locations.wards.index') }}"
                    class="block px-6 py-3 hover:bg-gray-800">
                    Wards
                    </a>
                    
                </div>
            </div>
            
            <a href="{{ route('admin.parties.index') }}"
               class="block px-6 py-3 hover:bg-gray-800">
                Party Management
            </a>

            <a href="{{ route('admin.posts.index') }}"
               class="block px-6 py-3 hover:bg-gray-800">
                Post Management
            </a>

            <a href="#"
               class="block px-6 py-3 hover:bg-gray-800">
                Results
            </a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col md:ml-64 overflow-hidden">

        {{-- Top Bar --}}
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                {{-- Hamburger button for small screens --}}
                <button @click="sidebarOpen = true" class="md:hidden mr-4 text-gray-700 cursor:pointer hover:text-gray-900">
                    ☰
                </button>
                <h1 class="text-lg font-semibold text-gray-700">
                    @yield('title', 'Dashboard')
                </h1>
            </div>

            <span class="text-sm text-gray-600">Admin</span>
        </header>

        {{-- Page Content --}}
        <main class="p-6">
            @yield('content')
            @yield('scripts')
        </main>
    </div>

</body>
</html>
