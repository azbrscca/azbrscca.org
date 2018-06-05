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

    public static function cleanArray( $dirtyArray ) {	+    private static function removePrefix( &$item, $index, $start) {
      $cleanArray = array();	+      $item = substr( $item, $start );
      foreach( array_keys( $dirtyArray ) as $key ) {
        if ( is_array( $dirtyArray[ $key ] ) ) {
          $cleanArray[ $key ] = self::cleanArray( $dirtyArray[ $key ] );
        } else {	
          $cleanArray[ $key ] = self::cleanString( $dirtyArray[ $key ] );
        }
      }
      return $cleanArray;
    }

    public static function cleanString( $dirty ) {
      $clean = mb_convert_encoding( $dirty, 'UTF-8', 'UTF-8' );
      $clean = htmlentities( $clean, ENT_QUOTES, 'UTF-8' );
      $clean = htmlspecialchars_decode( $clean );
      $clean = preg_replace( "/&#039;/", "'", $clean );
      $clean = preg_replace( "/&quot;/", "\"", $clean );
      return $clean;
    }

    private static function removePrefix( &$item, $index, $start) {
      $item = substr( $item, $start );
    }
  } // class Functions
?>
