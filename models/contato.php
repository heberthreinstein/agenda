<?php

  Class Contato{
    public $id;
    public $telefone;
    public $email;
    public $cidade;
    public $estado;
    public $informacao;
    public $categoria;
    public $conexao;

    public function __construct($db) {
      $this->conexao = $db;
    }

    public function busca(){

      $query = 'SELECT * FROM contato AS c LEFT OUTER JOIN  estado as e ON c.idestado = e.idestado LEFT OUTER JOIN categoria as ct ON c.idcategoria = ct.idcategoria;';

      $stmt = $this->conexao->prepare($query);
      $stmt->execute();

      return $stmt;
    }

    public function gravar(){

      $query = 'INSERT INTO contato(nome,telefone,email,cidade,idestado,informacao,idcategoria) VALUES (?,?,?,?,?,?,?)';

      $stmt = $this->conexao->prepare($query);

      $stmt->bindParam(1, $this->nome);
      $stmt->bindParam(2, $this->telefone);
      $stmt->bindParam(3, $this->email);
      $stmt->bindParam(4, $this->cidade);
      $stmt->bindParam(5, $this->idestado);
      $stmt->bindParam(6, $this->informacao);
      $stmt->bindParam(7, $this->idcategoria);


      $stmt->execute();
    }


  }

 ?>
