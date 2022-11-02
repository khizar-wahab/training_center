document.querySelectorAll("input").forEach(inputBorder);
function inputBorder(e){
    e.style.borderRadius = "0px";
}

document.querySelectorAll("textarea").forEach(inputBorder);
function inputBorder(e){
    e.style.borderRadius = "0px";
}

if ($(document).height() > $(window).height()) {
    $(".admin-sidebar-main:eq(0)").css("min-height", "100%");
}else{
    $(".admin-sidebar-main:eq(0)").css("min-height", "100vh");
}