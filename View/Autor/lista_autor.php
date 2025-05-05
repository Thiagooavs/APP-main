<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca - Centro Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <a href="/autor/cadastro">Novo Autor</a>

        <?= $model->getErrors() ?>

        <h1>Lista de Autores</h1>
        
        <table>
            <thred>
              <tr>
                <th class="col"> id </th>
                <th class="col"> Nome </th>
                <th class="col"> Data_Nacimento</th>
                <th class="col"> CPF</th>
              </tr>
            </thred>
            <tbody> 
            <?php foreach($model->rows as $aluno): ?>
                <tr>
                    <td> <?= $autor->Id ?> </td>
                    <td> <a href="/aluno/cadastro?id=<?= $aluno->Id ?>"><?= $aluno->Nome ?></a> </td>
                    <td> <?= $aluno->Curso ?> </td>
                    <td> <a href="/aluno/delete?id=<?= $aluno->Id ?>">Remover</a> </td>
                </tr>
                <?php endforeach ?>
            </tbody>
            

        </table>    


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>