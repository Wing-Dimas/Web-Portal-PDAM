const BASE_URL = $(location).attr("origin");

const dataSearch = {
  search: "",
  group: "",
};

// generate card
function createCard(lists = []) {
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
                        <h4>${list.group_name}</h4>
                        <img src="storage/${list.icon}" alt="${list.name}" class="w-16">
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

// get data from api
async function fetchData(data = {}) {
  const response = await fetch(`${BASE_URL}/api/get-application`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  });

  return response.json();
}

// get data
function getData() {
  fetchData(dataSearch).then((res) => {
    const data = res.data;
    $(".cards").html(createCard(data));
  });
}

// debounce
function debounce(func, timeout = 500) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}

// handle filter group
const prosesChangeGroup = debounce((val) => {
  dataSearch.group = val;
  getData();
});

$(document).ready(function () {
  // call first
  getData();

  // handle input search
  const prosesChangeSearch = debounce((val) => {
    dataSearch.search = val;
    getData();
  });

  $(".search-application").keyup(function () {
    prosesChangeSearch($(this).val());
  });

  // handel button
  $(".btn-search").click(function () {
    prosesChangeSearch($(".search-application").val());
  });

  // Handle button filter
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
