<?php
  class Database {
    private $host = 'localhost';
    private $nome = 'agenda';
    private $usuario = 'root';
    private $senha = '';
    private $conexao;

    public function conectar() {
      $this->conexao = null;

      try {
        $this->conexao = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->nome, $this->usuario, $this->senha,array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ));
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Erro na Conexão ' . $e->getMessage();
      }

      return $this->conexao;
    }
  }
?>
