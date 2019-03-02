(function($) {
	//make sure the settings/permalinks is set to post-names or the date and post name will show up in the slug instead of just the postname
	let lastPage = ''

	$(window).on('popstate', function() {
		window.location.replace(lastPage);
	});

	$('#show-more').on('click', function(event) {
	event.preventDefault();

	// store the pre-AJAX request URL for back/forward nav
	lastPage = document.URL;

	$.ajax({
		method: 'get',
		url:  qod_vars.rest_url + "wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1",
	}).done( function(response) {
		//let quotes = $("<div class='quotes-area'></div>")	
 
		//$('.entry-content').html(response[0].content.rendered);//quote
		// quotes.append(response[0].content.rendered);
		// quotes.append(response[0].title.rendered);//author
		// quotes.append(response[0]._qod_quote_source);//source
		const post = response[0]//just shortens the beginning of the array
		console.log (post)
		const url = qod_vars.home_url + '/' + response[0].slug; // creates a new url with an author slug
		history.pushState(null, null, url);
		// console.log(url);
		// let source_url =response[0]._qod_quote_source_url;//pop
		let source =response[0]._qod_quote_source;//pop

		if (response[0]._qod_quote_source && response[0]._qod_quote_source_url ){
			//loadd conetnt title, source and url
			$('.entry-content').html(response[0].content.rendered);//content
			$('.entry-title').html(response[0].title.rendered);//author
			$('.entry-source').html(source); // source
			
			
		} else if (response[0]._qod_quote_source && !response[0]._qod_quote_source_url){
			//load content, title, source 
			$('.entry-content').html(response[0].content.rendered);
			$('.entry-title').html(response[0].title.rendered);//author
			
			
			
		} else {
			// load content and author
			$('.entry-content').html(response[0].content.rendered);//content 
			$('.entry-title').html(response[0].title.rendered);//author
		}
	
	//$('article').html(quotes)
	});

 });
})(jQuery);

// (function($) {

// 	$('.submit-form').on(submit, function(event){
// 		event.preventDefault();
// 		const quotes = {
// 			title: $('.author-quote').val(),
// 			content: $('.your-quotes').val(),
// 			_qod_quote_source: $('.fidn-quote').val(),
// 			_qod_quote_source_url: $('.quote-source').val()
// 		};
// 	})

// $.ajax({
// 	method: 'post',
// 	url:  qod_vars.rest_url + "wp/v2/posts/",
// 	data: quotes,
// 	beforeSend:function(xhr) {
// 		xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
// 	}
// }).done( function() {
// 	$('#submit-area').html(qod_vars.success)
// }).fail( function() {
// 	$('submit-area').html(qod_vars.failure)
// });
// });
// (jQuery);
