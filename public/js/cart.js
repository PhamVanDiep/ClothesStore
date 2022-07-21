const selectAll = document.getElementById("select-all");
let checkbox = document.getElementsByClassName("container");
const totalItem = document.getElementById("total-item");
const delivery = document.getElementById("delivery-cost").parentElement
const totalCost = document.getElementById("total-cost")
const quantitySelect = document.getElementsByClassName("quantity-select")
const voucher_discount = document.getElementById("voucher-discount")
const voucher_selector = document.getElementById("voucher-selector")
selectAll.onclick = function(){
    let isCheck = selectAll.children[0].checked;
    for (let i = 1; i < checkbox.length; i++) {
        checkbox[i].children[0].checked= isCheck;
        
    }
    updateCost();
}


for (let i = 1; i < checkbox.length; i++) {
  checkbox[i].onclick = updateCost
}
for (let i = 0; i < quantitySelect.length; i++) {
  quantitySelect[i].onclick = updateCost
}
// update so 
function updateCost(){
  let total = 0
  for (let i = 1; i < checkbox.length; i++) {
    if( checkbox[i].children[0].checked == true ){
      total += checkbox[i].parentElement.children[4].children[1].value*
      parseInt(checkbox[i].parentElement.children[3].innerHTML.replace(/[^0-9]/g , ''))
    }
    
  }
  totalItem.innerText = addDots(total);
  if(total != 0) {
    delivery.style.visibility="visible";
    
    if(voucher_selector.value != 0){
      voucher_discount.parentElement.style.visibility="visible"
      voucher_discount.innerHTML=addDots(-total*voucher_selector.value/100)
    }
    else{
      voucher_discount.parentElement.style.visibility="hidden"
    }
    totalCost.innerHTML = addDots(total*(100-voucher_selector.value)/100+15000);
  }
  else{
    voucher_discount.parentElement.style.visibility="hidden"
    delivery.style.visibility= "hidden";
    totalCost.innerHTML = "";
    totalItem.innerText ="";
  }
}

//chuyen them nut
function addDots(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2'); // changed comma to dot here
        }
        return x1 + x2;
    }

//delete sản phẩm

// let del_btns = document.getElementsByClassName("btn-del")

// for(const btn of del_btns) {
//  btn.onclick = function(){
//     var answer = window.confirm("Xóa sản phẩm ?");
//     if (answer==true) {
//       btn.parentElement.remove();
//       checkbox = document.getElementsByClassName("container");
      
//     }
//     updateCost();
//   }
// }

// xoa da chon 
del_select_btn = document.getElementById("btn-del-select")
del_select_btn.onclick= function(){
  var answer = window.confirm("Xóa sản phẩm đã chọn ?");
    if (answer==true) {
      
      for (let i = 1; i < checkbox.length; i++) {
        if(checkbox[i].children[0].checked){
       
          checkbox[i].parentElement.remove()
          i--;
        }
      }
      
      updateCost()
    }
}

voucher_selector.onchange = function(){
  updateCost()
}



const purchase = document.getElementsByClassName("purchase-info")[0]
window.onscroll = function(){
  if(window.pageYOffset > Math.max(480,document.getElementById("item-list").offsetHeight) - 480){
    
    purchase.classList.remove("sticky")
    purchase.classList.add("scroll")
    purchase.style.marginTop = (Math.max(560,document.getElementById("item-list").offsetHeight) - 700).toString() + 'px';
  }
  else{
    purchase.classList.add("sticky")
    purchase.classList.remove("scroll")
    purchase.style.marginTop = '0'
  }
}


//Dat hang 
// const purchase_btn = document.getElementById("btn-purchase")
// purchase_btn.onclick = function(){
//   let a = 0
//   for (let i = 1; i < checkbox.length; i++) {
//     if(checkbox[i].children[0].checked == true) a++;  
//   }
//   if(a == 0){
//     alert("Chưa chọn sản phẩm")
//   }
//   else{
    
//   }
// }

const cartID = document.getElementById("cartID").value  ;



function delete_product(btn, cartID, productID, size, type) {
  console.log("clicked");
  var answer = window.confirm("Xóa sản phẩm ?");
    if (answer==true) {
      btn.parentElement.remove();
      checkbox = document.getElementsByClassName("container");
      console.log("clicked");
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.responseText.toLowerCase() == "success") {
                    alert("Xoá sản phẩm thành công");
                    btn.parentElement.remove();
                    checkbox = document.getElementsByClassName("container");
                } else {
                    alert("Xóa không thành công!");
                }
            }
        };
        xhttp.open("GET", "libraries/customer/cart/delete_product.php?productID=" + productID + "&cartID=" +cartID 
                    + "&type="+type
                    + "&size="+size, false);
        xhttp.send();
    }
    updateCost();
  
}