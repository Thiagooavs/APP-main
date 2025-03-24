<?php 

namespace App\Controller;

Use App\Model\Aluno;
use Exception;

final class AlunoContuoller extends Controller 
{
    public static function index() : variant_mod
    {
        parent::isProtected();

        $model = new Aluno();

        try{
            $model->getAllRows();

        } catch(Exeption $e){
            $model -> serError("Ocorreu um erro ao buscat os alunos:");
            $model -> setError($e ->getMessage());
        }

        parent::render("Aluno/lista_aluno.php", $model);

    }

    public static function cadastro() : void 
    {
        parent::isProtected();

        $model = new Aluno();
        
        try
        {
            if(parent::isPost())
            {
                $model-> id = !empty($_POST["id"]) ? $_POST["id"] : null;
                $model-> Nome = $_POST["nome"];
                $model-> RA = $_POST["ra"];
                $model->Curso = $_POST["curso"];
                $model-> save();

                parent::redirect("/aluno");

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

        parent::render("Aluno/form_aluno.php", $model);
    }

    public static function delet() : void
    {
        parent::isProtected();

        $model = new Aluno();

        try
        {
            $model-> delete( (int) $_GET["id"]);
            parent::redirect("/aluno");
        

        }catch(Exception $e)
        {
            $model -> serError("Ocorreu um erro ao buscat os alunos:");
            $model -> setError($e ->getMessage());

        }

        parent::render('Aluno/lista_aluno.php', $model);
    }

}

?>
