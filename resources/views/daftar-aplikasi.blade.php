<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <title>Daftar Aplikasi</title>
</head>

<body class="bg-[#EFF0F4] min-h-screen ">
    {{-- SEARCH --}}
    <section class="banner relative h-48 md:h-64">
        <div class="flex relative z-20 justify-center top-16 px-2 sm:px-16 md:px-32">
            <div class="relative w-full max-w-xl">
                <ion-icon name="search" class="absolute left-2 top-1 text-2xl text-sea"></ion-icon>
                <input type="text" name="search-application"
                    class="search-application rounded-full outline-none py-1 pl-10 pr-28 w-full placeholder:text-sea placeholder:font-medium"
                    placeholder="Telusuri Aplikasi">
                <div class="flex items-center gap-3 absolute top-0.5 right-0.5">
                    <div class="dropdown relative">
                        <input type="hidden" name="kategori" id="kategori">
                        <button class="btn-filter bg-slate-300 p-1 flex items-center justify-center rounded-lg">
                            <ion-icon name="funnel" class="text-lg text-white"></ion-icon>
                        </button>
                        <ul
                            class="menus hidden flex flex-col gap-3 absolute top-10 right-0 bg-white p-2 rounded-2xl w-64 font-medium text-sm transition-all duration-500">
                            <li onclick="prosesChangeGroup('')"
                                class="menu hover:bg-slate-200 hover:rounded-xl hover:cursor-pointer p-2 bg-slate-200 rounded-xl">
                                Semua</li>
                            @foreach ($groups as $group)
                                <li onclick="prosesChangeGroup('{{ $group->name }}')"
                                    class="menu hover:bg-slate-200 hover:rounded-xl hover:cursor-pointer p-2">
                                    {{ $group->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button
                        class="btn-search bg-sea rounded-full text-sm text-white font-medium py-1 px-2">Search</button>
                </div>
            </div>
        </div>
        <svg class="absolute -bottom-0 z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#EFF0F4" fill-opacity="1"
                d="M0,128L40,149.3C80,171,160,213,240,224C320,235,400,213,480,208C560,203,640,213,720,208C800,203,880,181,960,197.3C1040,213,1120,267,1200,261.3C1280,256,1360,192,1400,160L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </section>

    {{-- CARDS --}}
    <section class="cards flex flex-wrap items-start justify-center mt-5 gap-3 md:max-w-4xl mx-auto min-h-[80vh]">
        {{-- Content created by JS --}}
    </section>

    {{-- Paginate --}}
    <section class="paginate">
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-5">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">10</span>
                        of
                        <span class="font-medium">97</span>
                        results
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                        <a href="#" aria-current="page"
                            class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                        <a href="#"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="relative mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#2d499c" fill-opacity="1"
                d="M0,160L30,176C60,192,120,224,180,245.3C240,267,300,277,360,250.7C420,224,480,160,540,128C600,96,660,96,720,133.3C780,171,840,245,900,250.7C960,256,1020,192,1080,149.3C1140,107,1200,85,1260,106.7C1320,128,1380,192,1410,224L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>
        <div class="bg-sea pb-8">
            <p class="font-medium text-white text-xs md:text-base text-center">&copy; Copyright PDAM Surya Sembada
                Surabaya. All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/daftar-aplikasi.js"></script>
</body>

</html>
