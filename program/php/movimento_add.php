<?php

session_start();

include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idUtilizador = $_SESSION['Utilizador'];

    $titulo = trim($_POST['inputTitleM']);
    $montante = floatval($_POST['inputMontanteM']);
    $data = $_POST['inputDateM'];
    $descricao = trim($_POST['inputDescriptionM']);
    $idCategoria = intval($_POST['categoria']);
    $tipoMovimento = $_POST['tipoMovimento'];

    $_SESSION['moves_data'] = [
        'titulo' => $titulo,
        'montante' => $montante,
        'data' => $data,
        'descricao' => $descricao,
        'idCategoria' => $idCategoria,
        'tipoMovimento' => $tipoMovimento,
    ];

    if (empty($titulo) || empty($montante) || empty($data) || empty($descricao) || empty($idCategoria) || empty($tipoMovimento)) {
        $_SESSION['erro_mov'] = 1;
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if (strlen($titulo) > 350) {
        $_SESSION['erro_mov'] = 2;
        $_SESSION['form_data']['titulo'] = '';
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if ($montante <= 0) {
        $_SESSION['erro_mov'] = 3;
        $_SESSION['moves_data']['montante'] = '';
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    $dataAtual = date('Y-m-d');

    $query = "SELECT data_conta FROM dados_pessoais WHERE ID_Utilizador = ?";
    $stmt = $bd->prepare($query);
    $stmt->bind_param("i", $idUtilizador);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dataLimiteMin = $row['data_conta'];
    } else {
        $_SESSION['erro_mov'] = 99;
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if ($data > $dataAtual || $data < $dataLimiteMin) {
        $_SESSION['erro_mov'] = 4;
        $_SESSION['moves_data']['data'] = '';
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if (strlen($descricao) > 1000) {
        $_SESSION['erro_mov'] = 5;
        $_SESSION['form_data']['descricao'] = '';
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if ($tipoMovimento == '-') {
        $query = "SELECT saldo FROM dados_pessoais WHERE ID_Utilizador = ?";

        $stmt = $bd->prepare($query);
        if ($stmt === false) {
            $_SESSION['erro_mov'] = 99;
            header('Location: ../index.php?page=movimentos');
            exit();
        }

        $stmt->bind_param("i", $idUtilizador);

        $stmt->execute();

        $stmt->bind_result($saldo);
        $stmt->fetch();

        $stmt->close();

        if ($saldo < $montante) {
            $_SESSION['erro_mov'] = 6;
            $_SESSION['moves_data']['montante'] = '';
            header('Location: ../index.php?page=movimentos');
            exit();
        }

        $montante = -abs($montante);
    } else {
        $montante = abs($montante);
    }

    $query = "INSERT INTO transacoes (ID_Utilizador, ID_Categoria, Nome, Descricao, Montante, Data) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $bd->prepare($query);
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $bd->error);
    }

    $stmt->bind_param("iissds", $idUtilizador, $idCategoria, $titulo, $descricao, $montante, $data);

    // Executar a consulta
    if ($stmt->execute()) {

        if ($montante > 0) {
            $querySaldo = "UPDATE dados_pessoais SET saldo = saldo + ? WHERE ID_Utilizador = ?";
        } else {
            $querySaldo = "UPDATE dados_pessoais SET saldo = saldo + ? WHERE ID_Utilizador = ?";
        }

        $stmtSaldo = $bd->prepare($querySaldo);
        if ($stmtSaldo === false) {
            die('Erro ao preparar a consulta de atualização de saldo: ' . $bd->error);
        }

        $stmtSaldo->bind_param("di", $montante, $idUtilizador);

        if ($stmtSaldo->execute()) {
            unset($_SESSION['moves_data'], $_SESSION['erro_mov']);
            header('Location: ../index.php?page=home');
            exit();
        } else {
            $_SESSION['erro_mov'] = 99;
            header('Location: ../index.php?page=movimentos');
            exit();
        }

        $stmtSaldo->close();
    } else {
        $_SESSION['erro_mov'] = 99;
        header('Location: ../index.php?page=movimentos');
        exit();
    }
    $stmt->close();
} else {
    echo "Método de requisição inválido.";
}
