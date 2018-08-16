jQuery(document).ready(function($) {

	'use strict';

		$(".our-listing").owlCarousel({
			items: 4,
			navigation: true,
			navigationText: ["&larr;","&rarr;"],
            //Basic Speeds
            slideSpeed : 100,
            paginationSpeed : 400,
            rewindSpeed : 500,

//Autoplay
            autoPlay : true,
            stopOnHover : false
		});

    $(".our-view").owlCarousel({
        items: 5,
        navigation: true,
        navigationText: ["&larr;","&rarr;"],
        //Basic Speeds
        slideSpeed : 100,
        paginationSpeed : 400,
        rewindSpeed : 500,

//Autoplay
        autoPlay : true,
        stopOnHover : false
    });



    $(".gallery-mobile-view").owlCarousel({

// Most important owl features
        items : 1,
        itemsCustom : false,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [980,1],
        itemsTablet: [768,1],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
        singleItem : false,
        itemsScaleUp : false,
        slideBy: 1,
        autoHeight:true,

//Basic Speeds
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,

//Autoplay
        autoPlay : false,
        stopOnHover : false,

// Navigation
        navigation : false,
        rewindNav : true,
        scrollPerPage : false,

//Pagination
        pagination : true,
// Responsive
        responsive: true,
        responsiveRefreshRate : 200,
        responsiveBaseWidth: window
    });




		$('.flexslider').flexslider({
		    animation: "fade",
		    controlNav: false,
		    prevText: "&larr;",
		    nextText: "&rarr;"
		});


        // $('.toggle-menu').click(function(){
	    //     $('.menu-responsive').slideToggle();
	    //     return false;
	    // });

    $(document).ready(function(){
        $('.user-album-view').click(
            function(){
                var id = $(this).attr('id');
                // $(this).attr('name').val(click);
                // alert($(this).attr('name'));
                $('.user-album-view').removeClass('pic-selected');
                // if ($(this).attr('name') == 'click'){
                //id = id.replace(/menu(\d+)/gi,'$1');
                $(this).addClass('pic-selected');
                $('#mainpic').attr('src', id);
                // }
            }
        );
    });



});

$(document).ready(function(){
    //Examples of how to assign the Colorbox event to elements

    $(".group3").colorbox({rel:'group3', transition:"none", maxWidth:"90%", returnFocus:"true", maxHeight:"80%", current:""});


});

$(window).on('load', function () {
    $preloader = $('.loaderArea'),
        $loader = $preloader.find('.loader');
    $loader.fadeOut();
    $preloader.delay(350).fadeOut('slow');
});



// $(document).ready(function() {
//
//     var feed = new Instafeed({
//         get: 'tagged',
//         tagName: 'awesome',
//         clientId: 'YOUR_CLIENT_ID'
//     });
//     feed.run();
//
// });








