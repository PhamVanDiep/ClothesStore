const selectAll = document.getElementById("select-all");
let checkbox = document.getElementsByClassName("container");
const totalItem = document.getElementById("total-item");
const delivery = document.getElementById("delivery-cost").parentElement
const totalCost = document.getElementById("total-cost")
const quantitySelect = document.getElementsByClassName("quantity-select")


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
    delivery.style.display="flex";
    totalCost.innerHTML = addDots(total+15000);
  }
  else{
    delivery.style.display= "none";
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

let del_btns = document.getElementsByClassName("btn-del")

for(const btn of del_btns) {
 btn.onclick = function(){
    var answer = window.confirm("Xóa sản phẩm ?");
    if (answer==true) {
      btn.parentElement.remove();
      checkbox = document.getElementsByClassName("container");
      
    }
    updateCost();
  }
}