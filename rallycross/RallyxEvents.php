<?php
  class RallyxEvents {

    public static function upcoming_block( $deviceType = "unknown" ) {
?>
        <div class="row">
          <div class="col-md-12">
            <p>
              RallyX events in Tucson are hosted by the <a href="https://www.facebook.com/AzRallyGroup">Arizona Rally Group</a>
              at <a href="">MC Motorsports Park</a>. For event details, please visit the AZRG website or
              Facebook page.
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
<?php
    } // end function upcoming_block

  } // end Class
?>
