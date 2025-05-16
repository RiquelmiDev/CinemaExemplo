<?php
require_once 'Conexao.php';

class Atualizacao
{
  private $db;

  public function __construct()
  {
    try {
      // Conexão com o banco de dados
      $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db->exec("set names 'utf8'");
    } catch (PDOException $e) {
      // Tratamento de erro
      echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }
  }

  //... metodos de atualizacao
}