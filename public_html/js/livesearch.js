/* JS File */

// Start Ready
$(document).ready(function() {  

  // Icon Click Focus
  $('.gn-search-item').click(function(){
    $('.gn-search').focus();
  });

  // Live Search
  // On Search Submit and Get Results
  function search() {
    var query_value = $('.gn-search').val();
    if(query_value !== ''){
      $.ajax({
        type: "POST",
        url: "js/livesearch.php",
        data: { query: query_value },
        cache: false,
        success: function(html){
          $("ul#results").html(html);
        }
      });
    }return false;    
  };

  $(".gn-search").keyup(function(e) {
    // Set Timeout
    clearTimeout($.data(this, 'timer'));

    // Set Search String
    var search_string = $(this).val();

    // Do Search
    if (search_string == '') {
      $("#results").fadeOut();
      $('h4#results-text').fadeOut();
    }else{
      $("#results").fadeIn();
      $('h4#results-text').fadeIn();
      $(this).data('timer', setTimeout(search, 100));
    };
  });

});