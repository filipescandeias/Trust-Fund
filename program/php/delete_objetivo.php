<?php

session_start();
include 'conecta.php';

if (isset($_GET['id'])) {

    $idObjetivo = intval($_GET['id']);
    $idUtilizador = $_SESSION['Utilizador'];

    // Buscar o progresso, nome e categoria do objetivo
    $sqlProgresso = "SELECT Progresso, Nome, Categoria FROM objetivos WHERE ID_Objetivo = ?";
    if ($stmtProgresso = $bd->prepare($sqlProgresso)) {
        $stmtProgresso->bind_param('i', $idObjetivo);

        if ($stmtProgresso->execute()) {
            $stmtProgresso->bind_result($progresso, $nome, $idCategoria);
            $stmtProgresso->fetch(); // A consulta deve ser concluída aqui antes de passar para a próxima

            // Verificar se o progresso é null
            if ($progresso === null) {
                echo "Progresso do objetivo é null.";
            } else {

                // Fechar a declaração de progresso antes de iniciar uma nova consulta
                $stmtProgresso->close();

                // Atualizar saldo no dados_pessoais
                $sqlSaldo = "UPDATE dados_pessoais SET saldo = saldo + ? WHERE ID_Utilizador = ?";
                if ($stmtSaldo = $bd->prepare($sqlSaldo)) {
                    $stmtSaldo->bind_param('di', $progresso, $idUtilizador);

                    if ($stmtSaldo->execute()) {
                        // Inserir a transação
                        $querymov = "INSERT INTO transacoes (ID_Utilizador, ID_Categoria, Nome, Descricao, Montante, Data) VALUES (?, ?, ?, ?, ?, ?)";
                        $stmtmov = $bd->prepare($querymov);
                        if ($stmtmov === false) {
                            die('Erro ao preparar a consulta de transação: ' . $bd->error);
                        }

                        // Data atual
                        $dataAtual = date('Y-m-d');
                        $texto = "Objetivo eliminado";
                        $titulo = $nome . " eliminado";

                        // Bind dos parâmetros para a transação
                        $stmtmov->bind_param("iissds", $idUtilizador, $idCategoria, $titulo, $texto, $progresso, $dataAtual);

                        // Executar a transação
                        if ($stmtmov->execute()) {
                            // Fechar a declaração da transação antes de seguir para a próxima consulta
                            $stmtmov->close();

                            // Deletar o objetivo da tabela objetivos
                            $sqlDelete = "DELETE FROM objetivos WHERE ID_Objetivo = ?";
                            if ($stmtDelete = $bd->prepare($sqlDelete)) {
                                $stmtDelete->bind_param('i', $idObjetivo);

                                if ($stmtDelete->execute()) {
                                    // Redireciona após a exclusão com sucesso
                                    header('Location: ../index.php?page=objetivos');
                                    exit();
                                } else {
                                    echo "Erro ao excluir o objetivo.";
                                }

                                $stmtDelete->close();
                            } else {
                                echo "Erro na preparação da consulta de exclusão.";
                            }
                        } else {
                            echo "Erro ao registrar a transação.";
                        }
                    } else {
                        echo "Erro ao atualizar o saldo.";
                    }

                    $stmtSaldo->close();
                } else {
                    echo "Erro na preparação da consulta para atualizar o saldo.";
                }
            }
        } else {
            echo "Erro ao buscar o progresso do objetivo.";
        }

        // Fechar a declaração final após todas as operações
        $stmtProgresso->close();
    } else {
        echo "Erro na preparação da consulta de progresso.";
    }
} else {
    echo "ID inválido.";
}
