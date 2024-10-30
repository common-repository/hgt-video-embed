var wve_float_check = true;
jQuery(function () {
	
	var wve_vid = jQuery('.wvevideo');	
	var wve_vid_height = jQuery('.wvevideo').height();
	var wve_empty_div = jQuery('.wve-wrapper');
    var wve_top = wve_vid.offset().top - parseFloat(wve_vid.css('margin-top').replace(/auto/, 0));
    var wve_bottom = wve_top + wve_vid.outerHeight();    
    var wve_documentheight= jQuery(document).height();    
    var wve_float_close_div= jQuery('.wve-float-close-div');
	
	jQuery(window).on('scroll', function(event) {
		if(wve_float_check){
			var wve_windowheight= jQuery(window).height();
			var wve_bottom_footer_space = wve_documentheight - wve_bottom;
			var y = jQuery(this).scrollTop();
			// whether that's below the form

			if (y >= wve_top+100) {
				// if so, ad the fixed class
				if ( wve_vid.is('.wveaside') ) {
					return;
				}
				wve_vid.addClass('wveaside');
				wve_empty_div.css({"height":wve_vid_height+"px"});
				wve_float_close_div.addClass('wve-float-close-show');

			} else {
				// otherwise remove it
				wve_vid.removeClass('wveaside');
				wve_empty_div.css({"height":"auto"});
				wve_float_close_div.removeClass('wve-float-close-show');
			}
		}
	});
	
});
