<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/css.css">
      <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <title>Agenda</title>
  </head>
  <body>


    <?php
      include_once 'database/database.php';
      include_once 'models/contato.php';

      $database = new Database();
      $db = $database->conectar();

      $contato = new Contato($db);

      $result = $contato->busca();

      $num = $result->rowCount();

      $contatos_arr['contatos'] = array();

      if($num > 0) {



        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);



          $contato_item = array(
              'idcontato' => $idcontato,
              'nome' => $nome,
              'telefone' => $telefone,
              'email' => $email,
              'cidade' => $cidade,
              'estado' => $estado,
              'informacao' => $informacao,
              'categoria' => $descricao,

            );

         array_push($contatos_arr['contatos'], $contato_item);
      }
    }
     ?>

     <div class="row d-flex justify-content-center" style="background:lightgray;">
     <h3>Agenda</h3>

    </div>



     <?php

      foreach ($contatos_arr['contatos'] as $key => $value): ?>
       <div class="container-fluid mx-auto" >


                <div class="row d-flex justify-content-center">



                  <h4 class=""><?php echo $value['nome'] ?></h4>

              </div>
                  <div class="row d-flex justify-content-center">

                      <?php echo $value['telefone'] ?>

                  </div>
                  <div class="row d-flex justify-content-center">



                      <?php echo $value['email'] ?>

                  </div>
                  <div class="row d-flex justify-content-center">

                  <?php echo $value['categoria'] ?>

                  </div>
                  <div class="row d-flex justify-content-center">

                  <?php echo $value['cidade'] ?>

                  <?php echo $value['estado'] ?>

                  </div>
                  </div>
                  <div class="row d-flex justify-content-center">

                  <p><?php echo $value['informacao'] ?></p>

                  </div>



       </div>
       <hr>

<?php

      endforeach; ?>
      <a href="view/cadastro.php" class="float ">

      <h1 class="align-middle">+</h1>
      </a>
  </body>
</html>
