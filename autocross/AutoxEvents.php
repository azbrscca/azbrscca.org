<?php
  class AutoxEvents {

    public static function avail_results() {

      $data = MindTheCones::getRequest( "results/list/available" );
      $avail_results = json_decode( $data, true );
?>

              <form action="<?php echo baseHref; ?>/autocross/results/download.html" name="results_form"
                    id="results_form" method="post" role="form">
                <input id="type" name="type" type="hidden" value="event" />

                <div class="form-group">
                  <label for="id">Select an Event or Series</label>
                  <select class="form-control" id="id" name="id">
                    <option value="0">Select</option>
                    <?php foreach( $avail_results as $item ) { ?>
                    <option data-type="<?php echo $item[ 'type' ]; ?>" value="<?php echo $item[ 'id' ]; ?>">
                      <?php echo $item[ 'label' ]; ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group text-center">
                  <input class="btn btn-default" id="download" type="submit" value="Download Results" />
                </div>

                <div id="sorting_and_filtering">
                  <div class="form-group">
                    <label for="sort_type">Sort In:</label>
                    <select class="form-control" id="sort_type">
                      <option value="category">Category</option>
                      <option value="overall">Overall</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="order_by">Sort By:</label>
                    <select class="form-control" id="order_by">
                      <option value="pax_time">PAX Time</option>
                      <option value="fast_time">Fast Time</option>
                    </select>
                  </div>

                  <div class="form-group text-center">
                    <input class="btn btn-default" id="reset_sorting" type="button" value="Reset Sorting" />
                    <input class="btn btn-default" id="start_over" type="button" value="Start Over" />
                  </div>

                  <div class="form-group">
                    <label for="classes">Classes to Display</label>
                    <select class="form-control" id="classes" name="classes[]" multiple="multiple" size="4">
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="categories">Categories to Display:</label>
                    <select class="form-control" id="categories" name="categories[]" multiple="multiple" size="4">
                      <option value="All">All</option>
                      <option value="Comps">All Competition</option>
                      <option value="PAX">PAX</option>
                      <option value="Open">Open</option>
                      <option value="Street Tire">Street Tire</option>
                      <option value="Ladies">Ladies</option>
                      <option value="Time Only">Time Only</option>
                    </select>
                  </div>
                </div>
              </form>

              <hr/>

              <div class="row">
                <div class="col-md-12">
                  <a class="btn btn-md btn-default btn-block" href="<?php echo baseHref; ?>autocross/results/static.html">
                    2009 and older results
                    <i class="fa fa-angle-double-right"></i>
                  </a>
                </div>
              </div>
<?php
}

    public static function past_tabs() {

      $past_events = MindTheCones::getRequest( "events/past/", array( 'limit' => 4 ));
      $events = json_decode( $past_events, true );
?>
            <div class="row">
              <div class="col-md-12">
                <div class="tabbable">
                  <ul class="nav nav-pills">
                    <?php foreach( $events as $index => $event ) { ?>
                    <li class="<?php if ( $index == 0 ) { echo "active"; } ?>">
                      <a href="#autocross-<?php echo $event[ 'id' ]; ?>" data-toggle="tab">
                        <?php echo date( "F j", $event[ 'date_ts' ] ); ?></a>
                    </li>
                    <?php } ?>
                  </ul>

                <div class="tab-content">
                <?php foreach( $events as $index => $event ) { ?>

                  <div class="tab-pane<?php if ( $index == 0 ) { echo " active"; } ?>" id="autocross-<?php echo $event[ 'id' ]; ?>">
                    <div class="row">
                      <div class="col-md-8">
                        <h5>
                          <?php echo date( "F j", $event[ 'date_ts' ] ); ?> 
                          <?php if ( !empty( $event[ 'name' ] ) ) { echo $event[ 'name' ]; } ?>
                          Autocross at <?php echo $event[ 'site_name' ]; ?>
                        </h5>
                      </div>
                    
                      <?php if ( $event[ 'results' ] ) { ?>
                      <div class="col-md-4 text-right">
                        <a class="btn btn-primary" href="<?php echo baseHref; ?>autocross/results">
                          View Results
                          <i class="fa fa-angle-double-right"></i>
                        </a>
                      </div>
                      <?php } ?>
                    </div>

                    <?php
                      $map = "autocross/courses/".date( "Y-m-d", $event[ 'date_ts' ] ).".jpg";
                      if ( file_exists( rootDir.$map ) ) {
                    ?>
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <div class="thumbnail">
                          <img src="<?php echo baseHref.$map; ?>" />
                        </div>
                      </div>
                    </div>
                    <?php
                      } // course map thumbnail 
                    ?>
                  </div>
                <?php } ?>
                </div>

              </div> <!-- /tabbable -->
              </div>
            </div>
<?php
    } // end function past_tabs

    public static function upcoming_block() {

      $args = array( 'public' => 1 );
      $json = MindTheCones::getRequest( "events/upcoming/open/", $args );
      $autox_events = json_decode( $json, true );


      if ( empty( $autox_events ) ) {
        $args[ 'limit' ] = 2;
        $json = MindTheCones::getRequest( "events/upcoming/", $args );
        $autox_events = json_decode( $json, true );
      }

      foreach( $autox_events as $event ) {
?>

        <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">
              <?php if( !empty($event['name'])) { echo $event['name']." "; } ?>
              <?php echo date( "l, F j", $event[ 'date_ts' ] ); ?>
              at <?php echo $event['site_name']; ?>
            </h3>

<?php   if ( $event[ 'status' ] == "will open" ) { ?>
           <h4 class="text-center">
              Online registration will open:
              <?php echo date( "l, F j", $event[ 'registration_open_ts' ] ); ?> at 
              <?php echo date( "g:ia", $event[ 'registration_open_ts' ] ); ?>.
            </h4>

<?php   } else if ( $event[ 'status' ] == "open" ) { ?>
    
            <h4 class="text-success text-center">
              Online registration is open now!
              <a class="btn btn-success" href="<?php echo mtc_url; ?>register/<?php echo $event[ 'id' ]; ?>" target="_top">Register Now</a>
            </h4>
            <h5 class="text-center">
              Online registration closes
              <?php echo date( "l, F j", $event[ 'registration_close_ts' ] ); ?> at 
              <?php echo date( "g:ia", $event[ 'registration_close_ts' ] ); ?>.
            </h5>

<?php   } else if ( $event[ 'status' ] == "closed" ) { ?>

            <h4 align="center" class="azbr-alt-color">
              Online registration is closed.
            </h4>
<?php   } ?>
          </div>
        </div>

<?php } ?>

        <div class="row">
          <div class="col-md-12">
            <div id="autox-carousel" class="carousel slide visible-md visible-lg" data-ride="carousel">
              <div class="carousel-inner">
                <?php $images = Functions::listFiles( "autocross/carousel", "jpg" ); ?>
                <?php foreach( $images as $index => $image ) {  ?>
                <div class="item<?php if ( $index == 0 ) { echo " active"; } ?>">
                  <img alt="" src="<?php echo baseHref.$image; ?>" />
                </div>
                <?php } ?>
              </div>
            </div>
            <p>
              Please refer to the <a href="<?php echo baseHref; ?>/autocross/calendar.html">event calendar</a>
              for event schedules and run/work order.
            </p>
          </div>
        </div>
<?php
    } // end function upcoming_block

  } // end Class
?>


