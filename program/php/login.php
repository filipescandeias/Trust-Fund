<?php
session_start();  // Inicia a sessão

include 'conecta.php'; // Conexão com o banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se o email e a senha foram preenchidos
    if (empty($email) || empty($password)) {
        header("Location: ../../Principal Page/PaginaDeLogin.php?error=emptyfields");
        exit();
    }

    // Verifica se o email existe na tabela utilizadores
    $sql = "SELECT ID_Utilizador, Password FROM utilizadores WHERE email = ?";
    if ($stmt = $bd->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Verifica se o email foi encontrado
        if ($stmt->num_rows == 1) {
            // A senha está correta, então verifica o ID e a senha
            $stmt->bind_result($utilizador_id, $stored_password);
            $stmt->fetch();

            // Verifica se a senha fornecida é correta com a senha armazenada no banco
            if ($password === $stored_password) {
                // Guarda o ID do utilizador na sessão
                $_SESSION['Utilizador'] = $utilizador_id;

                // Verifica se o usuário tem dados pessoais
                $sql = "SELECT * FROM dados_pessoais WHERE ID_Utilizador = ?";
                if ($stmt = $bd->prepare($sql)) {
                    $stmt->bind_param("i", $utilizador_id);
                    $stmt->execute();
                    $stmt->store_result();

                    // Se encontrar dados pessoais, redireciona para a página principal
                    if ($stmt->num_rows > 0) {
                        header("Location: ../index.php"); // Redireciona para a página principal
                    } else {
                        header("Location: ../completar_perfil.php"); // Redireciona para completar o perfil
                    }
                    exit();
                }
            } else {
                // Senha incorreta
                header("Location: ../../Principal Page/PaginaDeLogin.php?error=incorrectpassword");
                exit();
            }
        } else {
            // Email não encontrado
            header("Location: ../../Principal Page/PaginaDeLogin.php?error=nouser");
            exit();
        }
    } else {
        // Erro ao preparar a consulta
        header("Location: ../../Principal Page/PaginaDeLogin.php?error=sqlerror");
        exit();
    }
}
