<?php
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['Utilizador'])) {
    include 'conecta.php'; // Conexão com o banco de dados

    $idUtilizador = $_SESSION['Utilizador'];

    // Verifica se a imagem foi carregada
    if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] == 0) {
        $imagemTemp = $_FILES['imagem_perfil']['tmp_name'];
        $imagemNome = $_FILES['imagem_perfil']['name'];
        $imagemNovoNome = uniqid() . '-' . $imagemNome;

        // Define o diretório para salvar a imagem
        $pastaDestino = '../images/' . $imagemNovoNome;

        // Move o arquivo carregado para o diretório
        if (move_uploaded_file($imagemTemp, $pastaDestino)) {
            // Atualiza a imagem no banco de dados
            $sql = "UPDATE utilizadores SET Imagem_Perfil = ? WHERE ID_Utilizador = ?";

            if ($stmt = $bd->prepare($sql)) {
                $stmt->bind_param("si", $imagemNovoNome, $idUtilizador);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'imagem_perfil' => $pastaDestino]);
                } else {
                    echo json_encode(['success' => false]);
                }

                $stmt->close();
            }
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
