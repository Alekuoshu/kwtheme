(function($) 
{
	$(document).ready(function()
	{
		// make iframe based video players responsive
		var els = $("iframe[src*='vimeo'], iframe[src*='youtube']");
		els.addClass('jn-responsive');
	});
})(jQuery);
// //anchor behavior

// (function($){
// 	$(document).ready(function()
// 	{
// 		//evalua los items del menu
// 		$('body').on('click', '.contact_widget .btn-style-1', function(event){
// 			var section = $(this).attr('href');
// 			var href = section.substr(0, 1);
// 			var currenturl = window.location.href;
// 			var getUrl = window.location;
// 			var baseurl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
// 			console.log('baseurl: '+baseurl);
// 			console.log('currenturl: '+currenturl);
// 			//si no encuentra un item con url comenzado por # retorna
// 			if(href != '#') return;
// 			//evalua para hacer el efecto o no del scroll
// 			if (baseurl == currenturl){
// 				event.preventDefault();
// 				$('html, body').animate({
// 					scrollTop: $(section).offset().top - 80
// 				}, 1000);
// 			}else{
// 				event.preventDefault();
// 				// save value on sessionStorage
// 				sessionStorage.setItem('cook', section);
// 				console.log(sessionStorage.getItem('cook')+' ... sessionStorage en pagina diferente'); //debug
// 				window.location.href = baseurl;
// 			}

// 		});

// 		//function for onload window
// 		function onload(){
// 			//check if sessionStorage exist
// 			console.log(sessionStorage.getItem('cook')+' ... esta es la sessionStorage'); //debug
// 			if(sessionStorage.getItem('cook') != null){
// 				$(window).on('load',function() {
// 					console.log('loaded'); //debug
// 					$('html, body').animate({
// 						scrollTop: $(sessionStorage.getItem('cook')).offset().top - 80
// 					}, 1000);
// 					setTimeout(function () {
// 						//remove sessionStorage
// 						sessionStorage.removeItem('cook');
// 						console.log('sessionStorage deleted!'); //debug
// 					}, 2000);
// 				});
// 			}
// 		}

// 		// call function
// 		onload();
// 	});
// })(jQuery);

//--------------------------------------
//fix loadmore behavior
//--------------------------------------
(function($)
{
	$(document).ready(function()
	{
		// ------------------------
		// init
		// ------------------------
				var target = $('#loadmore');
				if(!target.length) return;

				// ------------------------
		    // events
		    // ------------------------
				// loadMore btn click event
				$('.elm-button').on('click', function (e) {
					setTimeout(function () {
						var timer = setInterval(function () {
							if(!$(this).hasClass('is-loading')) {
								$('.jn-holder').jn_holder();
								setTimeout(function () {
									clearInterval(timer);
								}, 1000);
							}
						}, 3000);
					}, 300);
				});

	});

})(jQuery);

//--------------------------------------
//fix modal with animation
//--------------------------------------
(function($)
{
	$(document).ready(function()
	{
		// ------------------------
		// init
		// ------------------------
		var target = $('#section-procedures .procedures');
		if(!target.length) return;

		var timer = setInterval(function () {
			console.log('debugging');
			if(target.hasClass('jn-animation-active')) {
				target.removeClass('jn-animation-fly-from-below');
				setTimeout(function () {
					clearInterval(timer);
					console.log('ready');
				}, 2000);
			}
		}, 1500);


	});

})(jQuery);

// //--------------------------------------
// //fix load more in blog page
// //--------------------------------------
// (function($)
// {
// 	$(document).ready(function()
// 	{
// 		// ------------------------
// 		// init
// 		// ------------------------
// 		var target = $('.page-blog');
// 		if(!target.length) return;
//
// 		$.fn.almComplete = function(alm){
// 			console.log("Ajax Load More Complete!");
// 			$('.jn-holder').jn_holder();
// 		};
//
// 	});
//
// })(jQuery);

//--------------------------------------
// touch slider behavior
//--------------------------------------
(function($)
{
	$(document).ready(function()
	{

	   $(".carousel").swipe({

		  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

			if (direction == 'left') $(this).carousel('next');
			if (direction == 'right') $(this).carousel('prev');

		  },
		  allowPageScroll:"vertical"

		});

		//para controlar el click
		$('.carousel-inner').mousedown(function(){
			$(this).css('cursor','-webkit-grabbing');
			$(this).css('cursor','-moz-grabbing');
			$(this).css('cursor','grabbing');

		});
		$('.carousel-inner').mouseup(function(){
			$(this).css('cursor','-webkit-grab');
			$(this).css('cursor','-moz-grab');
			$(this).css('cursor','grab');

		});
	});

})(jQuery);
