const searchInput = document.getElementById("search-input");
const searchResults = document.getElementById("search-results");
const searchButton = document.getElementById("search-btn");
const searchModel = document.getElementById("search-model");

function prevMonth(currentMonth, currentYear) {
  currentMonth = Number(currentMonth);
  currentYear = Number(currentYear);

  let prevMonth = currentMonth - 1;
  let prevYear = currentYear;

  if (prevMonth < 1) {
    prevMonth = 12;
    prevYear--;
  }

  window.location.href = "/calendar?month=" + prevMonth + "&year=" + prevYear;
}

function nextMonth(currentMonth, currentYear) {
  currentMonth = Number(currentMonth);
  currentYear = Number(currentYear);

  let nextMonth = currentMonth + 1;
  let nextYear = currentYear;

  if (nextMonth > 12) {
    nextMonth = 1;
    nextYear++;
  }

  window.location.href = "/calendar?month=" + nextMonth + "&year=" + nextYear;
}

if (!searchButton) {
  throw new Error("Search button not found");
}

searchButton.addEventListener("click", () => {
  toggleSearchModel();
});

searchModel.addEventListener("click", (event) => {
  event.stopPropagation();
});

function toggleSearchModel() {
  if (searchModel.classList.contains("hidden")) {
    searchModel.classList.remove("hidden");
    searchModel.addEventListener("click", closeSearchModelOutside);
  } else {
    searchModel.classList.add("hidden");
    searchModel.removeEventListener("click", closeSearchModelOutside);
  }
}

function closeSearchModelOutside(event) {
  if (event.target === searchButton || searchButton.contains(event.target)) {
    return;
  }

  if (
    !searchInput.contains(event.target) &&
    !searchResults.contains(event.target)
  ) {
    searchModel.classList.add("hidden");
    document.removeEventListener("click", closeSearchModelOutside);
  }
}

if (!searchInput || !searchResults) {
  throw new Error("Search input or results element not found");
}

searchInput.addEventListener("keyup", search);

async function search() {
  const searchTerm = searchInput.value.trim();

  if (searchTerm.length === 0) {
    searchResults.innerHTML = "";
    searchResults.classList.add("hidden");
    return;
  }

  const response = await fetch(`/search?q=${searchTerm}`);

  if (!response.ok) {
    searchResults.innerHTML = "Error: " + response.statusText;
    return;
  }

  const data = await response.json();

  searchResults.innerHTML = "";
  searchResults.classList.remove("hidden");

  if (data.length === 0) {
    const li = document.createElement("li");
    li.textContent = "No results found";
    searchResults.appendChild(li);
    return;
  }

  data.forEach((item) => {
    const li = document.createElement("li");
    li.innerHTML = "<a href='/tasks/" + item.id + "'>" + item.title + "</a>";
    searchResults.appendChild(li);
  });
}
