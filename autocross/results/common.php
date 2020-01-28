<?php
  function show_event( $file, $month, $year ) {

    $lines = file( $file );
    $cell_max = 0;
?>
              <h3 class="text-info text-center">
                Viewing Results for 
                <?php echo substr( $lines[ 1 ], 0, strpos( $lines[ 1 ], "," ) )." - ".date( "F", strtotime( date( "Y", time() )."-".$month."-1" ) ).", ".$year; ?>
              
              </h3>
              <div class="table-responsive">

              <table class="table table-condensed">
<?php
    for( $ndx=2; $ndx<sizeof( $lines ); $ndx++ ) {
      $line = $lines[ $ndx ];
      if ( $ndx == 2 ) { ?>
              <thead>
<?php } ?>
            <tr>
<?php
      $td_style = "";
      $tds = preg_split( "/,/", $line );

      $num_cells = sizeof( $tds );

      if ( $ndx == 2 ) {
        $cell_max = $num_cells;
      }

      if ( preg_match( "/,{".($num_cells-1)."}/", $line ) ) {
?>
              <td colspan="<?php echo $cell_max; ?>" style="background-color: #333333; padding: 5px; font-weight: bold;"><?php echo $tds[ 0 ]; ?></td>
<?php
      } else {

        if ( $tds[ $num_cells - 2 ] == "1" ) {
          $td_style = " style=\"color: #f00; font-weight: bold;\"";
        } else if ( $tds[ $num_cells - 4 ] == "1" ) {
          $td_style = " style=\"font-weight: bold;\"";
        }

        for( $td = 0; $td < sizeof( $tds ); $td++ ) { ?>
              <td<?php echo $td_style; ?>><?php echo $tds[ $td ]; ?></td>
<?php
        }
      } 
?>
            </tr>
<?php if ( $ndx == 2 ) { ?>
            </thead>
            <tbody>
<?php } ?>

<?php } ?>
            </tbody>
          </table>
        </div>
<?php
  }
  
  function show_list() {
?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2009</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="16%"><a href="static.html?y=2009&m=1">January</a></td>
                    <td width="16%"><a href="static.html?y=2009&m=2">February</a></td>
                    <td width="16%"><a href="static.html?y=2009&m=3">March</a></td>
                    <td width="16%"><a href="static.html?y=2009&m=4">April</a></td>
                    <td width="16%"><a href="static.html?y=2009&s=spring">Spring Series</a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2009&m=5">May<a/></td>
                    <td><a href="static.html?y=2009&m=6">June</a></td>
                    <td><a href="static.html?y=2009&m=7">July</a></td>
                    <td><a href="static.html?y=2009&m=8">August</a></td>
                    <td><a href="static.html?y=2009&s=summer">Summer Series</a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2009&m=9">September</a></td>
                    <td><a href="static.html?y=2009&m=10">October</a></td>
                    <td><a href="static.html?y=2009&m=11">November</a></td>
                    <td><a href="static.html?y=2009&m=12">December</a></td>
                    <td><a href="static.html?y=2009&s=fall">Fall Series</a></td>
                  </tr>
                </tbody>
              </table?

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2008</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2008&m=1">January</a></td>
                    <td><a href="static.html?y=2008&m=2">February</a></td>
                    <td><a href="static.html?y=2008&m=3">March</a></td>
                    <td><a href="static.html?y=2008&m=4">April</a></td>
                    <td><a href="static.html?y=2008&s=spring">Spring Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2008&m=5">May</a></td>
                    <td><a href="static.html?y=2008&m=6">June</a></td>
                    <td><a href="static.html?y=2008&m=7">July</a></td>
                    <td><a href="static.html?y=2008&m=8">August</a></td>
                    <td><a href="static.html?y=2008&s=summer">Summer Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2008&m=9">September</a></td>
                    <td><a href="static.html?y=2008&m=11">November (1)</a></td>
                    <td><a href="static.html?y=2008&m=11&e=2">November (2)</a></td>
                    <td><a href="static.html?y=2008&m=12">December</a></td>
                    <td><a href="static.html?y=2008&s=fall">Fall Series </a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2007</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2007&m=1">January</a></td>
                    <td><a href="static.html?y=2007&m=2">February</a></td>
                    <td>(No March Solo event)</td>
                    <td><a href="static.html?y=2007&m=4">April</a></td>
                    <td><a href="static.html?y=2007&s=spring">Spring Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2007&m=5">May</a></td>
                    <td><a href="static.html?y=2007&m=6">June</a></td>
                    <td><a href="static.html?y=2007&m=7">July</a></td>
                    <td><a href="static.html?y=2007&m=8">August</a></td>
                    <td><a href="static.html?y=2007&s=summer">Summer Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2007&m=9">September</a></td>
                    <td><a href="static.html?y=2007&m=10">October</a></td>
                    <td><a href="static.html?y=2007&m=11">November</a></td>
                    <td><a href="static.html?y=2007&m=12">December</a></td>
                    <td><a href="static.html?y=2007&s=fall">Fall Series </a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2006</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2006&m=1">January</a></td>
                    <td><a href="static.html?y=2006&m=2">February</a>&nbsp;</td>
                    <td><a href="https://www.sierrasportscars.com">SSCC April event</a>&nbsp;</td>
                    <td><a href="static.html?y=2006&m=4">April 30th</a>&nbsp;</td>
                    <td><a href="static.html?y=2006&s=spring">Spring Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2006&m=5">May</a></td>
                    <td><a href="static.html?y=2006&m=6">June</a></td>
                    <td><a href="static.html?y=2006&m=7">July</a></td>
                    <td><a href="static.html?y=2006&m=8">August</a></td>
                    <td><a href="static.html?y=2006&s=summer">Summer Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2006&m=9">September</a></td>
                    <td><a href="static.html?y=2006&m=10">October</a></td>
                    <td><a href="static.html?y=2006&m=11">November 25th</a><br><a href="2005/nov2606.html">November 26th</a></td>
                    <td><a href="static.html?y=2006&m=1&e=2">December</a></td>
                    <td><a href="static.html?y=2006&s=fall">Fall Series </a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2005</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2005&m=1">January</a></td>
                    <td><a href="static.html?y=2005&m=2">February</a></td>
                    <td><a href="static.html?y=2005&m=3">March</a></td>
                    <td><a href="static.html?y=2005&m=4">April (SIR)</a><br><a href="2005/apr05_pinal.html">April (Pinal)</a></td>
                    <td><a href="static.html?y=2005&s=spring">Spring Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2005&m=5">May</a></td>
                    <td><a href="static.html?y=2005&m=6">June</a></td>
                    <td><a href="static.html?y=2005&m=7">July</a></td>
                    <td><a href="static.html?y=2005&m=8">August</a></td>
                    <td><a href="static.html?y=2005&s=summer">Summer Series</a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2005&m=9">September</a></td>
                    <td><a href="static.html?y=2005&m=10">October</a></td>
                    <td>
                      <a href="static.html?y=2005&m=11">November 26th</a><br/>
                      <a href="static.html?y=2005&m=11">November 27th</a>
                    </td>
                    <td><a href="static.html?y=2005&m=12">December</a></td>
                    <td><a href="static.html?y=2005&s=fall">Fall Series </a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2004</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2004&m=1">January</a></td>
                    <td><a href="static.html?y=2004&m=2">February</a></td>
                    <td><a href="static.html?y=2004&m=3">March</a></td>
                    <td><a href="static.html?y=2004&m=4">April</a></td>
                    <td><a href="static.html?y=2004&s=spring">Spring Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2004&m=5">May</a></td>
                    <td><a href="static.html?y=2004&m=6">June</a></td>
                    <td><a href="static.html?y=2004&m=7">July</a></td>
                    <td><a href="static.html?y=2004&m=8">August</a></td>
                    <td><a href="static.html?y=2004&s=summer">Summer Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2004&m=9">September</a></td>
                    <td><a href="static.html?y=2004&m=10">October</a></td>
                    <td>
                      <a href="static.html?y=2004&m=11">November (Pinal)</a><br>
                      <a href="static.html?y=2004&m=11&e=2">November 27th</a><br>
                      <a href="static.html?y=2004&m=11&3">November 28th</a>
                    </td>
                    <td><a href="static.html?y=2004&m=12">December</a></td>
                    <td><a href="static.html?y=2004&s=fall">Fall Series </a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2003</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2003&m=1">January</a></td>
                    <td><a href="static.html?y=2003&m=2">February</a></td>
                    <td><a href="static.html?y=2003&m=3">March</a></td>
                    <td><a href="static.html?y=2003&m=4">April</a><br><a href="2003/asc03.html">ASC Tucson</a></td>
                    <td><a href="static.html?y=2003&s=spring">Spring Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2003&m=5">May</a></td>
                    <td><a href="static.html?y=2003&m=6">June</a></td>
                    <td><a href="static.html?y=2003&m=7">July</a></td>
                    <td><a href="static.html?y=2003&m=8">August</a></td>
                    <td><a href="static.html?y=2003&s=summer">Summer Series </a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2003&m=9">September</a></td>
                    <td><a href="static.html?y=2003&m=10">October</a></td>
                    <td><a href="static.html?y=2003&m=11">November</a></td>
                    <td><a href="2static.html?y=2003&m=12">December</a></td>
                    <td><a href="static.html?y=2003&s=fall">Fall Series </a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2002</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="static.html?y=2002&m=2">February</a></td>
                    <td><a href="static.html?y=2002&m=4">April</a></td>
                    <td><a href="static.html?y=2002&m=5">May</a></td>
                    <td><a href="static.html?y=2002&m=6">June</a></td>
                    <td><a href="static.html?y=2002&m=7">July</a></td>
                    <td><a href="static.html?y=2002&s=spring">Spring/Summer 2002</a></td>
                  </tr>
                  <tr>
                    <td><a href="static.html?y=2002&m=8">August</a></td>
                    <td><a href="static.html?y=2002&m=9">September</a></td>
                    <td><a href="static.html?y=2002&m=10">October</a></td>
                    <td><a href="static.html?y=2002&m=11">November</a></td>
                    <td><a href="static.html?y=2002&m=12">December</a></td>
                    <td><a href="static.html?y=2002&s=fall">Fall/Winter 2002</a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2001</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="2001/jan01.html">January</a></td>
                    <td><a href="2001/feb01.html">February</a></td>
                    <td><a href="2001/mar01.html">March</a></td>
                    <td><a href="2001/apr01.html">April</a></td>
                    <td><a href="2001/spr01pts.html">Spring 2001</a></td>
                  </tr>
                  <tr>
                    <td><a href="2001/may01.html">May</a></td>  
                    <td><a href="2001/jul01.html">July</a></td>
                    <td><a href="2001/aug01.html">August</a></td>
                    <td>&nbsp;</td>
                    <td><a href="2001/sum01pts.html">Summer 2001</a></td>
                  </tr>
                  <tr>
                    <td><a href="2001/sep01.html">September</a></td>
                    <td><a href="2001/oct01.html">October</a></td>
                    <td><a href="2001/nov01.html">November</a></td>
                    <td><a href="2001/dec01.html">December</a></td>
                    <td><a href="2001/win01pts.html">Winter 2001</a></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">2000</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="2000/jan00.html">January</a></td>
                    <td><a href="2000/feb00.html">February</a></td>
                    <td><a href="2000/mar00.html">March</a></td>
                    <td><a href="2000/may00.html">May</a></td>
                    <td><a href="2000/spr00pts.html">Spring 2000</a></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><a href="2000/jun00.html">June</a></td>
                    <td><a href="2000/jul00.html">July</a></td>
                    <td><a href="2000/aug00.html">August</a></td>
                    <td><a href="2000/sum00pts.html">Summer 2000</a></td>
                  </tr>
                  <tr>
                    <td><a href="2000/sep00.html">September</a></td>
                    <td><a href="2000/oct00.html">October</a></td>
                    <td><a href="2000/nov00.html">November</a></td>
                    <td><a href="2000/dec00.html">December</a></td>
                    <td><a href="2000/win00pts.html">Winter 2000</a></td>                        
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5">1999</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="1999/spr99pts.html">Spring</a></td>
                    <td><a href="1999/sum99pts.html">Summer</a></td>
                    <td><a href="1999/wnt99pts.html">Winter</a></td>
                  </tr>
                </tbody>
              </table>

<?php
  }

  function show_series( $file ) {

    $lines = file( $file );
    $tokens = split( ",", $lines[ 0 ] );
    $cells = sizeof( $tokens );
?>
              <h3 class="text-info text-center">
                <?php echo $tokens[ 0 ]; ?>
              </h3>
              <div class="table-responsive">
              <table class="table">
<?php    
    for( $ndx=1; $ndx<sizeof( $lines ); $ndx++ ) {
?>
            <tr>
<?php
      $line = $lines[ $ndx ];
      $tds = preg_split( "/,/", $line, -1, PREG_SPLIT_NO_EMPTY );

      if ( sizeof( $tds ) == 1 ) {
        // blank, skip...
      } else if ( sizeof( $tds ) == 2 ) {
?>
              <td colspan="<?php echo $cells; ?>" style="background-color: #ddd; padding: 2px;"><?php echo $tds[ 0 ]; ?></td>
<?php
      } else {
        $tds = preg_split( "/,/", $line );
        for( $td = 0; $td < sizeof( $tds ); $td++ ) {
?>
              <td><?php echo $tds[ $td ]; ?></td>
<?php
        }
      }
?>
            </tr>
<?php
    }
?>
          </table>
        </div>
<?php
  }
?>