<?php
session_start();
require_once '../../Classes/Insercao.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // faz um hashing da senha ou seja criptografa para armazenar no banco
$phone = $_POST['phone'] ?? null;
$cpf = $_POST['cpf'] ?? null;

$insere = new Insercao(); // Instancia a classe Insercao

//Chama o método inserirUsuario da classe Insercao
$resultado = $insere->inserirUsuario($name, $email, $password, $phone, $cpf);

if (is_string($resultado)) {
    // Se for uma string, exibe a mensagem de erro
    echo $resultado;
} else {
    // Se o cadastro for bem-sucedido, busca o usuário recém-cadastrado
    require_once '../../Classes/Selecao.php';
    $selecao = new Selecao();
    $usuario = $selecao->buscarUsuarioPorEmail($email);

    if ($usuario) {
        // Armazena os dados mínimos do usuário na sessão
        $_SESSION['user'] = [
            'id' => $usuario['id'],
            'name' => $usuario['name'],
            'role' => $usuario['role']
        ];

        // Redireciona para a página inicial logado
        header("Location: ../../../index.php");
        exit;
    } else {
        echo "Erro ao buscar usuário após cadastro.";
    }
}