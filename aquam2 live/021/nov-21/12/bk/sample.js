require(["jquery", "owlcarousel"], function ($) {
    $(document).ready(function () {
        setTimeout(function(){ 
        $('.homeSlider').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            pagination: true,
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
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });
       }, 1000);
    });
});
require(["jquery", "owlcarousel"], function ($) {
    $(document).ready(function () {
        setTimeout(function(){ 
        $('.sampleslider').owlCarousel({
            loop: true,
            margin: 10,
            center: true,
            responsiveClass: true,
            pagination: true,
            autoplay: true,
            stopOnHover: true,
            navigation: false,
            navigationText: ["prev", "next"],
            rewindNav: true,
            scrollPerPage: false,
            animateOut: 'fadeOut',
            autoplayTimeout: 6000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                769: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            }
        });
       }, 1000);
    });
});
require(["jquery", "owlcarousel"], function ($) {
    $(document).ready(function () {
		if(!$('body').hasClass('cms-home-page-v15')) { 
   $('.pcustom.head').remove();
  }
	});
});