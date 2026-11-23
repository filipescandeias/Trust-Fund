<!--                                                HISTÓRICO DE GASTOS
        Abaixo de tudo, haverá cards com o histórico mais recente colocado pelo utilizador, categorizado.
-->
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<div id="historicodegastos">
    <h1>Seus Movimentos</h1>
=======
<div id="historicodegastos" class="container mt-4">
    <h1 class="text-center">Seus Movimentos</h1>
>>>>>>> e578dbe (melhorias feitas - Bootstrap)
=======
<div id="historicodegastos">
    <h1>Seus Movimentos</h1>
>>>>>>> 5ca44f4 (atualização Detalhes-Conta)
</div>
<!--                                               
SESSÃO DE DESPESAS CATEGORIZADAS
-->
<<<<<<< HEAD
<<<<<<< HEAD
<div class="main-container">
=======

<div class="content flex-grow-1 py-4">
<<<<<<< HEAD
>>>>>>> c93c067 (Teste)
    <div class="categorias-box">
        <h2>Despesas Categorizadas</h2>
=======
<div class="main-container mt-5">
<div class="categorias-box">
        <h2 class="mb-4">Despesas Categorizadas</h2>
>>>>>>> e578dbe (melhorias feitas - Bootstrap)
=======
<div class="main-container">
<div class="categorias-box">
        <h2>Despesas Categorizadas</h2>
>>>>>>> 5ca44f4 (atualização Detalhes-Conta)
        <div class="expense-container" id="lista-categorias">
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-home"></i>
                    <span class="expense-label">Casa:</span>
<<<<<<< HEAD
                    <span class="expense-amount" data-original="500.00€">500.00€</span>
<<<<<<< HEAD
=======
    <div class="card border-0 shadow">
        <div class="card-header">
            <h4 class="card-title">Despesas Categorizadas</h4>
        </div>
        <div class="card-body">
            <div class="expense-container" id="lista-categorias">
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-home"></i>
                        <span class="expense-label">Casa:</span>
                        <span class="expense-amount" data-original="500.00€">500.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-gamepad"></i>
                        <span class="expense-label">Lazer:</span>
                        <span class="expense-amount" data-original="300.00€">300.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-money-bill-wave"></i>
                        <span class="expense-label">Empréstimos:</span>
                        <span class="expense-amount" data-original="200.00€">200.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-basketball-ball"></i>
                        <span class="expense-label">Desporto:</span>
                        <span class="expense-amount" data-original="250.00€">250.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-car"></i>
                        <span class="expense-label">Automóvel:</span>
                        <span class="expense-amount" data-original="250.00€">250.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-plane"></i>
                        <span class="expense-label">Viagens:</span>
                        <span class="expense-amount" data-original="250.00€">250.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-arrow-right"></i>
                        <span class="expense-label">Transferências:</span>
                        <span class="expense-amount" data-original="250.00€">250.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-file-alt"></i>
                        <span class="expense-label">Subscrições:</span>
                        <span class="expense-amount" data-original="150.00€">150.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="expense-label">Trabalho:</span>
                        <span class="expense-amount" data-original="150.00€">150.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="expense-label">Compras:</span>
                        <span class="expense-amount" data-original="150.00€">150.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span class="expense-label">Biscates:</span>
                        <span class="expense-amount" data-original="250.00€">250.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-utensils"></i>
                        <span class="expense-label">Comida:</span>
                        <span class="expense-amount" data-original="250.00€">250.00€</span>
                    </div>
                </div>
                <div class="expense-row">
                    <div class="expense-item">
                        <i class="fas fa-box"></i>
                        <span class="expense-label">Outros:</span>
                        <span class="expense-amount" data-original="707.00€">707.00€</span>
                    </div>
>>>>>>> 8bdec3a (Mudar de pc)
                </div>
            </div>
        </div>
