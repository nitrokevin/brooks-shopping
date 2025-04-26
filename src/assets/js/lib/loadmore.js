jQuery(document).ready(function ($) {
  var button = $('#load-more');

  if (!button.length) return; // Exit if button does not exist

  button.on('click', function () {
    var paged = button.data('paged');

    console.log('Loading page: ' + paged);

    $.ajax({
      url: load_more_params.ajaxurl,
      type: 'POST',
      data: {
        action: 'load_more_posts',
        paged: paged
      },
      beforeSend: function () {
        button.text('Loading...');
      },
      success: function (response) {
        console.log(response);
        if (response.trim()) {
          $('#post-container').append(response);
          button.data('paged', paged + 1);
          button.text('Load More');

          $(document).foundation();
        } else {
          button.remove();
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
      }
    });
  });
});
