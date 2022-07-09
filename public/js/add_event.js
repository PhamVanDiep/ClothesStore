// const eventImageWraps = document.getElementsByClassName('event-image-wrap');
let eventImage = document.getElementById('event-image');

// console.log(eventImageWraps.length);
let loadFile = function(event) {
    // console.log(event.target.files.length);
    for (let index = 0; index < event.target.files.length; index++) {
        const element = event.target.files[index];
        // eventImage.length++;
        let newDiv = document.createElement('div');
        newDiv.className = 'event-image-wrap';
        newDiv.setAttribute('id', 'event-image-wrap' + index);
        let newImageOutput = document.createElement('img');
        newImageOutput.className = 'event-img';
        newImageOutput.setAttribute('id', 'output'+ index);
        newImageOutput.setAttribute('src', URL.createObjectURL(element));
        newImageOutput.setAttribute('name', 'event_images[]');
        newImageOutput.setAttribute('class', 'event_images');
        newDiv.appendChild(newImageOutput);

        let newRemoveSpan = document.createElement('span');
        let newRemoveImg = document.createElement('img');
        newRemoveImg.setAttribute('src', 'public/res/img/admin/remove.png');
        newRemoveImg.setAttribute('id', 'remove'+ index);
        newRemoveImg.onclick = function () {
            document.getElementById('event-image-wrap'+index).remove();
            // event.target.files
            // console.log(event.target.files.length);
        }
        newRemoveSpan.appendChild(newRemoveImg);
        newDiv.appendChild(newRemoveSpan);

        eventImage.appendChild(newDiv);
    }
};

function getPostValue() {
    let name = document.getElementById("eventName").value;
    let startDate = document.getElementById("startDate").value;
    let startTime = document.getElementById("startTime").value;
    let endDate = document.getElementById("endDate").value;
    let endTime = document.getElementById("endTime").value;
    let images = document.getElementsByName("event_images");
    let event_images = "";

    for (let index = 0; index < images.length; index++) {
        const element = images[index];
        event_images += element.getAttribute('src');
    }

    let postValue = "name=" + name 
                    + "&startDate=" + startDate + startTime 
                    + "&endDate=" + endDate + endTime 
                    + "event_images=" + event_images;

    return postValue;
}

function addEvent() {
    // const xhttp = new XMLHttpRequest();
    // xhttp.onload = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         //document.getElementById("rs").innerHTML=this.responseText;
    //         alert(this.responseText);
    //     }
    // }
    // xhttp.open("POST", "libraries/admin/event/insert_event.php", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhttp.send();
    alert(getPostValue);
}