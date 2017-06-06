//jQuery.noConflict();
jQuery(document).ready(function($){


		$('.z_main_tizer_seminar_cl').click(function(){
			$('.z_main_tizer_seminar').hide();
		});

		$(window).scroll(function(){
			if($(window).scrollTop() > 200){
				$('.z_main_tizer_seminar').addClass('z_main_tizer_seminar_small');
			}else{
				$('.z_main_tizer_seminar').removeClass('z_main_tizer_seminar_small');
			}
		});


	//STICKY MENU...
	$(".dt-sticky-menu").sticky({ topSpacing: 0 });

	//ONE PAGE NAV...
	$('#main-menu').onePageNav({
		currentClass : 'current_page_item',
		filter		 : ':not(.external)',
		scrollSpeed  : 750,
		scrollOffset : 87,
		scrollChange : fixMagicline
	});

	//MINI MOBILE MENU...
	$('nav#main-menu').meanmenu({
		meanMenuContainer :  $('header #menu-container'),
		meanRevealPosition:  'right',
		meanScreenWidth   :  767,
		meanMenuClose	  :  "<span /><span /><span />"
	});
	
	//MINI MOBILE MENU...	
	$('#scrolldown a').click(function(){
		   $.scrollTo('#home', 1400, { offset: { top: -147 }});
		   return false;
   });

	$('.scrolltohref').click(function(){
		$.scrollTo($(this).attr('href'), 1400, { offset: { top: -92 }});
		return false;
	});
   
   	/*To Top*/
  	$().UItoTop({ easingType: 'easeOutQuart' });
	
	//TABS...
	if($('ul.tabs-frame').length > 0) {
		$('ul.tabs-frame').tabs('> .tabs-frame-content', { effect: 'slide' });
	}
	
	if($('.team-tab ul.tabs-frame').length > 0) {
		$('ul.tabs-frame').tabs('> .tabs-frame-content', { effect: 'fade' });
	}
  

	//TOGGLES...
	$('.dt-sc-toggle').toggle(function(){ $(this).addClass('active'); },function(){ $(this).removeClass('active'); });
	$('.dt-sc-toggle').click(function(){ $(this).next('.dt-sc-toggle-content').slideToggle(); });
	$('.dt-sc-toggle-frame-set').each(function(){
	  var $this = $(this),
		  $toggle = $this.find('.dt-sc-toggle-accordion');
	  
	  $toggle.click(function(){
		if( jQuery(this).next().is(':hidden') ) {
		  $this.find('.dt-sc-toggle-accordion').removeClass('active').next().slideUp();
		  $(this).toggleClass('active').next().slideDown();
		}
		return false;
	  });
	  
	  $this.find('.dt-sc-toggle-accordion:first').addClass("active");
	  $this.find('.dt-sc-toggle-accordion:first').next().slideDown();
	});
	
	//Load After Window Loads...
	$(window).load( function() {
		my_smartresize_function();
		$('#preloader').fadeOut('slow',function(){$(this).remove();});
	});
	
	$(window).smartresize(function(){
		my_smartresize_function();
	});
	
	// funy text
	
	$('#home .sub-title h21').funnyText({
        speed: 500,

        borderColor: 'none'
    });
	
	$('#services .main-title h21').funnyText({
        speed: 500,

        borderColor: 'none'
    });
	
    $('#team .main-title h21').funnyText({
        speed: 500,

        borderColor: 'none'
    });
    $('#portfolio .main-title h21').funnyText({
        speed: 500,

        borderColor: 'none'
    });
    $('#blog .main-title h21').funnyText({
        speed: 500,

        borderColor: 'none'
    });
    $('#contact .main-title h21').funnyText({
        speed: 500,

        borderColor: 'none'
    });
	
	$('#page-title h11').funnyText({
        speed: 500,

        borderColor: 'none',
		activeColor: '#ffffff'
    });
	
	/*wow animation*/
	new WOW().init();
    
	//Twitter Tweets...
	if($('.tweets_container').length > 0) {	
		$(".tweets_container").tweet({
			modpath: 'js/twitter/',
			username: "envato",
			count: 3,
			loading_text: "loading tweets...",
			template: "{text} {time}"
		});
	}

	//Tweets CarouFred...
	if($('.tweets_container').length > 0) {
		$('.tweets_container .tweet_list').carouFredSel({
			width: 'auto',
			height: 'auto',
			scroll: 1,
			direction: 'up',
			items: {
				height: 'auto',
				visible: {
					min: 1,
					max: 1
				}
			}
		});
		$('#panel').hide();
	}

	if($("#testimonial-list").length) {
		$('#testimonial-list').carouFredSel({
			responsive: true,
			auto: true,
			width: 'auto',
			height: 'auto',
			prev: '.prev',
			next: '.next',
			scroll: {
				fx: "fade",
				duration: 1000,
				pauseOnHover : true,
			},
			items: {
				height: 'auto',
				visible: {
					min: 1,
					max: 1
				}
			}
		});
	}
	
	//PRETTYPHOTO...
	var $pphoto = $('a[data-gal^="prettyPhoto[gallery]"]');
	if($pphoto.length){
		$("a[data-gal^='prettyPhoto[gallery]']").prettyPhoto({ 
			overlay_gallery: false, 
			social_tools: false,
			deeplinking: false
		});
	}
	
	//PARALLAX SECTIONS...
	$('.parallax').each(function(){
		$(this).bind('inview', function (event, visible) {
			if(visible == true) {
				if($.browser.safari) {
					$(this).parallax("50%", -0.3);
				} else {
					$(this).parallax("50%", 0.3);
				}
			} else {
				$(this).css('background-position','');
			}
		});
	});

	//Progress Bar...
	$('.dt-custom-progress').click(function(){	
		$('.dt-sc-progress').each(function(){
			var progressBar = $(this),
				progressValue = progressBar.find('.dt-sc-bar').attr('data-value');
					 
				if (!progressBar.hasClass('animated')) {
					progressBar.addClass('animated');
					progressBar.find('.dt-sc-bar').animate({width: progressValue + "%"},600,function(){ progressBar.find('.dt-sc-bar-text').fadeIn(400); });
				}
		});		
	});
	
	//NEWSLETTER AJAX SUBMIT...
	$('form[name="frmnewsletter"]').submit(function () {

		var This = $(this);
		
		if($(This).valid()) {
			var action = $(This).attr('action');

			var data_value = unescape($(This).serialize());
			$.ajax({
				 type: "POST",
				 url:action,
				 data: data_value,
				 error: function (xhr, status, error) {
					 confirm('The page save failed.');
				   },
				  success: function (response) {
					$('#ajax_subscribe_msg').html(response);
					$('#ajax_subscribe_msg').slideDown('slow');
					if (response.match('success') != null) $(This).slideUp('slow');
				 }
			});
		}
		return false;
    });
	
	$('form[name="frmnewsletter"], form[name="commentform"], form[name="frmsearch"]').each(function(){
        $(this).validate({
			errorPlacement: function(error, element) {
				$(element).parent('p').addClass('error');
			},

			unhighlight: function(element){
				$(element).parent('p').removeClass('error');
			},

			submitHandler: function(form) {
				// do other things for a valid form
				return subcommentform(form);
			}

		});
	});

	//Tooltip
	 if($(".dt-sc-tooltip-bottom").length){
		$(".dt-sc-tooltip-bottom").each(function(){	$(this).tipTip({maxWidth: "auto"}); });
	 }
	  
	 if($(".dt-sc-tooltip-top").length){
		$(".dt-sc-tooltip-top").each(function(){ $(this).tipTip({maxWidth: "auto",defaultPosition: "top"}); });
	 }
	  
	 if($(".dt-sc-tooltip-left").length){
		$(".dt-sc-tooltip-left").each(function(){ $(this).tipTip({maxWidth: "auto",defaultPosition: "left"}); });
	 }
	  
	 if($(".dt-sc-tooltip-right").length){
		$(".dt-sc-tooltip-right").each(function(){ $(this).tipTip({maxWidth: "auto",defaultPosition: "right"}); });
	 }
	
	//CONTACT BOX VALIDATION & MAIL SENDING....
	$('form[name="frmcontact"]').validate({
		errorPlacement: function(error, element) {
			$(element).parent('p').addClass('error');
		},
		
		unhighlight: function(element){
			$(element).parent('p').removeClass('error');
        }
	});
	
	$('form[name="frmcontact"]').submit(function () {
		
		var This = $(this);
		
		if($(This).valid()) {
			var action = $(This).attr('action');

			var data_value = unescape($(This).serialize());
			$.ajax({
				 type: "POST",
				 url:action,
				 data: data_value,
				 error: function (xhr, status, error) {
					 confirm('The page save failed.');
				   },
				  success: function (response) {
					$('#ajax_contact_msg').html(response);
					$('#ajax_contact_msg').slideDown('slow');
					if (response.match('success') != null) $(This).slideUp('slow');
				 }
			});
		}
		return false;
    });
	$('form[name="frmcontact"]').validate({
		rules: { 
			txtname: { required: true },
			txtemail: { required: true, email: true }
		},
		errorPlacement: function(error, element) { }
	});
	
	//Contact Map
	var $map = $('#contact_map');
	$map.gMap({
		address: 'Maharashtra Cosmopolitan Edn Soc, Pune, Maharashtra',		
		markers: [
			{ 'address' : 'Maharashtra Cosmopolitan Edn Soc, Pune, Maharashtra' }
		],
		zoom: "fit",
		scrollwheel: false
	});

	//TOGGLE PANEL...
	
	$("#toggle-panel").click(function(e){
		if($('#toggle i').hasClass('fa-plus')) {
			$('#toggle i').removeClass('fa-plus');
			$('#toggle i').addClass('fa-minus');
		} else {
			$('#toggle i').removeClass('fa-minus');
			$('#toggle i').addClass('fa-plus');
		}

		setTimeout(function() {
			var $panel_map = $('#panel_map');
			$panel_map.gMap({
				address: 'Iamdesigning, 1/52,3/53, Lal Bahadhur Colony,Shringar Nagar Road, Near Gopal Naidu School, Peelamedu, Coimbatore, TN 641004',		
				markers: [
					{ 'address' : 'Iamdesigning, 1/52,3/53, Lal Bahadhur Colony,Shringar Nagar Road, Near Gopal Naidu School, Peelamedu, Coimbatore, TN 641004' }
				],
				zoom: "fit",
				scrollwheel: false
			});
		}, 400);

		$("#panel").slideToggle("slow");
		e.preventDefault();
		return false;
	});
	
	$('section#panel').attr('style', 'display:none');
	
	//Animate Number...
	$('.dt-sc-num-count').each(function(){
	  $(this).one('inview', function (event, visible) {

		  if(visible === true) {
			  var val = $(this).attr('data-value');
			  $(this).animateNumber({ number: val }, 2000);
		  }
	  });
	});
	
	//Image Hover Animation
	$('.dt-hover-pager li').each(function(){

		$(this).hover(function () {
			if(!$(this).hasClass('active')){

				$('.dt-hover-pager').find('li').removeClass('active');

				var $this = $(this);
				$('#dt-ipad-main-img').fadeOut('fast', function () {

					var src = $this.attr('data-image');
					$('#dt-ipad-main-img').attr({ 'src': src });
					$('#dt-ipad-main-img').fadeIn(300);

				});

				$(this).addClass('active');
			}

		});	
	
	});
});

