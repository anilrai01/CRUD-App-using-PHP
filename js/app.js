const DOMElements = {
    media: document.querySelector('.media'),
    node: document.querySelectorAll('.media'),
}
let modules = Array.prototype.slice.call(DOMElements.node);
console.log(modules);

const animate =  el =>{
    el.style.WebkitTransform = "translateY(0) scale(1)";
    el.style.msTransform = "translateY(0) scale(1)";
    el.style.WebkitTransform = "translateY(0) scale(1)";
    el.style.opacity = "1";
}

modules.forEach(el => animate(el));

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


var popWrap = document.querySelector('.popWrap');
var popWrapForm = document.querySelector('.editPost');

function call_(){
    //Wrapper
    popWrap.style.backgroundColor = "rgba(0,0,0,0.7)";
    popWrap.style.zIndex = "5";
    //Form
    popWrapForm.style.opacity = 1;
    popWrapForm.zIndex = "10";
    popWrapForm.style.transform = "scale(1)";
};

function close_(){
    console.log('Pressed');
    //Wrapper
    popWrap.style.backgroundColor = "#fff"; 
    popWrap.style.zIndex = "-5";
    //Form
    popWrapForm.style.opacity = 0;
    popWrapForm.style.transform = "scale(0)";
    popWrapForm.style.zIndex = "-10";
};

var obj = {
    postID: '',
}

function getID(tempID){
    obj.postID = tempID;
    console.log(obj.postID);
}

// window.onload(()=>{
//     DOMElements.media.style.transform = "translateY(0) sclae(1)";
//     DOMElements.media.style.opacity = 1;
// })


