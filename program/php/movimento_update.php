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

    if (empty($titulo) || empty($montante) || empty($data) || empty($descricao) || empty($idCategoria) || empty($tipoMovimento)) {
        $_SESSION['erro_mov'] = 1;
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if (strlen($titulo) > 350) {
        $_SESSION['erro_mov'] = 2;
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if ($montante <= 0) {
        $_SESSION['erro_mov'] = 3;
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
        header('Location: ../index.php?page=movimentos');
        exit();
    }

    if (strlen($descricao) > 1000) {
        $_SESSION['erro_mov'] = 5;
        header('Location: ../index.php?page=movimentos');
        exit();
    }

} else {
    echo "Método de requisição inválido.";
}