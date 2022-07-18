let selectors = document.getElementsByClassName("selector")
let popup 

list = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr")


for(const item of list){
    item.addEventListener('mouseover', function handleMouseOver() {
        item.style.backgroundColor  = '#d8d8d8';
      });
      
      // 👇️ Change text color back on mouseout
      item.addEventListener('mouseout', function handleMouseOut() {
        item.style.backgroundColor  = '#ffffff';
      });
}

// tao selector 
    function addClickableSelector(select){
    select.parentElement.children[0].onclick= function(e){
        if(popup != null) {popup.style.display = "none"}
        popup = select
        select.style.display="block"
        e.stopPropagation()
        window.onclick=  function (e) {
            if(!e.target.closest(".selector") ){               
                popup.style.display = "none"
            }
        };
    }
}
for(select of selectors){
    addClickableSelector(select)
}

// update selector
let selector_boxes = document.getElementsByTagName("tbody")[0].getElementsByClassName("col6")
const   confirmed_selector = document.createElement("div")
        confirmed_selector.className = "selector"
        confirmed_selector.innerHTML='<div class="delivering">Đang giao</div>    <div class="completed"> Hoàn thành </div>        <div class="cancelled"> Đã hủy</div>'
const   delivering_selector = document.createElement("div")
        delivering_selector.className = "selector"
        delivering_selector.innerHTML ='<div class="completed"> Hoàn thành </div>'

for(box of selector_boxes){
    update_selector(box)
}

function update_selector(box){
    if(box.children.length > 1){
        box.children[1].remove()
    }
    if(box.children[0].className =='confirmed')
    {
        box.appendChild(confirmed_selector.cloneNode(true))
        addClickableSelector(box.children[1]) 
        change_status(box)
    }
    if(box.children[0].className =='delivering')
    {
        box.appendChild(delivering_selector.cloneNode(true))
        addClickableSelector(box.children[1])
        change_status(box)
    }
   
}
function change_status(box){
    
    for(let i = 0; i < box.children[1].children.length; i ++){
        box.children[1].children[i].onclick = function(){
           
            box.appendChild( box.children[1].children[i].cloneNode(true))
            box.children[1].remove()
            box.children[0].remove()
            update_selector(box)
        }
    }
}

// Xac nhan 
const confirmed_status = document.createElement("div")
confirmed_status.className = "confirmed"
confirmed_status.innerHTML =" Đã xác nhận"

let confirm_btns =  document.getElementsByClassName("btn-confirm")
for (let j = 0; j< confirm_btns.length; j++){
   confirm_change(confirm_btns[j])
}

function confirm_change(btn){
    btn.onclick = function(){
      
        
        if(window.confirm("Xác nhận đơn hàng?")){
        
            const parent =  btn.parentElement
            parent.appendChild(confirmed_status.cloneNode(true))
            parent.children[0].remove()
            update_selector(parent)
        }
    }
}



