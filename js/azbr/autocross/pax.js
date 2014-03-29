$( document ).ready( function() {

          $( "#pax_year" ).change( function() {
            var cur_type = 0;
            var key = $(this).val();
            var pax_div = $("#pax-div");
            pax_div.empty();

            var panels = {}

            if ( key == 0 ) {
              return;
            }

            $.each( scca_classes[key], function( id, scca_class ) {

              if ( panels[scca_class['type']] == undefined ) {
                var panel = $("<div/>",{'class':"panel panel-info"});
                panel.append(
                  $("<div/>", {'class':"panel-heading"}).append(
                    $("<h4/>", {'class':"panel-title"}).append(
                      class_types[scca_class['type']]
                    )
                  )
                ).append(
                  $("<div/>",{'class':"panel-body"})
                );
                panels[scca_class['type']] = panel;
              }

              panel = panels[scca_class['type']]
              var panel_body = panel.children(":last");
              var row = $("<div/>",{'class':"row"});
              row.append( 
                $("<div/>",{'class':"col-md-5 col-sm-4 col-xs-6"}).html(
                  scca_class['name']
                ));
              row.append( 
                $("<div/>",{'class':"col-md-2 col-sm-3 col-xs-3"}).html(
                  scca_class['initials']
                ));
              row.append( 
                $("<div/>",{'class':"col-md-2 col-sm-3 col-xs-3"}).html(
                  parseFloat(scca_class['pax']).toFixed(3)
                ));

              /*
              var prev_class = scca_classes[parseInt(key)-1][scca_class['prev_id']];
              if ( prev_class != undefined ) {
                row.append( 
                  $("<div/>",{'class':"col-md-1"}).html(
                    parseFloat(prev_class['pax']).toFixed(3)
                  )
                );
              }
              */

              panel_body.append(row);
            });

            $.each( panels, function(ndx,panel) {
              pax_div.append(panel);
            });

          });

          $("#pax_year").val( new Date().getFullYear() );
          $("#pax_year").trigger('change');
});
