<?php
  $dir = getcwd();
  echo $dir."\n";
  
  $targets = array( "local", "dev", "live" );
  
  if ( ( sizeof( $argv ) < 3 ) ||
       !in_array( strtolower( $argv[ 1 ] ), $targets ) )  {
    echo "Usage: php configure.php (dev|live|local) (configuration location)\n -v";
    exit;
  }

  $target = strtolower( $argv[ 1 ] );
  $config = $argv[ 2 ] );
  $verbose = ( ( sizeof( $argv ) > 2 ) && ( $argv[ 2 ] == '-v' ) );

  $files = array(
    "mtc/.htaccess",
  );

  foreach( $files as $dst ) {

    $src = $dst.".".$target;
    if ( file_exists( $src ) ) {
      if ( $verbose ) { echo "copying: ".$src." to ".$dst."\n"; }
      if ( copy( $src, $dst ) ) {

        foreach( $targets as $t ) {
          if ( file_exists( $dst.".".$t ) ) {
            if ( $verbose ) { echo "deleting: ".$dst.".".$t."\n"; }
            unlink( $dst.".".$t );
          }
        }

      }
    }
  }    

  copy( $config, "common/Common.php" );

  if ( $verbose ) { echo "deleting: ".$dir."/".$_SERVER[ 'SCRIPT_NAME' ]."\n"; }
  unlink( $dir."/".$_SERVER[ 'SCRIPT_NAME' ] );
  echo "done\n";
?>
