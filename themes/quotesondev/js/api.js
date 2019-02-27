(function($) {
	$('#show-more').on('click', function(event) {
	event.preventDefault();
	$.ajax({
	   method: 'get',
	   url:  red_vars.rest_url + "wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1",
	}).done( function(response) {
    (response[0].content.rendered);
    (response[0].title.rendered);
    (response[0]._qod_quote_source);
	});
 });
})(jQuery);