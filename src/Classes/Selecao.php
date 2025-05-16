<?php
require_once 'Conexao.php';

class Selecao
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

  public function validarLogin($email, $password)
  {
    try {
      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email AND is_active = 1");
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($password, $user['password'])) {
        // Armazenar os dados do usuário na sessão, se desejar
        $_SESSION['user'] = [
          'id' => $user['id'],
          'name' => $user['name'],
          'role' => $user['role']
        ];
        return true;
      }

      return false;

    } catch (PDOException $e) {
      // Log do erro em produção em vez de mostrar na tela
      error_log("Erro no login: " . $e->getMessage());
      return false;
    }
  }

  public function buscarUsuarioPorEmail($email)
  {
    try {
      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      // Log do erro em produção em vez de mostrar na tela
      error_log("Erro ao buscar usuário: " . $e->getMessage());
      return false;
    }
  }
}
