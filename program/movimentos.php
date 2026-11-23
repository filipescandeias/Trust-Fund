<<<<<<< HEAD
<<<<<<< HEAD
<!-- Conteúdo principal -->
<div class="content flex-grow-1 p-4">
<<<<<<< HEAD
<<<<<<< HEAD
    <div class="card mb-5 shadow" style="background-color: #284b63;">
        <div class="card-body d-flex justify-content-between align-items-center">
            <!-- Saldo à esquerda, texto em negrito e branco -->
            <span class="font-weight-bold text-white">12.00€</span>
=======
<div class="content py-4">
>>>>>>> c93c067 (Teste)

<<<<<<< HEAD
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust Fund</title>
    <link rel="icon" href="images/LOGO-PNG-2.png" type="image/x-icon">
    <!-- Link para o CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <?php
    include("php/conecta.php");
    ?>
</head>

<body>
    <!-- Conteúdo principal -->
    <div class="content flex-grow-1 p-4">
        <div class="card mb-5 shadow" style="background-color: #284b63;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <!-- Saldo à esquerda, texto em negrito e branco -->
                <span class="font-weight-bold text-white">12.00€</span>

                <!-- Link do perfil à direita com o ícone -->
                <span class="font-weight-bold text-white">
                    Daniel Morais
                    <img src="images/perfil.png" class="ms-2" alt="Perfil">
                </span>
            </div>
=======
    <div class="card mb-5 shadow" style="background-color: #353535;">
=======
    <div class="card mb-5 shadow" style="background-color: #526d82;">
>>>>>>> 79f750a (Página Home começada)
        <div class="card-body d-flex justify-content-between align-items-center">
            <!-- Saldo à esquerda, texto em negrito e branco -->
            <span class="font-weight-bold text-white">12.00€</span>
>>>>>>> a64ff7c (Falta apenas corrigir o dropdown menu quando a pagina é redimensionada)

            <!-- Link do perfil à direita com o ícone -->
            <span class="font-weight-bold text-white">
                Daniel Morais
                <img src="images/perfil.png" class="ms-2" alt="Perfil">
=======
<div class="container py-4">
    <?php
    if (isset($_SESSION['erro_mov'])) {
        if ($_SESSION['erro_mov'] == 0) {
        } else {
    ?>
            <div class="alert alert-danger position-fixed bottom-0 end-0 m-3 d-flex align-items-center" role="alert" id="alertMessage" style="z-index: 1100;">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-3"></i>
                <span>
                    <?php
                    switch ($_SESSION['erro_mov']) {
                        case 1:
                            echo "Um dos campos do formulário está vazio!";
                            break;
                        case 2:
                            echo "Título de movimento demasiado grande!";
                            break;
                        case 3:
                            echo "Valor do montante inválido!";
                            break;
                        case 4:
                            $query = "SELECT data_conta FROM dados_pessoais WHERE ID_Utilizador = ?";
                            $stmt = $bd->prepare($query);
                            $stmt->bind_param("i", $idUtilizador);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $dataLimiteMin = $row['data_conta'];
                            }
                            echo "A data deve estar entre " . htmlspecialchars($dataLimiteMin ?? '') . " e " . date('d/m/Y');
                            break;
                        case 5:
                            echo "Descrição de movimento demasiado grande!";
                            break;
                        case 6:
                            echo "Saldo insuficiente para realizar esta saida!";
                            break;
                        case 99:
                            echo "Erro desconhecido!";
                            break;
                    }
                    ?>
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }
    ?>



    <!-- Saldo e Perfil -->
    <div class="card mb-5 border-0 shadow">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
            <!-- Saldo à esquerda -->
            <span class="font-weight-bold fs-4">
                <?php
                if (isset($_SESSION['Utilizador'])) {
                    $idUtilizador = $_SESSION['Utilizador'];

                    $sql = "SELECT saldo FROM dados_pessoais WHERE ID_Utilizador = ?";
                    $stmt = $bd->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param("i", $idUtilizador);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $saldoUtilizador = $row['saldo'];

                            echo htmlspecialchars($saldoUtilizador) . "€";
                        } else {
                            echo "Falha a achar o saldo.";
                        }
                        $stmt->close();
                    } else {
                        echo "Erro ao preparar a consulta: " . $bd->error;
                    }
                } else {
                    echo "Sessão não definida. Por favor, faça login.";
                }
                ?>
            </span>

            <!-- Perfil à direita -->
            <span class="font-weight-bold d-flex align-items-center mt-2 mt-md-0">
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
                }
                ?>
