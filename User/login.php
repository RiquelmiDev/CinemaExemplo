<?php
// Inicia a sessão que contem informações sobre o usuário etc
session_start();
// Verifica se existe uma mensagem de erro de login na sessão
// Se existir, exibe a mensagem e a remove da sessão
if (isset($_SESSION['erro_login'])) {
    echo "<p style='color:red'>" . $_SESSION['erro_login'] . "</p>";
    unset($_SESSION['erro_login']);
}

// Isso server para dar um feedback ao usuário que sua senha ou email estão errados
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="../src/Controllers/user/loginController.php">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>