-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Jun-2019 às 19:57
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculo`
--

CREATE TABLE `curriculo` (
  `id` int(11) NOT NULL,
  `foto` text,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `idade` int(3) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `filho` varchar(50) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `telefone_um` varchar(100) NOT NULL,
  `telefone_dois` varchar(100) NOT NULL,
  `email` varchar(252) NOT NULL,
  `email_perfil` varchar(200) NOT NULL,
  `objetivo` text NOT NULL,
  `curso` varchar(200) NOT NULL,
  `instituicao` varchar(200) NOT NULL,
  `conclusao` varchar(200) NOT NULL,
  `data_de_conclusao` varchar(200) NOT NULL,
  `empresa` varchar(200) NOT NULL,
  `ano_de_entrada` varchar(200) NOT NULL,
  `ano_de_saida` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `atividades` text NOT NULL,
  `qualificacoes` text NOT NULL,
  `informacoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nome_da_empresa` varchar(200) NOT NULL,
  `nome_do_responsavel` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(5) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cnpj` varchar(200) NOT NULL,
  `senha` varchar(1024) NOT NULL,
  `newsletter` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idade` int(2) NOT NULL,
  `filhos` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(5) NOT NULL,
  `estadocivil` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `curriculo` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `sexo`, `idade`, `filhos`, `cpf`, `nacionalidade`, `endereco`, `estado`, `cidade`, `telefone`, `celular`, `senha`, `numero`, `estadocivil`, `newsletter`, `curriculo`) VALUES
(45, 'Cláudio Vinícius dos Santos Nascimento', 'debonair.skilo@gmail.com', 'masculino', 18, 'Não', '413.227.148-00', 'Brasileiro', 'Rua Tereza Albino Chacom', 'SP', 'Caraguatatuba', '(12)3887-8612', '(12)98100-8355', '$2a$10$Cf1f11ePArKlBJomM0F6a.OQ/QD6EiNBW.XRNLwFbROT31TcGX/jK', 105, 'Solteiro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `validacao`
--

CREATE TABLE `validacao` (
  `id` int(11) NOT NULL,
  `email_validacao` varchar(300) NOT NULL,
  `token_um` int(6) NOT NULL,
  `token_dois` int(6) NOT NULL,
  `data_expirar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curriculo`
--
ALTER TABLE `curriculo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_perfil` (`email_perfil`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_da_empresa` (`nome_da_empresa`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `validacao`
--
ALTER TABLE `validacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curriculo`
--
ALTER TABLE `curriculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `validacao`
--
ALTER TABLE `validacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `apagarvalidacao` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-05-27 17:32:47' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM validacao WHERE data_expirar < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
