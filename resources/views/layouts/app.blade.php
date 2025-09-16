    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Student Dashboard')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body
        class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex min-h-screen transition-colors duration-300">

        {{-- Sidebar (Desktop) --}}
        <aside
            class="hidden md:flex flex-col w-64 bg-white dark:bg-gray-800 shadow-xl fixed left-0 top-0 bottom-0 p-6 transition-all duration-300">
            <div class="flex items-center space-x-2 mb-10">
                <i class="bi bi-mortarboard text-2xl text-blue-600"></i>
                <h1 class="text-xl font-bold">Tertib Pusaka</h1>
            </div>
            <nav class="flex-1">
                <ul class="space-y-4 text-lg font-semibold">
                    <li>
                        <a href="{{ route('beranda') }}" class="flex items-center space-x-3 hover:text-blue-500 transition">
                            <i class="bi bi-house text-xl"></i><span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('top-student') }}"
                            class="flex items-center space-x-3 hover:text-blue-500 transition">
                            <i class="bi bi-star text-xl"></i><span>Top Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rules') }}" class="flex items-center space-x-3 hover:text-blue-500 transition">
                            <i class="bi bi-journal-bookmark text-xl"></i><span>Rules</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}" class="flex items-center space-x-3 hover:text-blue-500 transition">
                            <i class="bi bi-person text-xl"></i><span>Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 md:ml-64 flex flex-col">

            {{-- Top Navbar (Filter + Theme Toggle) --}}
            <header
                class="flex items-center justify-between px-6 py-4 bg-white dark:bg-gray-800 shadow-md sticky top-0 z-10">
                <div class="flex space-x-3">
                    <button class="px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition">
                        Minggu
                    </button>
                    <button
                        class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        Bulan
                    </button>
                </div>
                <button id="theme-toggle" onclick="toggleTheme()"
                    class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    <i class="bi bi-moon-stars"></i>
                </button>
            </header>

            <main class="p-6 pb-20 md:pb-6 transition-colors duration-300">
                @yield('content')
            </main>
        </div>

        {{-- Bottom Navbar (Mobile) --}}
        <nav
            class="fixed bottom-0 left-0 w-full bg-white dark:bg-gray-800 shadow-inner md:hidden transition-colors duration-300">
            <ul class="flex justify-around py-3">
                <li><a href="{{ route('beranda') }}" class="flex flex-col items-center text-sm font-semibold">
                        <i class="bi bi-house text-xl"></i><span>Beranda</span>
                    </a></li>
                <li><a href="{{ route('top-student') }}" class="flex flex-col items-center text-sm font-semibold">
                        <i class="bi bi-star text-xl"></i><span>Top</span>
                    </a></li>
                <li><a href="{{ route('rules') }}" class="flex flex-col items-center text-sm font-semibold">
                        <i class="bi bi-journal-bookmark text-xl"></i><span>Rules</span>
                    </a></li>
                <li><a href="{{ route('profile') }}" class="flex flex-col items-center text-sm font-semibold">
                        <i class="bi bi-person text-xl"></i><span>Profile</span>
                    </a></li>
            </ul>
        </nav>


        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const toggleBtn = document.getElementById("theme-toggle");
                const html = document.documentElement;

                // kalau user sudah pernah pilih tema, simpan di localStorage
                if (localStorage.theme === "dark") {
                    html.classList.add("dark");
                }

                toggleBtn.addEventListener("click", () => {
                    if (html.classList.contains("dark")) {
                        html.classList.remove("dark");
                        localStorage.theme = "light";
                    } else {
                        html.classList.add("dark");
                        localStorage.theme = "dark";
                    }
                });
            });
        </script>

    </body>

    </html>
