<?php


require_once __DIR__."/../app/application.php";

use App\Controllers\ListarUsuariosController;
use Fmk\Enums\Methods;
use Fmk\Facades\Router;
function checkMethod(){
    return ($_SERVER['REQUEST_METHOD'] == Methods::GET->value)?Methods::GET: Methods::POST;
}

Router::get('/',[ListarUsuariosController::class,'listar']);
Router::get('/usuario/{id}',[ListarUsuariosController::class,'detalhes']);
Router::get('/caju',[ListarUsuariosController::class,'caju']);
Router::get('/jaca/{id_jaca}/{id_arvore}',function($id_jaca, $id_arvore){
    echo "Tá faltando jaca, volte mais tarde!";
});

$route = Router::getInstance()->getRouterByUri($_REQUEST['request_uri'] ?? '',checkMethod());
if($route){
    $route->exec();
}else{
    die('404 mano!');
}

//a Rota que bateu ou 404; 