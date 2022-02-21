require(['jquery','owlcarousel'], function(){  
    jQuery(document).ready(function() {
    jQuery('a.action.showcart').attr("href","javascript:void(0)");
    });  
    jQuery('a.action.showcart').mouseover(function(){
    jQuery(".minicart-wrapper .ui-dialog.mage-dropdown-dialog").show();
    jQuery('.minicart-wrapper').addClass('active');
    jQuery('a.action.showcart').addClass('active');
    });
    
    jQuery(".minicart-wrapper").mouseleave(function(){
    jQuery(".minicart-wrapper .ui-dialog.mage-dropdown-dialog").hide();
    jQuery('.minicart-wrapper').removeClass('active');
    jQuery('a.action.showcart').removeClass('active');
    });
    // jQuery(document).ready(function() {
    //     jQuery('.product-widget-slider').owlCarousel({
    //         loop: true,
    //         margin: 10,
    //         nav: true,
    //         navText: [
    //             "<i class='icon-left-open'></i>",
    //             "<i class='icon-right-open'></i>"
    //         ],
    //         autoplay: true,
    //         autoplayHoverPause: true,
    //         responsive: {
    //             0: {
    //             items: 1
    //             },
    //             600: {
    //             items: 3
    //             },
    //             1000: {
    //             items: 5
    //             }
    //         }
    //     });
    // });
    // jQuery(document).ready(function() {
    //     jQuery('div#downloads\\.tab').hide();jQuery('div#reviews').hide();
    //     jQuery('#tab-label-reviews-title').on('click', function() {
    //     jQuery('div#reviews').show();jQuery('div#description').hide();jQuery('div#downloads\\.tab').hide();
    //     });
    //     jQuery('#tab-label-description-title').on('click', function() {
    //     jQuery('div#description').show();jQuery('div#downloads\\.tab').hide();jQuery('div#reviews').hide();
    //     });
    //     jQuery('#tab-label-downloads\\.tab-title').on('click', function() {
    //     jQuery('div#downloads\\.tab').show();jQuery('div#description').hide();jQuery('div#reviews').hide();
    //     });
        
    // });
    jQuery(document).ready(function() {
        
        jQuery('#tab-label-description').addClass('active');
        jQuery('#description').show();
        jQuery('div#downloads\\.tab').hide();jQuery('div#reviews').hide();
        jQuery('#tab-label-description').on('click', function() {
            jQuery('.data.item.title').removeClass('active');
            jQuery('#tab-label-description').addClass('active');
            jQuery('.data.item.content').hide();
            jQuery('#description').show();
        });
        jQuery('#tab-label-reviews').on('click', function() {
            jQuery('.data.item.title').removeClass('active');
            jQuery('#tab-label-reviews').addClass('active');
            jQuery('.data.item.content').hide();
            jQuery('#reviews').show();
        });
        jQuery('#tab-label-downloads\\.tab').on('click', function() {
                jQuery('.data.item.title').removeClass('active');
                jQuery('#tab-label-downloads\\.tab').addClass('active');
                jQuery('.data.item.content').hide();
                jQuery('#downloads\\.tab').show();
        });
        
    });
});
// 15-7-21
require([ "jquery" ], function($) {
    $(document).ready(function(){
            $('.cms-index-index .page-header .panel.wrapper').remove(); 
    });
}); 