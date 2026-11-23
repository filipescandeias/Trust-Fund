<?php
session_start();
include 'conecta.php'; // Inclua o arquivo de conexão com o banco de dados

// Verifique se o usuário está logado
if (!isset($_SESSION['Utilizador'])) {
    header("Location: ../login.php"); // Redireciona o usuário para o login se não estiver logado
    exit();
}

$utilizador_id = $_SESSION['Utilizador'];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $accountDate = $_POST['accountDate'];
    $initialBalance = $_POST['initialBalance'];

    // Verifica se a data da conta é válida
    // Recupera a data de nascimento do usuário
    $sql = "SELECT Data_Nasc FROM utilizadores WHERE ID_Utilizador = ?";
    if ($stmt = $bd->prepare($sql)) {
        $stmt->bind_param("i", $utilizador_id);
        $stmt->execute();
        $stmt->bind_result($dataNascimento);
        $stmt->fetch();
        $stmt->close();

        // Converte a data de nascimento para o formato yyyy-mm-dd
        $dataNascimentoObj = new DateTime($dataNascimento);
        $dataNascimentoFormatted = $dataNascimentoObj->format('Y-m-d');
        $dataContaObj = new DateTime($accountDate);

        // Calcula a idade do usuário com base na data de nascimento
        $idade = $dataNascimentoObj->diff($dataContaObj)->y;

        // Verifica se a idade é maior ou igual a 18 anos
        if ($idade < 18) {
            header("Location: ../completar_perfil.php?error=idade_invalida");
            exit();
        }

        // Insere os dados na tabela dados_pessoais
        $sql = "INSERT INTO dados_pessoais (ID_Utilizador, saldo, data_conta) VALUES (?, ?, ?)";
        if ($stmt = $bd->prepare($sql)) {
            $stmt->bind_param("iis", $utilizador_id, $initialBalance, $accountDate);
            if ($stmt->execute()) {
                header("Location: ../index.php?success=perfil_completado");
                exit();
            } else {
                header("Location: ../completar_perfil.php?error=erro_completar");
                exit();
            }
            $stmt->close();
        } else {
            header("Location: ../completar_perfil.php?error=erro_preparar_consulta");
            exit();
        }
    } else {
        header("Location: ../completar_perfil.php?error=erro_data_nascimento");
        exit();
    }
}
?>
