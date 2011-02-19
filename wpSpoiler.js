jQuery(document).ready(function() {
	jQuery(".spoiler-text").hide();
	
	jQuery(".spoiler-link").click(function () {
		jQuery(this).toggleClass("show hide");
		jQuery(this).next(".spoiler-text").toggle("fast");
		
		return false;
	});
});