<div class="content flex-grow-1 py-4">
  <div class="row g-3 mb-4">
    <div class="col-xxl-3 col-6">
      <div class="card border-0 shadow anima-card">
        <div class="row g-0">
          <div class="col-3">
            <img src="images/SALDO.png" class="money-icon rounded-start" alt="SALDO">
          </div>
          <div class="col-9">
            <div class="card-body">
              <p class="card-text-mini">SALDO</p>
              <h5 class="card-title-mini">
                <?php
                if (isset($_SESSION['Utilizador'])) {
                  $idUtilizador = $_SESSION['Utilizador'];

                  $sql = "SELECT saldo FROM dados_pessoais WHERE ID_Utilizador = ?";
                  $stmt = $bd->prepare($sql);
                  if ($stmt) {
                    $stmt->bind_param("i", $idUtilizador);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      $saldoUtilizador = $row['saldo'];

                      echo htmlspecialchars($saldoUtilizador) . "€";
                    } else {
                      echo "Falha a achar o saldo.";
                    }
                    $stmt->close();
                  } else {
                    echo "Erro ao preparar a consulta: " . $bd->error;
                  }
                } else {
                  echo "Sessão não definida. Por favor, faça login.";
                }
                ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xxl-3 col-6">
      <div class="card  border-0 shadow anima-card">
        <div class="row g-0">
          <div class="col-3">
            <img src="images/BALANÇO.png" class="money-icon rounded-start" alt="SALDO">
          </div>
          <div class="col-9">
            <div class="card-body">
              <p class="card-text-mini">BALANÇO</p>
              <h5 class="card-title-mini">
                <?php
                if (isset($_SESSION['Utilizador'])) {

                  $query = "SELECT montante FROM transacoes WHERE ID_Utilizador = ?";

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
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xxl-3 col-6">
      <div class="card  border-0 shadow anima-card">
        <div class="row g-0">
          <div class="col-3">
            <img src="images/OBJETIVOS.png" class="money-icon rounded-start" alt="SALDO">
          </div>
          <div class="col-9">
            <div class="card-body">
              <p class="card-text-mini">OBJETIVOS</p>
              <h5 class="card-title-mini">
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
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xxl-3 col-6">
      <div class="card  border-0 shadow anima-card">
        <div class="row g-0">
          <div class="col-3">
            <img src="images/TRANSAÇÕES.png" class="money-icon rounded-start" alt="SALDO">
          </div>
          <div class="col-9">
            <div class="card-body">
              <p class="card-text-mini">TRANSAÇÕES</p>
              <h5 class="card-title-mini">
                <?php
                if (isset($_SESSION['Utilizador'])) {

                  $idUtilizador = $_SESSION['Utilizador'];

                  $sql = "SELECT COUNT(*) AS total_movimentos FROM transacoes WHERE ID_Utilizador = ?";
                  $stmt = $bd->prepare($sql);

                  if ($stmt) {
                    $stmt->bind_param("i", $idUtilizador);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      $totalMovimentos = $row['total_movimentos'];

                      echo  $totalMovimentos;
                    } else {
                      echo "Nenhum movimento encontrado para este utilizador.";
                    }

                    // Fecha a consulta
                    $stmt->close();
                  } else {
                    echo "Erro ao preparar a consulta: " . $bd->error;
                  }
                } else {
                  echo "Sessão não definida. Por favor, faça login.";
                }
                ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow">
    <div class="card-header">
      <h4 class="card-title">Movimentos</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 fixed-width-table">
          <thead>
            <tr class="table-primary">
              <th class="item-tamanho">Titulo</th>
              <th class="item-tamanho">Descrição</th>
              <th class="item-tamanho">Montante</th>
              <th class="item-tamanho">Categoria</th>
              <th class="item-tamanho">Data</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['Utilizador'])) {
              $idUtilizador = $_SESSION['Utilizador'];
              $sql = "
<<<<<<< HEAD
    SELECT 
        t.Nome AS TransacaoNome,
        t.Data,
        t.Montante,
        t.Descricao,
        c.Nome AS CategoriaNome
    FROM transacoes t
    JOIN categorias c ON t.ID_Categoria = c.ID_Categoria
    WHERE t.ID_Utilizador = ?
    ORDER BY t.Data DESC, t.ID_Transacao DESC
";



=======
        SELECT 
            t.ID_Transacao,   -- Adicionado o ID da transação
            t.Nome AS TransacaoNome,
            t.Data,
            t.Montante,
            t.Descricao,
            c.Nome AS CategoriaNome
        FROM transacoes t
        JOIN categorias c ON t.ID_Categoria = c.ID_Categoria
        WHERE t.ID_Utilizador = ?
        ORDER BY t.Data DESC
    ";
>>>>>>> b588f8c (Grande Milestone)

              $stmt = $bd->prepare($sql);
              if ($stmt) {
                $stmt->bind_param("i", $idUtilizador);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {

                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // Colocando o link <a> em torno de cada célula de dados (td)
                    echo "<td><a href='index.php?page=editar_movimentos&id=" . $row['ID_Transacao'] . "'>" . htmlspecialchars($row['TransacaoNome']) . "</a></td>";
                    echo "<td><a href='index.php?page=editar_movimentos&id=" . $row['ID_Transacao'] . "'>" . htmlspecialchars($row['Descricao']) . "</a></td>";
                    echo "<td><a href='index.php?page=editar_movimentos&id=" . $row['ID_Transacao'] . "'>" . htmlspecialchars($row['Montante']) . "€</a></td>";
                    echo "<td><a href='index.php?page=editar_movimentos&id=" . $row['ID_Transacao'] . "'>" . htmlspecialchars($row['CategoriaNome']) . "</a></td>";
                    echo "<td><a href='index.php?page=editar_movimentos&id=" . $row['ID_Transacao'] . "'>" . htmlspecialchars($row['Data']) . "</a></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='5'>Nenhuma transação encontrada.</td></tr>";
                }

                $stmt->close();
              } else {
                echo "Erro ao preparar a consulta: " . $conn->error;
              }
            } else {
              echo "Sessão não definida. Por favor, faça login.";
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>