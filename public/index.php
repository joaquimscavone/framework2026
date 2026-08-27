<?php


require_once __DIR__."/../app/application.php";

use App\Controllers\ListarUsuariosController;
use Fmk\Enums\Methods;
use Fmk\Facades\Route;

// var_dump($_SERVER['REQUEST_METHOD']);
// $controller = new App\Controllers\ListarUsuariosController();
// $controller->caju();
//usuario/5
// new Route('usuario.view','professor/',Methods::GET,function(){});
$route = new Route('usuario.view','professor/{id_professor}/disciplinas/{id_disciplina}/aulas/{id_aula}',Methods::GET,function(){});


$route->defineParamns(['id_professor' => 15, 'id_diciplina'=>23, 'id_aula'=>45]);


echo '<pre>';
var_dump($route->getParamns());






// use App\Controllers\ListarUsuariosController;
// $controller = new ListarUsuariosController();
// $rota = $_GET['rota'] ?? 'listar';

// if(method_exists($controller,$rota)){
//     $controller->$rota();
// }else{
//     http_response_code(404);
//     die('404 - NOT FOUND!');
// }