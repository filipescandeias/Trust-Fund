<div class="content flex-grow-1 py-4">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-md-4 col-sm-5 col-12">
            <div class="card h-100 d-flex align-items-center justify-content-center">
                <div class="card-body text-center">
                    <!-- Imagem redonda -->
                    <div class="profile-image-wrapper">
                        <img src="images/pessoa.jpg" alt="Foto de Perfil" class="profile-image-big" id="profile-image">
                    </div>
                    <!-- Botão para modificar a imagem -->
                    <button class="btn btn-primary mt-3" id="modificar-imagem-btn">Modificar Imagem</button>
                    <!-- Input hidden para selecionar a imagem -->
                    <input type="file" id="file-input" class="d-none" accept="image/*">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center py-4">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header">
                    <h4 class="card-title">Dados Pessoais</h4>
                </div>
                <div class="card-body">
                    <?php
                    // Verifica se o ID do utilizador está na sessão
                    if (isset($_SESSION['Utilizador'])) {
                        // Inclui a conexão com o banco de dados
                        include 'php/conecta.php';

                        // Obtem o ID do utilizador da sessão
                        $idUtilizador = $_SESSION['Utilizador'];

                        // Consulta SQL para buscar os dados do utilizador
                        $sql = "
                            SELECT Nome, Data_Nasc, Email
                            FROM utilizadores
                            WHERE ID_Utilizador = ? 
                        ";

                        // Prepara a consulta
                        if ($stmt = $bd->prepare($sql)) {
                            // Vincula o parâmetro
                            $stmt->bind_param("i", $idUtilizador);

                            // Executa a consulta
                            if ($stmt->execute()) {
                                // Vincula o resultado
                                $stmt->bind_result($nome, $dataNascimento, $email);

                                // Busca o primeiro (e único) resultado
                                if ($stmt->fetch()) {
                                    // Formatar a data de nascimento
                                    $dataNascimentoFormatted = date('d-m-Y', strtotime($dataNascimento));
                                } else {
                                    echo "Usuário não encontrado.";
                                    exit();
                                }

                                // Fecha a consulta
                                $stmt->close();
                            } else {
                                echo "Erro ao executar a consulta.";
                                exit();
                            }
                        } else {
                            echo "Erro ao preparar a consulta.";
                            exit();
                        }
                    } else {
                        echo "Usuário não logado.";
                        exit();
                    }
                    ?>

                    <div class="row text-center">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <h4 id="nome_pessoa"><?= htmlspecialchars($nome) ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <h4 id="data_nascimento_pessoa"><?= $dataNascimentoFormatted ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <h4 id="email_pessoa"><?= htmlspecialchars($email) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <div class="col-12 mb-4">
                        <button type="button" id="alterar_perfil" class="btn btn-primary">Alterar Perfil</button>
                        <button type="button" id="salvar_perfil" class="btn btn-primary d-none">Salvar</button>
                        <button type="button" id="cancelar_perfil" class="btn btn-secondary d-none">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Seleciona os elementos necessários
    const modificarImagemBtn = document.getElementById('modificar-imagem-btn');
    const fileInput = document.getElementById('file-input');
    const profileImage = document.getElementById('profile-image');

    // Quando o botão de modificar imagem for clicado, abre o seletor de arquivos
    modificarImagemBtn.addEventListener('click', () => {
        fileInput.click();
    });

    // Quando um arquivo for selecionado, atualiza a imagem
    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
                // Envia a imagem para o servidor
                uploadImage(file);
            };
            reader.readAsDataURL(file);
        }
    });

    // Função para enviar a imagem para o servidor
    function uploadImage(file) {
        const formData = new FormData();
        formData.append('imagem_perfil', file);

        // Enviar a imagem via AJAX para o servidor
        fetch('php/salvar_imagem.php', {  // Caminho corrigido para 'php/salvar_imagem.php'
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Imagem de perfil atualizada com sucesso!');
            } else {
                alert('Erro ao atualizar a imagem de perfil.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao enviar a imagem.');
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const alterarPerfilBtn = document.getElementById('alterar_perfil');
        const salvarPerfilBtn = document.getElementById('salvar_perfil');
        const cancelarPerfilBtn = document.getElementById('cancelar_perfil');
        const campos = [{
                id: 'nome_pessoa',
                tipo: 'text'
            },
            {
                id: 'email_pessoa',
                tipo: 'email'
            },
            {
                id: 'data_nascimento_pessoa',
                tipo: 'date'
            }
        ];

        function formatarParaISO(dataBR) {
            const [dia, mes, ano] = dataBR.split('-');
            return `${ano}-${mes}-${dia}`;
        }

        function formatarParaBR(dataISO) {
            const [ano, mes, dia] = dataISO.split('-');
            return `${dia}-${mes}-${ano}`;
        }

        alterarPerfilBtn.addEventListener('click', () => {
            campos.forEach(campo => {
                const elemento = document.getElementById(campo.id);
                let valorAtual;
                if (campo.tipo === 'date') {
                    const dataTexto = elemento.textContent.trim();
                    valorAtual = formatarParaISO(dataTexto);
                } else {
                    valorAtual = elemento.textContent.trim();
                }

                const input = document.createElement('input');
                input.type = campo.tipo;
                input.value = valorAtual;
                input.classList.add('form-control', 'text-center');
                input.id = `input_${campo.id}`;

                elemento.parentNode.replaceChild(input, elemento);
            });

            alterarPerfilBtn.classList.add('d-none');
            salvarPerfilBtn.classList.remove('d-none');
            cancelarPerfilBtn.classList.remove('d-none');
        });

        cancelarPerfilBtn.addEventListener('click', () => {
            campos.forEach(campo => {
                const input = document.getElementById(`input_${campo.id}`);
                let valorOriginal = input.value;
                if (campo.tipo === 'date') {
                    valorOriginal = formatarParaBR(valorOriginal);
                }

                const texto = document.createElement('h4');
                texto.textContent = valorOriginal;
                texto.id = campo.id;

                input.parentNode.replaceChild(texto, input);
            });

            alterarPerfilBtn.classList.remove('d-none');
            salvarPerfilBtn.classList.add('d-none');
            cancelarPerfilBtn.classList.add('d-none');
        });

        salvarPerfilBtn.addEventListener('click', () => {
            const formData = new FormData();
            campos.forEach(campo => {
                const input = document.getElementById(`input_${campo.id}`);
                let novoValor = input.value;
                if (campo.tipo === 'date') {
                    novoValor = formatarParaBR(novoValor);
                }

                formData.append(campo.id, novoValor);
            });

            // Enviar para o servidor via AJAX
            fetch('php/salvar_perfil.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reverter para texto e atualizar o HTML
                    campos.forEach(campo => {
                        const texto = document.createElement('h4');
                        texto.textContent = formData.get(campo.id);
                        texto.id = campo.id;

                        const input = document.getElementById(`input_${campo.id}`);
                        input.parentNode.replaceChild(texto, input);
                    });

                    alterarPerfilBtn.classList.remove('d-none');
                    salvarPerfilBtn.classList.add('d-none');
                    cancelarPerfilBtn.classList.add('d-none');
                } else {
                    alert('Erro ao salvar as alterações');
                }
            });
        });
    });
</script>
