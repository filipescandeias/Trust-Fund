<div class="container">
    <!-- Sidebar de Ícones -->
    <div class="content-wrapper" style="position: relative;">
        <!-- Conteúdo Principal -->
        <!-- Sidebar de Ícones -->
        <div class="icon-sidebar">
            <ul>
                <li><a <?= $current_page == 'objetivos' ?> href="index.php?page=objetivos"><i class="fas fa-home"></i></a></li>
                <li><a <?= $current_page == 'addobj' ?> href="index.php?page=addobj"><i class="fas fa-plus"></i></a></li>
            </ul>
        </div>
    </div>

    <?php
    if (isset($_SESSION['erro_obj'])) {
        if ($_SESSION['erro_obj'] == 0) {
        } else {
    ?>
            <div class="alert alert-danger position-fixed bottom-0 end-0 m-3 d-flex align-items-center" role="alert" id="alertMessage" style="z-index: 1100;">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-3"></i>
                <span>
                    <?php
                    switch ($_SESSION['erro_obj']) {
                        case 1:
                            echo "Um dos campos do formulário está vazio!";
                            break;
                        case 2:
                            echo "Título de Objetivo demasiado grande!";
                            break;
                        case 3:
                            echo "Descrição de Objetivo demasiado grande!";
                            break;
                        case 4:
                            echo "Montante inicial inválido!";
                            break;
                        case 5:
                            echo "Montante inicial tem de ser menor que o objetivo!";
                            break;
                        case 6:
                            echo "Valor do Objetivo inválido!";
                            break;
                        case 7:
                            echo "Saldo insuficiente para o montante inicial!";
                            break;
                        case 99:
                            echo "Erro desconhecido!";
                            break;
                    }
                    ?>
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }
    ?>


    <!-- Conteúdo Principal -->
    <div class="row">
        <!-- Card Principal -->
        <div class="col-11 col-md-10 col-lg-15">
            <div class="card">
                <div class="card-header text-white" style="background-color: #526d82;">
                    Adicionar objetivo
                </div>
                <div class="card-body">
                    <form action="php/objetivos_add.php" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="inputTitleM" class="form-label">Título</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputTitleM"
                                    name="inputTitleO"
                                    aria-describedby="Titulo"
                                    value="<?php echo isset($_SESSION['obj_data']['titulo']) ? htmlspecialchars($_SESSION['obj_data']['titulo'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                <div id="emailHelp" class="form-text">Identificador do Objetivo</div>
                            </div>
                            <div class="col-md-6">
                                <label for="montante" class="form-label">Objetivo</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="inputObjetivo"
                                    id="inputObjetivo"
                                    value="<?php echo isset($_SESSION['obj_data']['objetivo']) ? htmlspecialchars($_SESSION['obj_data']['objetivo'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                            </div>
                            <script>
                                document.getElementById('inputObjetivo').addEventListener('input', function(e) {
                                    let input = e.target;
                                    let value = input.value;
                                    if (value.includes('-')) {
                                        value = value.replace(/-/g, '');
                                    }
                                    input.value = value;
                                });
                            </script>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="inputDescriptionM" class="form-label">Descrição</label>
                                <textarea
                                    class="form-control"
                                    name="inputDescriptionO"
                                    id="inputDescriptionO"
                                    rows="5"
                                    style="resize: none;"
                                    aria-describedby="Descrição"><?php echo isset($_SESSION['obj_data']['descricao']) ? htmlspecialchars($_SESSION['obj_data']['descricao'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
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
                                        while ($row = $result->fetch_assoc()) {
                                            $idCategoria = $row['ID_Categoria'];
                                            $nome = $row['Nome'];
                                            $descricao = $row['Descricao'];
                                            $imagem = htmlspecialchars_decode($row['Imagem']);
                                            $cor = $row['Cor'];
                                            $checked = isset($_SESSION['obj_data']['idCategoria']) && $_SESSION['obj_data']['idCategoria'] == $idCategoria ? 'checked' : '';

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
                            <div class="col-md-12">
                                <label for="montante" class="form-label">Montante Inicial</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="inputValorInicial"
                                    id="inputValorInicial"
                                    value="<?php echo isset($_SESSION['obj_data']['montante']) ? htmlspecialchars($_SESSION['obj_data']['montante'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                <div class="form-text">Opcional</div>
                            </div>
                        </div>
                        <script>
                            document.getElementById('inputValorInicial').addEventListener('input', function(e) {
                                let input = e.target;
                                let value = input.value;
                                if (value.includes('-')) {
                                    value = value.replace(/-/g, '');
                                }
                                input.value = value;
                            });
                        </script>

                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5 py-2"
                                    style="background-color: #353535; border: none;">Submeter</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>