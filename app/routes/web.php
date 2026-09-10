<?php
use Fmk\Facades\Router;
use App\Controllers\ListarUsuariosController;
Router::get('/',[ListarUsuariosController::class,'listar']);
Router::get('/usuario/{id}',[ListarUsuariosController::class,'detalhes']);