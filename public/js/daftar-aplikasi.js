const listAplikasi = [
  {
    name: "Security",
    group: "Direktorat Keamanan",
    description: "Aplikasi Untuk Keamanan",
    link: "https://www.google.com",
    icon: "Aero.png",
  },
  {
    name: "Dashboard",
    group: "Direktorat Administrasi",
    description: "Aplikasi Untuk Dashboard",
    link: "www.google.com",
    icon: "Aero 2.png",
  },
  {
    name: "Bank",
    group: "Direktorat Keuangan",
    description: "Aplikasi Untuk Mengeloal uang",
    link: "www.google.com",
    icon: "Aero 3.png",
  },
];

// generate card
function createCard(lists = listAplikasi) {
  let el = "";
  lists.forEach((list) => {
    el += `
        <div class="card relative w-64 h-64 rounded-r-2xl bg-sea">
            <div class="p-2 flex flex-col justify-between items-center h-full py-8">
                <h1 class="font-bold text-xl text-center my-2">${list.name}</h1>
                <p class="text-sm text-center">${list.description}</p>
                <a href="${list.link}" target="blank" class="flex justify-between items-center bg-sea text-white rounded-full w-20 px-2 ">
                    Visit
                    <ion-icon name="arrow-dropright-circle"></ion-icon>
                </a>
            </div>
            <div class="cover absolute top-0 left-0 w-full h-full rounded-r-2xl">
                <div class="coverFront flex justify-center items-center absolute w-full h-full rounded-r-2xl">
                    <div class="flex flex-col items-center gap-3">
                        <h4>${list.group}</h4>
                        <img src="images/${list.icon}" alt="${list.name}" class="w-16">
                        <h5 class="font-medium text-xl text-sea">${list.name}</h5>
                    </div>
                </div>
                <div class="coverBack flex justify-center items-center absolute w-full h-full rounded-l-2xl"></div>
            </div>
        </div>
        `;
  });
  return el;
}

$(document).ready(function () {
  // show items into page
  $(".cards").html(createCard());

  //   Handle button filter
  $(".btn-filter").click(function () {
    if (!$(".btn-filter").hasClass("active")) {
      setTimeout(() => {
        $(this).addClass("active bg-sea text-white");
        $(".menus").removeClass("hidden");
        $(".menus").addClass("block");
      }, 50);
    }
  });

  $(document).click(function () {
    // deactive button filter
    if ($(".btn-filter").hasClass("active")) {
      $(".btn-filter").removeClass("active bg-sea text-white");
      $(".menus").addClass("hidden");
      $(".menus").removeClass("block");
    }
  });

  // handle click menu
  $(".menu").click(function () {
    $(".menu").removeClass("bg-slate-200 rounded-xl");
    $(this).addClass("bg-slate-200 rounded-xl");
  });
});

// handle value when menu on click
function show(anything) {
  // change input value
  $("#kategori").val(anything);
}

function debounce(func, timeout = 500) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}
