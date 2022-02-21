require(['jquery'], function() {
    jQuery(document).ready(function() {
        (function(jQuery) {
            jQuery(window).on('load', function() {
                setTimeout(function() { //setTimeout function
                    jQuery.instagramFeed({
                        'username': 'cookshopplus',
                        'container': "#instagram-feed",
                        'display_profile': false,
                        'display_biography': false,
                        'display_gallery': true,
                        'get_raw_json': false,
                        'callback': null,
                        'styling': false,
                        'items': 6,
                        'items_per_row': 1,
                        'margin': 0,
                    });
                }, 1000); //setTimeout function
            });
        })(jQuery);
        (function(h) {
            var l = {
                host: "https://www.instagram.com/",
                username: "",
                container: "",
                display_profile: !0,
                display_biography: !0,
                display_gallery: !0,
                display_igtv: !1,
                get_raw_json: !1,
                callback: null,
                styling: !0,
                items: 8,
                items_per_row: 6,
                margin: .5
            };
            h.instagramFeed = function(b) {
                b = h.fn.extend({}, l, b);
                "" == b.username ? console.error("Instagram Feed: Error, no username found.") : b.get_raw_json || "" != b.container ? b.get_raw_json && null == b.callback ? console.error("Instagram Feed: Error, no callback defined to get the raw json") : h.get(b.host + b.username, function(a) {
                    a = a.split("window._sharedData = ");
                    a = a[1].split("\x3c/script>");
                    a = a[0];
                    a = a.substr(0, a.length - 1);
                    a = JSON.parse(a);
                    a = a.entry_data.ProfilePage[0].graphql.user;
                    if (b.get_raw_json) b.callback(JSON.stringify({
                        id: a.id,
                        username: a.username,
                        full_name: a.full_name,
                        is_private: a.is_private,
                        is_verified: a.is_verified,
                        biography: a.biography,
                        followed_by: a.edge_followed_by.count,
                        following: a.edge_follow.count,
                        images: a.edge_owner_to_timeline_media.edges,
                        igtv: a.edge_felix_video_timeline.edges
                    }));
                    else {
                        var d = "",
                            f = "",
                            g = "",
                            e = "",
                            k = "";
                        b.styling && (d = " style='text-align:center;'", f = " style='border-radius:10em;width:15%;max-width:125px;min-width:50px;'", g = " style='font-size:1.2em;'", e = " style='font-size:1em;'", k = " style='margin:" + b.margin + "% " + b.margin + "%;width:" + (100 - 2 * b.margin * b.items_per_row) / b.items_per_row + "%;float:left;'");
                        var c = "";
                        b.display_profile && (c = c + ("<div class='instagram_profile'" + d + ">") + ("\t<img class='instagram_profile_image' src='" + a.profile_pic_url + "' alt='" + b.username + " profile pic'" + f + " />"), c += "\t<p class='instagram_username'" + g + ">@" + a.full_name + " (<a href='https://www.instagram.com/" + b.username + "'>@" + b.username + "</a>)</p>");
                        b.display_biography && (c += "\t<p class='instagram_biography'" + e + ">" + a.biography + "</p>");
                        b.display_profile && (c += "</div>");
                        if (b.display_gallery)
                            if (a.is_private) c += "<p class='instagram_private'><strong>This profile is private</strong></p>";
                            else {
                                e = a.edge_owner_to_timeline_media.edges;
                                g = e.length > b.items ? b.items : e.length;
                                c += "<div class='instagram_gallery'>";
                                for (d = 0; d < g; d++) f = "https://www.instagram.com/p/" + e[d].node.shortcode, c += "<div class='col-sm-2'>" + "<div class='content11'>" + "<a href='" + f + "' rel='noopener' target='_blank'>", c += "\t<img src='" + e[d].node.thumbnail_src + "' alt='" + b.username + " instagram image " + d + "'" + k + " class='content-image'/><div class='content-overlay'>" + "</div>" + "<div class='content-details fadeIn-bottom'>" + "</div>" + "</div>" + "</div>", c += "</a>";
                                c += "</div>"
                            } if (b.display_igtv)
                            if (a.is_private) c += "<p class='instagram_private'><strong>This profile is private</strong></p>";
                            else {
                                a = a.edge_felix_video_timeline.edges;
                                g = a.length > b.items ? b.items : a.length;
                                c += "<div class='instagram_igtv'>";
                                for (d = 0; d < g; d++) f = "https://www.instagram.com/p/" + a[d].node.shortcode, c += "<a href='" + f + "' rel='noopener' target='_blank'>", c += "\t<img src='" + a[d].node.thumbnail_src + "' alt='" + b.username + " instagram image " + d + "'" + k + " />", c += "</a>";
                                c += "</div>"
                            } h(b.container).html(c)
                    }
                }) : console.error("Instagram Feed: Error, no container found.")
            }
        })(jQuery);
    });
 
});
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

$(document).ready(function () {
    setTimeout(function() {
        $(".page-wrapper").attr('id','custom-wrapper');
    }, 10);
});

function myFunction(){
    sessionStorage.setItem("visited", "yes");
    // popup.classList.remove("fade-in");
    setTimeout(()=>popup.classList.add("hidden"), 100);
    location.href = "https://staging3.24sevencommerce.com/shop/";

}
window.onload = function () {
    setTimeout(function(){
        var popup = document.getElementById("popup");
        var overc = document.getElementById("custom-wrapper");
        var yetVisited = sessionStorage.getItem("visited");
        console.log(yetVisited);
        if (!yetVisited) {
            popup.classList.remove("hidden");
            overc.classList.add("custom-bg");
            setTimeout(()=>popup.classList.add("fade-in"));
            document.body.style.overflow = "hidden";
            
        }
    }, 10);
};