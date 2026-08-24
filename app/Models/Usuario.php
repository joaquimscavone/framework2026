<?php
namespace App\Models;
use Fmk\Facades\Database;
use PDO;
class Usuario
{
    public static function login(string $nome, string $senha)
    {
        $sql = 'SELECT id, nome, email FROM usuarios
                WHERE nome = :nome
                    AND senha = password(:senha)';
        $consulta = Database::conectar()->prepare($sql);
        $consulta->execute(
            ['nome' => $nome, 'senha' => $senha]
        );
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public static function all(){
        $sql = "SELECT * FROM usuarios;";
        $consulta = Database::conectar()->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId(int $id){
        $sql = "SELECT * FROM usuarios WHERE id = :id;";
        $consulta = Database::conectar()->prepare($sql);
        $consulta->execute(['id' => $id]);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
}