//CUSTOM FIX...
function fixMagicline() {
		
    var $magicLine = jQuery("#magic-line-two");
    
    var leftPos, newWidth;
	
	leftPos = jQuery(".current_page_item a").position().left;
    newWidth = jQuery(".current_page_item").width();
	
	$magicLine.stop().animate({
		left: leftPos,
		width: newWidth
	});
}

// ANIMATE CSS + JQUERY INVIEW CONFIGURATION
(function ($) {
    "use strict";
    $(".animate").each(function () {
        $(this).one('inview', function (event, visible) {
            var $delay = "";
            var $this = $(this),
                $animation = ($this.data("animation") !== undefined) ? $this.data("animation") : "slideUp";
            $delay = ($this.data("delay") !== undefined) ? $this.data("delay") : 300;

            if (visible === true) {
                setTimeout(function () {
                    $this.addClass($animation);
                }, $delay);
            } else {
                setTimeout(function () {
                    $this.removeClass($animation);
                }, $delay);
            }
        });
    });
})(jQuery);

//MeanMenu Custom Scroll...
function funtoScroll(x, e) {
	"use strict";
	var str = new String(e.target);
	var pos = str.indexOf('#');
	var t = str.substr(pos);
	
	var eleclass = jQuery(e.target).prop("class");
	
	if(eleclass == "external") {
		window.location.href = e.target;	
	} else {
		jQuery.scrollTo(t, 750, { offset: { top: -44 }});
	}
	
	jQuery(x).parent('.mean-bar').next('.mean-push').remove();		
	jQuery(x).parent('.mean-bar').remove();

	jQuery('nav#main-menu').meanmenu({
		meanMenuContainer :  jQuery('header .menu-main-menu-container'),
		meanRevealPosition:  'left',
		meanScreenWidth   :  767,
        meanMenuClose : "<span/><span/><span/>",
		onePage: true
	});
	
	e.preventDefault();
}(jQuery);

