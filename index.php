<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg Navbar-bg">
        <!-- Container wrapper -->
        <div class="container-fluid" style="margin-left: 100px; margin-right: 100px;">
            <!-- Navbar brand -->

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="icone-opcoes-nav fa-solid fa-bars-staggered"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="nav-ul collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Filmes.php">Programação</a></li>
                    <li class="nav-item"><a class="nav-link" href="./myList.php">Sla</a></li>
                </ul>

                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </button>
                    <ul class="dropdown-menu">

                        <!-- Se o usuario estiver logado ele mostra esses campos -->
                        <?php if (isset($_SESSION['user'])) { ?>

                            <li class="text-left p-3">Olá,
                                <?php echo $_SESSION['user']['name']; ?>
                            </li>

                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-regular fa-user"></i> Meus Ingressos</a>
                            </li>
                        <?php } ?>

                        <!-- Verifica se o usuário logado é admin -->
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') : ?>
                            <!-- Aqui você pode adicionar as funcionalidades de admin -->
                            <!-- Exemplo de funcionalidades de ADMIN -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-solid fa-user-shield"></i> Admin</a>
                            </li>
                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-solid fa-users"></i> Gerenciar Usuários</a>
                            </li>
                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-solid fa-film"></i> Gerenciar Filmes em Cartaz</a>
                            </li>
                            <li>
                                <a class="dropdown-item menu-item" href="#"><i class="fa-solid fa-star"></i> Gerenciar Sla</a>
                            </li>

                            <?php endif; ?>
                            
                            
                            
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex justify-content-center logout-hover" href="./src/Controllers/user/logout.php">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-center logout-hover" href="./User/register.php">Criar Conta</a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-center logout-hover" href="./User/login.php">Login</a>
                            </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>