=======
=======
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 10
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
>>>>>>> 6a990d0 (Merge de tudo com php do analises)
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-gamepad"></i>
                    <span class="expense-label">Lazer:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 2
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <span class="expense-label">Empréstimos:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 5
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-basketball-ball"></i>
                    <span class="expense-label">Desporto:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 3
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-car"></i>
                    <span class="expense-label">Automóvel:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 4
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-plane"></i>
                    <span class="expense-label">Viagens:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 6
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-arrow-right"></i>
                    <span class="expense-label">Transferências:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 8
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-file-alt"></i>
                    <span class="expense-label">Subscrições:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 11
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="expense-label">Trabalho:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 13
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="expense-label">Compras:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 7
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="expense-label">Biscates:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 14
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-utensils"></i>
                    <span class="expense-label">Comida:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 1
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-utensils"></i>
                    <span class="expense-label">Gaming:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 12
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
            <div class="expense-row">
                <div class="expense-item">
                    <i class="fas fa-box"></i>
                    <span class="expense-label">Outros:</span>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'php/conecta.php';


                    // Verifique se o ID do usuário está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para somar os montantes das transações da categoria 10
                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? AND ID_Categoria = 2
    ";

                        // Preparar a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincular parâmetros
                            $stmt->bind_param("i", $idUtilizador);

                            // Executar a consulta
                            if ($stmt->execute()) {
                                // Obter o resultado
                                $stmt->bind_result($totalMontante);
                                $stmt->fetch();

                                // Se o valor total for nulo, defina como 0
                                if ($totalMontante === null) {
                                    $totalMontante = 0;
                                }

                                // Formatar o valor para exibição
                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                            } else {
                                // Erro na execução da consulta
                                echo "Erro ao buscar o total de transações.";
                            }

                            // Fechar o statement
                            $stmt->close();
                        } else {
                            // Erro ao preparar a consulta
                            echo "Erro ao preparar a consulta.";
                        }
                    } else {
                        // Caso o usuário não esteja logado
                        echo "Usuário não encontrado na sessão.";
                    }
                    ?>
                    <span class="expense-amount" data-original="<?= $totalMontanteFormatted ?>"><?= $totalMontanteFormatted ?></span>
                </div>
            </div>
                  
          </div>
    </div>

    <!-- box de 'Seus Gráficos' -->
    <div class="seus-gastos-container mt-5">

        <div class="mini-box">
            <h1>Seus Gastos</h1>
            <div id="total_gasto" class="total-box">
                Total Gasto: <?php
                                include 'php/conecta.php';

                                // Verifique se o ID do usuário está na sessão
                                if (isset($_SESSION['Utilizador'])) {
                                    $idUtilizador = $_SESSION['Utilizador'];

                                    // Consulta para buscar as transações do usuário, filtrando pela data e ID_Utilizador
                                    $sql = "
                    SELECT MONTH(Data) AS mes, SUM(Montante) AS total
                    FROM transacoes
                    WHERE ID_Utilizador = ?
                    GROUP BY MONTH(Data)
                    ORDER BY MONTH(Data)
                ";

                                    if ($stmt = $bd->prepare($sql)) {
                                        $stmt->bind_param("i", $idUtilizador);
                                        $stmt->execute();
                                        $stmt->bind_result($mes, $total);

                                        // Inicializando um array para os valores do gráfico
                                        $gastosMensais = array_fill(0, 12, 0); 

                                        // Preenchendo o array com os valores dos meses
                                        while ($stmt->fetch()) {
                                            $gastosMensais[$mes - 1] = abs($total);
                                        }

                                        $stmt->close();
                                    }
                                } else {
                                    echo "Usuário não encontrado na sessão.";
                                }

                                // Calculando o total gasto
                                $totalGasto = array_sum($gastosMensais);
                                echo number_format($totalGasto, 2, ',', '.') . '€';
                                ?>
            </div>
            <canvas id="chartMovimentos"></canvas>
        </div>

        <script>
            const data = {
                labels: [
                    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
                    "Setembro", "Outubro", "Novembro", "Dezembro"
                ],
                datasets: [{
                    label: "Gastos (€)",
                    data: <?php echo json_encode($gastosMensais); ?>, // Passa os dados do PHP para o JS
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Movimentos Mensais'
                        }
                    },
                    maintainAspectRatio: false,
                },
            };

        </script>

        <!-- duas caixas laterais com os dados de lucro e total de despesas -->
<<<<<<< HEAD
        <!--<div class="aditional-container">
                
            <div class="box aditional-box aditional-box-1" title="Seu lucro baseado nos seus gastos">
                    <h3>Lucro:<br><br>00.00€</h3>
            </div>

                <div class="box aditional-box aditional-box-2" title="Total em despesas">
                    <h3>Total:<br><br>2197.00€</h3>
                </div>
