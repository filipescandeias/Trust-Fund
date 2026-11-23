<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #3C6E71;
      color: #FFFFFF;
    }
    .card {
      background-color: #D9D9D9;
      border: none;
    }
    .form-label {
      color: #3C6E71;
    }
    .form-control {
      border: 1px solid #284B63;
    }
    .btn-primary {
      background-color: #284B63;
      border-color: #284B63;
    }
    .btn-primary:hover {
      background-color: #3C6E71;
      border-color: #3C6E71;
    }
    a {
      color: #284B63;
    }
    a:hover {
      color: #3C6E71;
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust Fund - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            /* Preenche toda a área sem distorcer */
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        /* Media query para telas menores, caso precise de ajustes adicionais */
        @media (max-width: 768px) {
            body {
                background-size: cover;
                /* Mantém a cobertura total em telas menores */
            }
        }

        .card {
            max-width: 500px;
            width: 90%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            text-align: center;
        }

        .btn-primary {
            background-color: #3c6e71;
            border-color: #3c6e71;
        }

        .btn-primary:hover {
            background-color: #2b545b;
            border-color: #2b545b;
        }

        .logo-button {
            display: inline-block;
            border: none;
            background-color: transparent;
            cursor: pointer;
            padding: 0;
            margin-bottom: 20px;
            /* Se você tiver uma altura ou largura para a logo-button, use esse valor aqui */
            height: 40px;
            /* Ajuste a altura aqui para combinar com a logo */
        }

        .logo-button img {
            width: 150px;
            height: auto;
            transition: transform 0.3s, opacity 0.3s;
        }

<<<<<<< HEAD
    .logo-button img:hover {
      transform: scale(1.1); /* Aumenta ligeiramente o tamanho ao passar o mouse */
      opacity: 0.8; /* Reduz a opacidade ao passar o mouse */
>>>>>>> f1f4292 (Pagina de login atualizada e finalizada)
    }
=======
        .logo-button img:hover {
            transform: scale(1.1);
            opacity: 0.8;
        }
>>>>>>> 5a7f6f3 (Sessão de Login e Registrar melhoradas, com botões e estão responsivas)
    </style>
</head>
<body>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-lg" style="width: 400px;">
      <div class="card-body">
        <h3 class="text-center mb-4">Login</h3>
        <form>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe" style="color: #3C6E71;">Lembrar-me</label>
          </div>
          <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <div class="text-center mt-3">
          <a href="#">Esqueceu a senha?</a>
        </div>
        <div class="text-center mt-2">
          <a href="#">Criar uma nova conta</a>
=======
  <!-- Section: Design Block -->
  <section class="text-center text-lg-start">
    <!-- Jumbotron -->
    <div class="container">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right bg-body-tertiary" style="backdrop-filter: blur(30px);">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Regista-te agora</h2>
                        <form id="registrationForm">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" required />
                                        <label class="form-label" for="form3Example1">Primeiro Nome</label>
                                        <div id="errorFirstName" class="text-danger" style="display:none;">O primeiro nome é obrigatório.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" required />
                                        <label class="form-label" for="form3Example2">Último Nome</label>
                                        <div id="errorLastName" class="text-danger" style="display:none;">O último nome é obrigatório.</div>
                                    </div>
                                </div>
                            </div>
=======
<a href="index.php" class="logo-button">
    <img src="../principal Page/imagens/LOGO-PNG-3.png" alt="Logo">
  </a>
>>>>>>> f1f4292 (Pagina de login atualizada e finalizada)

=======
>>>>>>> 5a7f6f3 (Sessão de Login e Registrar melhoradas, com botões e estão responsivas)
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card p-4">
            <!-- Logo como botão -->
            <a href="index.php" class="logo-button">
                <img src="../principal Page/imagens/LOGO-PNG-3.png" alt="Logo">
            </a>

            <div class="card-body">
                <h2 class="fw-bold mb-4">Inicia Sessão</h2>
                <form id="registrationForm" action="../program/php/login.php" method="post">
                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <!-- Palavra-passe -->
                    <div class="mb-3">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Palavra-Passe" required>
                    </div>

                    <!-- Botão -->
                    <button type="submit" class="btn btn-primary btn-block w-100">Conectar</button>
                    <p class="mt-3">Não tem conta? <a href="registrar.php">Crie aqui</a></p>
                    <p class="mt-3">Voltar à <a href="index.php">Página Inicial</a></p>
                </form>

            </div>
>>>>>>> 9833732 (Pagina de Login finalizada)
        </div>
    </div>
<<<<<<< HEAD
<<<<<<< HEAD
  </div>

=======
    <!-- Jumbotron -->
</section>  
    <script src="assets/js/main.js"></script>
  <!-- Section: Design Block -->
>>>>>>> 9833732 (Pagina de Login finalizada)
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
=======

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<<<<<<< HEAD
</html>
>>>>>>> f1f4292 (Pagina de login atualizada e finalizada)
=======

</html>
>>>>>>> 5a7f6f3 (Sessão de Login e Registrar melhoradas, com botões e estão responsivas)
