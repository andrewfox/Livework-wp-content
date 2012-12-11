
$(document).ready(function() {



	$(".menu-reveal").click(function () {
		$('header').toggleClass('open');
	});




	// Hide/show people on our team by location
	
	
	$("li.all").click(function () {
		$('#people li').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
	});
	
	$("li.london").click(function () {
		$('#people li').hide()
		$('#people .category-london').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
	});
	
	$("li.oslo").click(function () {
		$('#people li').hide()
		$('#people .category-oslo').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
	});
	
	
	$("li.sao-paulo").click(function () {
		$('#people li').hide()
		$('#people .category-saopaulo').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
	});
	
	
	$("li.rotterdam").click(function () {
		$('#people li').hide()
		$('#people .category-rotterdam').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
	});

//	$('#more-info ul#people')
//		.hide();
//
//
//$(".morepeople").click(function () {
//	$('#more-info ul#people')
//		.toggle();
//	$('#more-info h2 a.morepeople')
//		.toggleClass('clicked')
//});


//$("ul#offices li").click(function () {
//	$('ul#people li.oslo')
//	$(this).prop('value', 'Existing activity');
//		.toggle()
//});
//
//(this).parent().children('.class2');


	var theLoc = $('header').position().top;
	$(window).scroll(function() {
		if(theLoc >= $(window).scrollTop()) {
			if($('header').hasClass('fixed')) {
				$('header').removeClass('fixed');
			}
		} else { 
			if(!$('header').hasClass('fixed')) {
				$('header').addClass('fixed');
			}
		}
	});
	
	
//	var theLoc3 = $('ul').position().top;
//		$(window).scroll(function() {
//			if(theLoc3 >= $(window).scrollTop()) {
//				if($('div.menu-header').hasClass('fixed')) {
//					$('div.menu-header').removeClass('fixed');
//				}
//			} else { 
//				if(!$('div.menu-header').hasClass('fixed')) {
//					$('div.menu-header').addClass('fixed');
//				}
//			}
//		});
//	
	
	var theLoc2 = $('div#hello').position().top;
		$(window).scroll(function() {
			if(theLoc2 - 130 >= $(window).scrollTop()) {
				if($('div#hello').hasClass('fixed2')) {
					$('div#hello').removeClass('fixed2');
					$('div#hello img').removeClass('smallarrows');
				}
			} else { 
				if(!$('div#hello').hasClass('fixed2')) {
					$('div#hello').addClass('fixed2');
					$('div#hello img').addClass('smallarrows');
				}
			}
	});
		
		
		
		
//		var theLoc3 = $('div.arrows-r').position().top;
//			$(window).scroll(function() {
//				if(theLoc2 - 130 >= $(window).scrollTop()) {
//					if($('div#hello').hasClass('fixed2')) {
//						$('div#hello').removeClass('fixed2');
//						$('div#hello img').removeClass('smallarrows');
//					}
//				} else { 
//					if(!$('div#hello').hasClass('fixed2')) {
//						$('div#hello').addClass('fixed2');
//						$('div#hello img').addClass('smallarrows');
//					}
//				}
//			});
		
		

//	var theLoc = $('ul').position().top;
//	$(window).scroll(function() {
//		if(theLoc >= $(window).scrollTop()) {
//			if($('p').hasClass('fixedT')) {
//				$('p').removeClass('fixedT');
//			}
//		} else { 
//			if(!$('p').hasClass('fixedT')) {
//				$('p').addClass('fixedT');
//			}
//		}
//	});






	// This is a functions that scrolls to #{blah}link
	function goToByScroll(id){
	      // Remove "link" from the ID
	    id = id.replace("link", "");
	      // Scroll
	    $('html,body').animate({
	        scrollTop: $("#"+id).offset().top},
	        'slow');
	}
	
	$("#more-info > h2 > a").click(function(e) { 
	      // Prevent a page reload when a link is pressed
	    e.preventDefault(); 
	      // Call the scroll function
	    goToByScroll($(this).attr("id"));
	});

	/* HOMEPAGE */




//$('#more-info').click(function(){
//
//     alert("Handler for .click() called.");
//    scrollToDiv(#more,40);
//     
//    return false;
//});

	// rescale the homepage's bkgd img
/*
if ($("body.page-template-page-story-php, body.page-template-page-story-parent-php, body.page-template-page-sector-php").length > 0) {
	rescale();
	$(window).resize(function(){
		rescale();
});
*/



});










function rescale() {
	// alert("Blimey");
	var max_height = $(window).height();
	var max_width = $(window).width();
	var min_width = 960;
	
	var min_height = $(window).height();
	var set_height = 500;
	//alert ($(window).width());

	var height = $("#splash .wp-post-image").height();
	var width = $("#splash .wp-post-image").width();
	var ratio = height/width;

	// If height or width are too large, they need to be scaled down
	// Multiply height and width by the same value to keep ratio constant
	ratio = max_height / height;
	height = height * ratio;
	width = width * ratio;

	if (width < max_width) {
		// alert ("image width smaller than window width")
		ratio = max_width / width;
		height = height * ratio;
		width = width * ratio;
	}
	
	if(min_height > set_height) {
			
			$("#splash .wp-post-image").height(height);
			$("#splash .wp-post-image").width(width);
			$("#splash").height(max_height);
		
			// set top/left
			var top = $("#splash .wp-post-image").offset().top;
			var left = $("#splash .wp-post-image").offset().left;
			top = Math.round((max_height - height)/2);
			left = Math.round((max_width - width)/2);
			$("#splash .wp-post-image").css("margin-top",top);
			$("#splash .wp-post-image").css("margin-left",left);
			
	} else {
			$("#splash .wp-post-image").height(height);
			$("#splash .wp-post-image").width(width);
	//		$("#bkg").height(max_height);
		
			// set top/left
			var top = $("#splash .wp-post-image").offset().top;
			var left = $("#splash .wp-post-image").offset().left;
			top = Math.round((max_height - height)/2);
			left = Math.round((max_width - width)/2);
			$("#splash .wp-post-image").css("margin-top",top);
			$("#splash .wp-post-image").css("margin-left",left);
	}
	
};


