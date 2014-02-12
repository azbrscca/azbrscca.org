<?php
  class Display {
  
    public static function close_page() {
?>
      </div> <!-- /container -->
    </div> <!-- /wrap -->

    <div class="container">
      <div id="footer-row">
        <em>&copy Arizona Border Region</em>
      </div>
    </div>
    
    <script src="<?php echo baseHref; ?>js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo baseHref; ?>js/bootstrap.min.js"></script>
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

    <link href="<?php echo baseHref; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo baseHref; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo baseHref; ?>css/azbr.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="images/logo-icon.png">
    <!--
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    -->
  </head>

  <body>

    <div id="wrap">
      <div class="container" id="container">
        <!-- header-row -->
        <div class="row" id="header-row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12" id="title-span">
                <h1><a class="azbr-color" href="<?php echo baseHref; ?>"><em>Arizona Border Region</em></a>
                  <small class="pull-right">
                    The Tucson & Southern Arizona Region of the Sports Car Club of America since 1959
                  </small>
                </h1>
              </div>

            </div>
          </div>
        </div>
        <!-- / header-row -->
      
        <!-- navbar -->
        <div class="navbar navbar-inverse" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">

                <!-- autox dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Autocross <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo baseHref; ?>autocross/calendar.html">Event Calendar</a></li>
                    <li><a href="<?php echo baseHref; ?>events/info.html">Site &amp; Entry Fee Information</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/supplimentals.html">Supplimental Regulations</a></li>
                    <li><a href="http://www.azsolo.com/forums/index.php?showforum=10">Tucson Autocross Forums</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo baseHref; ?>courses/">Course Map Archive</a></li>
                    <li><a href="http://www.azsolo.zenfolio.com/">Event Photos</a></li>
                    <li><a href="<?php echo baseHref; ?>results/">Event Results</a></li>

                    <li><a href="<?php echo baseHref; ?>events/2013SoloRules.pdf">2013 SCCA Solo Rules</a></li>
                    <li><a href="http://www.moutons.org/sccasolo/Lists/">Car Classification Help</a></li>
                    <li><a href="<?php echo baseHref; ?>novice/">Novice Guide</a></li>
                    <li><a href="<?php echo baseHref; ?>autocross/pax/index.html">PAX/RTP Factors</a></li>

                    <li class="divider"></li>
                    <li class="dropdown-header">More Arizona Autocross</li>
                    <li><a href="http://www.azsolo.com/">Arizona Region (Phoenix)</a></li>
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
                    <li><a href="#">2014 SCCA Rallycross Rules</a></li>

                    <li class="divider"></li>
                    <li><a href=""<?php echo baseHref; ?>roadrally">Road Rally</a></li>
                  </ul>
                </li>

                <!-- azbr dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">AZ Border Region <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo baseHref; ?>about/index.html">About Region #88</a></li>
                    <li><a href="<?php echo baseHref; ?>about/board2012.php">Board Members</a></li>
                  </ul>
                </li>
                <!-- / azbr dropdown -->

                <!-- sopac dropdown -->
                <li class="dropdown">
                  <a href="http://www.scca-sopac.org/" class="dropdown-toggle" data-toggle="dropdown">Southern Pacific Division</a>
                </li>
                <!-- / sopac dropdown -->

                <!-- scca dropdown -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">SCCA National <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://www.scca.org/">SCCA National Website</a></li>
                    <li><a href="http://www.scca.com/about/index.cfm?cid=44704">Membership Details</a></li>
                    <li><a href="http://ams.scca.com/netforum/eweb/firstgear.htm">First Gear Membership</a></li>
                    <li><a href="http://ams.scca.com/netforum/eweb/ind.htm">Individual Membership</a></li>
                    <li><a href="http://ams.scca.com/netforum/eweb/family.htm">Family Membership</a></li>
                    <li><a href="http://www.scca.com/about/index.cfm?cid=44704">Military Discount</a></li>
                    <li><a href="http://www.sccagear.com/">Merchandise Collection</a></li>
                    <li class="divider"></li>
                    <li><a href="http://www.sccaforums.com/">SCCA Forums</a></li>
                  </ul>
                </li>
                <!-- scca dropdown -->
              </ul>
              <p class="navbar-text navbar-right">
                <a href="http://www.scca.com/about/index.cfm?cid=44704"><strong><em>Join the SCCA Today!</em></strong></a>
              </p>
            </div><!-- / nav-collapse -->
          </div><!-- / container-fluid  -->
        </div>
        <!-- / navbar -->
<?php
    }
  }
?>
