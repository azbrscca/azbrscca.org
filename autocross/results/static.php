<?php
  require_once "../lib/display.php";
  require_once "../lib/functions.php";

  require_once "common.php";

  if ( ( getenv( "QUERY_STRING" ) != null ) && ( getenv( "QUERY_STRING" ) != "" ) ) {
    $queryString = getenv( "QUERY_STRING" );
    $args = parse_get_args( $queryString );
  }

  $post_args = filter( $_POST );

  connect();

  $file = "";
  $have_results = false; 
  
  if ( isset( $args[ 'y' ] ) ) {
    $file .= rootDir."/results/".$args[ "y" ]."/";

    if ( isset( $args[ 'm' ] ) ) {
    
      $file .= strtolower( date( "F", strtotime( date( "Y", time() )."-".$args[ 'm' ]."-1" ) ) );
      if ( isset( $args[ "e" ] ) ) {
        $file .= $args[ "e" ];
      }
    } else if ( isset( $args[ "s" ] ) ) {
      $file .= $args[ "s" ];
    }

    $file .= ".csv";
    $have_results = ( !empty( $file ) ) && file_exists( $file );
  }

  showHeader();
?>
		<h3 class="ui-widget-header ui-corner-all">Solo Results</h3>
<?php
  if ( !$have_results ) {
    show_list();

  } else if ( isset( $args[ "s" ] ) ) {
    show_series( $file );
  
  } else if ( isset( $args[ "m" ] ) ) {
    show_event( $file, $args[ "m" ], $args[ "y" ] );
  }

  showFooter();
?>