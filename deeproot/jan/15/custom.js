// require(["jquery", "owlcarousel"], function ($) {
require(['jquery'], function($){
    $(document).ready(function () {
$(".page-wrapper").attr('id','custom-wrapper');
});
});
function myFunction(){
    sessionStorage.setItem("visited", "yes");
    // popup.classList.remove("fade-in");
    setTimeout(()=>popup.classList.add("hidden"), 300);
    location.href = "https://staging3.24sevencommerce.com/shop/";

}
window.onload = function () {
    var popup = document.getElementById("popup");
     var overc = document.getElementById("custom-wrapper");
    var yetVisited = sessionStorage.getItem("visited");
    if (!yetVisited) {
         popup.classList.remove("hidden");
         overc.classList.add("custom-bg");
         setTimeout(()=>popup.classList.add("fade-in"));
         document.body.style.overflow = "hidden";
        
    }
  };