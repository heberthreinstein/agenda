<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Gravado com sucesso</title>
  </head>
  <body>

      <?php
        include_once '../database/database.php';
        include_once '../models/contato.php';



        $database = new Database();
        $db = $database->conectar();

        $contato = new Contato($db);

        $contato->nome = $_POST['nome'];
        $contato->telefone = $_POST['telefone'];
        $contato->email = $_POST['email'];
        $contato->cidade = $_POST['cidade'];
        if ($_POST['estado'] == null) {
          $contato->idestado = null;
        }else{
        $contato->idestado = $_POST['estado'];
        }

        $contato->informacao = $_POST['informacao'];

        if ($_POST['categoria'] == null) {
          $contato->idcategoria = null;
        }else{
        $contato->idcategoria = $_POST['categoria'];
        }


        $contato->gravar();
        ?>
        <br>
        <div class="row d-flex justify-content-center" style="margin-top:200px;">
          <h3>Gravado com sucesso!</h3>
          <br>
          <br>
          <br>
        </div>
        <div class="row d-flex justify-content-center">
          <a href="../">
          <button class="btn btn-success" type="button" name="button">Voltar para o Inicio</button>
          </a>
          <a href="../view/cadastro.php">
          <button class="btn btn-secondary" type="button" name="button">Cadastrar Outro Contato</button>
          </a>
        </div>

  </body>
</html>
