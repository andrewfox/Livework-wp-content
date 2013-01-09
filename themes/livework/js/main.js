$(document).ready(function() {
	
//	
//	/* Lightbox */
//	
//		
//	
//		$(".gallery-item a").click(function () {
	//		e.preventDefault();
//			alert("hello")
//			var image_href = $(this).attr("href");
			    //create HTML markup for lightbox window
//			    var lightbox =
//			    '<div id="lightbox">' +
//			        '<p>Click to close</p>' +
//			        '<div id="content">' + //insert clicked link's href into img src
//			            '<img src="' + image_href +'" />' +
//			        '</div>' +
//			    '</div>';
			    //insert lightbox HTML into page
//			    $('body').append(lightbox);
//			}
//		});
//		
//		$('#lightbox').live('click', function() {
//		    $('#lightbox').hide();
//		});


$(function() {
	$('.gallery-item a').lightBox(); // Select all links in object with gallery ID
});

	$(".menu-reveal").click(function () {
		$('header').toggleClass('open');
	});

	// Archive expander
	$(".expander").click(function () {
		$(this).parent().addClass('open');
	});


	// Hide/show people on our team by location
	
	
	$("li.all").click(function () {
		$('#people li').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
		$hellothere = 0;
	});
	
	$("li.london").click(function () {
		$('#people li').hide()
		$('#people .category-london').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
		if ($hellothere == 0) {
			$hellothere = 1;
		}
		
		
		if ($hellothere == 2) {
			$hellothere = 3;
		}
		
		
		if ($hellothere == 4) {
			$hellothere = 5;
		}
		
		if ($hellothere == 6) {
			$('nav#access h1 a img').attr('src','http://www.liveworkstudio.com/wordpress/wp-content/themes/livework/img/hellologo.png');
		}

	});
	
	$("li.oslo").click(function () {
		$('#people li').hide()
		$('#people .category-oslo').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
		if ($hellothere == 1) {
			$hellothere = 2;
		}
		else {
			$hellothere = 0;
		}
	});
	
	
	$("li.sao-paulo").click(function () {
		$('#people li').hide()
		$('#people .category-saopaulo').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
		if ($hellothere == 3) {
			$hellothere = 4;
		}
		else {
			$hellothere = 0;
		}
	});
	
	
	$("li.rotterdam").click(function () {
		$('#people li').hide()
		$('#people .category-rotterdam').show();
		$('#offices li').removeClass('on');
		$(this).addClass('on');
		if ($hellothere == 5) {
			$hellothere = 6;
		}
		else {
			$hellothere = 0;
		}
	});




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
	



	// This is a functions that scrolls to #{blah}link
	function goToByScroll(id){
	      // Remove "link" from the ID
	    id = id.replace("link", "");
	      // Scroll
	    $('html,body').animate({
	        scrollTop: $("#"+id).offset().top},
	        'slow');
	}
	


	
	



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

//window.onload = function() {
//    var myOptions = {
//        center: new google.maps.LatLng(40.744556,-73.987378),
//        zoom: 18,
//        mapTypeId: google.maps.MapTypeId.ROADMAP,
//        disableDefaultUI: true
//    };
//
//    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
//}