>>>>>>> 313837c (Começo de colocação de php nas páginas)
            </span>
        </div>
    </div>

    <!-- Formulário Adicionar Movimento -->
    <div class="card border-0 shadow">
        <div class="card-header">
        <h4 class="card-title">Adicionar Movimento</h4>
        </div>
        <div class="card-body">
            <form action="php/movimento_add.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inputTitleM" class="form-label">Título</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputTitleM"
                            name="inputTitleM"
                            aria-describedby="Titulo"
                            value="<?php echo isset($_SESSION['moves_data']['titulo']) ? htmlspecialchars($_SESSION['moves_data']['titulo'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                        <div id="emailHelp" class="form-text">Identificador de Movimento</div>
                    </div>
                    <div class="col-md-6">
                        <label for="montante" class="form-label">Montante</label>
                        <input
                            type="number"
                            class="form-control"
                            name="inputMontanteM"
                            id="inputMontanteM"
                            value="<?php echo isset($_SESSION['moves_data']['montante']) ? htmlspecialchars($_SESSION['moves_data']['montante'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                    </div>
                    <script>
                        document.getElementById('inputMontanteM').addEventListener('input', function(e) {
                            let input = e.target;
                            let value = input.value;
                            if (value.includes('-')) {
                                value = value.replace(/-/g, '');
                            }
                            input.value = value;
                        });
                    </script>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="inputDateM" class="form-label">Data</label>
                        <input
                            type="date"
                            class="form-control"
                            name="inputDateM"
                            id="inputDateM"
                            value="<?php echo isset($_SESSION['moves_data']['data']) ? htmlspecialchars($_SESSION['moves_data']['data'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="inputDescriptionM" class="form-label">Descrição</label>
                        <textarea
                            class="form-control"
                            name="inputDescriptionM"
                            id="inputDescriptionM"
                            rows="5"
                            style="resize: none;"
                            aria-describedby="Descrição"><?php echo isset($_SESSION['moves_data']['descricao']) ? htmlspecialchars($_SESSION['moves_data']['descricao'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="inputCategoriaM" class="form-label">Categoria</label><br>
                        <div class="d-flex flex-wrap gap-2">
                            <?php
                            $sql = "SELECT * FROM categorias";
                            $result = $bd->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $idCategoria = $row['ID_Categoria'];
                                    $nome = $row['Nome'];
                                    $descricao = $row['Descricao'];
                                    $imagem = htmlspecialchars_decode($row['Imagem']);
                                    $cor = $row['Cor'];
                                    $checked = isset($_SESSION['moves_data']['idCategoria']) && $_SESSION['moves_data']['idCategoria'] == $idCategoria ? 'checked' : '';

                                    echo "<div class='categoria-radio-wrapper'>
                                <input type='radio' class='categoria-radio-button' value='$idCategoria' name='categoria' id='categoria$idCategoria' autocomplete='off' $checked>
                                <label 
                                    for='categoria$idCategoria' 
                                    class='categoria-radio-label' 
                                    style='background-color: $cor; padding: 10px; border-radius: 5px;' 
                                    title='$nome - $descricao'>
                                    <span class='categoria-icon'>$imagem</span>
                                </label>
                              </div>";
                                }
                            } else {
                                echo "<p class='text-muted'>Sem categorias disponíveis</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-center gap-3">
                        <input type="radio" class="btn-check" value="+" name="tipoMovimento" id="inputEntrada" autocomplete="off"
                            <?php echo isset($_SESSION['moves_data']['tipoMovimento']) && $_SESSION['moves_data']['tipoMovimento'] == '+' ? 'checked' : ''; ?>>
                        <label class="btn btn-secondary" for="inputEntrada">Entrada</label>

                        <input type="radio" class="btn-check" value="-" name="tipoMovimento" id="inputSaida" autocomplete="off"
                            <?php echo isset($_SESSION['moves_data']['tipoMovimento']) && $_SESSION['moves_data']['tipoMovimento'] == '-' ? 'checked' : ''; ?>>
                        <label class="btn btn-secondary" for="inputSaida">Saída</label>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5 py-2" style="background-color: #353535; border: none;">Submeter</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
<<<<<<< HEAD
<<<<<<< HEAD
    <script src="js/script.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
=======
            <!-- Link do perfil à direita com o ícone -->
            <span class="font-weight-bold text-white">
                Daniel Morais
                <img src="images/perfil.png" class="ms-2" alt="Perfil">
            </span>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-white" style="background-color: #284b63;">
            Adicionar Movimento
        </div>
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col">
                        <label for="inputTitleM" class="form-label">Título</label>
                        <input type="text" class="form-control" id="inputTitleM" aria-describedby="Titulo">
                        <div id="emailHelp" class="form-text">Identificador de Movimento</div>
                    </div>
                    <div class="col">
                        <label for="montante" class="form-label">Montante</label>
                        <input type="number" class="form-control" id="inputMontanteM">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="inputDateM" class="form-label">Data</label>
                        <input type="date" class="form-control" id="inputDateM" aria-describedby="Data">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="inputDescriptionM" class="form-label">Descrição</label>
                        <textarea class="form-control" id="inputDescriptionM" rows="7" style="resize: none;" aria-describedby="Descrição"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="d-flex justify-content-center gap-3">
                        <input type="radio" class="btn-check" name="options" id="inputEntrada" autocomplete="off" checked>
                        <label class="btn btn-secondary" for="inputEntrada">Entrada</label>
>>>>>>> ee25f13 (Dropdown a funcionar)

                        <input type="radio" class="btn-check" name="options" id="inputSaida" autocomplete="off">
                        <label class="btn btn-secondary" for="inputSaida">Saída</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" style="background-color: #353535; border: none;">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
=======
>>>>>>> a64ff7c (Falta apenas corrigir o dropdown menu quando a pagina é redimensionada)
=======

>>>>>>> 313837c (Começo de colocação de php nas páginas)
</div>