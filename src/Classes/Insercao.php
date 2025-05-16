<?php 

// Chama o arquivo onde toda config do banco de dados como host, usuario, senha e nome do banco estão
require_once 'Conexao.php';

// OBS: o nome da classe Insercao é o mesmo nome do arquivo
class Insercao
{
    // Atributo privado para armazenar a conexão com o banco de dados
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

    // Método para inserir um novo usuário no banco de dados
    // Recebe os parâmetros necessários para a inserção
    // OBS: garanta que os nomes dos campos no banco de dados sejam os mesmos que os passados como parâmetro se não da merda

    function inserirUsuario($name,$email,$password,$phone,$cpf
    ){
        try {
            // Verifica se a conexão com o banco de dados foi estabelecida
            // Se não houver conexão, lança uma exceção
            if (!$this->db) {
              throw new Exception("Falha na conexão com o banco de dados.");
            }
            
            // Prepara a instrução SQL para inserir os dados do usuário
            // Utiliza transações para garantir a integridade dos dados
            $this->db->beginTransaction();

            // Verifica se o email já existe no banco de dados
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return "Email já cadastrado";
            }
            
            // Verifica se o CPF já existe no banco de dados
            $stmt = $this->db->prepare("SELECT * FROM users WHERE cpf = :cpf");
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return "CPF já cadastrado";
            }

            // Prepara a instrução SQL para inserir os dados do usuário
            $stmt = $this->db->prepare("INSERT INTO users (name, email, password, phone, cpf) VALUES (:name, :email, :password, :phone, :cpf)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':cpf', $cpf);
      
            $stmt->execute();
    
            $this->db->commit();
      
            return true; // Retorna verdadeiro se a inserção for bem-sucedida
      
      } catch (PDOException $erro) {
            $this->db->rollback();
            return "Erro: " . $erro->getMessage();
      }
    }
}