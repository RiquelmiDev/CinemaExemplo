<?php
// Inicia a sessão atual (ou recupera uma existente)
session_start();

// Destroi todas as variáveis de sessão e encerra a sessão
session_destroy();

// Redireciona o usuário para a página de login
header('Location: ../../../index.php');

// Encerra o script imediatamente para evitar qualquer processamento adicional
exit;