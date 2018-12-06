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
