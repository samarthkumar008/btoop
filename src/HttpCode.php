<?php
/**
 * Created By: _kshatriya_16
 * Date: 09/02/2024
 * Uses:
 * Last Modefied:
*/

declare(strict_types=1);

namespace HttpCode;

class HttpCode extends \HttpCode\Headers\Headers{
  
  /**
    * @var array<int, string>
  */
  private static array $codes = [
    100 => 'Continue',
    102 => 'Processing',
    103 => 'Early Hints',
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non-Authoritative Information',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    207 => 'Multi-Status',
    208 => 'Already Reported',
    226 => 'IM Used',
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    306 => 'Reserved',
    307 => 'Temporary Redirect',
    308 => 'Permanent Redirect',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Request Entity Too Large',
    414 => 'Request-URI Too Long',
    415 => 'Unsupported Media Type',
    416 => 'Requested Range Not Satisfiable',
    417 => 'Expectation Failed',
    418 => 'Unassigned',
    421 => 'Misdirected Request',
    422 => 'Unprocessable Entity',
    423 => 'Locked',
    424 => 'Failed Dependency',
    425 => 'Too Early',
    426 => 'Upgrade Required',
    428 => 'Precondition Required',
    429 => 'Too Many Requests',
    431 => 'Request Header Fields Too Large',
    451 => 'Unavailable For Legal Reasons',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported',
    506 => 'Variant Also Negotiates',
    507 => 'Insufficient Storage',
    508 => 'Loop Detected',
    510 => 'Not Extended',
    511 => 'Network Authentication Required'
  ];
  
  /**
   * Returns string with HTTP code and its description.
   * @usage HttpCode::getDesc(200); // '200 (OK)'
  */
  public static function getDesc(int $code){
    if(isset(self::$codes[$code])){
      return sprintf('%d (%s)',$code, self::$codes[$code]);
    }
    return $code;
  }
  
  /**
   * Set Response Code
  */
  public static function setResponse(int $code){
    if(!array_key_exists($code, self::$codes)){
      echo 'Invalid Response Code';
    }
    http_response_code($code);
  }
}

/**
 * END;
*/
?>