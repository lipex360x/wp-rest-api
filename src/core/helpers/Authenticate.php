<?php
class Authenticate {
  function checkUser () {
    $user = getUserLoggedQuery();
    $userId = $user->ID;

    if(!$userId > 0) return false;
    return true;
  }

  function getHeaders() {
    $server = $_SERVER;

    $headers = array();
    $additional = array( 'CONTENT_LENGTH' => true, 'CONTENT_MD5' => true, 'CONTENT_TYPE' => true );

    foreach ($server as $key => $value) {
      if (strpos( $key, 'HTTP_' ) === 0) {
        $headers[ substr( $key, 5 ) ] = $value;
      } elseif (isset( $additional[$key])) {
        $headers[ $key ] = $value;
      }
    }

    return $headers;
  }
}