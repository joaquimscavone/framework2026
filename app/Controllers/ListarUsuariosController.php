<?php
namespace App\Controllers;
use App\Models\Usuario;
class ListarUsuariosController{
    public function listar(){
        $usuarios = Usuario::all();
        require_once __DIR__ ."/../views/listar_usuarios.view.php";
    }

    public function detalhes($id){
        $usuario = Usuario::buscarPorId($id);
        require_once __DIR__."/../views/detalhes.view.php";
    }

    public function caju(){
       require_once __DIR__."/../views/formulario.view.php";
    }
}