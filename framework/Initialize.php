<?php

namespace Fmk;


class Initialize{
    protected function __construct(){}

    public static function run(){
        $constants = require __DIR__.DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'constants.php';
        echo '<pre>';
        print_r($constants);
    }


}