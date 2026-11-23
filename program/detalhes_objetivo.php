<?php

include 'php/conecta.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idObjetivo'])) {
    $idObjetivo = intval($_POST['idObjetivo']);
}elseif (isset($_SESSION['idObjetivo'])) {
    $idObjetivo = $_SESSION['idObjetivo'];
} else {
    echo "ID do objetivo não encontrado.";
    exit();
}

$query = "
    SELECT 
        objetivos.Nome AS objetivo_nome, 
        categorias.Nome AS categoria_nome, 
        objetivos.Montante, 
        objetivos.Descricao, 
        objetivos.Progresso, 
        categorias.Cor AS categoria_cor, 
        categorias.Imagem AS categoria_imagem
    FROM objetivos 
    INNER JOIN categorias ON objetivos.Categoria = categorias.ID_Categoria
    WHERE objetivos.ID_Objetivo = ?
";

$stmt = $bd->prepare($query);
if ($stmt === false) {
    die('Erro ao preparar a consulta: ' . $bd->error);
}

$stmt->bind_param("i", $idObjetivo);
$stmt->execute();
$stmt->bind_result($nomeObjetivo, $nomeCategoria, $montante, $descricao, $progresso, $categoriaCor, $categoriaImagem);

if ($stmt->fetch()) {
    echo '
        <a href="index.php?page=objetivos"><button type="button" class="btn btn-primary btn-lg"><-Voltar</button></a>
        <section class="container mt-5">
            <div class="row justify-content-center">
                <!-- Card do Objetivo -->
                <div class="col-12 col-md-10 col-lg-12">
                    <div class="card shadow-lg rounded-lg border-0" style="background: linear-gradient(70deg, ' . $categoriaCor . ' 40%, #f3f3f3 40%);">
                        <div class="card-header text-center py-5" style="background-color: ' . $categoriaCor . '; color: white;">
                            <h4 class="card-title" style="font-size: 2.5rem;">' . htmlspecialchars($nomeObjetivo) . '</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-5 text-center">
                                    <div style="font-size: 12rem;">' . $categoriaImagem . '</div>
                                    <h5 class="mt-3 text-center" style="color: ' . $categoriaCor . '; font-size: 2rem;">' . htmlspecialchars($nomeCategoria) . '</h5>
                                </div>
                                <div class="col-12 col-md-7">
                                    <p class="text-dark" style="font-size: 1.5rem;"><strong>Descrição:</strong> ' . htmlspecialchars($descricao) . '</p>
                                    <p class="text-dark" style="font-size: 1.5rem;"><strong>Montante Total:</strong> ' . number_format($montante, 2, ',', '.') . '€</p>
                                    <p class="text-dark" style="font-size: 1.5rem;"><strong>Dinheiro depositado:</strong> ' . $progresso . '€</p>
                                    
                                    <div class="progress mt-3" style="height: 30px;">
                                        <div class="progress-bar" style="width: ' . round(($progresso * 100 / $montante), 0) . '%" aria-valuenow="' . round(($progresso * 100 / $montante), 0) . '" aria-valuemin="0" aria-valuemax="100">' . round(($progresso * 100 / $montante), 0) . '%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-4 text-end">

                            <a href="#" class="btn btn-invest" id="investButton">
                                <i class="bi bi-currency-dollar"></i>
                            </a>
                            <form action="php/objetivos_edit.php" method="post" id="investmentForm" style="display: none;">
                                <input type="hidden" name="idobjetivo" value="' . $idObjetivo . '">
                                <input type="number" id="montante" name="montante" placeholder="Montante" required>
                                <button type="submit" class="btn btn-invest"><i class="bi bi-check"></i></button>
                            </form>
                            <a href="php/delete_objetivo.php?id=' . $idObjetivo . '" class="btn btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>';
} else {
    echo "<p class='text-danger'>Erro: Objetivo não encontrado!</p>";
}

$stmt->close();

?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const investButton = document.getElementById('investButton');
        const investmentForm = document.getElementById('investmentForm');

        investButton.addEventListener('click', function(event) {
            event.preventDefault();

            investButton.style.display = 'none';
            investmentForm.style.display = 'inline-block';
        });
    });
</script>