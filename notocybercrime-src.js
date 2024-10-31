jQuery(document).ready(function () {
	if(!jQuery.cookie('no-to-cybercrime')) {
		jQuery("body").append("<div id=\"cybercrime_mask\"></div>");
		jQuery("body").append("<div id=\"cybercrime_window\"></div>");

		jQuery("<a>", {
			title: 'No to Cybercrime Law',
			href: 'http://bloggerscoalition.com'
		}).appendTo('#cybercrime_window');

		jQuery("<img>", {
			src: 'http://devplane.com/cybercrime.jpg',
			width: 400, height:400
		}).appendTo("#cybercrime_window a");

		jQuery("<img>", {
			src: 'http://c.statcounter.com/8618259/0/d50ecd93/1/',
			width: 0, height: 0
		}).appendTo("#cybercrime_window");
		var window_height = jQuery(window).height();
		var window_width = jQuery(window).width();
		var cybercrime_window = jQuery("#cybercrime_window");

		cybercrime_window.css({ top: window_height / 2 - cybercrime_window.outerHeight() / 2 });
		cybercrime_window.css({ left: window_width / 2 - cybercrime_window.outerWidth() / 2 });

		cybercrime_window.fadeIn(2000);

		jQuery("#cybercrime_mask").click (function () {
			jQuery(this).hide();
			jQuery("#cybercrime_window").hide();
		});

		jQuery('#cybercrime_mask').css({ width: jQuery(window).width(), height: jQuery(document).height() }).fadeTo('slow', 0.85);
		jQuery.cookie('no-to-cybercrime', '1', {expires: 7, path: '/'});
	}
});