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
                        <img src="storage/${list.icon}" alt="${list.name}" class="w-16 h-16 object-contain">
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

// create paginate
function createPaginate({ meta }) {
  console.log(meta);
  let prev = meta.links.at(0).url;
  let next = meta.links.at(-1).url;
  let current = meta.current_page;

  if (dataSearch?.group !== "") {
    prev = prev
      ? `${prev}&${new URLSearchParams({ group: dataSearch.group }).toString()}`
      : prev;
    next = next
      ? `${next}&${new URLSearchParams({ group: dataSearch.group }).toString()}`
      : next;
    meta.links.at(current).url += `&${new URLSearchParams(
      dataSearch.group
    ).toString()}`;
  }

  let el = `
  <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6 mt-5">
    <div class="flex flex-1 justify-between sm:hidden">
    ${
      prev
        ? `<button data-url="${
            prev ? prev : meta.path
          }" class="btn-paginate relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</button>`
        : `<div></div>`
    }
    ${
      next
        ? `<button data-url="${
            next ? next : meta.path
          }" class="btn-paginate relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</button>`
        : `<div></div>`
    }
      
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-end">
      <div>
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        ${
          prev
            ? `<button data-url="${
                prev ? prev : meta.path
              }" class="btn-paginate relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
              <span class="sr-only">Previous</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                      d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                      clip-rule="evenodd" />
              </svg>
            </button>`
            : `<div></div>`
        }
          <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
          <button data-url="${
            meta.links[current].url
          }" aria-current="page" class="btn-paginate relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">${current}</button>
          ${
            next
              ? ` <button data-url="${
                  next ? next : meta.path
                }" class="btn-paginate relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                      clip-rule="evenodd" />
                </svg>
              </button>`
              : `<div></div>`
          }
         
        </nav>
      </div>
    </div>
  </div>
  `;

  return el;
}

function redisplay(res) {
  const data = res.data;
  const cards = createCard(data);
  $(".cards").html(cards);
  if (dataSearch?.search) {
    $(".paginate").html("");
    return;
  }
  const paginate = createPaginate(res);
  $(".paginate").html(paginate);
}

// get data from api
async function fetchData(url) {
  const response = await fetch(url, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  });

  return response.json();
}

function loading() {
  $(".cards").html(
    `<div class="lds-ring"><div></div><div></div><div></div><div></div></div>`
  );
}

// get data
function getData() {
  loading();
  fetchData(
    `${BASE_URL}/api/get-application?${new URLSearchParams(
      dataSearch
    ).toString()}`
  ).then((res) => redisplay(res));
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

  // handle click pagination
  $(document).on("click", ".btn-paginate", function () {
    const url = $(this).data("url");
    loading();
    fetchData(url).then((res) => redisplay(res));
  });
});
