<?php
/**
 * Created By: _kshatriya_16
 * Date: 09/02/2024
 * Uses:
 * Last Modefied:
*/

declare(strict_types=1);

namespace HttpCode\Headers;

use HttpCode\core\interfaces\interfaceHeader;

class Headers implements \HttpCode\core\interfaces\interfaceHeader\interfaceHeader{
  
  /**
   * Get All Headers
   * @param
   * @return Array
  */
  public static function getallheaders(){
    $headers = array();
    $copy_server = array(
      'CONTENT_TYPE'   => 'Content-Type',
      'CONTENT_LENGTH' => 'Content-Length',
      'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach($_SERVER as $key => $value){
      if(substr($key, 0, 5) === 'HTTP_'){
        $key = substr($key, 5);
        if (!isset($copy_server[$key]) || !isset($_SERVER[$key])){
          $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
          $headers[$key] = $value;
        }
      }elseif(isset($copy_server[$key])){
        $headers[$copy_server[$key]] = $value;
      }
    }
    if(!isset($headers['Authorization'])){
      if(isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])){
        $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
      } elseif(isset($_SERVER['PHP_AUTH_USER'])){
        $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
        $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
      }elseif(isset($_SERVER['PHP_AUTH_DIGEST'])){
        $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
      }
    }
    return $headers;
  }
}

/**
 * END;
*/
?>