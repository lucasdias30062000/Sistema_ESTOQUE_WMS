-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/02/2024 às 00:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dtbstoq`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdcadloc`
--

CREATE TABLE `tbdcadloc` (
  `id_armazem` int(11) NOT NULL,
  `nm_armazem` varchar(50) NOT NULL,
  `rua_armazem` varchar(20) NOT NULL,
  `baia_armazem` varchar(20) NOT NULL,
  `nv_armazem` varchar(20) NOT NULL,
  `vao_armazem` int(11) NOT NULL,
  `comp_armazem` int(50) NOT NULL,
  `alt_armazem` int(50) NOT NULL,
  `larg_armazem` int(50) NOT NULL,
  `volume_armazem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdcadloc`
--

INSERT INTO `tbdcadloc` (`id_armazem`, `nm_armazem`, `rua_armazem`, `baia_armazem`, `nv_armazem`, `vao_armazem`, `comp_armazem`, `alt_armazem`, `larg_armazem`, `volume_armazem`) VALUES
(1, 'PRINCIPAL', '3', '5', '3', 7, 50, 30, 20, 30000),
(2, 'PRINCIPAL', '2', '5', '5', 5, 50, 40, 30, 60000),
(3, 'PRINCIPAL', '5', '3', '4', 9, 10, 5, 5, 250),
(4, 'PRINCIPAL', '12', '7', '5', 6, 30, 20, 7, 4200),
(5, 'PRINCIPAL', '3', '5', '10', 11, 41, 31, 31, 39401),
(6, 'PRINCIPAL Sergio', '10', '5', '7', 9, 35, 40, 45, 63000),
(7, 'PRINCIPAL TESTE', '3', '2', '5', 7, 8, 7, 4, 224);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdcadprod`
--

CREATE TABLE `tbdcadprod` (
  `id_Produto` int(11) NOT NULL,
  `nm_Produto` varchar(50) NOT NULL,
  `vl_Valor` double NOT NULL,
  `ds_Produto` varchar(50) NOT NULL,
  `comp_Produto` double NOT NULL,
  `alt_Produto` double NOT NULL,
  `larg_Produto` double NOT NULL,
  `qtd_Produto` int(20) NOT NULL,
  `volume_Produto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdcadprod`
--

INSERT INTO `tbdcadprod` (`id_Produto`, `nm_Produto`, `vl_Valor`, `ds_Produto`, `comp_Produto`, `alt_Produto`, `larg_Produto`, `qtd_Produto`, `volume_Produto`) VALUES
(1, 'Mouse', 53, 'Led RGB', 10, 4, 5, 0, 200),
(2, 'Monitor LED', 1.3, 'DELL', 40, 30, 30, 1, 36000),
(3, 'Teclado', 150, 'Multilaser', 40, 8, 15, 0, 4800),
(4, 'PLACA DE VÍDEO', 2.55, 'NVIDIA', 20, 2, 10, 1, 400),
(5, 'GABINETE GAMER', 1.2, 'RAZER', 30, 40, 30, 1, 36000),
(6, 'CPU Sergio', 1200, 'rgb', 15, 30, 20, 0, 9000),
(7, 'PRINCIPAL TESTE', 300, 'TESTE', 8, 7, 4, 0, 224);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdordementrada`
--

CREATE TABLE `tbdordementrada` (
  `id_OrdemEntrada` int(11) NOT NULL,
  `id_Produto` int(11) NOT NULL,
  `id_armazem` int(11) NOT NULL,
  `qtd_Produto` int(11) NOT NULL,
  `dt_Atualizacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdordementrada`
--

INSERT INTO `tbdordementrada` (`id_OrdemEntrada`, `id_Produto`, `id_armazem`, `qtd_Produto`, `dt_Atualizacao`) VALUES
(150, 2, 2, 0, '2023-11-14 00:29:17'),
(151, 4, 1, 0, '2023-11-14 00:31:41'),
(152, 0, 0, 1, '2023-11-25 13:50:37'),
(153, 0, 0, 1, '2023-11-25 13:50:40'),
(154, 0, 0, 1, '2023-11-25 13:50:44'),
(155, 0, 0, 1, '2023-11-25 13:50:51'),
(156, 6, 1, 0, '2023-11-25 14:14:48'),
(157, 1, 3, 0, '2023-11-25 20:03:09'),
(158, 1, 7, 0, '2023-11-25 21:26:46'),
(159, 1, 7, 0, '2023-11-26 21:23:03'),
(160, 1, 7, 0, '2023-11-27 01:45:24'),
(161, 4, 4, 0, '2023-11-30 17:47:05'),
(162, 4, 1, 1, '2024-02-22 19:47:59'),
(163, 4, 1, 1, '2024-02-22 19:50:07'),
(164, 4, 1, 1, '2024-02-22 19:52:11'),
(165, 5, 2, 1, '2024-02-22 19:56:29'),
(166, 2, 5, 1, '2024-02-22 19:57:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdordemsaida`
--

CREATE TABLE `tbdordemsaida` (
  `id_OrdemSaida` int(11) NOT NULL,
  `id_Produto` int(11) NOT NULL,
  `qtd_Produto` int(11) NOT NULL,
  `dt_OrdemSaida` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdordemsaida`
--

INSERT INTO `tbdordemsaida` (`id_OrdemSaida`, `id_Produto`, `qtd_Produto`, `dt_OrdemSaida`) VALUES
(6, 4, 15, '2023-11-14 01:06:53'),
(7, 2, 1, '2023-11-25 14:32:45'),
(8, 1, 3, '2023-11-25 21:27:33'),
(9, 4, 1, '2023-11-26 20:37:50'),
(10, 1, 1, '2023-11-26 20:38:14'),
(11, 4, 1, '2023-11-26 20:38:46'),
(12, 4, 3, '2023-11-26 20:39:01'),
(13, 1, 1, '2023-11-26 20:47:40'),
(14, 1, 1, '2023-11-26 20:48:14'),
(15, 1, 1, '2023-11-26 20:52:37'),
(16, 2, 1, '2023-11-26 20:54:00'),
(17, 6, 1, '2023-11-26 20:54:43'),
(18, 1, 1, '2023-11-26 21:51:43'),
(19, 1, 5, '2023-11-26 21:58:07'),
(20, 1, 2, '2023-11-27 01:54:50'),
(21, 4, 1, '2024-02-22 19:49:04'),
(22, 4, 1, '2024-02-22 19:51:33'),
(23, 4, 1, '2024-02-22 19:51:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(5) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `senha`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbdcadloc`
--
ALTER TABLE `tbdcadloc`
  ADD PRIMARY KEY (`id_armazem`);

--
-- Índices de tabela `tbdcadprod`
--
ALTER TABLE `tbdcadprod`
  ADD PRIMARY KEY (`id_Produto`);

--
-- Índices de tabela `tbdordementrada`
--
ALTER TABLE `tbdordementrada`
  ADD PRIMARY KEY (`id_OrdemEntrada`) USING BTREE;

--
-- Índices de tabela `tbdordemsaida`
--
ALTER TABLE `tbdordemsaida`
  ADD PRIMARY KEY (`id_OrdemSaida`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbdcadloc`
--
ALTER TABLE `tbdcadloc`
  MODIFY `id_armazem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbdcadprod`
--
ALTER TABLE `tbdcadprod`
  MODIFY `id_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbdordementrada`
--
ALTER TABLE `tbdordementrada`
  MODIFY `id_OrdemEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de tabela `tbdordemsaida`
--
ALTER TABLE `tbdordemsaida`
  MODIFY `id_OrdemSaida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
