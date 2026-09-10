<?php

namespace Fmk\Facades;

use Fmk\Enums\Methods;
use Fmk\Traits\Singleton;


class Request{
    use Singleton;
    protected static $default_request_uri = 'request_uri';
    protected $uri; //url que o usuário chamou nessa requisição;
    protected $method; //método que usuário utilizou GET|POST;
    protected $data; //outras dados de requisição do usuário;

    protected function __construct(){
        $this->uri = $_GET[static::requestUriKey()] ?? '/';
        $this->method = 
                ($_SERVER['REQUEST_METHOD'] === Methods::GET->value)
                ?Methods::GET:Methods::POST;
        $this->data = $_REQUEST;
        unset($this->data[static::requestUriKey()]); 
    }
    protected static function requestUriKey(){
        return defined('REQUEST_URI_KEY')
                    ?constant('REQUEST_URI_KEY')
                    :self::$default_request_uri;
    }



}