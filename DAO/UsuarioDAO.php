<?php 
    
    namespace App\DAO;

    use App\Model\Usuario;

    final class UsuarioDAO extends DAO
    {

        public function __construct() 
        {
            parent :: __construct();
        }

        public function save( Usuario $model) : Usuario
        {
            return ($model -> Id == null) ? this -> insert($model) :
            this -> update($model);    
        }

        public function insert(Usuario $model) : Usuario 
        {
            $sql = "INSERT INTO usuarios (nome , email, senha) values (?,?,?) ";
            $smt = parent :: $conexao -> prepare($smt);

            $smt -> bindValue(1, $model -> nome);
            $smt -> bindValue(2, $model -> email);
            $smt -> bindValue(3, $model -> senha);

            $stmt->execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        public function update( Usuario $model) : Usuario
        {
            $sql = "UPDATE TABLE usuarios SET nome = ? , email = ?, senha = ? WHERE id = ?";

            $smt = parent :: $conexao -> prepare($sql);

            $smt -> bindValue(1, $model -> nome);
            $smt -> bindValue(2, $model -> email);
            $smt -> bindValue(3, $model -> senha);
            $smt -> bindValue(4, $model -> id);

            $stmt->execute();           

            return $model;
        }

        public function selectById (Usuario $model) : Usuario 
        {
            $sql = "SELECT * FROM usuarios WHERE id = ?";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $model->RA);
            $stmt->bindValue(3, $model->Curso);
            $stmt->bindValue(4, $model->Id);

            $stmt->execute();

            return $model;
        }

    }





?>