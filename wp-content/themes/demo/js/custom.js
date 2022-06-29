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
    if(window.msCrypto && $('#unsupported-browser').length > 0) {	//if IE11 only
        $('#unsupported-browser').modal('show');
	}

    
    //Lazy Load Video
    $('.video-wrapper .video-placeholder').on('click', function(){
          $(this).addClass('d-none');
          var video = $(this).siblings('video');
          var vidSrc = video.data('video_src')
          video.children('source').attr('src', vidSrc);
          video[0].load();
          video.removeClass('d-none');
          video.get(0).play();
      })
});