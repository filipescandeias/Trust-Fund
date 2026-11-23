<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust Fund</title>
    <link rel="icon" href="images/LOGO-PNG-2.png" type="image/x-icon">
<<<<<<< HEAD
    <!-- Link para o CSS -->
=======

    <!-- Bootstrap -->
<<<<<<< HEAD
>>>>>>> c93c067 (Teste)
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
=======
    <!-- Link para o CSS -->
=======
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
>>>>>>> 8bdec3a (Mudar de pc)
    <link rel="stylesheet" type="text/css" href="css/style.css">

>>>>>>> c93c067 (Teste)

    <?php
    include("php/conecta.php");

    session_start();

    
    ?>
>>>>>>> 00c56b1 (Detalhe da Conta apontando os gastos em gráficos)
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-offset fixed-top">
        <div class="container-fluid">
            <button class="btn menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <img src="images/menu.png" alt="Menu" class="menu-image">
            </button>

            <div class="collapse navbar-collapse w-100 d-flex justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="dropdown">
                        <a href="#" class="btn profile-link dropdown-toggle d-flex align-items-center" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            
                            <?php
                            if (isset($_SESSION['Utilizador'])) {
                                $idUtilizador = $_SESSION['Utilizador'];

                                $sql = "SELECT Nome, Imagem_Perfil FROM utilizadores WHERE ID_Utilizador = ?";
                                $stmt = $bd->prepare($sql);
                                if ($stmt) {
                                    $stmt->bind_param("i", $idUtilizador);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $nomeUtilizador = $row['Nome'];
                                        echo '<img src="images/'.$row['Imagem_Perfil'].'" alt="Profile" class="profile-image me-2" style="width: 30px; height: 30px; border-radius: 50%;">';
                                        echo htmlspecialchars($nomeUtilizador);
                                    } else {
                                        echo "Nenhum utilizador encontrado.";
                                    }
                                    $stmt->close();
                                } else {
                                    echo "Erro ao preparar a consulta: " . $bd->error;
                                }
                            } else {
                                echo "Sessão não definida. Por favor, faça login.";
                            }
                            ?>
                        </a>
                        <?php $current_page = $_GET['page'] ?? 'home'; ?>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <label class="dropdown-header">
                                    <?php
                                    if (isset($_SESSION['Utilizador'])) {
                                        $idUtilizador = $_SESSION['Utilizador'];

                                        $sql = "SELECT Nome FROM utilizadores WHERE ID_Utilizador = ?";
                                        $stmt = $bd->prepare($sql);
                                        if ($stmt) {
                                            $stmt->bind_param("i", $idUtilizador);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $nomeUtilizador = $row['Nome'];

                                                echo htmlspecialchars($nomeUtilizador);
                                            } else {
                                                echo "Nenhum utilizador encontrado.";
                                            }
                                            $stmt->close();
                                        } else {
                                            echo "Erro ao preparar a consulta: " . $bd->error;
                                        }
                                    } else {
                                        echo "Sessão não definida. Por favor, faça login.";
                                    } ?>
                                </label>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?= $current_page == 'perfil' ? 'active' : '' ?>" href="index.php?page=perfil">Perfil</a></li>
                            <li><a class="dropdown-item" href="php/logout.php">Sair</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Offcanvas no lado esquerdo -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <a href="index.php?page=home" class="header d-flex align-items-center text-decoration-none">
                <img src="images/LOGO-PNG-2.png" alt="Logo" class="logo">
                <h1 class="ms-3 mb-0">Trust Fund</h1>
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php $current_page = $_GET['page'] ?? 'home'; ?>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'home' ? 'active' : '' ?>" href="index.php?page=home">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'movimentos' ? 'active' : '' ?>" href="index.php?page=movimentos">Movimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'analises' ? 'active' : '' ?>" href="index.php?page=analises">Analises</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'objetivos' ? 'active' : '' ?>" href="index.php?page=objetivos">Objetivos</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar bg-light p-3 d-none d-lg-block">
        <a href="index.php?page=home" class="header d-flex align-items-center text-decoration-none mb-3">
            <img src="images/LOGO-PNG-2.png" alt="Logo" class="logo">
            <h1 class="ms-3 mb-0">Trust Fund</h1>
        </a>
        <?php $current_page = $_GET['page'] ?? 'home'; ?>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $current_page == 'home' ? 'active' : '' ?>" href="index.php?page=home">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $current_page == 'movimentos' ? 'active' : '' ?>" href="index.php?page=movimentos">Adicionar movimento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $current_page == 'analises' ? 'active' : '' ?>" href="index.php?page=analises">Analises</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= $current_page == 'objetivos' ? 'active' : '' ?>" href="index.php?page=objetivos">Objetivos</a>
            </li>
        </ul>
    </div>

    <!-- Layout da página -->
    <div class="layout-page d-flex">
        <div class="content flex-grow-1 p-4">
            <?php
            $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) ?? 'home';
            switch ($page) {
                case 'movimentos':
                    $_SESSION['erro_obj'] = 0;
                    include 'movimentos.php';
                    break;
                case 'perfil':
                    $_SESSION['erro_obj'] = 0;
                    $_SESSION['erro_mov'] = 0;
                    include 'perfil.php';
                    break;
                case 'analises':
                    $_SESSION['erro_obj'] = 0;
                    $_SESSION['erro_mov'] = 0;
                    include 'detalhes-conta.php';
                    break;
                case 'objetivos':
                    $_SESSION['erro_obj'] = 0;
                    $_SESSION['erro_mov'] = 0;
                    include 'objetivos.php';
                    break;
                case 'home':
                    $_SESSION['erro_obj'] = 0;
                    $_SESSION['erro_mov'] = 0;
                    include 'home.php';
                    break;
                case 'addobj':
                    $_SESSION['erro_mov'] = 0;
                    include 'addobj.php';
                    break;
                case 'deta_obj':
                    $_SESSION['erro_obj'] = 0;
                    $_SESSION['erro_mov'] = 0;
                    include 'detalhes_objetivo.php';
                    break;
                case 'editar_movimentos':
                    $_SESSION['erro_obj'] = 0;
                    $_SESSION['erro_mov'] = 0;
                    include 'editar_movimentos.php';
                    break;
                default:
                    echo "<h1>Página não encontrada</h1>";
                    break;
            }
            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>