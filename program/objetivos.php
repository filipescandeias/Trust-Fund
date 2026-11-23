<div class="content flex-grow-1 py-4">
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



    <!-- Conteúdo Principal -->
    <div class="row">
        <!-- Card Principal -->
        <div class="col-11 col-md-10 col-lg-15">
            <div class="card-container bg-gradient-orange"
                style="min-height: 300px; padding: 20px; position: relative;">
                <!-- Top Section -->
                <div class="top-text text-white" style="margin-bottom: 30px;">
                    <h5 style="font-weight: bold;">Objetivos</h5>
                </div>

                <!-- Middle Section -->
                <div class="middle-text" style="margin-bottom: 50px; width:80%;">
                    <p style="font-size: 1rem; color: #fff;">Nesta página pode ver os seus objetivos, criar novos e ver
                        o nivel percentual e monetário que você está para completar cada objetivo</p>
                </div>

                <!-- Bottom Section -->
                <div class="bottom-content">
                    <div class="stats-card">
                        <div class="icon-container large-icon"
                            style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); opacity: 0.1;">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0 text-white">Valor total dos objetivos</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-15">
                                <h2 class="d-flex align-items-center mb-0 text-white">
                                    <?php
                                    if (isset($_SESSION['Utilizador'])) {

                                        $query = "SELECT montante FROM objetivos WHERE ID_Utilizador = ?";

                                        $stmt = $bd->prepare($query);
                                        if ($stmt === false) {
                                            die('Erro ao preparar a consulta: ' . $bd->error);
                                        }

                                        $stmt->bind_param("i", $_SESSION['Utilizador']);

                                        $stmt->execute();

                                        $stmt->bind_result($valor);

                                        $totalMontantes = 0;

                                        while ($stmt->fetch()) {
                                            $totalMontantes += $valor;
                                        }
                                        echo number_format($totalMontantes, 2);

                                        $stmt->close();
                                    } else {
                                        echo "Erro: Variáveis necessárias não definidas!";
                                    }
                                    ?>

                                </h2>
                            </div>
                            <div class="col-4 text-right text-white">
                                <span>

                                    <?php
                                    if (isset($_SESSION['Utilizador'])) {
                                        $query = "SELECT montante FROM objetivos WHERE ID_Utilizador = ?";
                                        $stmt = $bd->prepare($query);
                                        if ($stmt === false) {
                                            die('Erro ao preparar a consulta: ' . $bd->error);
                                        }
                                        $stmt->bind_param("i", $_SESSION['Utilizador']);
                                        $stmt->execute();
                                        $stmt->bind_result($valor2);

                                        $totalMontantes = 0;
                                        while ($stmt->fetch()) {
                                            $totalMontantes += $valor2;
                                        }
                                        $stmt->close();

                                        $query = "SELECT progresso FROM objetivos WHERE ID_Utilizador = ?";
                                        $stmt = $bd->prepare($query);
                                        if ($stmt === false) {
                                            die('Erro ao preparar a consulta: ' . $bd->error);
                                        }
                                        $stmt->bind_param("i", $_SESSION['Utilizador']);
                                        $stmt->execute();
                                        $stmt->bind_result($progresso);

                                        $totalProgresso = 0;
                                        while ($stmt->fetch()) {
                                            $totalProgresso += $progresso;
                                        }
                                        $stmt->close();

                                        if ($totalMontantes > 0) {
                                            $res = ($totalProgresso / $totalMontantes) * 100;
                                            $res = round($res, 0);

                                            echo  $res . "%<i class='fa fa-arrow-up'></i></span>
                                                </div>
                                            </div>
                                            <div class='progress mt-1' data-height='8' style='height: 8px;'>
                                                <div class='progress-bar bg-gradient-cyan' role='progressbar' data-width='" . $res . "%'
                                                    aria-valuenow='" . $res . "' aria-valuemin='0' aria-valuemax='100' style='width: " . $res . "%;'></div>
                                            </div>";
                                        } else {
                                            echo  "0%</span>
                                                </div>
                                            </div>
                                            <div class='progress mt-1' data-height='8' style='height: 8px;'>
                                                <div class='progress-bar bg-gradient-cyan' role='progressbar' data-width='0%'
                                                    aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%;'></div>
                                            </div>";
                                        }
                                    } else {
                                        echo "Erro: Variáveis necessárias não definidas!";
                                    }
                                    ?>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cards Menores em Coluna -->
                <div class="col-11 col-md-10 col-lg-15 mt-4">
                    <?php
                    if (isset($_SESSION['Utilizador'])) {
                        $query = "
        SELECT 
            objetivos.ID_Objetivo, 
            objetivos.Nome AS objetivo_nome, 
            categorias.Nome AS categoria_nome, 
            objetivos.Montante, 
            objetivos.Descricao, 
            objetivos.Progresso 
        FROM objetivos 
        INNER JOIN categorias ON objetivos.Categoria = categorias.ID_Categoria
        WHERE objetivos.ID_Utilizador = ?
        ORDER BY objetivos.ID_Objetivo DESC
        ";

                        $stmt = $bd->prepare($query);
                        if ($stmt === false) {
                            die('Erro ao preparar a consulta: ' . $bd->error);
                        }

                        $stmt->bind_param("i", $_SESSION['Utilizador']);
                        $stmt->execute();
                        $stmt->bind_result($idObjetivo, $nomeObjetivo, $nomeCategoria, $montante, $descricao, $progresso);

                        while ($stmt->fetch()) {
                            $resp = ($progresso * 100) / $montante;
                            $resp = round($resp, 0);
                            $current_page == 'objetivos';
                            echo "
            <form action='index.php?page=deta_obj' method='POST' class='text-decoration-none'>
                <input type='hidden' name='idObjetivo' value='".$idObjetivo."'>
                <button type='submit' class='w-100 p-0 border-0 bg-transparent'>
                    <div class='smaller-card shadow mb-3'>
                        <h6 class='smaller-card-title'>{$nomeObjetivo}</h6>
                        <div class='progress mt-2' role='progressbar' aria-label='Example with label' aria-valuenow='" . $resp . "'
                            aria-valuemin='0' aria-valuemax='100'>
                            <div class='progress-bar' style='width: " . $resp . "%'>" . $resp . "%</div>
                        </div>
                    </div>
                </button>
            </form>";
                        }

                        $stmt->close();
                    } else {
                        echo "Erro: Variáveis necessárias não definidas!";
                    }
                    ?>
                </div>

            </div>
        </div>