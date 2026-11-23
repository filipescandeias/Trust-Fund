<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="center-form">
            <div class="form-container">
                <!-- Título no topo -->
                <h1 class="page-title text-center">Completar Conta</h1>

                <!-- Exibição de alertas -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php
                        if ($_GET['error'] == 'idade_invalida') {
                            echo 'A data da conta não pode ser inferior a 18 anos de idade!';
                        } elseif ($_GET['error'] == 'erro_completar') {
                            echo 'Erro ao completar o perfil. Tente novamente.';
                        } elseif ($_GET['error'] == 'erro_preparar_consulta') {
                            echo 'Erro ao preparar a consulta no banco de dados.';
                        } elseif ($_GET['error'] == 'erro_data_nascimento') {
                            echo 'Erro ao recuperar a data de nascimento do usuário.';
                        }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php
                        if ($_GET['success'] == 'perfil_completado') {
                            echo 'Perfil completado com sucesso!';
                        }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Formulário -->
                <form action="php/completar_perfil.php" method="post" class="d-flex flex-column align-items-center">
                    <!-- Campo Data da Conta -->
                    <div class="mb-3 w-100">
                        <label for="accountDate" class="form-label">Data da Conta</label>
                        <input type="date" id="accountDate" name="accountDate" class="form-control" required>
                    </div>

                    <!-- Campo Saldo Inicial -->
                    <div class="mb-3 w-100">
                        <label for="initialBalance" class="form-label">Saldo Inicial</label>
                        <input type="number" id="initialBalance" name="initialBalance" class="form-control" placeholder="0.00" required min="0">
                    </div>

                    <!-- Botão de Submissão -->
                    <button type="submit" class="btn btn-primary">Submeter</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para evitar números negativos no campo Saldo Inicial -->
    <script>
        document.getElementById('initialBalance').addEventListener('input', function(e) {
            let input = e.target;
            let value = input.value;
            if (value.includes('-')) {
                value = value.replace(/-/g, '');
            }
            input.value = value;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
