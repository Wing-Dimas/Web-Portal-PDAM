<x-app-layouts>
    @slot('title', "Dashboard")
    

    @slot('content')
    <h1 class="text-xl font-semibold">Dashboard</h1>
    <p class="text-sm">Good Morning, {{ auth()->user()->name }} 👋</p>
    
    <div class="grid grid-cols-[repeat(auto-fit,_minmax(300px,_1fr))] gap-3 mt-8">
        <a href="{{ route("application.index") }}" class="bg-gradient-to-tr from-blue-600 to-blue-800 p-4 rounded-xl flex justify-between hover:shadow">
            <div class="flex flex-col justify-between">
                <p class="text-sidebar text-xs">Total Application</p>
                <h3 class="text-sidebar text-xl font-bold">{{ $total_application }} Application</h3>
            </div>
            <div class="flex justify-center items-center">
                <i class='bx bxs-layout icon justify-center items-center text-3xl min-w-[60px] text-white'></i>
            </div>
        </a>
        <a href="{{ route("group.index") }}" class="bg-gradient-to-br from-aqua to-sky-500 p-4 rounded-xl flex justify-between hover:shadow">
            <div class="flex flex-col justify-between">
                <p class="text-sidebar text-xs">Total Group</p>
                <h3 class="text-sidebar text-xl font-bold">{{ $total_group }} Group</h3>
            </div>
            <div class="flex justify-center items-center">
                <i class='bx bx-windows icon justify-center items-center text-3xl min-w-[60px] text-white'></i>
            </div>
        </a>
    </div>

    @endslot
</x-app-layouts>