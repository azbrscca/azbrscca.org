<?php
  class Display {
    public static function close_page( $jsSources = array(), $jsonData = array() ) {
?>
      </div> <!-- /container -->
    </div> <!-- /wrap -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
      var baseHref = "<?php echo baseHref; ?>";
<?php foreach( $jsonData as $key => $json) { ?>
      var <?php echo $key; ?> = $.parseJSON( '<?php echo addslashes( json_encode( $json ) ); ?>' );
<?php } ?>
    </script>

<?php foreach( $jsSources as $jsSource ) { ?>
      <script src="<?php echo baseHref; ?>js/<?php echo $jsSource; ?>"></script>
<?php } ?>

  </body>
</html>
<?php
    }

    public static function image_carousel( $relPath, $format = "jpg" ) {
?>
    <div class="row">
      <div class="col-md-12">

        <?php $images = Functions::listFiles( $relPath, $format ); ?>
        <div id="autox-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
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
    }

    public static function open_page() {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Arizona Border Region SCCA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo baseHref; ?>css/azbr.css">

    <script src="https://use.fontawesome.com/165222812f.js"></script>

    <link rel="icon" type="image/png" href="<?php echo baseHref; ?>images/logo-icon.png">
    <!--
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    -->

    <style>
      @media (min-width: 767px) {
        body { background-image: url( '<?php echo baseHref; ?>images/asphalt.jpg' ); }
        #header-row { background-image: url( '<?php echo baseHref; ?>images/SCCA_50.png' ); }
      }
    </style>

    <!--[if lt IE 9]>
      <style>
        body {
          background: #ffffff url( '<?php echo baseHref; ?>images/asphalt.jpg' ) no-repeat 0 0;
        }
        #container {
          background-color: #7d7d7d;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        }
        h2 {
          background-color: #222;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
        }
      </style>
      <script src="<?php echo baseHref; ?>js/html5shiv.min.js"></script>
      <script src="<?php echo baseHref; ?>js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div id="wrap">
      <div class="container" id="container">

        <!-- header-row -->
        <div class="row" id="header-row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12 hidden-xs" id="title-span">
                <h1>
                  <a class="azbr-color" href="<?php echo baseHref; ?>"><em>Arizona Border Region</em></a>
                </h1>
                <h3 class="text-right">
                  Southern Arizona Region of the Sports Car Club of America since 1959
                </h3>
              </div>

            </div>
          </div>
        </div>
        <!-- / header-row -->

        <!-- navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo baseHref; ?>">
                <span class="azbr-color visible-xs">Arizona Border Region</span>
              </a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">

                <li>
                  <a href="<?php echo baseHref; ?>">Main</a>
                </li>

                <!-- autox dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Autocross <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="https://registration.azbrscca.org">Online Registration</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/calendar.html">Event Calendar</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/details.html">Site &amp; Entry Fee Information</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/supplemental.html">Supplemental Regulations</a></li>
                    <li><a href="https://forum.azsolo.com/index.php?/forum/11-tucson-autocross/">Tucson Autocross Forum</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo baseHref; ?>autocross/results.html">Event Results</a></li>

                    <li class="divider"></li>
                    <li class="dropdown-header">SCCA Classing &amp; Rules</li>
                    <li><a href="https://www.scca.com/pages/solo-cars-and-rules">SCCA Solo (Autocross) Rules</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/pax.html">PAX/RTP Factors</a></li>
                    <li><a href="https://www.scca.com/pages/starting-line-autocross-school">Starting Line AutoX</a></li>
                    <li><a href="https://www.scca.com/pages/autocross">SCCA Solo Homepage</a></li>

                    <li class="divider"></li>
                    <li class="dropdown-header">More Arizona Autocross</li>
                    <li><a href="http://www.azsolo.com/">Arizona Region SCCA (Phoenix)</a></li>
                    <li><a href="https://www.sierrasportscarclub.com/">Sierra Sports Car Club</a></li>
                  </ul>
                </li>
                <!-- / autox dropdown -->
			
                <!-- azbr dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">AZ Border Region <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo baseHref; ?>about/index.html">About Region #88</a></li>
                    <li><a href="<?php echo baseHref; ?>about/board.html">Board Members</a></li>
                  </ul>
                </li>
                <!-- / azbr dropdown -->


                <!-- scca dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">SCCA<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="https://www.scca.com/">SCCA National Website</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Become a Member</li>
                    <li><a href="https://my.scca.com/">Join Today</a></li>
                    <li><a href="https://www.scca.com/pages/member-benefits-preview">Membership Benefits</a></li>
                    <li class="divider">
                    <li><a href="http://www.sccagear.com/">SCCA Gear</a></li>
                  </ul>
                </li>
                <!-- scca dropdown -->
              </ul>
              <p class="navbar-text navbar-right">
                <a href="https://my.scca.com/"><strong><em>Join the SCCA Today!</em></strong></a>
              </p>
            </div><!-- / nav-collapse -->
          </div><!-- / container-fluid  -->
        </div>
        <!-- / navbar -->
<?php
    }
    
    /**
     * Function to print entry prices for autocross. Used in the autocross/details.html page and all the child pages
     * that contain info for each site.
     *
     * TODO: in the future, consider adding variables/parameters in case prices differ across different sites.
     */
    public static function print_autox_entry_fees() {
?>
          <div class="col-md-4">
            <div class="well well-sm">
              <h3 class="text-info text-center">Entry Fees</h3>

              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-info">SCCA Members</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">Registering Online</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 80</div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">Registering On Site</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 100</div>
              </div>
			  
              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-info">Non SCCA (Weekend) Members</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">Registering Online</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 100</div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">Registering On Site</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 120</div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning">
                    The SCCA requires that all event participants be SCCA members.
                    If you are not an SCCA member a weekend membership is available for an extra $20,
                    which is included in the Non SCCA entry fees shown above. If you wish to become an SCCA member, <a href="https://my.scca.com/">Join the SCCA Today!</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-info">Time Only Registration</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">All Participants</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 10</div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning">
                    Time Only entries can only be registered for <em>in addition</em> to a regular competition entry. This applies to both SCCA and non SCCA members, and both pre-registered and on-site entries.
                  </div>
                </div>
              </div>

			  <div class="row">
                <div class="col-md-12">
                  <h4 class="text-info">Podium Club and SCCA Members</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">Registering Online</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 20</div>
				<div class="col-md-8 col-xs-8">Registering Onsite</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 33</div>
              </div>
			  <div class="row">
                <div class="col-md-12">
                  <h4 class="text-info">Podium Club Members only</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-xs-8">Registering Online</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 40</div>
				<div class="col-md-8 col-xs-8">Registering Onsite</div>
                <div class="col-md-4 col-xs-2"><i class="fa fa-usd"></i> 53</div>
              </div>
			  <br />
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-warning">
                    Podium Club Membership discount is only available for Podium Club events. The SCCA requires that all event participants be SCCA members.
                    If you are not an SCCA member a weekend membership is available for an extra $20,
                    which is included in the Non SCCA entry fees shown above. If you wish to become an SCCA member, <a href="https://my.scca.com/">Join the SCCA Today!</a>
                  </div>
                </div>
              </div>
<!--              <h3 class="text-info text-center">Accepted Payments</h3>
              <div class="row">
                <div class="col-md-12">
                  <p>
                    Entry fees can be paid online via Paypal while registration is open.
                  </p>
                  <p>
                    <a class="btn btn-block btn-md btn-primary" href="<?php echo baseHref; ?>autocross/paypal.html">
                      Pay With Paypal <i class="fa fa-angle-double-right"></i>
                    </a>
                  </p>
                  <p>
                    The day of the event, registration accepts cash and checks made out to 'Arizona Border Region SCCA' or 'AZBR SCCA'. We do not accept credit cards on site.
                  </p>
                </div>
              </div> -->

            </div>
          </div>
<?php
    }
  }
?>
