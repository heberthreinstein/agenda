<?php

  Class Categoria{
    private $id;
    private $descricao;

    private $conexao;

    public function __construct($db) {
      $this->conexao = $db;
    }

    public function busca(){

      $query = 'SELECT idcategoria,descricao FROM categoria';

      $stmt = $this->conexao->prepare($query);
      $stmt->execute();

      return $stmt;

    }

  }

 ?>
