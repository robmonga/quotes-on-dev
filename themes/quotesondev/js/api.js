(function($) {
  let lastPage = '';

  $(window).on('popstate', function() {
    window.location.replace(lastPage);
  });

  $('#show-more').on('click', function(event) {
    event.preventDefault();

    // store the pre-AJAX request URL for back/forward nav
    lastPage = document.URL;

    $.ajax({
      method: 'get',
      url:
        qod_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
    }).done(function(response) {
      const url = qod_vars.home_url + '/' + response[0].slug; // creates a new url with an author slug
      history.pushState(null, null, url);
      let source = response[0]._qod_quote_source; //po
      let sourceUrl =  response[0]._qod_quote_source_url;
      if (response[0]._qod_quote_source && response[0]._qod_quote_source_url) {
        //loadd conetnt title, source and url
        $('.entry-content').html(response[0].content.rendered); //content
        $('.entry-title').html(response[0].title.rendered); //author
        $('.entry-source').html(source);
        $('.entry-source').wrap("<a href="+sourceUrl+"></a>"); // source
      } else if (
        response[0]._qod_quote_source &&
        !response[0]._qod_quote_source_url
      ) {
        //load content, title, source
        $('.entry-content').html(response[0].content.rendered);
        $('.entry-title').html(response[0].title.rendered); //author
        $('.entry-source').html(''); // source
      } else {
        // load content and author
        $('.entry-content').html(response[0].content.rendered); //content
        $('.entry-title').html(response[0].title.rendered); //author
        $('.entry-source').html(''); // source
      }

      //$('article').html(quotes)
    });
  });

  $('#submit-button').on('click', function(event) {
    event.preventDefault();
    let quotes = {
      title: $('#quote-author').val(),
      content: $('#the-quote').val(),
      _qod_quote_source: $('#quote-source').val(),
      _qod_quote_source_url: $('#source-url').val(),
      excerpt: {
        protected: false,
        rendered: '<p>' + $('#the-quote').val() + '</p>'
      },
      post_status: 'publish'
    };
    $.ajax({
      method: 'post',
      data: quotes,
      url: qod_vars.rest_url + 'wp/v2/posts/',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
      }
    })
      .done(function() {
        $('#submit-quote').val('');
        $('#the-quote').val('');
        $('#quote-source').val('');
        $('#source-url').val('');
        $('#submit-quote').empty();
        $('#submit-quote').html("Thanks, your quote submission was received!");
        
      })
      .fail(function() {
        $('#submit-quote').empty();
        $('#submit-quote').html('Sorry, something went wrong.');
      });
  });
})(jQuery);
