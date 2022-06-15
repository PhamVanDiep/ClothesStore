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