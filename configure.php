<?php
  $dir = getcwd();
  echo $dir."\n";

  $targets = array( "dev", "live" );

  if ( ( sizeof( $argv ) < 3 ) ||
       !in_array( strtolower( $argv[ 1 ] ), $targets ) )  {
    echo "Usage: php configure.php (dev|live) (configuration directory location)\n -v";
    exit;
  }

  $target = strtolower( $argv[ 1 ] );
  $configDir = $argv[ 2 ];
  $verbose = ( ( sizeof( $argv ) > 3 ) && ( $argv[ 3 ] == '-v' ) );

  $files = array(
    "common/Common.php"
  );

  foreach( $files as $dst ) {

    $src = $configDir."/".$dst.".".$target;
    if ( file_exists( $src ) ) {
      if ( $verbose ) { echo "copying: ".$src." to ".$dst."\n"; }
      if ( copy( $src, $dst ) ) {
        if ( $verbose ) { echo "done\n"; }
      }
    }
  }

  echo "configure done!\n";
?>
