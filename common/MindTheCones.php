<?php
  class MindTheCones {

    public static $apiUrl = "";
    private static $apiKey = "";
    private static $apiVersion = "1.0";
    private static $orgId = 0;
    private static $useServerTime = false;

    public static function getApiKey() {
      return self::$apiKey;
    }

    public static function setApiKey( $apiKey ) {
      self::$apiKey = $apiKey;
    }

    public static function getApiUrl() {
      return self::$apiUrl;
    }

    public static function setApiUrl( $apiUrl ) {
      self::$apiUrl = $apiUrl;
    }

    public static function getApiVersion() {
      return self::$apiVersion;
    }

    public static function getOrganizationId() {
      return self::$orgId;
    }

    public static function setOrganizationId( $orgId ) {
      self::$orgId = $orgId;
    }

    public static function getUseServerTime() {
      return self::$useServerTime;
    }

    public static function setUseServerTime( $useServerTime ) {
      self::$useServerTime = $useServerTime;
    }

    public static function getRequest( $uri, $get = array() ) {

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
        MindTheCones::getApiKey() .
        MindTheCones::getApiVersion() .
        MindTheCones::getOrganizationId() .
        $requestTime
      );

      $params = array_merge(
        array(
          '__mtc_api_version' => MindTheCones::getApiVersion(),
          '__mtc_organization_id' => MindTheCones::getOrganizationId(),
          '__mtc_request_time' => $requestTime,
          '__mtc_request_token' => $requestToken,
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

    public static function postRequest( $uri, $post ) {

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
        MindTheCones::getApiKey() .
        MindTheCones::getApiVersion() .
        MindTheCones::getOrganizationId() .
        $requestTime
      );

      $params = array_merge(
        array(
          '__mtc_api_version' => urlencode( MindTheCones::getApiVersion() ),
          '__mtc_organization_id' => urlencode( MindTheCones::getOrganizationId() ),
          '__mtc_request_time' => urlencode( $requestTime ),
          '__mtc_request_token' => urlencode( $requestToken ),
        ),
        $post
      );

      curl_setopt($ch, CURLOPT_URL, self::$apiUrl.$uri );
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 15);

      $data = curl_exec( $ch );
      curl_close( $ch );

      return $data;
    }
  }
?>
