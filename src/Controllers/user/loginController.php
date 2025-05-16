<?php
session_start();
require_once '../../Classes/Selecao.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validação básica
if (empty($email) || empty($password)) {
    $_SESSION['erro_login'] = "Preencha todos os campos.";
    header("Location: ../../Views/login.php");
    exit;
}

$selecao = new Selecao(); // Instancia a classe corretamente

// Chama o método validarLogin
// Se o retorno desse metodo for verdadeiro, significa que o login foi bem-sucedido
if ($selecao->validarLogin($email, $password)) {

    // Redireciona para a página inicial após login bem-sucedido
    header("Location: ../../../index.php");
    exit;
} else {
    // Define mensagem de erro na sessão e redireciona para o login novamente
    $_SESSION['erro_login'] = "Email ou senha inválidos.";
    header("Location: ../../User/login.php");
    exit;
}