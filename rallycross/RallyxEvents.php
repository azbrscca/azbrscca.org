<?php
  class RallyxEvents {

    public static function upcoming_block() {
?>
        <div class="row">
          <div class="col-md-12">
            <p>
              RallyX events in Tucson are hosted by the <a href="http://azrallygroup.com/">Arizona Rally Group</a>
              at <a href="">MC Motorsports Park</a>. For event details, please visit the AZRG web site or
              Facebook page.
            </p>
            <p class="text-center">
              <a class="btn btn-primary btn-md" href="http://azrallygroup.com/">AZ Rally Group</a>
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
            <div id="rallyx-carousel" class="carousel slide visible-md visible-lg" data-ride="carousel">
              <div class="carousel-inner">
                <?php $images = Functions::listFiles( "rallycross/carousel", "jpg" ); ?>
                <?php foreach( $images as $index => $image ) {  ?>
                <div class="item<?php if ( $index == 0 ) { echo " active"; } ?>">
                  <img alt="" src="<?php echo baseHref.$image; ?>" />
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
<?php
    } // end function upcoming_block

  } // end Class
?>


