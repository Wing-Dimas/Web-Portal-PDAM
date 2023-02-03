<x-app-layouts>
    @slot('title', "Application")

    @slot('search')
    <form action="{{ route("application.search") }}" method="get">
        <div class="nav-link flex items-center h-12 mt-2 bg-slate-200 rounded-md">
            <i class='icon bx bx-search justify-center items-center text-xl min-w-[60px] text-text' ></i>
            <input type="text" name="search" id="search" placeholder="Search..." class="w-full h-full outline-none bg-transparent">
        </div>
    </form>
    @endslot

    @slot('content')
    <header class="flex justify-between">
        <div>
            <h1 class="text-xl font-semibold">Application</h1>
            <p class="text-sm">Your link application</p>
        </div>
        <div class="flex items-center">
            <button class="btn-tambah bg-sea py-2 px-4 rounded-md font-semibold text-white text-xs flex items-center gap-2"><i class='bx bx-plus'></i> New Application</button>
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
        <div class="cards first:grid grid-cols-[repeat(auto-fit,_minmax(300px,_1fr))] gap-2">
            @foreach ($applications as $application)
            <div class="flex bg-white rounded-lg shadow-md p-2 gap-2">
                 <div class="w-[80px]">
                    <img src="{{ asset("/storage/$application->icon") }}" alt="" class="max-w-[80px]">
                 </div>
                 <div class="flex flex-1 flex-col">
                    <div class="relative flex justify-between">
                        <h3 class="text-sm font-bold flex flex-col">{{ $application->name }} <span class="text-xs text-slate-300">{{ $application->group->name }}</span></h3>
                        <div class="flex gap-2">
                            <button data-id="{{ $application->id }}" class="btn-edit h-min bg-orange-800 rounded-md text-white flex items-center justify-center hover:bg-orange-300 p-[2px]">
                                <i class='bx bx-edit' class="text-xs"></i>
                            </button>
                            <form action="{{ route("application.destroy", $application->id) }}" method="POST" >
                                @csrf
                                @method("delete")
                                <button type="submit" class="show-confirm bg-red-600 rounded-md text-white flex items-center justify-center hover:bg-red-400 p-[2px]"><i class='bx bx-trash' ></i></button>
                            </form>
                        </div>
                    </div>
                    <p class="text-xs font-normal">{{ $application->description }}</p>
                    <div class="h-full flex flex-col justify-end">
                        <a href="{{ $application->link }}" class="text-xs text-sea font-light w-max bg-slate-200 rounded-md px-1" target="blank">{{ $application->link }}</a>
                    </div>
                 </div>
            </div>
            @endforeach
        </div>
    </div>
    @endslot

    @slot('modal')
        <div class="overlay absolute flex justify-center items-center top-0 left-0 right-0 bottom-0 invisible">
            <div class="modal-overlay  absolute top-0 left-0 right-0 bottom-0 z-40 bg-[rgba(0,0,0,0.4)]">
            </div>
            <div class="modal-content relative z-50 bg-white w-96 rounded-lg shadow-lg">
                <div class="modal-header flex justify-between px-4 py-2 border-b-2 border-slate-300">
                    <h2 class="modal-title font-semibold">Add Application</h2>
                    <button class="btn-close"></button>
                </div>
                <form id="modal-form" action="{{ route("application.store") }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="modal-main p-4">
                        <div class="grid gap-2">
                            <label for="name" class="font-semibold text-sm">Name</label>
                            <input type="text" id="name" name="name" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required>
                        </div>
                        <div class="grid gap-2 mt-2">
                            <label for="description" class="font-semibold text-sm">Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none resize-none" required></textarea>
                        </div>
                        <div class="grid gap-2 mt-2">
                            <label for="icon" class="font-semibold text-sm">Icon</label>
                            <input type="file" id="icon" name="icon" accept="image/png, image/jpeg" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        </div>
                        <div class="grid gap-2 mt-2">
                            <label for="link" class="font-semibold text-sm">Link</label>
                            <input type="url" id="link" name="link" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:bg-white focus:border-blue-600 focus:outline-none" required>
                        </div>
                        <div class="grid gap-2 mt-2">
                            <label for="group_id" class="font-semibold text-sm">Group</label>
                            <select id="group_id" name="group_id" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" required>
                                <option selected value="">Open this select menu</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer flex flex-row-reverse py-2 px-4 border-t-2 border-slate-300">
                        <button class="modal-btn bg-sea py-2 px-4 rounded-md font-semibold text-white text-xs flex items-center gap-2">Add Application</button>
                    </div>
                </form>
            </div>
        </div>
    @endslot

    @slot('script')
        <script>
            $(document).ready(function(){
                // handle btn tambah
                $(".btn-tambah").on("click", function(){
                    $(".overlay").removeClass("invisible");
                    $(".overlay").addClass("visible");
                })
                
                // handle btn edit
                $(".btn-edit").on("click", function(){
                    const id = $(this).data("id")
                    fetch(`{{ url("/") }}/api/single-application/${id}`)
                    .then(res => res.json())
                    .then(res => {
                        $("#modal-form").attr("action", `{{ url("/") }}/application/${id}`)
                        $("#modal-form").append(`@method("put")`)
                        $("#modal-form input[name='name']").val(res.data.name)
                        $("#modal-form textarea[name='description']").val(res.data.description)
                        $("#modal-form input[name='link']").val(res.data.link)
                        $("#modal-form select[name='group_id']").val(res.data.group_id)
                        $(".modal-btn").text("Update Grup")
                        $(".modal-title").text("Edit Group")
                        $(".overlay").removeClass("invisible");
                        $(".overlay").addClass("visible");
                    });

                })
                
                // handle btn close or overlay is click
                $(".modal-overlay, .btn-close").on("click", function(){
                    $("#modal-form input[name='_method']").remove();
                    $("#modal-form").attr("action", `{{ route("application.store") }}`);
                    $("#modal-form input[name='name']").val("")
                    $("#modal-form textarea[name='description']").val("")
                    $("#modal-form input[name='link']").val("")
                    $("#modal-form select[name='group_id']").val("")
                    $(".modal-btn").text("Add Application");
                    $(".overlay").removeClass("visible");
                    $(".overlay").addClass("invisible");
                })

                // handle btn delete
                $('.cards').on("click",".show-confirm" , function(e){
                    const form = $(this).closest("form");
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda tidak akan bisa mengembalikan data ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    })
                });
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