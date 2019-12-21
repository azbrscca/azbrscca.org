<?php
  class RegAPI {

    public static $apiUrl = "";
    private static $apiVersion = "1.0";
    private static $useServerTime = false;

    public static function getApiUrl() {
      return self::$apiUrl;
    }

    public static function setApiUrl( $apiUrl ) {
      self::$apiUrl = $apiUrl;
    }

    public static function getApiVersion() {
      return self::$apiVersion;
    }

    public static function getUseServerTime() {
      return self::$useServerTime;
    }

    public static function setUseServerTime( $useServerTime ) {
      self::$useServerTime = $useServerTime;
    }

    public static function getRequest( $uri, $orgId, $apiKey, $get = array() ) {
      if ( strpos( $uri, '?' ) !== false ) {
        $uri = substr( $uri, 0, strpos( $uri, '?' ) );
      }
      $ch = curl_init();

      $requestTime = time();
      if ( self::getUseServerTime() ) {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, self::$apiUrl."/time" );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $json = json_decode( curl_exec($ch), true );
        $requestTime = intval( $json[ 'time' ] );
      }

      $requestToken = sha1(
        $apiKey .
        RegAPI::getApiVersion() .
        $orgId .
        $requestTime
      );

      $params = array_merge(
        array(
          '__reg_api_version' => RegAPI::getApiVersion(),
          '__reg_organization_id' => $orgId,
          '__reg_request_time' => $requestTime,
          '__reg_request_token' => $requestToken,
        ),
        $get
      );

      $queryString = http_build_query( $params );
      $requestUrl = self::$apiUrl.$uri;
      if ( !empty( $queryString ) ) {
        $requestUrl .= "?".$queryString;
      }
      curl_setopt($ch, CURLOPT_URL, $requestUrl );
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 15);
      $data = curl_exec( $ch );
      curl_close( $ch );

      return $data;
    }
  }
?>
