
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