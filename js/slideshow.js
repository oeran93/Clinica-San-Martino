(function ($) {
	$.fn.sS = function (options) {
	
		options = $.extend({
			path: './',
			images: [],
			showTime: 5000,
			bgRepeat: 'no-repeat'
		}, options);

		$(this).css('background-repeat',options.bgRepeat);
		$(this).css('-webkit-transition','background-image 2s');
		
		(function slide (container, slideNumber) {
			$(container).css('background-image',"url('"+options.path+options.images[slideNumber]+"')");
			setTimeout(function () {
				slide(container,(++slideNumber)%options.images.length);
			}, options.showTime);
		})(this, 0);

	}
})(jQuery);