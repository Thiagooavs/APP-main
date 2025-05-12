<?php 

namespace App\Model;

use App\DAO\UsuarioDAO;
use exeption;

final class Usuario extends Model 
{
    public ?int $Id = null;
    
    public ?string $Nome {
        set
        {
            if(strlen($value) < 3
            ){
                throw new exeption("Nome deve ter no mínimo 3 caracteres.");
            }
        }
        get => $this -> Nome ?? null;
    }

    public ?string $Email
    {
        set 
        {
            if(empty($value))
            throw new exception("Preencha o Email");


            $this ->RA ->$value;
        }

        get => $this -> RA ?? null;
    }

    public ?string $Senha
    {
        set{
            if(strlen($value) < 8)
            throw new Exception("Senha deve ter no mínimo 8 caracteres");

            $this ->Curso -> $value;
        }

        get => $this -> Curso ??null;
    }

    function save() : Usuario 
    {
        return new UsuarioDAO() -> save($this);

    }

    function getById(int $id) : ?Usuario 
    {
        return new UsuarioDAO()->selectById($id);
    }

    function getAllRows() : array 
    {
        $this -> rows = new UsuarioDAO()->select();

        return $this->rows;
    }

    function delete(itn $id) : bool 
    {
        return new UsuarioDAO()->delete($id);
    }
}





?>