=======
        <div class="aditional-container">

            <div class="aditional-box small-box" style="background-color:#526D82;color:#fff;width:250px;" title="Seu lucro baseado nos seus gastos">
                <h3>Lucro:<br><br><?php
                                    // Inclua a conexão com o banco de dados
                                    include 'php/conecta.php';


                                    // Verifique se o ID do usuário está na sessão
                                    if (isset($_SESSION['Utilizador'])) {
                                        $idUtilizador = $_SESSION['Utilizador'];

                                        // Consulta SQL para somar os montantes das transações da categoria 10
                                        $sql = "
        SELECT SUM(Montante) AS totalMontante
        FROM transacoes
        WHERE ID_Utilizador = ? 
    ";

                                        // Preparar a consulta
                                        if ($stmt = $bd->prepare($sql)) {
                                            // Vincular parâmetros
                                            $stmt->bind_param("i", $idUtilizador);

                                            // Executar a consulta
                                            if ($stmt->execute()) {
                                                // Obter o resultado
                                                $stmt->bind_result($totalMontante);
                                                $stmt->fetch();

                                                // Se o valor total for nulo, defina como 0
                                                if ($totalMontante === null) {
                                                    $totalMontante = 0;
                                                }

                                                // Formatar o valor para exibição
                                                $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                                            } else {
                                                // Erro na execução da consulta
                                                echo "Erro ao buscar o total de transações.";
                                            }

                                            // Fechar o statement
                                            $stmt->close();
                                        } else {
                                            // Erro ao preparar a consulta
                                            echo "Erro ao preparar a consulta.";
                                        }
                                    } else {
                                        // Caso o usuário não esteja logado
                                        echo "Usuário não encontrado na sessão.";
                                    }
                                    ?>
                    <?= $totalMontanteFormatted ?></h3>
            </div>

            <div class="aditional-box small-box" style="background-color:#526D82; color:#fff;" title="Total em despesas">
                <h3>Entradas:<br><br><?php
                                        // Inclua a conexão com o banco de dados
                                        include 'php/conecta.php';

                                        // Verifique se o ID do usuário está na sessão
                                        if (isset($_SESSION['Utilizador'])) {
                                            $idUtilizador = $_SESSION['Utilizador'];

                                            // Consulta SQL para somar os montantes positivos das transações
                                            $sql = "
            SELECT SUM(Montante) AS totalMontante
            FROM transacoes
            WHERE ID_Utilizador = ? AND Montante > 0
        ";

                                            // Preparar a consulta
                                            if ($stmt = $bd->prepare($sql)) {
                                                // Vincular parâmetros
                                                $stmt->bind_param("i", $idUtilizador);

                                                // Executar a consulta
                                                if ($stmt->execute()) {
                                                    // Obter o resultado
                                                    $stmt->bind_result($totalMontante);
                                                    $stmt->fetch();

                                                    // Se o valor total for nulo, defina como 0
                                                    if ($totalMontante === null) {
                                                        $totalMontante = 0;
                                                    }

                                                    // Formatar o valor para exibição
                                                    $totalMontanteFormatted = number_format($totalMontante, 2, ',', '.') . '€';
                                                } else {
                                                    // Erro na execução da consulta
                                                    echo "Erro ao buscar o total de transações.";
                                                }

                                                // Fechar o statement
                                                $stmt->close();
                                            } else {
                                                // Erro ao preparar a consulta
                                                echo "Erro ao preparar a consulta.";
                                            }
                                        } else {
                                            // Caso o usuário não esteja logado
                                            echo "Usuário não encontrado na sessão.";
                                        }
                                        ?>
                    <?= $totalMontanteFormatted ?></h3>

            </div>
>>>>>>> 5ca44f4 (atualização Detalhes-Conta)

        </div>

>>>>>>> e578dbe (melhorias feitas - Bootstrap)
    </div>

    <!-- box de 'Seus Gráficos' -->
<<<<<<< HEAD
    <div class="seus-gastos-container">

<<<<<<< HEAD
        <div class="mini-box col-12 col-md-6">
=======
        <div class="mini-box">
>>>>>>> c93c067 (Teste)
            <h1>Seus Gastos</h1>
            <div id="total_gasto" class="total-box">
                Total Gasto: 2197.00€
=======
    <div class="row">
        <div class="col-xxl-8 col-12 d-flex align-items-center justify-content-center">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h4 class="card-title">Gastos</h4>
                </div>
                <div class="card-body">
                <canvas id="chartMovimentos"></canvas>
                </div>
            </div>
            <div class="col-xxl-4 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow" title="Seu lucro baseado nos seus gastos">
                            <h3>Lucro:<br><br>00.00€</h3>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card border-0 shadow" title="Total em despesas">
                            <h3>Total:<br><br>2197.00€</h3>
                        </div>
                    </div>
                </div>
>>>>>>> 8bdec3a (Mudar de pc)
            </div>
        </div>
    </div>

    <!-- Três caixas no fim com Maior Lucro, Maior Despesa e Objetivo -->
    <div class="additional-boxes">
<<<<<<< HEAD
        
        <div class="additional-box small-box">
            <h3>Maior Lucro</h3>
            <p>Maior lucro registrado obtido pelo utilizador.</p>
        </div>
