<?php
  class RallyxEvents {

    public static function upcoming_block( $deviceType, $orgId, $apiKey ) {
      $args = array( 'public' => 1 );
      $json = MindTheCones::getRequest( "events/upcoming/open/", $orgId, $apiKey, $args );
      $rallyx_events = json_decode( $json, true );
      if ( empty( $rallyx_events ) ) {
        $args[ 'limit' ] = 1;
        $json = MindTheCones::getRequest( "events/upcoming/", $orgId, $apiKey, $args );
        $rallyx_events = json_decode( $json, true );
      }

      foreach( $rallyx_events as $event ) {
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

            <?php
              $images = Functions::listFiles( "rallycross/carousel", "jpg" );
              if ( $deviceType != 'phone' ) {
            ?>
            <div id="rallyx-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php foreach( $images as $index => $image ) {  ?>
                <div class="item<?php if ( $index == 0 ) { echo " active"; } ?>">
                  <img alt="" src="<?php echo baseHref.$image; ?>" />
                </div>
                <?php } ?>
              </div>
            </div>

            <?php
              } else {
                $random = rand(0, sizeof($images)-1);
            ?>
            <img class="img-responsive" src="<?php echo baseHref.$images[$random]; ?>" />
            <?php } ?>

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>
              RallyX events in Tucson are hosted by the <a href="https://www.facebook.com/AzRallyGroup">Arizona Rally Group</a>
              at <a href="">MC Motorsports Park</a>. For event details, please visit the
              <a href="https://www.facebook.com/AzRallyGroup">Facebook page</a>. For a complete list of events, visit the
              <a href="<?php echo baseHref; ?>/rallycross/calendar.html">rallycross event calendar.</a>
              </p>

            </p>
            <p class="text-center">
              <a class="btn btn-primary btn-md" href="http://mcmotorsportspark.com/">
                MC Motorsports Park
              </a>
              <a class="btn btn-primary btn-md" href="https://www.facebook.com/AzRallyGroup" target="_top">
                <i class="fa fa-facebook"></i>
              </a>
            </p>
          </div>
        </div>
<?php
    } // end function upcoming_block

  } // end Class
?>
