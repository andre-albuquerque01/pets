-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12-Out-2022 às 00:30
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE pet
--
use pet
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_ad`
--

CREATE TABLE `cadastro_ad` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `whatsapp` varchar(14) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `localizacao` varchar(80) DEFAULT NULL,
  `AD_ativo_desativo` char(1) DEFAULT NULL,
  `Date_Ad` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cadastro_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_ad`
--

INSERT INTO `cadastro_ad` (`id`, `imagem`, `titulo`, `descricao`, `telefone`, `whatsapp`, `valor`, `localizacao`, `AD_ativo_desativo`, `Date_Ad`, `cadastro_cliente`) VALUES
(1, '02_40_32-11_10_2022.png', 'Carrinho', 'Carrinho de compra', NULL, '61985261294', 25.2, 'Brasília', 'a', '2022-10-11 00:40:32', 2),
(2, '02_40_59-11_10_2022.png', 'Carrinho', 'Carrinho de compra', NULL, '61985261294', 4, 'Brasília', 'a', '2022-10-11 00:40:59', 2),
(3, '02_44_01-11_10_2022.jpg', 'Carrinho', 'Carrinho de compra', NULL, '61985261294', 1212, 'Brasília', 'a', '2022-10-11 00:44:01', 2),
(4, '02_44_39-11_10_2022.jpg', 'Carrinho', 'Carrinho de compra', NULL, '61985261294', 1, 'SMB', 'a', '2022-10-11 00:44:39', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_cliente`
--

CREATE TABLE `cadastro_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(145) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cidade` varchar(80) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `desc_perf` varchar(10) DEFAULT NULL,
  `termo_concientizacao` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_cliente`
--

INSERT INTO `cadastro_cliente` (`id`, `nome`, `cep`, `estado`, `cidade`, `telefone`, `email`, `senha`, `desc_perf`, `termo_concientizacao`) VALUES
(1, 'André', 72316100, 'DF', 'Samambaia', '61985261944', 'andregonsalves2011@gmail.com', 'MQ==', 'adm', 's'),
(2, '1', 72316100, 'DF', 'Brasília', '61985261294', 'andrealbuquerque2001@gmail.com', 'Mg==', 'user', 's');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_ad`
--
ALTER TABLE `cadastro_ad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cadastro_cliente` (`cadastro_cliente`);

--
-- Índices para tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_ad`
--
ALTER TABLE `cadastro_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastro_ad`
--
ALTER TABLE `cadastro_ad`
  ADD CONSTRAINT `fk_cadastro_cliente` FOREIGN KEY (`cadastro_cliente`) REFERENCES `cadastro_cliente` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
