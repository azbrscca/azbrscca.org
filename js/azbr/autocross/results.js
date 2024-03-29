$( document ).ready( function() {  

  var categories = [ 'PAX', 'Open', 'Street Tire', 'Ladies', 'Novice', 'Time Only' ];
  var classes = new Array();
  var options = {};
  var eventJSON, results, seriesJSON;
  var selectedCategories = new Array(), selectedClasses = new Array();

  function eventTable() {
    var groupByCategory = ( $( "#sort_type" ).val() == "category" );
    var sortByPax = ( $( "#order_by" ).val() == "pax_time" );

    $( "#results-inner" ).empty();

    $( "#results-inner").append(
      $("<h3/>",{'class':"text-info text-center"}).html(
"Viewing Results for " + 
dateFormat( new Date( parseInt( eventJSON.date_ts ) * 1000 ), "fullDate" )
      )
    );

    $( "#results-inner").append(
      $("<h5/>",{'class':"text-center"}).html(
"Classes visible: " + selectedClasses + ". Categories visible: " + selectedCategories + "."
      )
    );

    var table_wrap = $( "<div/>", { 'class' : "table-responsive" } );
    var table = $( "<table/>", { 'class' : "table table-condensed table-hover" } );
    $( "#results-inner" ).append( table_wrap );
    table_wrap.append( table );
    table.append( table_header(groupByCategory) )
    var body = $( "<tbody/>" );
    if ( groupByCategory ) {

      var rbc = {};
      $.each( categories, function( index, category ) {
rbc[ category ] = Array();
      });

      $.each( results, function( index, result ) {
rbc[ result.category ].push( result );
      });

      $.each( categories, function( index, category ) {
var showCategory = ( $.inArray( "All", selectedCategories ) >= 0 );
showCategory |= ( ( $.inArray( "Comps", selectedCategories ) >= 0 ) && ( category != "Time Only" ) )
showCategory |= ( $.inArray( category, selectedCategories ) >= 0 );
showCategory &= (rbc[category].length > 0);
if ( showCategory ) {

  row = $( "<tr/>" )
  cell = $( "<td/>", { 'class' : "active", 'colspan' : 9 } );
  if ( category == 'Time Only' ) {
   cell.html( "Time Only" );
  } else {
    cell.html( category + " Category" );
  }
  body.append( row.append( cell ) );

  if ( category == "Open" ) {
    rbc[ category ].sort( sortByClass );
  }

  var openClass = "", openIndex = 0;

  $.each( rbc[ category ], function( index, result ) {

    var showClass = ( $.inArray( "All", selectedClasses ) >= 0 );
    showClass |= ( $.inArray( result[ 'scca_class_name' ], selectedClasses ) >= 0 );

    if ( showClass ) {  
      if ( category == "Open" ) {

        if ( result[ 'scca_class_name' ] != openClass ) {
          body
            .append( $( "<tr/>" )
                .append( $( "<td/>", { 'colspan' : 9 } )
                  .append( $("<em/>").html(result['scca_class_name']))
                  )
                )
          openIndex = 0;
          openClass = result[ 'scca_class_name' ];
        }
        body.append( resultRow( openIndex, result, groupByCategory, sortByPax ) );
        openIndex++;
      } else {
          body.append( resultRow( index, result, groupByCategory, sortByPax ) );
      }
    }
  });
}                
      });

    } else {
      var rank = 0;
      $.each( results, function( index, result ) {
      
        var showCategory = ( $.inArray( "All", selectedCategories ) >= 0 );
        showCategory |= ( ( $.inArray( "Comps", selectedCategories ) >= 0 ) && ( result.category != "Time Only" ) )
        showCategory |= ( $.inArray( result.category, selectedCategories ) >= 0 );

        var showClass = ( $.inArray( "All", selectedClasses ) >= 0 );
        showClass |= ( $.inArray( result[ 'scca_class_name' ], selectedClasses ) >= 0 );

        if ( showCategory && showClass ) {
          body.append( resultRow( rank, result, groupByCategory, sortByPax ) );
          rank++;
        }
      });
    }
    table.append( body );
  }

  function seriesTable() {
    var groupByCategory = ( $( "#sort_type" ).val() == "category" );
    var sortByPax = ( $( "#order_by" ).val() == "pax_time" );

    $( "#results-inner" ).empty();

    $( "#results-inner" ).empty();

    $( "#results-inner").append(
      $("<h3/>",{'class':"text-info text-center"}).html(
        "Viewing Results for AZBR " + seriesJSON.name + " Series"
      )
    );

    var table = $( "<table/>", { 'class' : "table table-condensed table-hover" } );
    $( "#results-inner" ).append( table );

    var thead = $("<thead/>");
    table.append(thead);

    var row = $( "<tr/>" );
    row.append($( "<th/>",{'class':"bg-warning text-center",'colspan':'2'}).html("Driver"));
    row.append($( "<th/>",{'class':"bg-danger text-center",'colspan':'2'}).html("Car"));
    row.append($( "<th/>",{'class':"bg-success text-center",'colspan':results.series_events.length}).html("Events"));
    row.append($( "<th/>",{'class':"bg-info text-center"}).html('Points'));
    thead.append(row);

    row = $( "<tr/>" );
    row.append($( "<th/>").html("&nbsp;"));
    row.append($( "<th/>").html("Name"));
    row.append($( "<th/>").html("Year Make/Model"));
    row.append($( "<th/>").html("SCCA Class"));

    $.each( results.series_events, function( index, eventJSON ) {
      row.append(
        $( "<th/>" )
          .html( dateFormat( new Date( parseInt( eventJSON.event_date_ts ) * 1000 ), "mmm dd" ) )
      );
    }); 
    row.append($( "<th/>").html("Total"));
    thead.append(row);

    var cell;
    var body = $( "<tbody/>" );
    $.each( categories, function( key, category ) {

      if ( results.categories[ category ] ) {
        row = $( "<tr/>" );
        cell = $( "<td/>", { 'class':"active", 'colspan' : results.series_events.length + 5 } )
                  .html(category + " Category");
        row.append(cell);
        body.append(row);


        if ( results.categories[ category ].divided ) {

          $.each( results.categories[ category ], function( key, value ) {

            if ( value instanceof Object ) {
              var trophies = trophyCount( value.qualified );

              body
                .append( $( "<tr/>" )
                    .append( $( "<td/>", { 'colspan' : 9 } )
                      .append( $("<em/>").html(value.results[0].class_names[0]))
                      )
                    );

              $.each( value.results, function( index, result ) {

                row = $( "<tr/>" );
                cell = $( "<td/>" ).append( index+1 );
                if ( index < trophies ) {
                  cell.css( 'color', "#f8b20b" );
                  cell.css( 'font-weight', "bold" );
                }
  
                row.append( cell );
                row.append( $( "<td/>" ).append( result.name.replace( "\\", "" ) ) );

                cell = $( "<td/>" );
                $.each( result.cars, function( c, car ) {
                  cell.append($("<p/>").html(car));
                });
                row.append(cell);

                row.append( $( "<td/>" ).append( result[ 'class' ] ) );
    
                $.each( results.series_events, function( e, eventJSON ) {
                  var dateKey = dateFormat( new Date( parseInt( eventJSON.event_date_ts ) * 1000 ), "mmm dd" );
                  cell = $( "<td/>" );
                  if ( result.events[ dateKey ] ) {
                    cell.append( Math.round( result.events[ dateKey ] ) );
                  }
                  row.append( cell );
                }); 
      
                row.append( $( "<td/>" ).append( Math.round( result.points ) ) );
  
                body.append( row );
              });
            }
          });

        } else {

          var trophies = trophyCount( results.categories[ category ].qualified );
          $.each( results.categories[ category ].results, function( index, result ) {
            row = $( "<tr/>" );
            cell = $( "<td/>" ).append( index+1 );
            if ( index < trophies ) {
              cell.css( 'color', "#f8b20b" );
              cell.css( 'font-weight', "bold" );
            }

            row.append( cell );
            row.append( $( "<td/>" ).append( result.name.replace( "\\", "" ) ) );

            cell = $( "<td/>" );
            $.each( result.cars, function( c, car ) {
              cell.append($("<div/>").html(car));
            });
            row.append(cell);

            row.append( $( "<td/>" ).append( result[ 'class' ] ) );

            $.each( results.series_events, function( e, eventJSON ) {
              var dateKey = dateFormat( new Date( parseInt( eventJSON.event_date_ts ) * 1000 ), "mmm dd" );
              cell = $( "<td/>" );
              if ( result.events[ dateKey ] ) {
                cell.append( Math.round( result.events[ dateKey ] ) );
              }
              row.append( cell );
            }); 
  
            row.append( $( "<td/>" ).append( Math.round( result.points ) ) );

            body.append( row );
          
          });
        }

      }

    });
    
    table.append( body );
  }

  function table_header (groupByCategory) {

    var colspan = 2;
    var car_colspan = groupByCategory ? colspan : colspan+1;
    var rnp_colspan = groupByCategory ? colspan+1 : colspan-1;
    var thead = $("<thead/>");
    var row = $( "<tr/>" );
    thead.append(row);

    row.append($( "<th/>",{'class':"bg-warning text-center",'colspan':colspan}).html("Driver"));
    row.append($( "<th/>",{'class':"bg-danger text-center",'colspan':car_colspan}).html("Car"));
    row.append($( "<th/>",{'class':"bg-success text-center",'colspan':colspan}).html("Times"));

    var cell_html = groupByCategory ? "Rankings &amp; Points" : "Points";
    row.append($( "<th/>",{'class':"bg-info text-center",'colspan':rnp_colspan}).html(cell_html));

    row = $("<tr/>");
    thead.append(row);

    row.append($( "<th/>").html("&nbsp;"));
    row.append($( "<th/>").html("Name"));
    row.append($( "<th/>").html("Year Make/Model"));
    row.append($( "<th/>").html("SCCA Class"));

    if ( !groupByCategory ) {
      row.append($( "<th/>").html("AZBR Category"));
    }

    row.append($( "<th/>").html("Fastest"));
    row.append($( "<th/>").html("PAX"));



    if ( groupByCategory ) {
      row.append($( "<th/>").html("Raw Time"));
      row.append($( "<th/>").html("PAX Time"));
    }
  
    cell = $( "<td/>" );
    cell.append( "Points" );
    row.append( cell );



    return thead;
  }

  function getResults( ccReset ) {

    var selected = $( "#id" ).find( ":selected" );

    if ( selected.data( 'type' ) == "event" ) {

      $( "#filters_btn" ).removeAttr('disabled');
      if ( $( "#filters_btn" ).val() == "true" ) {
        $( "#sorting_and_filtering").slideDown();
      } else {
        $( "#sorting_and_filtering").slideUp();                
      }

      if ( ccReset ) {
        $( "#categories" ).find( "option:selected" ).removeAttr( 'selected' );
        $( "#categories" ).find( "option[value='All']" ).attr( 'selected', "selected" );
        selectedCategories = new Array();
        selectedCategories.push( "All" );
      }

      $.getJSON( baseHref + "reg-api/db/events/" + $( "#id" ).val(),
                 function( json ) {
        eventJSON = json;

        $.getJSON( baseHref + "reg-api/results/event/" + $( "#id" ).val(),
                 { 'order_by' : $( "#order_by" ).val() },
                   function( resultsJSON ) {
          results = resultsJSON;
          
          classes = new Array();
          $.each( resultsJSON, function( index, result ) {
            if ( $.inArray( result[ 'scca_class_name' ], classes ) == -1 ) {
              classes.push( result[ 'scca_class_name' ] );
            }
          });
          classes.sort();
          if ( ccReset ) {
            $( "#classes" ).find( "option" ).remove();
            $( "#classes").append( $( "<option/>" ).val( "All" ).html( "All" ).attr( 'selected', "selected" ) );
            $.each( classes, function( index, c ) {
              $( "#classes").append( $( "<option/>" ).val( c ).html( c ) );
            });
            selectedClasses = new Array();
            selectedClasses.push( "All" );
          }
          
          eventTable();
        });
      });

    } else if ( selected.data( 'type' ) == "series" ) {

      $( "#sorting_and_filtering").slideUp();
      $( "#filters_btn" ).attr('disabled',"disabled");

      $.getJSON( baseHref + "reg-api/db/series/" + $( "#id" ).val(),
                 function( json ) {
        seriesJSON = json;

        $.getJSON( baseHref + "reg-api/results/series/" + $( "#id" ).val(),
                  function( resultsJSON ) {
          results = resultsJSON;
          seriesTable();
        });
      });

    }
  }

  function resultRow( index, result, groupByCategory, sortByPax ) {
    row = $( "<tr/>" );
    if ( parseInt( result.pax_rank ) == 1 ) {
      // toppax
    } else if ( parseInt( result.time_rank ) == 1 ) {
      // ftd  
    }

    row.append( $( "<td/>" ).append( index+1 ) );

    var cell = $( "<td/>" );

    var span = $( "<span/>", {
      'onmouseover': "this.style.cursor='pointer';",
      'data-result-id': result.id
    })
    .on( 'click', function() { toggle( this ); })
    .html( result.name.replace( "\\", "" ) );
    cell.append( span );

    var div = $( "<div/>" )
    div.attr( 'id', 'result_' + result.id );
    div.css( 'display', "none" );
    
    var times = jQuery.parseJSON( result.all_times );
    $.each( times, function( index, time ) {
    
      div.append( index+1 ).append( ". " );
      if ( isNaN( time.raw ) ) {
        div.append( time.raw );
      } else {
        div.append( parseFloat( time.raw ).toFixed( 3 ) );
      }

      if ( time.penalty > 0 ) {
        div.append( " " ).append( "(" ).append( time.penalty ).append( ")" );
      }
      div.append( $( "<br/>" ) );
    });

    cell.append( div );

    row.append( cell );
    
    row.append( $( "<td/>" ).append( result.car ) );
    row.append( $( "<td/>" ).append( result[ 'class' ] ) );
    if ( !groupByCategory ) {
      row.append( $( "<td/>" ).append( result.category ) );
    }

    cell = $( "<td/>" ).append( parseFloat( result.fast_time ).toFixed( 3 ) );
    if ( !sortByPax ) {
      //
    }
    row.append( cell );

    cell = $( "<td/>" ).append( parseFloat( result.pax_time ).toFixed( 3 ) );
    if ( sortByPax ) {
      //
    }
    row.append( cell );
    
    if ( groupByCategory ) {
      if ( result.category == "Time Only" ) {
        row.append( $( "<td/>" ) );
        row.append( $( "<td/>" ) );
      } else {
        row.append( $( "<td/>" ).append( result.time_rank ) );
        row.append( $( "<td/>" ).append( result.pax_rank ) );
      }
    }
    row.append( $( "<td/>" ).append( Math.round( parseFloat( result.points ) ) ) );
    return row;
  }

  function sortByClass( one, two ) {

    if ( one[ 'class' ] == two[ 'class' ] ) {
      return ( one.pax_time - two.pax_time );
    } else {
      return ( one[ 'class' ].localeCompare( two[ 'class' ] ) );
    }
  }

  function toggle( item ) {
    var id = '#result_' + $( item ).data( 'result-id' );
    if ( $( id ).is( ":hidden" ) ) {
      $( id ).slideDown();
    } else {
      $( id ).slideUp();
    }
  }

  function trophyCount( qualifiers ) {
    var trophies = 0;
    if ( qualifiers > 0 ) { trophies++; }
    if ( qualifiers > 3 ) { trophies++; }
    if ( qualifiers > 6 ) { trophies++; }
    if ( qualifiers > 9 ) { trophies++; }
    if ( qualifiers > 14 ) { trophies++; }
    return trophies;
  }

  $( "#classes" ).change( function() {
    selectedClasses = new Array();
    $.each( $( this ).find( "option:selected" ), function( index, option ) {
      selectedClasses.push( $( option ).val() );
    });
    eventTable();            
  });
  
  $( "#categories" ).change( function() {
    selectedCategories = new Array();
    $.each( $( this ).find( "option:selected" ), function( index, option ) {
      selectedCategories.push( $( option ).val() );
    });
    eventTable();            
  });

  $( "#filters_btn" ).click( function() {
    var div = $( "#sorting_and_filtering");
    if ( div.is(":visible") ) {
      div.slideUp();
      $(this).html("Show Filters");
      $(this).val("false");
    } else {
      div.slideDown();
      $(this).html("Hide Filters");
      $(this).val("true");
    }

  });

  $( "#id" ).change( function() {
   var selected = $( this ).find( "option:selected" );
   var type = $( "#type" ).val( selected.data( 'type' ) );
    getResults( true );
  });

  $( "#order_by" ).change( function() {
    getResults( false );
  });

  $( "#reset_sorting" ).click( function() {
    $( "#order_by" ).val( "pax_time" );
    $( "#sort_type" ).val( "category" );
    getResults( true );            
  });

  $( "#sort_type" ).change( function() {
    eventTable();
  });

  $( "#start_over" ).click( function() {
    var firstEvent =  $( "#id" ).find( 'option[data-type^="event"]' )[ 0 ];
    $( "#id" ).val( $( firstEvent ).val() );
    $( "#order_by" ).val( "pax_time" );
    $( "#sort_type" ).val( "category" );
    getResults( true );
  });

  var firstEvent =  $( "#id" ).find( 'option[data-type^="event"]' )[ 0 ];
  $( "#type" ).val( "event" );
  $( firstEvent ).attr( 'selected', "selected" );
  getResults( true );
});
