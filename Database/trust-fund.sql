-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2024 às 04:53
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trust-fund`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `Nome` varchar(800) DEFAULT NULL,
  `Cor` varchar(800) DEFAULT NULL,
  `Descricao` varchar(1500) DEFAULT NULL,
  `Imagem` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `Nome`, `Cor`, `Descricao`, `Imagem`) VALUES
(1, 'Comida', '#FED000', 'Despesas destinadas à compra de alimentos e refeições, incluindo pequenos lanches, fast food, ou refeições rápidas do dia a dia. Ideal para controlar gastos com alimentação fora de casa ou pequenas compras no mercado.', '<i class=\"bi bi-basket-fill text-white\"></i>'),
(2, 'Lazer', '#8bffff', 'Despesas relacionadas a atividades de lazer, como cinema, passeios, assinaturas de streaming, ou pequenas saídas para entretenimento. Ideal para monitorar os gastos com diversão e momentos de relaxamento.', '<i class=\"bi bi-sunset text-white\"></i>\r\n'),
(3, 'Desporto', '#8b0000', 'Despesas relacionadas à prática de atividades físicas e esportivas, como mensalidades de academias, compra de equipamentos esportivos, ingressos para eventos esportivos ou outros itens essenciais para manter um estilo de vida ativo e saudável.', '<i class=\"bi bi-award text-white\"></i>'),
(4, 'Automóvel', '#746d69', 'Despesas relacionadas ao uso e manutenção do automóvel, incluindo combustível, seguro, manutenção, reparos, estacionamento e taxas relacionadas à condução e cuidados com o veículo.', '<i class=\"bi bi-car-front text-white\"></i>'),
(5, 'Empréstimos', '#287233', 'Despesas relacionadas ao pagamento de empréstimos e financiamentos, incluindo parcelas de empréstimos pessoais, créditos ou financiamentos de bens como imóveis e veículos.', '<i class=\"bi bi-credit-card text-white\"></i>'),
(6, 'Viagens', '#A9BDE0', 'Despesas relacionadas a viagens, incluindo passagens, hospedagem, alimentação, transporte e atividades turísticas durante viagens pessoais ou a negócios.', '<i class=\"bi bi-airplane-engines text-white\"></i>'),
(7, 'Compras', '#ff97cf', 'Despesas relacionadas a compras em centros comerciais, incluindo roupas, acessórios, eletrônicos, cosméticos e outros itens adquiridos durante visitas a shoppings ou malls.', '<i class=\"bi bi-bag text-white\"></i>'),
(8, 'Transfêrencia', '#000000', 'Despesas relacionadas a transferências realizadas entre contas bancárias, incluindo pagamentos, depósitos, ou movimentações de dinheiro para outras contas.', '<i class=\"bi bi-arrow-right-circle text-white\"></i>\r\n'),
(10, 'Casa', '#895129', 'Despesas relacionadas à manutenção e cuidado do lar, incluindo contas de serviços públicos (água, luz, gás), compra de mobiliário, utensílios domésticos, reparos e outros custos associados ao funcionamento da casa.', '<i class=\"bi bi-house-door text-white\"></i>'),
(11, 'Subscrições', '#072f57', 'Despesas relacionadas a assinaturas mensais ou anuais, como serviços de streaming, revistas digitais, softwares, plataformas online e outros serviços recorrentes que exigem pagamento regular.', '<i class=\"bi bi-file-earmark-text text-white\"></i>'),
(12, 'Gaming', '#c62d42', 'Despesas relacionadas a jogos, incluindo compras de jogos digitais, microtransações, assinaturas de plataformas de jogos, como Xbox Live, PlayStation Plus, Steam, ou compras dentro de jogos.', '<i class=\"bi bi-controller text-white\"></i>'),
(13, 'Trabalho', '#FFA500', 'Despesas relacionadas à atividade profissional, incluindo compras de materiais de escritório, ferramentas, cursos de capacitação, transporte para o trabalho, ou quaisquer custos necessários para a execução das tarefas e responsabilidades profissionais.', '<i class=\"bi bi-briefcase text-white\"></i>'),
(14, 'Biscates', '#5e4d85', 'Despesas relacionadas a trabalhos informais ou temporários, conhecidos como \'biscates\', como serviços prestados de forma autônoma ou por contratos de curto prazo, incluindo custos com materiais, transporte ou outras despesas associadas a esses serviços.', '<i class=\"bi bi-person-workspace text-white\"></i>'),
(15, 'Outros', '#2e2e2e', 'Despesas que não se enquadram nas categorias específicas, incluindo gastos variados ou imprevistos que não se ajustam a nenhuma das categorias predefinidas, como pequenas compras, presentes, ou outras transações ocasionais.', '<i class=\"bi bi-box text-white\"></i>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pessoais`
--