//CAROUSEL...
function my_smartresize_function(){
	
	//ISOTOPE CATEGORY...
	var $container = jQuery('.dt-sc-portfolio-container');
	$ctr = jQuery('.container').width();

	jQuery('.dt-sc-sorting-container a').click(function(){ 
		jQuery('.dt-sc-sorting-container').find('a').removeClass('active-sort');
		jQuery(this).addClass('active-sort');
		
		var selector = jQuery(this).attr('data-filter');
		
		if($ctr < 710)	{
			var opt = {
				filter: selector,
				itemSelector: jQuery('.dt-sc-portfolio-container .portfolio'),
				masonry: {
					columnWidth: 0
				}			
			};
		}
		else {
			var opt = {
				filter: selector,
				layoutMode: 'perfectMasonry',
				perfectMasonry: {
					layout: 'vertical',
					liquid: true
				}
			};
		}
		$container.isotope(opt);
		return false;
	});
	
	if($ctr < 710)	{
		var opt = {
			itemSelector: jQuery('.dt-sc-portfolio-container .portfolio'),
			masonry: {
				columnWidth: 0
			}
		};
	}
	else {
		var opt = {
			layoutMode: 'perfectMasonry',
			perfectMasonry: {
				layout: 'vertical',
				liquid: true
			}
		};
	}	
	$container.isotope(opt);
	
	//PORTFOLIO CAROUSEL...
	if(jQuery(".portfolio-carousel").length) {
		var pmax = 3;
		if(jQuery('.container').width() < 710) { pmax = 1; }
		else if(jQuery('.container').width() > 710 && jQuery('.container').width() < 768) { pmax = 1; }
		
		jQuery(".portfolio-carousel").carouFredSel({
		  responsive: true,
		  auto: false,
		  width: '100%',
		  prev: jQuery('.carousel-arrows').find('.prev-arrow'),
		  next: jQuery('.carousel-arrows').find('.next-arrow'),
		  height: 'auto',
		  scroll: 1,
		  items: { width: jQuery(this).find('.column').width(), visible: { min: 1, max: pmax } }
		});
	}
}

function subcommentform(form){
	frm = jQuery('#'+form.id);
	jQuery.ajax({
			type: "POST",
			url: frm.attr('action'),
			data: frm.serialize(),
			success: function(msg){
				if( msg == 'Y'){
					jQuery('#ourform').html('');
					alert('Спасибо, наши специалисты свяжутся с Вами' + msg);
				};
			}
	});
	return false;
}