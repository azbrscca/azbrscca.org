<?php
  class Display {

    public static function close_page( $jsSources = array(), $jsonData = array() ) {
?>
      </div> <!-- /container -->
    </div> <!-- /wrap -->

    <script src="<?php echo baseHref; ?>js/jquery-1.11.0.min.js"></script>

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
                  The Tucson & Southern Arizona Region of the Sports Car Club of America since 1959
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
                    <li><a href="<?php echo baseHref; ?>autocross/calendar.html">Event Calendar</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/details.html">Site &amp; Entry Fee Information</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/supplimental.html">Supplimental Regulations</a></li>
                    <li><a href="http://www.azsolo.com/forums/index.php?showforum=10">Tucson Autocross Forums</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo baseHref; ?>autocross/results.html">Event Results</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/courses/">Course Map Archive</a></li>
                    <li><a href="http://www.azsolo.zenfolio.com/">Event Photos</a></li>

                    <li class="divider"></li>
                    <li class="dropdown-header">SCCA Classing &amp; Rules</li>
                    <li><a href="http://www.scca.com/pages/solo-cars-and-rules">SCCA Solo (Autocross) Rules</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/pax.html">PAX/RTP Factors</a></li>
                    <!-- <li><a href="<?php echo baseHref; ?>novice/">Novice Guide</a></li> -->
                    <li><a href="http://www.sccastartingline.com/resources.php">Starting Line AutoX FAQ</a></li>
                    <li><a href="http://www.solomatters.com/">Solo Matters</a></li>

                    <li class="divider"></li>
                    <li class="dropdown-header">More Arizona Autocross</li>
                    <li><a href="http://www.azsolo.com/">Arizona Region SCCA (Phoenix)</a></li>
                    <li><a href="http://www.sierrasportscars.net/">Sierra Sports Car Club</a></li>
                  </ul>
                </li>
                <!-- / autox dropdown -->

                <!-- rally & rallyx dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Rallycross &amp; Road Rally  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-header">Rallycross</li>
                    <li><a href="http://www.arizonarallygroup.com/">AZ Rally Group</a></li>
                    <li><a href="http://www.azsolo.com/forums/index.php?showforum=22">Rallycross Forums</a></li>
                    <li><a href="http://www.scca.com/pages/rallycross-cars-and-rules">SCCA Rallycross Rules</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Road Rally</li>
                    <li><a href="<?php echo baseHref; ?>roadrally">Event Information</a></li>
                  </ul>
                </li>

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
                    <!-- <li><a href="http://www.scca-sopac.org/">Southern Pacific Division</a></li> -->
                    <li><a href="http://www.scca.org/">SCCA National Website</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Become a Member</li>
                    <li><a href="http://www.scca.com/about/index.cfm?cid=44704">Membership Details</a></li>
                    <li><a href="http://ams.scca.com/netforum/eweb/firstgear.htm">First Gear</a></li>
                    <li><a href="http://ams.scca.com/netforum/eweb/ind.htm">Individual</a></li>
                    <li><a href="http://ams.scca.com/netforum/eweb/family.htm">Family</a></li>
                    <li><a href="http://www.scca.com/about/index.cfm?cid=44704">Military Discount</a></li>
                    <li class="divider">
                    <li><a href="http://www.sccagear.com/">SCCA Gear</a></li>
                    <li class="divider"></li>
                    <li><a href="http://www.sccaforums.com/">SCCA Forums</a></li>
                  </ul>
                </li>
                <!-- scca dropdown -->
              </ul>
              <p class="navbar-text navbar-right">
                <a href="http://www.scca.com/pages/join-scca"><strong><em>Join the SCCA Today!</em></strong></a>
              </p>
            </div><!-- / nav-collapse -->
          </div><!-- / container-fluid  -->
        </div>
        <!-- / navbar -->
<?php
    }
  }
?>
