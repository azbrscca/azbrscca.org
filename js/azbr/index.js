$( document ).ready( function() { 
  $.each( $("div[data-expires]"), function( index, div ) {
    var expiration_date = new Date($(div).data('expires'))
    var current_date = new Date()
    if(current_date.getTime()>expiration_date.getTime()) {
      $(div).hide();
    }
  });
});
