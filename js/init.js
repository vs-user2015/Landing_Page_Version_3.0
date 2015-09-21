jQuery(document).ready(function($){
	// GET PHONE NUMBER AND INSERT IT INTO FORM //
	var timesChecked = 0;
	var $vsref = $('input[name="Field5"]');
	if($vsref.length < 1){
		$vsref = $('input[name=vsref]');
	}
	var interval = setInterval(function(){
		if(typeof _vsrkpd == 'object' && typeof _vsrkpd.d != 'undefined'){
			if(_vsrkpd.d == null){
				$vsref.val($('#number_rewrite').text().replace(/[^0-9]/g,''));
			}else{
				$vsref.val(_vsrkpd.d[0].num);
			}
			clearInterval(interval);
		}else if(timesChecked > 50){
			$vsref.val($('#number_rewrite').text().replace(/[^0-9]/g,''));
			clearInterval(interval);
		}else{
			timesChecked++;
		}
	},100);

	// MAKE CONTACT FORM STICK TO TOP //
	var $sliding_marque = $("#sliding_marque");
	var $asset_container = $("#h4_service").parent();
	var h4_serviceWidth = $("#h4_service").width();
	var slide_in_numberWidth = $("#slide_in_number").width();
	var frame_view = h4_serviceWidth + "px";

	/* Set the position of the sliding of the sliding element #sliding_marque.
	When #schedule element is fixed to top of the screen the #h4_service element
	will slide to the left and the phone number will slide into the frame_view
	element.  The code below is the initial css style. */
	$asset_container.css({
		left : 0,
		position : "relative",
		width : h4_serviceWidth + slide_in_numberWidth + 10 + "px",
		transition : "left 0.3s ease-in-out"
	});

	if($(window).width() >= 768){
		function stickContact(){
			/* Get the position of the scroll bar */
			var scrollTop = $(document).scrollTop();

			/* Get the height of the #top_container */
			var topContainerHeight = $("#top_container").outerHeight();

			/* Get the height of the .slider */
			var sliderHeight = $(".slider").outerHeight();

			/* Get handle of the #schedule, this will get fixed to the top if
			the scrollTop is more than the sum of topContainerHeight and sliderHeight */
			var $schedule = $("#schedule");

			/* Check to see if the scrollTop
			is more than the sum of topContainerHeight
			and sliderHeight.  If it is than add a position
			fixed with top value of 0 for $schedule */
			if(scrollTop > (topContainerHeight + sliderHeight)){
				$schedule.css({
					position : "fixed",
					top : 0,
				});
				$asset_container.css({
					left : (-(h4_serviceWidth)) + "px"
				},"fast");
			}else{
				$schedule.css( { position: "relative" } );
				$asset_container.css({
					left : 0
				},"fast");
			}
		}

		$(window).scroll(function(){
			stickContact();
		});
	}

	// PRINT COUPON //
	var $print_coupon = $("#print_coupon");
	function titleOfPage(){
		// get pathname of current file
		var pathString = window.location.pathname;

		// Split the path name into array elements
		var pageName = pathString.split("/");

		// Select the last array element
		pageName = pageName[pageName.length - 1];

		// Select the last array element
		pageName = pageName.substring(0,pageName.length - 4);

		// Render the pageName
		return pageName;
	}

	$print_coupon.click(function(){
		window.open("resources/coupon.php?coupon=" + titleOfPage(),"specials","width=" + screen.width + "height=" + screen.height + ",fullscreen=yes");
	});

	var $close_coupon_button = $(".close");
	var $print_coupon_button = $(".print");
	$close_coupon_button.click(function(){
		window.close();
	});

	$print_coupon_button.click(function(){
		window.print();
	});

	// MOVE #three_box ELEMENT TO FOOTER //
	if($(window).width() <= 767){
		var $three_box = $("#three_box");
		$("footer").before($three_box);
	}

	// OFF CANVAS MENU //
	var $trigger = $("div[rel*='trigger_mobile_']");
	var $off_canvas_menu = $("#off_canvas_menu");
	var $contact_us_mobile = $("#contact_us_mobile");
	var $mobile_contact_form = $("#mobile_contact_form");
	var $close_button = $(".close-button");
	var $slide_out;

	/* Click on either the $off_canvas_menu or $mobile_contact_form
	and get the attributes of each.  This will determine what the user
	clicked.  Assign the $slide_out value based on what the user clicked. */
	$trigger.click(function(){
		switch(	$(this).attr( "rel" ) ){
			case "trigger_mobile_nav":
				$slide_out = $off_canvas_menu;
				break;
			case "trigger_mobile_contact":
				$slide_out = $mobile_contact_form;
				break;
		}

		/* $slide_out element was set in the code above.  Slide out either
		the menu or the contact form based on what the user clicked. */
		if($slide_out.css( "left" ) != 0 + "px"){
			$slide_out
				.animate( { left : 0 + "px"} , "fast" )
				.css( { zIndex : 11 } );
		}
	});

	/* Close the $off_canvas_menu */
	$close_button.click(function(){
		if($(this).parent().css( "left" ) == 0 + "px"){
			$(this).parent()
				.animate( { left : -100 + "%" } , "fast" )
				.css( { zIndex : 1 } )
		}
	});

	/* SLIDE DOWN/UP FOR MOBILE SUB-MENU */
	$(".sub-menu").hide();

	$(".sub-menu-mobile").click(function(){
		var $sub_menu = $(this).next();
		if($sub_menu.is(":hidden")){
			$(".sub-menu").slideUp();
			$sub_menu.slideDown();
			$(this).css({zIndex:11});
		}
		else{
			$sub_menu.slideUp();
			$(this).css({zIndex:1});
		}

	});

});

