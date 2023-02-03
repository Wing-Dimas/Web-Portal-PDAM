<x-app-layouts>
    @slot('title', "Profile")
    
    @slot('content')
    <header class="flex justify-between">
        <div>
            <h1 class="text-xl font-semibold">Profile</h1>
            <p class="text-sm">Manage your account to secure your application</p>
        </div>
        <div class="flex items-center">
            <button class="btn-edit bg-sea py-2 px-4 rounded-md font-semibold text-white text-xs flex items-center gap-2"><i class='bx bxs-edit'></i> Edit Profile</button>
        </div>
    </header>

    @if ($errors->any())
    <div class="bg-red-400  p-4">
        <p>Errors:</p>
        <ul class="bg-red-400 p-4">
            @foreach ($errors->all() as $error)
                <li class="list-disc">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="relative min-h-full w-full mt-8 bg-slate-100 rounded-md py-4 px-4">
        <div class="bg-white p-4 rounded-2xl flex flex-col gap-2">
            <div class="border-2 border-dashed rounded-lg flex flex-col px-2 py-1">
                <h4 class="font-bold">Username</h4>
                <span class="text-sm">{{ $user->name }}</span>
            </div>
            <div class="border-2 border-dashed rounded-lg flex flex-col px-2 py-1">
                <h4 class="font-bold">Email</h4>
                <span class="text-sm ">{{ $user->email }}</span>
            </div>
        </div>
    </div>
    @endslot

    @slot('modal')
        <div class="overlay absolute flex justify-center items-center top-0 left-0 right-0 bottom-0 invisible">
            <div class="modal-overlay  absolute top-0 left-0 right-0 bottom-0 z-40 bg-[rgba(0,0,0,0.4)]">
            </div>
            <div class="modal-content relative z-50 bg-white w-96 rounded-lg shadow-lg">
                <div class="modal-header flex justify-between px-4 py-2 border-b-2 border-slate-300">
                    <h2 class="modal-title font-semibold">Edit Profile</h2>
                    <button class="btn-close"></button>
                </div>
                <form id="modal-form" action="{{ route("profile.update", auth()->user()->id ) }}" method="POST" >
                    @csrf
                    @method("put")
                    <div class="modal-main p-4">
                        <div class="grid gap-2">
                            <label for="email" class="font-semibold text-sm">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required>
                        </div>
                        <div class="grid gap-2">
                            <label for="username" class="font-semibold text-sm">Username</label>
                            <input type="text" id="username" name="name" value="{{ $user->name }}" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required>
                        </div>
                        <div class="grid gap-2">
                            <label for="old_password" class="font-semibold text-sm">Old Password</label>
                            <input type="password" id="old_password" name="old_password" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        </div>
                        <div class="grid gap-2">
                            <label for="new_password" class="font-semibold text-sm">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        </div>
                    </div>
                    <div class="modal-footer flex flex-row-reverse py-2 px-4 border-t-2 border-slate-300">
                        <button class="modal-btn bg-sea py-2 px-4 rounded-md font-semibold text-white text-xs flex items-center gap-2">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    @endslot

    @slot('script')
        <script>
            $(document).ready(function(){
                // handle btn edit
                $(".btn-edit").on("click", function(){
                    $(".overlay").removeClass("invisible");
                    $(".overlay").addClass("visible");
                })
                
                // handle btn close or overlay is click
                $(".modal-overlay, .btn-close").on("click", function(){
                    $(".overlay").removeClass("visible");
                    $(".overlay").addClass("invisible");
                })

            })
        </script>
    @endslot

    @slot('alert')
        @if (session("flash"))
        <script>
            Swal.fire(
            '{{ session("flash")["status"] }}',
            '{{ session("flash")["message"] }}',
            '{{ session("flash")["status"] }}'
            )
        </script>   
        @endif
    @endslot
</x-app-layouts>