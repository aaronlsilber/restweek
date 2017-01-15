
// remap jQuery to $
(function($){

	var init = function() {

		imgfill();

		$('.js-matchheight').matchHeight();
		$('.block--billboard .g').matchHeight();

		$("body").fitVids();
	}



	/* 
	 * Fills an image src based on Modernizr tests for SVG support
	 */
	var imgfill = function() {

		var $imgs = $('*[data-src]');

		$.each($imgs, function() {
			fillsrc($(this));
		});

		function fillsrc($img) {

			// Test for SVG
			if ( shoulduseSVG($img) ) {

				$img.attr({
					src: $img.data('src-svg')
				});

				return;
			}

			// Default - fill with data-src
			else {

				$img.attr({
					src: $img.data('src')
				});
			}
		}

		function shoulduseSVG($img) {

			if ( $img.attr('data-src-svg') && Modernizr.svg == true ) {
				return true;
			} else {
				return false;
			}
		}

	};

	init();

})(this.jQuery);