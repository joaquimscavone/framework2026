<?php
use Fmk\Facades\Router;
use App\Controllers\ListarUsuariosController;
Router::get('/',[ListarUsuariosController::class,'listar'])->name('usuarios.listar');
Router::get('/usuario/{id}',[ListarUsuariosController::class,'detalhes'])->name('usuarios.detalhes');