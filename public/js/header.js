function searchByName() {
    let search = document.getElementById("search-input-text").value;
    if (search.length > 0) {
        window.location.href = '/web/ClothesStore/search?product-name=' + search;
    }
}

document.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        searchByName()
    }
});