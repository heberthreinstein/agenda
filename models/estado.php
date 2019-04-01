<?php

  Class Estado{
    private $id;
    private $estado;
    private $sigla;

    private $conexao;
  

    public function __construct($db) {
      $this->conexao = $db;
    }

    public function busca(){

      $query = 'SELECT idestado,estado,sigla FROM estado';

      $stmt = $this->conexao->prepare($query);
      $stmt->execute();

      return $stmt;

    }

  }

 ?>
