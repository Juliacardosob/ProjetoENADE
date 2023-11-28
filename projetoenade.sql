-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2023 às 00:28
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoenade`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id_adm`, `nome`, `sobrenome`, `email`, `senha`, `apelido`, `foto`) VALUES
(4, 'Rodolfo', 'Sergion', 'rodolfo@gmail.com', '$2y$10$9Xhpykf3ahGfMxjQKqaaLe2IpXS3utXqdgLATH7KJ51GZPht1i7JG', 'rodolfo', 'default.png'),
(5, 'tawany', 'silva', 'tawanysilva@gmail.com', '$2y$10$ASJr0rRg3B31unhKoa3PX.YREQA4fQ73IyAWVuuZD/cImJmcFjz3e', 'tawany', 'default.png'),
(6, 'Gibran', 'admin', 'admin@gmail.com', '$2y$10$8wry/zpB2VwjKSh6LlccKOfJeoDpWPu1MNXe8Zu3KB6DL.ddaMpy.', 'adminGibran', 'default.png'),
(7, 'admin', 'Khalil', 'khalil@gmail.com', '$2y$10$Sl6Zn1Ucg19t6KD4w.DXk.o65DIxToPrUQl0RtTQVGuMKU4CJOIqG', 'khalil', 'default.png'),
(8, 'Admin', 'Yago', 'yago@gmail.com', '$2y$10$CVpkJ2xlHoJ9bWYWPHTqGuqekv74fBRiPNwcjxfXFkEyCj8t2.d2W', 'adminYago', 'default.png'),
(9, 'Admin', 'Tales', 'tales@gmail.com', '$2y$10$eGqwDyuD0Og65CZbpNqVhup439UQ0evZ6nYHsfJbaUyG7e/LAc1.K', 'adminTales', 'default.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questao`
--

CREATE TABLE `questao` (
  `id_questao` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `descricao` text NOT NULL,
  `descricao_fonte` text NOT NULL,
  `enunciado` text NOT NULL,
  `alternativaA` text NOT NULL,
  `alternativaB` text NOT NULL,
  `alternativaC` text NOT NULL,
  `alternativaD` text NOT NULL,
  `alternativaE` text NOT NULL,
  `respostaCorreta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questao`
--

INSERT INTO `questao` (`id_questao`, `ano`, `descricao`, `descricao_fonte`, `enunciado`, `alternativaA`, `alternativaB`, `alternativaC`, `alternativaD`, `alternativaE`, `respostaCorreta`) VALUES
(1, 2021, 'sadasdasdasd', 'sadasdasda', 'sadasdasdasdasd', 'asdasdasdas', 'asdasdasdas', 'asdasdasd', 'asdasdasd', 'asdasdas', 'a'),
(2, 2030, 'vermelho', 'Não há de quer', 'não digiet', 'ajuda', 'ajuda2', 'ajuda3', 'ajuda4', 'ajuda1000', 'b');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

CREATE TABLE `resposta` (
  `id_resposta` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `acertou` tinyint(1) NOT NULL,
  `pontoQuestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `resposta`
--

INSERT INTO `resposta` (`id_resposta`, `id_questao`, `id_usuario`, `acertou`, `pontoQuestao`) VALUES
(10, 1, 1, 1, 10),
(11, 1, 1, 1, 10),
(12, 1, 1, 1, 10),
(13, 1, 1, 1, 10),
(14, 3, 1, 1, 10),
(15, 3, 1, 1, 10),
(16, 1, 1, 1, 10),
(17, 1, 1, 0, 0),
(18, 2, 1, 0, 0),
(19, 3, 1, 1, 10),
(20, 1, 1, 1, 10),
(21, 3, 1, 1, 10),
(22, 1, 1, 1, 10),
(23, 1, 1, 1, 10),
(24, 1, 1, 0, 0),
(25, 3, 2, 1, 10),
(26, 3, 2, 1, 10),
(27, 2, 2, 1, 10),
(28, 2, 2, 1, 10),
(29, 3, 2, 1, 10),
(30, 1, 3, 1, 10),
(31, 1, 3, 1, 10),
(32, 2, 3, 1, 10),
(33, 1, 3, 1, 10),
(34, 2, 3, 1, 10),
(35, 3, 3, 1, 10),
(36, 2, 3, 1, 10),
(37, 1, 4, 1, 10),
(38, 1, 4, 1, 10),
(39, 1, 4, 1, 10),
(40, 2, 4, 1, 10),
(41, 3, 4, 1, 10),
(42, 3, 4, 1, 10),
(43, 2, 4, 1, 10),
(44, 3, 4, 1, 10),
(45, 3, 4, 1, 10),
(46, 3, 4, 1, 10),
(47, 1, 4, 1, 10),
(48, 2, 1, 0, 0),
(49, 4, 1, 0, 0),
(50, 1, 1, 1, 10),
(51, 4, 4, 1, 10),
(52, 3, 5, 1, 10),
(53, 1, 5, 0, 0),
(54, 4, 5, 0, 0),
(55, 2, 5, 0, 0),
(56, 1, 2, 1, 10),
(57, 4, 2, 1, 10),
(58, 4, 3, 1, 1),
(59, 1, 7, 1, 1),
(60, 2, 7, 0, 0),
(61, 1, 11, 1, 1),
(62, 2, 11, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `apelido` varchar(20) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `sobrenome`, `email`, `senha`, `foto`, `apelido`, `pontos`) VALUES
(3, 'Calil', 'Khalil', 'felipe@gmail.com', '$2y$10$iA6qhKx6Fz7sN0iu6zyXQuC9yoebsanPH9TeedYypw.Qx5H9EULvC', 'default.png', 'Morbe', 71),
(4, 'Felps', 'Jorge', 'felps@gmail.com', '$2y$10$G.g0XGj9E0Ugbsifad08ROS1qLbPLdwlEJO1mFeTamNGERhsHtYgC', 'default.png', 'Felps', 120),
(7, 'Gibran', 'khalil', 'gibrankhalil150904@gmail.com', '$2y$10$PPte6vU/oXW2mDQCITfRdezAtB0Bjq2MoSdtF39mNhz4vEz6O/lZe', '25f2d2cf78d35a42bc98300aa913f721ef2b77f37c2e91a9f75b8d7cd20954798978d16cd5c964c93b5b5702340f9677444ecfdd6895be4a6953927d.jpg', 'gibranKhalil', 1),
(8, 'Rodolfo', 'Pereira', 'rodolfo@gmail.com', '$2y$10$547lCxB/YYHvYUEoNAmE5u7e28yKOeU/xL0ct6oQEIpBQDaIob7Ua', 'default.png', 'rodolfo', 0),
(9, 'Governo', 'Vargas', 'vargas@gmail.com', '$2y$10$5QSmt1J9bEi6qYrOh8m9Se06jaEq1vAQ8bVJvC4fY.01a05SO5Aua', 'default.png', 'vargas', 0),
(10, 'felipe', 'Martins', 'gibrankhalil150904@gmail.com', '$2y$10$ckViehEovePLyHamSu0SuuPouoIIYWBsFIUl2S7sS7FTJ3QH3/c5W', 'default.png', 'felipeMartins', 0),
(11, 'Heitor', 'Teste', 'heitor@gmail.com', '$2y$10$U8U8WmKhYIqUFNkF62pHruDB9jxMeZPUmZcPMwz/DOBp7Zb4Vb4Li', 'default.png', 'heitorTeste', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`id_questao`);

--
-- Índices de tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id_resposta`),
  ADD KEY `FK_responde_1` (`id_usuario`),
  ADD KEY `FK_responde_2` (`id_questao`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
