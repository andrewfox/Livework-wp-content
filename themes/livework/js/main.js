
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
	
	
	$("li.saopaulo").click(function () {
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
	


	/* Lightbox */

	

	$(".gallery-item a").click(function () {
		e.preventDefault();
		alert("hello")
		var image_href = $(this).attr("href");
		    //create HTML markup for lightbox window
		    var lightbox =
		    '<div id="lightbox">' +
		        '<p>Click to close</p>' +
		        '<div id="content">' + //insert clicked link's href into img src
		            '<img src="' + image_href +'" />' +
		        '</div>' +
		    '</div>';
		    //insert lightbox HTML into page
		    $('body').append(lightbox);
		}
	});
	
	$('#lightbox').live('click', function() {
	    $('#lightbox').hide();
	});
	



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


