const titles = document.getElementsByClassName('order-status');

// set anmation 
let clicked = [true, false, false, false, false, false];
let preIndex = 0;
titles[0].style.color = '#401D83';
titles[0].style.borderBottom = '2px solid #401D83';
for (let index = 0; index < titles.length; index++) {
    const element = titles[index];

    element.onclick = function () {
        titles[preIndex].style.color = '#000000';
        titles[preIndex].style.borderBottom = 'none';
        clicked[index] = true;
        clicked[preIndex] = false;
        preIndex = index;
        element.style.color = '#401D83';
        element.style.borderBottom = '2px solid #401D83';
        filterByStatus(index);
        document.getElementById('search-order-status').value = "";
    }

    element.onmouseenter = function () {
        element.style.color = '#401D83';
        element.style.borderBottom = '2px solid #401D83';
    }

    element.onmouseleave = function () {
        if (!clicked[index]) {
            element.style.color = '#000000';
            element.style.borderBottom = 'none';
        }else{
            element.style.color = '#401D83';
            element.style.borderBottom = '2px solid #401D83';
        }
    }
}

function filterByStatus(statusID) {
    if (statusID == 0) {
        document.getElementById('order-input-wrap').style.display = "block";
        document.getElementById('search-wrap').style.height = "40px";
        for (let index = 1; index <= 5; index++) {
            let elements = document.getElementsByClassName('order-detail-wrap-' + index);
            for (let i = 0; i < elements.length; i++) {
                const element = elements[i];
                element.style.display = "block";
            }
        }
    } else {
        document.getElementById('order-input-wrap').style.display = "none";
        document.getElementById('search-wrap').style.height = "0px";
        for (let index = 1; index <= 5; index++) {
            let elements = document.getElementsByClassName('order-detail-wrap-' + index);
            if (index == statusID) {
                for (let i = 0; i < elements.length; i++) {
                    const element = elements[i];
                    element.style.display = "block";
                }
            }
            else {
                for (let i = 0; i < elements.length; i++) {
                    const element = elements[i];
                    element.style.display = "none";
                }
            }
        }
    }
}

function filterByName(input) {
    inputValue = input.value.toUpperCase();
    let elements = document.getElementsByClassName("order-detail-wrap");

    for (let index = 0; index < elements.length; index++) {
        const element = elements[index];
        if (!element.innerHTML.toUpperCase().includes(inputValue)) {
            element.style.display = "none";
        } else {
            element.style.display = "block";
        }
    }
}