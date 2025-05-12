<?php 

namespace App\Controller;

Use App\Model\Usuario;
use Exception;

final class UsuarioContuoller extends Controller 
{
    public static function index() : variant_mod
    {
        parent::isProtected();

        $model = new Usuario();

        try{
            $model->getAllRows();

        } catch(Exeption $e){
            $model -> serError("Ocorreu um erro ao buscat os Usuarios:");
            $model -> setError($e ->getMessage());
        }

        parent::render("Usuario/lista_Usuario.php", $model);

    }

    public static function cadastro() : void 
    {
        parent::isProtected();

        $model = new Usuario();
        
        try
        {
            if(parent::isPost())
            {
                $model-> id = !empty($_POST["id"]) ? $_POST["id"] : null;
                $model-> Nome = $_POST["nome"];
                $model-> RA = $_POST["ra"];
                $model->Curso = $_POST["curso"];
                $model-> save();

                parent::redirect("/Usuario");

            } else
            {
                if(isset($_GET['id'])){

                    $model = $model->getById( (int) $_GET["id"]);

                    
                }

            }
        } catch(Exeption $e)
        {
            $model-> serError($e-> getMessage());
        }

        parent::render("Usuario/form_Usuario.php", $model);
    }

    public static function delet() : void
    {
        parent::isProtected();

        $model = new Usuario();

        try
        {
            $model-> delete( (int) $_GET["id"]);
            parent::redirect("/Usuario");
        

        }catch(Exception $e)
        {
            $model -> serError("Ocorreu um erro ao buscar os Usuarios:");
            $model -> setError($e ->getMessage());

        }

        parent::render('Usuario/lista_Usuario.php', $model);
    }

}

?>
