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
