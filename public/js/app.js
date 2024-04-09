const searchInput = document.getElementById("search-input");
const searchResults = document.getElementById("search-results");

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

  const li = document.createElement("li");
  li.textContent = data.results;
  searchResults.appendChild(li);
}
