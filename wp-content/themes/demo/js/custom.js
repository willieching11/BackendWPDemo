//Add custom site JS here

// $(function() {
//     //Owl slider
//     ///https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html
//     var owl = $(".owl-carousel");

//     owl.owlCarousel({
//         loop:true,
//         dots: true,
//         dotsEach: true,
//         responsiveClass:true,
//         margin: 20,
//         responsive:{
//             0:{
//                 items:1,
//             },
//             601:{
//                 items:2,
//             },
//             769:{
//                 items:3,
//             }
//         },
//         itemsTablet: [768,2], //2 items between 768 and 6000
//         itemsMobile: [600,1],
//         nav:true,
//         navText: ["<div class='arrow left'><div class='point'></div></div>", "<div class='arrow right'><div class='point'></div></div>"],
//     });

//     $('.owl-item').trigger('initialized.owl.carousel').show();
// });

$(document).ready(function() {
    function isBreakpoint(alias) {
        return $('.device-' + alias).is(':visible');
    }
    if ($('.wistia_embed').length > 0) {
        var is_logged_in = false;
        window._wq = window._wq || [];
        _wq.push({ id: "sajsbs1vl5", onReady: function(video) {
            var video = Wistia.api("sajsbs1vl5");
            video.bind("secondchange", function(s) {
                if (s >= 60 && !is_logged_in) {
                    // If user is not logged in open popup
                    video.pause();
                    $("#loginModal").modal('show');
                }
            });
            video.bind('play', function() {
                console.log(video.time());
                if (video.time() >= 60 && !is_logged_in) {
                    // If user is not logged in open popup
                    video.pause();
                    $("#loginModal").modal('show');
                }
            });
            // Check to see if user is logged in initially
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: site.ajax_url,
                data: { 
                    'action': 'is_user_logged_in',
                },
                success: function(data){
                    if (data.loggedin == true){
                        is_logged_in = true;
                    } else {
                        is_logged_in = false;
                    }
                },
                error : function(error){ console.log(error) }
            });
            // Perform AJAX login on form submit
            $('form#login').on('submit', function(e){
                $('form#login p.status').show().text(site.loadingmessage);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: site.ajax_url,
                    data: { 
                        'action': 'ajax_login',
                        'username': $('form#login #username').val(), 
                        'password': $('form#login #password').val(), 
                        'security': $('form#login #security').val() 
                    },
                    success: function(data){
                        $('form#login p.status').text(data.message);
                        if (data.loggedin == true){
                            is_logged_in = true;
                            $("#loginModal").modal('close');
                            video.play();
                        }
                    },
                    error : function(error){ console.log(error) }
                });
                e.preventDefault();
            });
        }});
    }
});