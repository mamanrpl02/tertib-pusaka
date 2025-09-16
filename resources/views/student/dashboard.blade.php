<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex min-h-screen transition-colors duration-300">

    {{-- Sidebar --}}
    <aside
        class="hidden md:flex flex-col w-64 bg-white dark:bg-gray-800 shadow-xl fixed left-0 top-0 bottom-0 p-6 transition-all duration-300">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-xl font-bold">Student</h1>
            <button onclick="toggleTheme()" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                <span class="material-icons">brightness_6</span>
            </button>
        </div>
        <nav class="flex-1">
            <ul class="space-y-4">
                <li><button onclick="changePage('Beranda')"
                        class="flex items-center space-x-3 hover:text-blue-500 transition"><span
                            class="material-icons">home</span><span>Beranda</span></button></li>
                <li><button onclick="changePage('Top Student')"
                        class="flex items-center space-x-3 hover:text-blue-500 transition"><span
                            class="material-icons">star</span><span>Top Student</span></button></li>
                <li><button onclick="changePage('Rules')"
                        class="flex items-center space-x-3 hover:text-blue-500 transition"><span
                            class="material-icons">gavel</span><span>Rules</span></button></li>
                <li><button onclick="changePage('Profile')"
                        class="flex items-center space-x-3 hover:text-blue-500 transition"><span
                            class="material-icons">person</span><span>Profile</span></button></li>
            </ul>
        </nav>
    </aside>

    {{-- Konten --}}
    <main class="flex-1 md:ml-64 p-6 pb-20 md:pb-6 transition-colors duration-300">
        <div id="page-content" class="text-center">
            <h2 class="text-2xl font-bold mb-4">Beranda</h2>
            <p>Selamat datang di dashboard student 👋</p>
        </div>
    </main>

    {{-- Bottom Navbar (Mobile) --}}
    <nav
        class="fixed bottom-0 left-0 w-full bg-white dark:bg-gray-800 shadow-inner md:hidden transition-colors duration-300">
        <ul class="flex justify-around py-2">
            <li><button onclick="changePage('Beranda')" class="flex flex-col items-center text-sm"><span
                        class="material-icons">home</span>Beranda</button></li>
            <li><button onclick="changePage('Top Student')" class="flex flex-col items-center text-sm"><span
                        class="material-icons">star</span>Top</button></li>
            <li><button onclick="changePage('Rules')" class="flex flex-col items-center text-sm"><span
                        class="material-icons">gavel</span>Rules</button></li>
            <li><button onclick="changePage('Profile')" class="flex flex-col items-center text-sm"><span
                        class="material-icons">person</span>Profile</button></li>
        </ul>
        <div class="flex justify-center py-2">
            <button onclick="toggleTheme()"
                class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                <span class="material-icons">brightness_6</span>
            </button>
        </div>
    </nav>

    {{-- Google Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
        function changePage(page) {
            const content = document.getElementById('page-content');
            content.innerHTML = `
                <h2 class="text-2xl font-bold mb-4">${page}</h2>
                <p>Ini adalah halaman ${page}.</p>
            `;
        }

        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>

</html>
