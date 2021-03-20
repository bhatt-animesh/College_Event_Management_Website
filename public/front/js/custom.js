	/*
[Table of contents]
  1 header-fixed js
  2 menu-icon js 
  3 lazyload js
  4 wow js
  5 Owl carousel js

*/


/* header-fixed js */

$(window).scroll(function () {
	if ($(this).scrollTop() > 20) {
		$('header').addClass('fixed');
	} else {
		$('header').removeClass('fixed');
	}
});

/* header-fixed js */


/* menu-icon js */

$(".navbar-toggler").click(function () {
	$('html').toggleClass('show-menu');
});

/* menu-icon js */


/* lazyload js */

$(function () {
	$("img.lazyload").lazyload();
});

/* lazyload js */


/* Owl carousel js */

$('.banner-carousel').owlCarousel({
	items: 1,
	loop: true,
	margin: 1,
	nav: true,
});

$('.review-carousel').owlCarousel({
	items: 1,
	loop: true,
	margin: 10,
	nav: true,
	dots: false,
});

$('.product-details-img').owlCarousel({
	items: 1,
	loop: true,
	margin: 0,
	nav: false,
	dots: true,
	autoplay: true,
});

$('.feature-carousel').owlCarousel({
	// items: 2,
	loop: true,
	margin: 10,
	nav: false,
	dots: false,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
});

$('.pro-ref-carousel').owlCarousel({
	// items: 2,
	loop: true,
	margin: 10,
	nav: true,
	dots: false,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
});

$('.ingredients-carousel').owlCarousel({
	// items: 2,
	loop: true,
	margin: 0,
	nav: false,
	dots: false,
	autoplay: true,
	responsive: {
		0: {
			items: 1
		},
		481: {
			items: 2
		},
		576: {
			items: 3
		},
		768: {
			items: 4
		},
		992: {
			items: 5
		},
		1200: {
			items: 6
		}
	}
});









$(document).ready(function () {

	var sync1 = $("#sync1");
	var sync2 = $("#sync2");
	var slidesPerPage = 4; //globaly define number of elements per page
	var syncedSecondary = true;

	sync1.owlCarousel({
		items: 1,
		nav: false,
		loop: true,
		dots: false,
		autoplay: false,
		mouseDrag: false,
		animateOut: 'fadeOut',
		responsiveRefreshRate: 200,
		navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
	}).on('changed.owl.carousel', syncPosition);

	sync2
		.on('initialized.owl.carousel', function () {
			sync2.find(".owl-item").eq(0).addClass("current");
		})
		.owlCarousel({
			nav: true,
			dots: false,
			autoWidth: true,
			mouseDrag: false,
			slideBy: slidesPerPage,
			responsiveRefreshRate: 100,
		}).on('changed.owl.carousel', syncPosition2);

	function syncPosition(el) {
		var count = el.item.count - 1;
		var current = Math.round(el.item.index - (el.item.count / 2) - .5);

		if (current < 0) {
			current = count;
		}
		if (current > count) {
			current = 0;
		}

		sync2
			.find(".owl-item")
			.removeClass("current")
			.eq(current)
			.addClass("current");
		var onscreen = sync2.find('.owl-item.active').length - 1;
		var start = sync2.find('.owl-item.active').first().index();
		var end = sync2.find('.owl-item.active').last().index();

		if (current > end) {
			sync2.data('owl.carousel').to(current, 100, true);
		}
		if (current < start) {
			sync2.data('owl.carousel').to(current - onscreen, 100, true);
		}
	}

	function syncPosition2(el) {
		if (syncedSecondary) {
			var number = el.item.index;
			sync1.data('owl.carousel').to(number, 100, true);
		}
	}

	sync2.on("click", ".owl-item", function (e) {
		e.preventDefault();
		var number = $(this).index();
		sync1.data('owl.carousel').to(number, 300, true);
	});
});

/* Owl carousel js */

/* Product Grid & List */

$(document).ready(function () {
	$('#list').click(function (event) {
		event.preventDefault();
		$('.cat-product .row > div').addClass('col-12');
		// $('#posts img').addClass('d-none');
		$('#grid').removeClass('active');
		$('#list').addClass('active');
	});

	$('#grid').click(function (event) {
		event.preventDefault();
		$('.cat-product .row > div').removeClass('col-12');
		// $('#posts .item').addClass('col-4');
		// $('#posts img').removeClass('d-none');
		$('#list').removeClass('active');
		$('#grid').addClass('active');
	});
});

/* Product Grid & List */


/* back to Top */

// hide #back-top first
$("#myBtn").hide();

// fade in #back-top
$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#myBtn').fadeIn();
		} else {
			$('#myBtn').fadeOut();
		}
	});

	// scroll body to 0px on click
	$('#myBtn').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 1000);
		return false;
	});
});

/* back to Top */


/* Qty increase & decrease */

// $('.add').click(function () {
// 	if ($(this).prev().val() < 200) {
// 		$(this).prev().val(+$(this).prev().val() + 1);
// 	}
// });
// $('.sub').click(function () {
// 	if ($(this).next().val() > 1) {
// 		if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
// 	}
// });

// This button will increment the value
$('.add').click(function(e){

    var max_qty = $("#max_qty").val();
    
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If is not undefined
    if (!isNaN(currentVal)) {
        // Increment only if value is < 20
        if (currentVal < max_qty)
        {
          $('input[name='+fieldName+']').val(currentVal + 1);
          $('.sub').val("-").removeAttr('style');
                        }
        else
        {
            $('.add').val("+").css('color','#aaa');
                $('.add').val("+").css('cursor','not-allowed');
        }
    } else {
        // Otherwise put a 0 there
        $('input[name='+fieldName+']').val(1);

    }
});
// This button will decrement the value till 0
$(".sub").click(function(e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 1) {
        // Decrement one only if value is > 1
        $('input[name='+fieldName+']').val(currentVal - 1);
         $('.add').val("+").removeAttr('style');
    } else {
        // Otherwise put a 0 there
        $('input[name='+fieldName+']').val(1);
        $('.sub').val("-").css('color','#aaa');
        $('.sub').val("-").css('cursor','not-allowed');
    }
});

/* Qty increase & decrease */