$(document).ready(function() {
	$("#back-top a").click(function() {
		$("html, body").animate({ scrollTop:0 });
		return false;
	 });
});