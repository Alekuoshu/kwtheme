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
