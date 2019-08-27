-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Ago-2019 às 21:45
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prosa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_medicao`
--

CREATE TABLE `ponto_medicao` (
  `id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_has_usuario`
--

CREATE TABLE `projeto_has_usuario` (
  `projeto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id` bigint(20) NOT NULL,
  `horario_inicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `horario_final` timestamp NULL DEFAULT NULL,
  `ponto_medicao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ponto_medicao`
--
ALTER TABLE `ponto_medicao`
  ADD PRIMARY KEY (`id`,`projeto_id`),
  ADD KEY `fk_ponto_medicao_projeto_idx` (`projeto_id`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projeto_has_usuario`
--
ALTER TABLE `projeto_has_usuario`
  ADD PRIMARY KEY (`projeto_id`,`usuario_id`),
  ADD KEY `fk_projeto_has_usuario_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_projeto_has_usuario_projeto1_idx` (`projeto_id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`,`ponto_medicao_id`),
  ADD KEY `fk_registro_ponto_medicao_idx` (`ponto_medicao_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ponto_medicao`
--
ALTER TABLE `ponto_medicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ponto_medicao`
--
ALTER TABLE `ponto_medicao`
  ADD CONSTRAINT `fk_ponto_medicao_projeto` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto_has_usuario`
--
ALTER TABLE `projeto_has_usuario`
  ADD CONSTRAINT `fk_projeto_has_usuario_projeto1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_has_usuario_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_registro_ponto_medicao` FOREIGN KEY (`ponto_medicao_id`) REFERENCES `mydb`.`ponto_medicao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
