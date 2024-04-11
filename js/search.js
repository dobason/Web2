document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const searchSuggestions = document.getElementById("searchSuggestions");

    searchInput.addEventListener("input", function () {
        const searchQuery = searchInput.value.trim().toLowerCase();
        updateSearchSuggestions(searchQuery);
    });

    function updateSearchSuggestions(query) {
        // Clear existing suggestions
        searchSuggestions.innerHTML = "";

        if (query.length === 0) {
            return;
        }

        const matchingProducts = products.filter(product => {
            const productName = product.name.toLowerCase();
            return productName.includes(query);
        });

        matchingProducts.slice(0, 5).forEach(product => {
            const suggestionItem = document.createElement("li");
            suggestionItem.textContent = product.name;
            suggestionItem.addEventListener("click", function () {
                // Set the search input value when a suggestion is clicked
                searchInput.value = product.name;
                // Trigger the search
                filterProductsBySearch(product.name);
            });

            searchSuggestions.appendChild(suggestionItem);
        });
    }

    function filterProductsBySearch(query) {
        const filteredProducts = products.filter(product => {
            const productName = product.name.toLowerCase();
            return productName === query.toLowerCase();
        });

        if (filteredProducts.length === 0) {
            displayNoResultsMessage();
        } else {
            displayProducts(filteredProducts);
        }
    }

    // ... (the rest of your code)
});
