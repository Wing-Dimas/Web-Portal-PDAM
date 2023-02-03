<x-app-layouts>
    @slot('title', "Group")

    @slot('search')
    <form action="" method="get">
        <div class="nav-link flex items-center h-12 mt-2 bg-slate-200 rounded-md">
            <i class='icon bx bx-search justify-center items-center text-xl min-w-[60px] text-text' ></i>
            <input type="text" name="" id="" placeholder="Search..." class="w-full h-full outline-none bg-transparent">
        </div>
    </form>
    @endslot

    @slot('content')
    <header class="flex justify-between">
        <div>
            <h1 class="text-xl font-semibold">Group</h1>
            <p class="text-sm">Set your group category</p>
        </div>
        <div class="flex items-center">
            <button class="btn-tambah bg-sea py-2 px-4 rounded-md font-semibold text-white text-xs flex items-center gap-2"><i class='bx bx-plus'></i> New Group</button>
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

    <div class="relative h-full w-full mt-8 bg-slate-100 rounded-md py-4 px-4">
        <table class="table table-auto border">
            <thead>
              <tr>
                <th class="font-bold p-2 border-b text-left whitespace-nowrap">ID</th>
                <th class="font-bold p-2 border-b text-left w-full">Name</th>
                <th class="font-bold py-2 px-4 border-b text-center w-full">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr class="odd:bg-slate-300">
                    <td class="p-2 border-b text-left whitespace-nowrap">{{ $group->id }}</td>
                    <td class="p-2 border-b text-left">{{ $group->name }}</td>
                    <td class="py-2 px-4 border-b text-left flex gap-2">
                        <button data-id="{{ $group->id }}" class="btn-edit bg-orange-400 rounded-md text-white p-2 flex items-center justify-center hover:bg-orange-300">
                            <i class='bx bx-edit' class="text-2xl"></i>
                        </button>
                        <form action="{{ route("group.destroy", $group->id) }}" method="POST" >
                            @csrf
                            @method("delete")
                            <button type="submit" class="show-confirm bg-red-600 rounded-md text-white p-2 flex items-center justify-center hover:bg-red-400"><i class='bx bx-trash' ></i></button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    @endslot

    @slot('modal')
        <div class="overlay absolute flex justify-center items-center top-0 left-0 right-0 bottom-0 invisible">
            <div class="modal-overlay  absolute top-0 left-0 right-0 bottom-0 z-40 bg-[rgba(0,0,0,0.4)]">
            </div>
            <div class="modal-content relative z-50 bg-white w-96 rounded-lg shadow-lg">
                <div class="modal-header flex justify-between px-4 py-2 border-b-2 border-slate-300">
                    <h2 class="modal-title font-semibold">New Group</h2>
                    <button class="btn-close"></button>
                </div>
                <form id="modal-form" action="{{ route("group.store") }}" method="POST">
                    @csrf
                    
                    <div class="modal-main p-4">
                        <div class="grid gap-2">
                            <label for="name" class="font-semibold text-sm">Name</label>
                            <input type="text" id="name" name="name" class="text-xs p-2 border-slate-200 border-2 outline-none rounded-md focus:bg-white focus:border-blue-600 focus:outline-none" required>
                        </div>
                    </div>
                    <div class="modal-footer flex flex-row-reverse py-2 px-4 border-t-2 border-slate-300">
                        <button class="modal-btn bg-sea py-2 px-4 rounded-md font-semibold text-white text-xs flex items-center gap-2">New Group</button>
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
                    fetch(`{{ url("/") }}/api/single-group/${id}`)
                    .then(res => res.json())
                    .then(res => {
                        $("#modal-form").attr("action", `{{ url("/") }}/group/${id}`)
                        $("#modal-form").append(`@method("put")`)
                        $("#modal-form input[name='name']").val(res.data.name)
                        $(".modal-btn").text("Update Grup")
                        $(".modal-title").text("Edit Group")
                        $(".overlay").removeClass("invisible");
                        $(".overlay").addClass("visible");
                    });

                })
                
                // handle btn close or overlay is click
                $(".modal-overlay, .btn-close").on("click", function(){
                    $("#modal-form input[name='_method']").remove();
                    $("#modal-form").attr("action", `{{ route("group.store") }}`);
                    $("#modal-form input[name='name']").val("")
                    $(".modal-btn").text("New Group");
                    $(".overlay").removeClass("visible");
                    $(".overlay").addClass("invisible");
                })

                // handle btn delete
                $('.table').on("click",".show-confirm" , function(e){
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