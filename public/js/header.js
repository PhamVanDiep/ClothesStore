let avatar = document.getElementById("header-img-wrap");
let info = document.getElementById("header-info-wrap")
let dropdown = document.getElementById("dropdown-content");

let isDisplayed = false;
let isClicked = false;

avatar.onmouseenter = showDropdown;
avatar.onmouseleave = hideDropdown;
avatar.onclick = clicked;

info.onmouseenter = showDropdown;
info.onmouseleave = hideDropdown;
info.onclick = clicked;

dropdown.onmouseenter = showDropdown;
dropdown.onmouseleave = hideDropdown;

function showDropdown(){
    isDisplayed = true;
    dropdown.style.display = "block";
}

function hideDropdown() {
    if (!isClicked) {
        isDisplayed = false;
        dropdown.style.display = "none";
    }
}

function clicked() {
    // console.log("clicked");
    if (!isDisplayed) {
        isClicked = true;
        showDropdown();
    }else{
        isClicked = false;
        hideDropdown();
    }
}

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