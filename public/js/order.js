let init = document.getElementById("order-status-0");
init.style.color = '#401D83';
init.style.borderBottom = '2px solid #401D83';

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
    document.getElementById('search-order-status').value = "";
    let element_clicked = document.getElementById("order-status-" + statusID);
    element_clicked.style.color = '#401D83';
    element_clicked.style.borderBottom = '2px solid #401D83';

    for (let index = 0; index < 6; index++) {
        if (index != statusID) {
            let element_non_clicked = document.getElementById("order-status-" + index);
            element_non_clicked.style.color = '#000000';
            element_non_clicked.style.borderBottom = 'none';
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

function cancelOrder(orderID) {
    let option = confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
    if (!option) return;
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText.toLowerCase() == "success") {
                    alert("Hủy đơn hàng thành công!");
                    let statusText = document.getElementById("status-text-" + orderID);
                    statusText.className = "canceled";
                    statusText.innerHTML = "Đã hủy";
                    document.getElementById("order-success-" + orderID).style.display = "table-cell";
                    document.getElementById("order-cancel-" + orderID).style.display = "none";
                } else {
                    console.log(this.responseText);
                    alert("Hủy đơn hàng không thành công!");
                }
            }
        };
        xhttp.open("GET", "libraries/customer/order/order_process.php?cancel=" + orderID, false);
        xhttp.send();
    }
}

function reBuy(orderID, userID) {
    let option = confirm('Bạn có chắc chắn muốn mua lại những sản phẩm này không?');
    if (!option) return;
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText.toLowerCase() == "success") {
                    alert("Sản phẩm đã được thêm vào giỏ hàng!");
                } else {
                    console.log(this.responseText);
                    alert("Không thể mua lại sản phẩm này!");
                }
            }
        };
        xhttp.open("GET", "libraries/customer/order/order_process.php?rebuy=" + orderID + "&userID=" + userID, false);
        xhttp.send();
    }
}