const searchInput = document.getElementById("search-input");
const searchResults = document.getElementById("search-results");
const searchButton = document.getElementById("search-btn");
const searchModel = document.getElementById("search-model");

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

searchInput.addEventListener("input", search);

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

  if (data.results === 0) {
    const li = document.createElement("li");
    li.textContent = "No results found";
    searchResults.appendChild(li);
    return;
  }

  data.forEach((result) => {
    const li = document.createElement("li");
    li.textContent = result.result;
    searchResults.appendChild(li);
  });
}
