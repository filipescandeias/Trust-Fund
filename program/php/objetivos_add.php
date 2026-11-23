<?php

session_start();
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idUtilizador = $_SESSION['Utilizador'];

    $titulo = trim($_POST['inputTitleO']);
    $objetivo = trim($_POST['inputObjetivo']);
    $descricao = trim($_POST['inputDescriptionO']);
    $idCategoria = $_POST['categoria'];
    $montanteInicial = trim($_POST['inputValorInicial']);

    if (empty($montanteInicial) || !is_numeric($montanteInicial)) {
        $montanteInicial = 0;
    }

    $_SESSION['obj_data'] = [
        'titulo' => $titulo,
        'objetivo' => $objetivo,
        'descricao' => $descricao,
        'idCategoria' => $idCategoria,
        'montante' => $montanteInicial,
    ];

    // Verificação de campos obrigatórios
    if (empty($titulo) || empty($objetivo) || empty($descricao) || empty($idCategoria)) {
        $_SESSION['erro_obj'] = 1;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    // Limite de caracteres
    if (strlen($titulo) > 200) {
        $_SESSION['erro_obj'] = 2;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    if (strlen($descricao) > 1500) {
        $_SESSION['erro_obj'] = 3;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    // Montante válido
    if ($montanteInicial < 0) {
        $_SESSION['erro_obj'] = 4;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    if ($montanteInicial >= $objetivo) {
        $_SESSION['erro_obj'] = 5;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    // Verificar objetivo negativo
    if ($objetivo < 0) {
        $_SESSION['erro_obj'] = 6;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    // Verificar saldo disponível
    $query = "SELECT saldo FROM dados_pessoais WHERE ID_Utilizador = ?";
    $stmt = $bd->prepare($query);
    $stmt->bind_param("i", $idUtilizador);
    $stmt->execute();
    $stmt->bind_result($saldo);
    $stmt->fetch();
    $stmt->close();

    if ($saldo < $montanteInicial) {
        $_SESSION['erro_obj'] = 7;
        header('Location: ../index.php?page=addobj');
        exit();
    }

    // Inserir objetivo
    $query = "INSERT INTO objetivos (ID_Utilizador, Nome, Categoria, Montante, Descricao, Progresso) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $bd->prepare($query);
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $bd->error);
    }
    $stmt->bind_param("isidsd", $idUtilizador, $titulo, $idCategoria, $objetivo, $descricao, $montanteInicial);

    if ($stmt->execute()) {

        // Atualizar saldo
        $querySaldo = "UPDATE dados_pessoais SET saldo = saldo - ? WHERE ID_Utilizador = ?";
        $stmtSaldo = $bd->prepare($querySaldo);
        $stmtSaldo->bind_param("di", $montanteInicial, $idUtilizador);

        if ($stmtSaldo->execute()) {

            // Inserir transação
            $querymov = "INSERT INTO transacoes (ID_Utilizador, ID_Categoria, Nome, Descricao, Montante, Data) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtmov = $bd->prepare($querymov);
            if ($stmtmov === false) {
                die('Erro ao preparar a consulta de transação: ' . $bd->error);
            }

            // Data atual
            $dataAtual = date('Y-m-d');
            $texto = "Investimento no objetivo";
            if ($montanteInicial > 0) {
                $montanteInicial = -$montanteInicial;
            }

            $stmtmov->bind_param("iissds", $idUtilizador, $idCategoria, $titulo, $texto, $montanteInicial, $dataAtual);


            if ($stmtmov->execute()) {
                unset($_SESSION['obj_data'], $_SESSION['erro_obj']);
                header('Location: ../index.php?page=objetivos');
                exit();
            } else {
                $_SESSION['erro_obj'] = 99; // Erro na transação
                header('Location: ../index.php?page=addobj');
                exit();
            }
        } else {
            $_SESSION['erro_obj'] = 99; // Erro ao atualizar saldo
            header('Location: ../index.php?page=addobj');
            exit();
        }

        $stmtSaldo->close();
    } else {
        $_SESSION['erro_obj'] = 99; // Erro ao inserir objetivo
        header('Location: ../index.php?page=addobj');
        exit();
    }

    $stmt->close();
} else {
    echo "Método de requisição inválido.";
}
