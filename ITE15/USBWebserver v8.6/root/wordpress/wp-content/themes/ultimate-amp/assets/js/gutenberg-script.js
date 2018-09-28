(function($){

	var UltimateAMP = {

	// Owl Carousels 
	owlcarousel: function() {
			try { 

				$(".title-slider").owlCarousel({
					items:2,
					margin:0,
					nav: false,
					autoplay: true,
					responsive:{
						320:{
							items:1,
							margin: 0,
						},
						640:{
							items:1,
							margin: 0,
						},
						768:{
							items:2,
							margin: 15,
						}
					}
				});

			} catch(e) { 
				
			} 
		}

	};


	$(document).ready(function() {
		"use strict";

		UltimateAMP.owlcarousel();
	});

})(jQuery);