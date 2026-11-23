<?php
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['Utilizador'])) {
    include 'conecta.php'; // Inclui a conexão com o banco de dados

    $idUtilizador = $_SESSION['Utilizador'];

    // Captura os dados enviados via POST
    if (isset($_POST['nome_pessoa']) && isset($_POST['email_pessoa']) && isset($_POST['data_nascimento_pessoa'])) {
        $nome = $_POST['nome_pessoa'];
        $email = $_POST['email_pessoa'];
        $dataNascimento = $_POST['data_nascimento_pessoa'];

        // Atualiza os dados do perfil na base de dados
        $sql = "UPDATE utilizadores SET Nome = ?, Email = ?, Data_Nasc = ? WHERE ID_Utilizador = ?";
        if ($stmt = $bd->prepare($sql)) {
            $stmt->bind_param("sssi", $nome, $email, $dataNascimento, $idUtilizador);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
