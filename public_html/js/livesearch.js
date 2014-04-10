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

  function productsearch() {
    var query_value = $('#productsearch').val();
    if(query_value !== ''){
      $.ajax({
        type: "POST",
        url: "js/livesearch-product.php",
        data: { query: query_value },
        cache: false,
        success: function(html){
          $("ul.productresults").html(html);
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

  $("#productsearch").keyup(function(e) {
    // Set Timeout
    clearTimeout($.data(this, 'timer'));

    // Set Search String
    var search_string = $(this).val();

    // Do Search
    if (search_string == '') {
      $(".productresults").fadeOut();
      $('h4#results-text').fadeOut();
    }else{
      $(".productresults").fadeIn();
      $(this).data('timer', setTimeout(productsearch, 100));
    };
  });

  $('.gn-search').blur(function() {
    $("#results").fadeOut();
  });

  $('#productsearch').blur(function() {
    $(this).val("");
    $(".productresults").fadeOut();
  });

  $('#productsearch').focus(function() {
    $(".productresults").fadeIn();
    $(this).data('timer', setTimeout(productsearch, 100));
  });

});