<?php
if (isset($_GET['id'])) {
    $idTransacao = $_GET['id'];

    // Consulta os dados da transação com o ID
    $sql = "SELECT * FROM transacoes WHERE ID_Transacao = ?";
    $stmt = $bd->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $idTransacao);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Obter montante e definir tipo de movimento
            $montante = abs($row['Montante']); // Faz o montante ser positivo
            $tipoMovimento = $row['Montante'] < 0 ? 'Saída' : 'Entrada'; // Definir tipo de movimento

?>

            <div class="card border-0 shadow">
                <div class="card-header">
                    <h4 class="card-title">Editar Movimento</h4>
                </div>
                <div class="card-body">
                    <form action="php/movimento_update.php" method="post"> <!-- Corrigido para o arquivo de atualização -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="inputTitleM" class="form-label">Título</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputTitleM"
                                    name="inputTitleM"
                                    aria-describedby="Titulo"
                                    value="<?php echo htmlspecialchars($row['Nome']); ?>"> <!-- Corrigido para usar htmlspecialchars -->
                                <div id="emailHelp" class="form-text">Identificador de Movimento</div>
                            </div>
                            <div class="col-md-6">
                                <label for="montante" class="form-label">Montante</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="inputMontanteM"
                                    id="inputMontanteM"
                                    value="<?php echo htmlspecialchars($montante); ?>"> <!-- Montante sempre positivo -->
                            </div>
                            <script>
                                document.getElementById('inputMontanteM').addEventListener('input', function(e) {
                                    let input = e.target;
                                    let value = input.value;
                                    // Impede valores negativos
                                    if (value.includes('-')) {
                                        value = value.replace(/-/g, '');
                                    }
                                    input.value = value;
                                });
                            </script>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="inputDateM" class="form-label">Data</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="inputDateM"
                                    id="inputDateM"
                                    value="<?php echo htmlspecialchars($row['Data']); ?>"> <!-- Corrigido para exibir a data correta -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="inputDescriptionM" class="form-label">Descrição</label>
                                <textarea
                                    class="form-control"
                                    name="inputDescriptionM"
                                    id="inputDescriptionM"
                                    rows="5"
                                    style="resize: none;"
                                    aria-describedby="Descrição"><?php echo htmlspecialchars($row['Descricao']); ?></textarea> <!-- Corrigido para exibir a descrição -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="inputCategoriaM" class="form-label">Categoria</label><br>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php
                                    $sql = "SELECT * FROM categorias";
                                    $result = $bd->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($rowCat = $result->fetch_assoc()) {
                                            $idCategoria = $rowCat['ID_Categoria'];
                                            $nome = $rowCat['Nome'];
                                            $descricao = $rowCat['Descricao'];
                                            $imagem = htmlspecialchars_decode($rowCat['Imagem']);
                                            $cor = $rowCat['Cor'];
                                            $checked = ($rowCat['ID_Categoria'] == $row['ID_Categoria']) ? 'checked' : '';

                                            echo "<div class='categoria-radio-wrapper'>
                                                <input type='radio' class='categoria-radio-button' value='$idCategoria' name='categoria' id='categoria$idCategoria' autocomplete='off' $checked>
                                                <label 
                                                    for='categoria$idCategoria' 
                                                    class='categoria-radio-label' 
                                                    style='background-color: $cor; padding: 10px; border-radius: 5px;' 
                                                    title='$nome - $descricao'>
                                                    <span class='categoria-icon'>$imagem</span>
                                                </label>
                                              </div>";
                                        }
                                    } else {
                                        echo "<p class='text-muted'>Sem categorias disponíveis</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 d-flex justify-content-center gap-3">
                                <!-- Definir tipo de movimento (Entrada ou Saída) -->
                                <input type="radio" class="btn-check" value="+" name="tipoMovimento" id="inputEntrada" autocomplete="off"
                                    <?php echo $tipoMovimento == 'Entrada' ? 'checked' : ''; ?>>
                                <label type="button" class="btn check-btn btn-secondary" for="inputEntrada">Entrada</label>

                                <input type="radio" class="btn-check" value="-" name="tipoMovimento" id="inputSaida" autocomplete="off"
                                    <?php echo $tipoMovimento == 'Saída' ? 'checked' : ''; ?>>
                                <label type="button" class="btn check-btn btn-secondary" for="inputSaida">Saída</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5 py-2">Eliminar</button>
                            </div>
                        </div>
                    </form>

        <?php
        } else {
            echo "Transação não encontrada.";
        }
        $stmt->close();
    }
}
        ?>