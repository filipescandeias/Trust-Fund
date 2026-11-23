<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust Fund - Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo geral */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #d0d0d1;
            background-image: url('../principal Page/imagens/Why Financial Acumen Is More Important Than You Think Blog Featured Image (2).jpg');
            background-size: cover;
            /* ou 'contain', dependendo da preferência */
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        .card {
            max-width: 500px;
            width: 90%;
            /* Responsividade para telas menores */
            background-color: rgba(255, 255, 255, 0.8);
            /* Fundo translúcido */
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            /* Sombra para destaque */
            padding: 20px;
            text-align: center;
            /* Centraliza o conteúdo do card */
        }

        .logo {
            width: 150px;
            height: auto;
            /* Ajuste o valor de altura conforme necessário */
            display: block;
            margin: 0 auto 15px auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1);
            /* Efeito de zoom ao passar o mouse */
        }

        .btn-primary {
            background-color: #3c6e71;
            border-color: #3c6e71;
        }

        .btn-primary:hover {
            background-color: #2b545b;
            border-color: #2b545b;
        }
    </style>
</head>

<body>
    <!-- Card centralizado -->
    <div class="card">
        <!-- Logo dentro do card como botão -->
        <a href="index.php">
            <img src="../principal Page/imagens/LOGO-PNG-3.png" alt="Logo" class="logo">
        </a>

        <h2 class="fw-bold mb-4">Crie sua conta</h2>
        <form id="registrationForm" action="../program/php/registro.php" method="post">
            <!-- Exibir alertas de erro -->
            <!-- Exibir alertas de erro -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    if ($_GET['error'] == 'emptyfields') {
                        echo 'Por favor, preencha todos os campos.';
                    } elseif ($_GET['error'] == 'passwordsdonotmatch') {
                        echo 'As palavras-passe não coincidem.';
                    } elseif ($_GET['error'] == 'invalidemail') {
                        echo 'O email fornecido não é válido.';
                    } elseif ($_GET['error'] == 'usernametaken') {
                        echo 'O nome de usuário já está em uso.';
                    } elseif ($_GET['error'] == 'invaliddob') {
                        echo 'A data de nascimento fornecida é inválida.';
                    } elseif ($_GET['error'] == 'invalidage') {
                        echo 'Você deve ter entre 18 e 80 anos.';
                    }
                    ?>
                </div>
            <?php endif; ?>


            <!-- Nome de Usuário -->
            <div class="mb-3">
                <input type="text" id="username" name="username" class="form-control" placeholder="Nome de Usuário" value="<?= isset($_GET['username']) ? $_GET['username'] : '' ?>" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= isset($_GET['email']) ? $_GET['email'] : '' ?>" required>
            </div>

            <!-- Palavra-passe -->
            <div class="mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Palavra-Passe" required>
            </div>

            <!-- Repita a palavra-passe -->
            <div class="mb-3">
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Repita a Palavra-Passe" required>
            </div>

            <!-- Data de Nascimento -->
            <div class="mb-3">
                <input type="date" id="dob" name="dob" class="form-control" placeholder="Data de Nascimento" value="<?= isset($_GET['dob']) ? $_GET['dob'] : '' ?>" required>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-3">
                <input class="form-check-input me-2" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">Aceito os termos e condições de serviço</label>
            </div>

            <!-- Botão -->
            <button type="submit" class="btn btn-primary btn-block w-100">Registar</button>
            <p class="mt-3">Já tem conta? <a href="PaginaDeLogin.php">Iniciar Sessão</a></p>
            <p class="mt-3">Voltar à <a href="index.php">Página Inicial</a></p>
        </form>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>