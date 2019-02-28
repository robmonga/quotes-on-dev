(function($) {
	$('#show-more').on('click', function(event) {
	event.preventDefault();
	$.ajax({
		method: 'get',
		url:  qod_vars.rest_url + "wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1",
	}).done( function(response) {
		let quotes = $("<div class='quotes-area'></div>")	
		quotes.append(response[0].content.rendered);
		quotes.append(response[0].title.rendered);
		quotes.append(response[0]._qod_quote_source);
	
	$('article').html(quotes)
	});

 });
})(jQuery);