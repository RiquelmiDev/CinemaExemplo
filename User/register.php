<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>

<body>
    <form method="POST" action="../src/Controllers/user/newUserController.php">
        <!-- Action do formulário é o arquivo para onde os dados serão enviados ao acionar o evento de submeter o form -->
         <!-- obs... caso o form trabalhe com arquivos como fotos ou pdf etc use o atributo enctype="multipart/form-data" no form -->
        <input type="text" name="name" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <input type="text" name="phone" placeholder="Telefone"><br>
        <input type="text" name="cpf" placeholder="CPF"><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>