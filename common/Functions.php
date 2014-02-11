<?php
  class Functions {

  	public static function decodeJSONField( &$item, $key, $field ) {
  	  $item[ $field ] = json_decode( $item[ $field ] );
  	}

	private static function removePrefix( &$item, $index, $start) {
	  $item = substr( $item, $start );
	}

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

    public static function cleanArray( $dirtyArray ) {
      $cleanArray = array();
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

    public static function randomString( $length = 16 ) {
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      $string = "";
      for( $i=0; $i<$length; $i++ ) {
        $string .= $chars[(mt_rand(1, strlen($chars)))-1];
      }
      return $string;
    }

  } // class Functions
?>
