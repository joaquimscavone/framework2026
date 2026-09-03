<?php

namespace Fmk\Facades;

use Exception;
use Fmk\Enums\Methods;
/**
 * Importações
 * use classe requerida;
 */
class Route
{
    protected string $uri;
    protected $callback;
    protected array $paramns;
    protected Methods $method; // GET||POST
    protected string $name;
    protected bool $active;

    public function __construct(string $name, string $uri, Methods $method, callable|array $callback)
    {
        $this->name = $name;
        $this->uri = $uri;
        $this->method = $method;
        $this->callback = $callback;
        $this->active = false;
        $this->paramns = array_fill_keys($this->prepareParamns($uri), null);
    }


    protected function prepareParamns($uri)
    {
        //id_diciplina 
        //disciplinas/{id_disciplina}/swap/{professor_1}/{professor_2}
        //exemplo: ((protected|private|public) [a-z]{1,} \$)
        $exp = "(\{[a-z0-9_\}]{1,})";
        if (preg_match_all($exp, $uri, $matches)) {
            return preg_replace('(\{|\})', '', $matches[0]);
        }
        return [];
    }

    public function setParamns($paramns)
    {
        foreach ($paramns as $key => $param) {
            if (array_key_exists($key, $this->paramns)) {
                $this->paramns[$key] = $param;
            }
        }
    }

    public function defineParamns($paramns)
    {
        foreach ($this->paramns as &$param) {
            $param = array_shift($paramns);
        }
    }

    public function getParamns()
    {
        return $this->paramns;
    }

    public function getUrl()
    {
        $url = $this->uri;
        foreach ($this->paramns as $key => $value) {
            if (is_null($value)) {
                throw new Exception("$key não pode ser null para essa URL");
            }
            $url = str_replace("{" . $key . "}", $value, $url);

        }
        return $url;
    }

    public function exec(){
       $callback = $this->callback;
       if(is_array($callback) && class_exists($callback[0])){
            $callback[0] = new $callback[0];
       }
       $this->active = true;
       return call_user_func_array($callback, $this->paramns);
    }






}


