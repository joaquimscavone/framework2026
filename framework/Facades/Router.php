<?php

namespace Fmk\Facades;

use Fmk\Enums\Methods;

class Router{
    protected static $instance; //o router;

    protected array $routes = [];

    protected static $error404; //página não encontrada;
    protected static $error403; //página não autorizada;


    protected function __construct(){

    }

    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static;
        }
        return static::$instance;
    }

    private function add($uri, Methods $method, $callback){
        $name = count($this->routes);
        $this->routes[$name] = new Route($name, $uri, $method, $callback);
        return $this->routes[$name];
    }

    public static function get($uri, $callback){
        return static::getInstance()->add($uri,Methods::GET, $callback);
    }
    public static function post($uri, $callback){
        return static::getInstance()->add($uri,Methods::POST, $callback);
    }


    public function getRouterByUri($uri, Methods $method = Methods::GET){

        $uri = $this->checkUri($uri);
        foreach($this->routes as $route){
            if($route->getMethod() !=$method){
                continue;
            }
            $expression = preg_replace('(\{[a-z0-9_]{1,}\})',"([a-zA-Z0-9_\-|\s]{1,})",$route->getUri());
            if(preg_match("#^($expression)$#i",$uri,$matches)){
            array_shift($matches);
            array_shift($matches);
            $route->defineParamns($matches);
               return $route;
            }
        }
    }

    private function checkUri($uri){
        if(empty($uri) || $uri=='/'){
            return "/";
        }
        $uri = (substr($uri,0)==="/")?$uri:"/$uri";
        return rtrim($uri,"/");
    }

    



}