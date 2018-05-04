<?php
  class Functions {
    public static function listFiles( $dir, $ext = "*", $recursive = false ) {
      $files = glob( rootDir.$dir."/*".$ext );
      array_walk( $files, array( "Functions", "removePrefix" ), strlen( rootDir ) );

      if ( $recursive ) {
        $subdirs = glob( rootDir.$dir."/*", GLOB_ONLYDIR );
        array_walk( $subdirs, array( "Functions", "removePrefix" ), strlen( rootDir ) );
        foreach( $subdirs as $subdir ) {
          $files = array_merge( $files, Functions::listFiles( $subdir, $ext, true ) );
        }
      }

      return $files;
    }

    private static function removePrefix( &$item, $index, $start) {
      $item = substr( $item, $start );
    }
  } // class Functions
?>
