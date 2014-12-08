$(document).ready(function(){

	$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)
	
	$("ul.topnav li a").mouseover(function() { //When trigger is clicked...
		
		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).parent().hover(function() {
		}, function(){	
			$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});
	
	$(window).bind('scroll', function() {
		var navHeight = 20;
		if ($(window).scrollTop() > navHeight) {
			$('#logo_cover').css('height', '42px');
			$('#icons img').css("margin-top", "0px");
			$('nav').addClass('fixed');
			$('ul.topnav').css('border', '0px');
			$('html ul.topnav li ul.subnav li').css('background', '#000');
			$('nav').addClass('nav_pos');
		} else {
			$('#logo_cover').css('height', '0px');
			$('#icons img').css("margin-top", "40px");
			$('nav').removeClass('nav_pos');
			$('ul.topnav').css('border-bottom', '3px dotted #BFA900');
			$('html ul.topnav li ul.subnav li').css('background', '#FFF');
			$('nav').removeClass('fixed');
		}
	});
});
