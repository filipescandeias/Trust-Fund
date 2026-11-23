<?php
session_start();
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idUtilizador = $_SESSION['Utilizador'];
    $idObjetivo = $_POST['idobjetivo'];
    $montante = $_POST['montante'];

    // Verifica se algum campo está vazio
    if (empty($idObjetivo) || empty($montante)) {
        $_SESSION['idObjetivo'] = $idObjetivo;
        header('Location: ../index.php?page=deta_obj');
        exit();
    }

    // Verifica se o montante é um número válido
    if (!is_numeric($montante)) {
        $_SESSION['idObjetivo'] = $idObjetivo;
        header('Location: ../index.php?page=deta_obj');
        exit();
    }

    // Buscar o valor atual do progresso no objetivo
    $sqlProgresso = "SELECT Progresso FROM objetivos WHERE ID_Objetivo = ? AND ID_Utilizador = ?";
    if ($stmtProgresso = $bd->prepare($sqlProgresso)) {
        $stmtProgresso->bind_param('ii', $idObjetivo, $idUtilizador);

        if ($stmtProgresso->execute()) {
            $stmtProgresso->bind_result($progresso);
            $stmtProgresso->fetch();
            $stmtProgresso->close();

            // Se o objetivo não existir ou não tiver progresso, retorna erro
            if ($progresso === null) {
                $_SESSION['idObjetivo'] = $idObjetivo;
                header('Location: ../index.php?page=deta_obj');
                exit();
            }

            // Lidar com o montante negativo
            if ($montante < 0) {
                if (abs($montante) > $progresso) {
                    $_SESSION['idObjetivo'] = $idObjetivo;
                    header('Location: ../index.php?page=deta_obj');
                    exit();
                }

                // Atualiza o progresso removendo o montante
                $novoProgresso = $progresso + $montante;

                // Atualiza o progresso do objetivo
                $sqlUpdate = "UPDATE objetivos SET Progresso = ? WHERE ID_Objetivo = ? AND ID_Utilizador = ?";
                if ($stmtUpdate = $bd->prepare($sqlUpdate)) {
                    $stmtUpdate->bind_param('dii', $novoProgresso, $idObjetivo, $idUtilizador);

                    if ($stmtUpdate->execute()) {
                        // Atualiza o saldo do utilizador na tabela dados_pessoais
                        $sqlSaldo = "UPDATE dados_pessoais SET saldo = saldo + ? WHERE ID_Utilizador = ?";
                        if ($stmtSaldo = $bd->prepare($sqlSaldo)) {
                            $montantepos = abs($montante);
                            $stmtSaldo->bind_param('di', $montantepos, $idUtilizador);
                            $stmtSaldo->execute();
                        }

                        // Registra a transação com o montante positivo
                        $sqlTransacao = "INSERT INTO transacoes (ID_Utilizador, ID_Categoria, Nome, Descricao, Montante, Data) 
                                         VALUES (?, ?, ?, ?, ?, ?)";
                        if ($stmtTransacao = $bd->prepare($sqlTransacao)) {
                            $dataAtual = date('Y-m-d');
                            $texto = "Retirada do valor do objetivo";
                            $titulo = "Retirada do objetivo";
                            $idCategoria = 15;

                            $stmtTransacao->bind_param("iissds", $idUtilizador, $idCategoria, $titulo, $texto, $montantepos, $dataAtual);
                            $stmtTransacao->execute();
                            header('Location: ../index.php?page=objetivos');
                            exit();
                        }
                    } else {
                        echo "Erro ao atualizar o progresso.";
                    }
                }
            } else {

                if ($montante > $progresso) {
                    $_SESSION['idObjetivo'] = $idObjetivo;
                    header('Location: ../index.php?page=deta_obj');
                    exit();
                }
                // Lidar com o montante positivo
                $novoProgresso = $progresso + $montante;

                // Atualiza o progresso do objetivo
                $sqlUpdate = "UPDATE objetivos SET Progresso = ? WHERE ID_Objetivo = ? AND ID_Utilizador = ?";
                if ($stmtUpdate = $bd->prepare($sqlUpdate)) {
                    $stmtUpdate->bind_param('dii', $novoProgresso, $idObjetivo, $idUtilizador);

                    if ($stmtUpdate->execute()) {
                        // Atualiza o saldo do utilizador na tabela dados_pessoais
                        $sqlSaldo = "UPDATE dados_pessoais SET saldo = saldo - ? WHERE ID_Utilizador = ?";
                        if ($stmtSaldo = $bd->prepare($sqlSaldo)) {
                            $stmtSaldo->bind_param('di', $montante, $idUtilizador);
                            $stmtSaldo->execute();
                        }

                        // Registra a transação com o montante positivo
                        $sqlTransacao = "INSERT INTO transacoes (ID_Utilizador, ID_Categoria, Nome, Descricao, Montante, Data) 
                                         VALUES (?, ?, ?, ?, ?, ?)";
                        if ($stmtTransacao = $bd->prepare($sqlTransacao)) {
                            $dataAtual = date('Y-m-d');
                            $texto = "Adição ao valor do objetivo";
                            $titulo = "Adição ao objetivo";
                            $idCategoria = 15;
                            $negmontante = -abs($montante);
                            $stmtTransacao->bind_param("iissds", $idUtilizador, $idCategoria, $titulo, $texto, $negmontante, $dataAtual);
                            $stmtTransacao->execute();
                            header('Location: ../index.php?page=objetivos');
                            exit();
                        }
                    } else {
                        $_SESSION['idObjetivo'] = $idObjetivo;
                    header('Location: ../index.php?page=deta_obj');
                    exit();
                    }
                }
            }
        } else {
            $_SESSION['idObjetivo'] = $idObjetivo;
                    header('Location: ../index.php?page=deta_obj');
                    exit();
        }
    } else {
        $_SESSION['idObjetivo'] = $idObjetivo;
                    header('Location: ../index.php?page=deta_obj');
                    exit();
    }
} else {
    $_SESSION['idObjetivo'] = $idObjetivo;
                    header('Location: ../index.php?page=deta_obj');
                    exit();
}
