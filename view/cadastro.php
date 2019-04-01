<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <style media="screen">
    *{
      padding:2px;
    }
    nav{

      font-size: 20px;
      background:lightgray
    }

    </style>
    <title>Novo Contato</title>
  </head>
  <body>
    <nav class="navbar">



    <a href="../">
    <i class="icon-arrow-left" style="color: white;"></i>
    </a>
    <h5 class="mx-auto">Novo Contato</h5>



    </nav>
    <?php
      include_once '../database/database.php';
      include_once '../models/estado.php';
      include_once '../models/categoria.php';

      $database = new Database();
      $db = $database->conectar();

      $estado = new Estado($db);
      $resultadoEstado = $estado->busca();

      $estados_array['estados'] = array();

      while($row = $resultadoEstado->fetch(PDO::FETCH_ASSOC)) {
      extract($row);


      $estado_item = array(
        'id' => $idestado,
        'estado' => $estado,
        'sigla' => $sigla,
      );

      array_push($estados_array, $estado_item);
    }

    $categoria = new Categoria($db);
    $resultadoCategoria = $categoria->busca();

    $categorias_array['categorias'] = array();

    while($row = $resultadoCategoria->fetch(PDO::FETCH_ASSOC)) {
    extract($row);


    $categoria_item = array(
      'id' => $idcategoria,
      'descricao' => $descricao,

    );

    array_push($categorias_array, $categoria_item);
  }
    ?>

    <div class="row" style="">

    </div>

    <form class="" action="gravar.php" method="post">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" >
      </div>
      <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" >
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" >
      </div>
        <div class="form-row">
          <div class="form-group col-md-10">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control" >
          </div>
          <div class="form-group col-md-2">
            <label>Estado</label>
            <select name="estado" class="form-control" >

                <?php
                foreach($estados_array as $key => $value):
                echo '<option value="'.$value['id'].'">'.$value['sigla'].'</option>';
                endforeach;
                ?>

            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Informação</label>
          <textarea name="informacao" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Categoria</label>
          <select name="categoria" class="form-control" >
            <?php
            foreach($categorias_array as $key => $value):
            echo '<option value="'.$value['id'].'">'.$value['descricao'].'</option>';
            endforeach;
            ?>
          </select>
        </div>
        <div class="form-row d-flex justify-content-center">

          <button type="submit" class="btn btn-success btn-lg">Gravar</button>

          <button type="reset" class="btn btn-secondary btn-lg">Limpar</button>
        </div>
      </div>
    </form>




  </body>
</html>
