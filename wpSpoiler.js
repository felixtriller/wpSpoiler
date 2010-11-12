jQuery(document).ready(function() {
	jQuery(".spoiler-link").click(function () {
		jQuery(this).toggleClass("show hide");
		jQuery(this).next(".spoiler-text").toggle("fast");
		
		return false;
	});
});