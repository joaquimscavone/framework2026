<?php

namespace Fmk\Facades;
use Exception;
use Fmk\Enums\Methods;
use Fmk\Traits\Singleton;

class Router{
    use Singleton;

    protected array $routes = [];
    protected static $error404; //página não encontrada;
    protected static $error403; //página não autorizada;

    private function add($uri, Methods $method, $callback){
        $name = count($this->routes);
        $this->routes[$name] = new Route($name, $uri, $method, $callback);
        return $this->routes[$name];
    }

    public static function swapName($from, $to){
        $router = static::getInstance();
        if(array_key_exists($from,$router->routes)){
            if(!array_key_exists($to,$router->routes)){
                $router->routes[$to] = $router->routes[$from];
                unset($router->routes[$from]);
                return ;
            }
            throw new Exception("Rota $to já existe nessa aplicação");
        }
        throw new Exception("Rota $from não encontrada");

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
            $expression = preg_replace('(\{[a-z0
            -9_]{1,}\})',"([a-zA-Z0-9_\-|\s]{1,})",$route->getUri());
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


    public static function error404(){
        die('error 404 - not found');
    }

    



}