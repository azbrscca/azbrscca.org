$( document ).ready( function() {
  $( "#course-map" ).change( function() {
    if ( $(this).val() == "") {
      $( "#course-map-row" ).slideUp();
    } else {
      $( "#course-map-img" ).attr( 'src', baseHref + $( this ).val() );
      $( "#course-map-row" ).slideDown();
    }
  });
  var options = $( "#course-map option" );
  $( "#course-map" ).val($(options[1]).val());
  $( "#course-map" ).trigger("change");
});
