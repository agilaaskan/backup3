require(["jquery", "owlcarousel"], function ($) {
    $(document).ready(function () {
        $('.featured-slider').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            pagination: false,
            autoplay: false,
            stopOnHover: true,
            navigation: true,
            navigationText: ["prev", "next"],
            rewindNav: true,
            scrollPerPage: false,
            animateOut: 'fadeOut',
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    loop: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: true
                }
            }
        });
    });
});
require(["jquery", "owlcarousel"], function ($) {
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