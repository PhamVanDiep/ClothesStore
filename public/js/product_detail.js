const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage() {
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);

function addProduct(cartID, productID) {
    let quantity = document.getElementById("number_product").value;
    let size = document.getElementById("size_select").value;
    let type = document.getElementById("type_select").value;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        //    console.log(this.responseText);
            if(this.responseText == "success"){
                alert("Thêm sản phẩm vào giỏ hàng thành công");
            }else{
                alert("Thêm sản phẩm vào giỏ hàng không thành công");
            }
        }
    }
    xmlhttp.open("GET", "libraries/customer/add_product/add_product.php?cartID=" + cartID
                        + "&productID=" + productID
                        + "&number=" + quantity
                        + "&size=" + size
                        + "&type=" + type , true);
    xmlhttp.send();
}