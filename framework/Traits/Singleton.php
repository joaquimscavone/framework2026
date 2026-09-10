<?php

namespace Fmk\Traits;


trait Singleton{
    protected static $instance;


    protected function __construct(){}
    protected function __clone(){}
    

    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static;
        }
        return static::$instance;
    }

}