CREATE TABLE `dados_pessoais` (
  `ID_Dados` int(11) NOT NULL,
  `ID_Utilizador` int(11) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `data_conta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dados_pessoais`
--

INSERT INTO `dados_pessoais` (`ID_Dados`, `ID_Utilizador`, `saldo`, `data_conta`) VALUES
(4, 4, 20, '2024-04-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivos`
--

CREATE TABLE `objetivos` (
  `ID_Objetivo` int(30) NOT NULL,
  `ID_Utilizador` int(30) DEFAULT NULL,
  `Nome` varchar(200) DEFAULT NULL,
  `Categoria` int(30) DEFAULT NULL,
  `Montante` float DEFAULT NULL,
  `Descricao` varchar(1500) DEFAULT NULL,
  `Progresso` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `ID_Transacao` int(30) NOT NULL,
  `ID_Utilizador` int(22) DEFAULT NULL,
  `ID_Categoria` int(30) DEFAULT NULL,
  `Nome` varchar(400) DEFAULT NULL,
  `Descricao` varchar(1000) DEFAULT NULL,
  `Montante` float DEFAULT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`ID_Transacao`, `ID_Utilizador`, `ID_Categoria`, `Nome`, `Descricao`, `Montante`, `Data`) VALUES
(26, 4, 4, 'Carro', 'Pagamento das prestações do carro', -100, '2024-12-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `ID_Utilizador` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Data_Nasc` date DEFAULT NULL,
  `Imagem_perfil` varchar(500) NOT NULL,
  `Password` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`ID_Utilizador`, `Nome`, `Email`, `Data_Nasc`, `Imagem_perfil`, `Password`) VALUES
(4, 'conta_teste', 'conta_teste@gmail.com', '2006-03-31', '', 'ContaTeste20');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Índices para tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  ADD PRIMARY KEY (`ID_Dados`),
  ADD KEY `ID_Utilizador` (`ID_Utilizador`);

--
-- Índices para tabela `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`ID_Objetivo`),
  ADD KEY `ID_Utilizador` (`ID_Utilizador`),
  ADD KEY `Categoria` (`Categoria`);

--
-- Índices para tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`ID_Transacao`),
  ADD KEY `ID_Categoria` (`ID_Categoria`),
  ADD KEY `ID_Utilizador` (`ID_Utilizador`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`ID_Utilizador`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  MODIFY `ID_Dados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `ID_Objetivo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `ID_Transacao` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `ID_Utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  ADD CONSTRAINT `dados_pessoais_ibfk_1` FOREIGN KEY (`ID_Utilizador`) REFERENCES `utilizadores` (`ID_Utilizador`);

--
-- Limitadores para a tabela `objetivos`
--
ALTER TABLE `objetivos`
  ADD CONSTRAINT `objetivos_ibfk_1` FOREIGN KEY (`ID_Utilizador`) REFERENCES `dados_pessoais` (`ID_Dados`),
  ADD CONSTRAINT `objetivos_ibfk_2` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID_Categoria`);

--
-- Limitadores para a tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `transacoes_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`),
  ADD CONSTRAINT `transacoes_ibfk_2` FOREIGN KEY (`ID_Utilizador`) REFERENCES `dados_pessoais` (`ID_Dados`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
