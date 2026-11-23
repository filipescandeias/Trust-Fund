<?php
// Iniciar a sessão
session_start();

// Conectar ao banco de dados
require_once 'conecta.php';

// Função para verificar a idade
function verificarIdade($dataNascimento) {
    $dataAtual = new DateTime();
    $dataNascimento = new DateTime($dataNascimento);
    $idade = $dataAtual->diff($dataNascimento)->y;
    
    return ($idade >= 18 && $idade <= 80);  // Verifica se a idade está entre 18 e 80 anos
}

// Verifica se a data de nascimento é válida
function isDataValida($data) {
    $dataArray = explode('-', $data);
    if (count($dataArray) == 3) {
        $ano = $dataArray[0];
        $mes = $dataArray[1];
        $dia = $dataArray[2];
        return checkdate($mes, $dia, $ano);  // Verifica se a data é válida
    }
    return false;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar os dados do formulário
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $dob = $_POST['dob'];  // Data de nascimento
    $terms = isset($_POST['terms']) ? true : false;

    // Verificação dos campos obrigatórios
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($dob)) {
        header("Location: ../../Principal Page/registrar.php?error=emptyfields&username=$username&email=$email&dob=$dob");
        exit();
    }

    // Verificar se a senha e a confirmação de senha são iguais
    if ($password !== $confirmPassword) {
        header("Location: ../../Principal Page/registrar.php?error=passwordsdonotmatch&username=$username&email=$email&dob=$dob");
        exit();
    }

    // Validar o email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../Principal Page/registrar.php?error=invalidemail&username=$username&email=$email&dob=$dob");
        exit();
    }

    // Validar a data de nascimento
    if (!isDataValida($dob)) {
        header("Location: ../../Principal Page/registrar.php?error=invaliddob&username=$username&email=$email&dob=$dob");
        exit();
    }

    // Verificar a idade
    if (!verificarIdade($dob)) {
        header("Location: ../../Principal Page/registrar.php?error=invalidage&username=$username&email=$email&dob=$dob");
        exit();
    }

    // Verificar se o nome de usuário já existe
    $sql = "SELECT * FROM utilizadores WHERE Nome = ?";
    if ($stmt = $bd->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            header("Location: ../../Principal Page/registrar.php?error=usernametaken&username=$username&email=$email&dob=$dob");
            exit();
        }
    } else {
        echo "Erro ao preparar consulta.";
        exit();
    }



    // Inserir os dados no banco de dados
    $sql = "INSERT INTO utilizadores (Nome, Email, Password, Data_Nasc) VALUES (?, ?, ?, ?)";
    if ($stmt = $bd->prepare($sql)) {
        $stmt->bind_param("ssss", $username, $email, $password, $dob);
        if ($stmt->execute()) {
            // Capturar o ID do usuário recém-criado
            $lastId = $stmt->insert_id; // Obter o ID do último registro inserido
            $_SESSION['success'] = "Usuário registrado com sucesso!";
            $_SESSION['Utilizador'] = $lastId; // Armazenar o ID do usuário na sessão

            // Redirecionar para a página de completar o perfil
            header("Location: ../completar_perfil.php");
            exit();
        } else {
            echo "Erro ao registrar o usuário.";
            exit();
        }
    } else {
        echo "Erro ao preparar consulta.";
        exit();
    }
}
?>