=======
        <?php
        include 'php/conecta.php';

        if (isset($_SESSION['Utilizador'])) {
            $idUtilizador = $_SESSION['Utilizador'];
>>>>>>> 6a990d0 (Merge de tudo com php do analises)

            // Maior Lucro
            $sqlMaiorLucro = "
            SELECT MAX(Montante) AS maiorLucro
            FROM transacoes
            WHERE ID_Utilizador = ? AND Montante > 0
        ";
            if ($stmtMaiorLucro = $bd->prepare($sqlMaiorLucro)) {
                $stmtMaiorLucro->bind_param("i", $idUtilizador);
                $stmtMaiorLucro->execute();
                $stmtMaiorLucro->bind_result($maiorLucro);
                $stmtMaiorLucro->fetch();
                $stmtMaiorLucro->close();
            }

            // Maior Despesa
            $sqlMaiorDespesa = "
            SELECT MIN(Montante) AS maiorDespesa
            FROM transacoes
            WHERE ID_Utilizador = ? AND Montante < 0
        ";
            if ($stmtMaiorDespesa = $bd->prepare($sqlMaiorDespesa)) {
                $stmtMaiorDespesa->bind_param("i", $idUtilizador);
                $stmtMaiorDespesa->execute();
                $stmtMaiorDespesa->bind_result($maiorDespesa);
                $stmtMaiorDespesa->fetch();
                $stmtMaiorDespesa->close();
            }

            // Objetivo (dinheiro depositado)
            $sqlObjetivo = "
            SELECT Progresso 
            FROM objetivos
            WHERE ID_Utilizador = ?
        ";
            if ($stmtObjetivo = $bd->prepare($sqlObjetivo)) {
                $stmtObjetivo->bind_param("i", $idUtilizador);
                $stmtObjetivo->execute();
                $stmtObjetivo->bind_result($progressoObjetivo);
                $stmtObjetivo->fetch();
                $stmtObjetivo->close();
            }

            // Exibindo os valores
            echo '<div class="additional-box small-box">
                <h3>Maior Lucro</h3>
                <p>' . (isset($maiorLucro) ? number_format($maiorLucro, 2, ',', '.') . '€' : 'Nenhum lucro registrado.') . '</p>
              </div>';

            echo '<div class="additional-box small-box">
                <h3>Maior Despesa</h3>
                <p>' . (isset($maiorDespesa) ? number_format(abs($maiorDespesa), 2, ',', '.') . '€' : 'Nenhuma despesa registrada.') . '</p>
              </div>';

            echo '<div class="additional-box small-box">
                <h3>Objetivo</h3>
                <p>' . (isset($progressoObjetivo) ? number_format($progressoObjetivo, 2, ',', '.') . '€' : 'Nenhum valor depositado no objetivo.') . '</p>
              </div>';
        } else {
            echo "Usuário não encontrado na sessão.";
        }
        ?>
    </div>

</div>

<<<<<<< HEAD
<script>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    const ctx = document.getElementById('chartMovimentos').getContext('2d');
    const chartMovimentos = new Chart(ctx, config);
>>>>>>> 8bdec3a (Mudar de pc)
    //script sobre o gráfico
>>>>>>> c93c067 (Teste)
=======
//script sobre o gráfico
>>>>>>> 5ca44f4 (atualização Detalhes-Conta)
    const data = {
        labels: [
            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
            "Setembro", "Outubro", "Novembro", "Dezembro"
        ],
        datasets: [{
            label: "Movimentos (€)",
            data: [120, 150, 180, 200, 170, 144, 230, 423, 102, 123, 111, 324],
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1
        }]
    };

<<<<<<< HEAD
=======
    const transactions = [{
            category: 'Comida',
            amount: 120,
            date: 'Janeiro'
        },
        {
            category: 'Lazer',
            amount: 150,
            date: 'Fevereiro'
        },
        {
            category: 'Desporto',
            amount: 180,
            date: 'Março'
        },
        {
            category: 'Automóvel',
            amount: 200,
            date: 'Abril'
        },
        {
            category: 'Compras',
            amount: 170,
            date: 'Maio'
        }

    ]
<<<<<<< HEAD
    /*                                                      TIPO DE GRÁFICO
            Aqui, percebe-se o display de como será o gráfico. O tipo 'bar' ilustra os dados em forma de barras (um modelo mais nítido).
    */
>>>>>>> c93c067 (Teste)
=======
/*                                                      TIPO DE GRÁFICO
        Aqui, percebe-se o display de como será o gráfico. O tipo 'bar' ilustra os dados em forma de barras (um modelo mais nítido).
*/
>>>>>>> 5ca44f4 (atualização Detalhes-Conta)
    const config = {
        type: 'bar', 
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Movimentos Mensais'
                }
            },
            maintainAspectRatio: false, 
        },
    };

</script>
<<<<<<< HEAD
=======

<style>
<<<<<<< HEAD
=======


<style>
>>>>>>> 6a990d0 (Merge de tudo com php do analises)
    /*corpo da página que permite que não haja rolamento lateral*/
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
<<<<<<< HEAD
</style>
>>>>>>> c93c067 (Teste)
=======
/*corpo da página que permite que não haja rolamento lateral*/
body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}
</style>
>>>>>>> 5ca44f4 (atualização Detalhes-Conta)
=======
</style>
>>>>>>> 6a990d0 (Merge de tudo com php do analises)
