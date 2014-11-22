-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.5.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para db_sispantur
CREATE DATABASE IF NOT EXISTS `db_sispantur` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_sispantur`;


-- Copiando estrutura para tabela db_sispantur.tb_cars
CREATE TABLE IF NOT EXISTS `tb_cars` (
  `id_cars` int(11) NOT NULL AUTO_INCREMENT,
  `montadora` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `chassis` varchar(45) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `ano` varchar(10) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nr_poltrona` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `observacao` text,
  `antt` date DEFAULT NULL,
  `agepan` date DEFAULT NULL,
  `vistec` date DEFAULT NULL,
  `inmetro` date DEFAULT NULL,
  `seguro_inicio` date DEFAULT NULL,
  `seguro_final` date DEFAULT NULL,
  PRIMARY KEY (`id_cars`),
  UNIQUE KEY `id_cars_UNIQUE` (`id_cars`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_cars: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_cars` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_cars` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_clients
CREATE TABLE IF NOT EXISTS `tb_clients` (
  `id_clients` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `loc_embarque` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `observacao` text,
  `cpf` varchar(50) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ult_viagem` date DEFAULT NULL,
  `cor_viagem` date DEFAULT NULL,
  PRIMARY KEY (`id_clients`),
  UNIQUE KEY `id_clients_UNIQUE` (`id_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_clients: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_clients` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_ctasrecpag
CREATE TABLE IF NOT EXISTS `tb_ctasrecpag` (
  `id_ctasrecpag` int(11) NOT NULL AUTO_INCREMENT,
  `id_clients` int(11) DEFAULT NULL,
  `id_movfinan` int(11) DEFAULT NULL,
  `nr_parcela` int(11) DEFAULT NULL,
  `total_parcela` int(11) DEFAULT NULL,
  `id_tour` int(11) DEFAULT NULL,
  `vlr_total` decimal(10,0) DEFAULT NULL,
  `vlr_parcela` decimal(10,0) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_ctasrecpag`),
  UNIQUE KEY `id_ctasrecpag_UNIQUE` (`id_ctasrecpag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_ctasrecpag: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_ctasrecpag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_ctasrecpag` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_drivers
CREATE TABLE IF NOT EXISTS `tb_drivers` (
  `id_drivers` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `rua` varchar(150) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `cnh` varchar(15) DEFAULT NULL,
  `observacao` text,
  `email` varchar(50) DEFAULT NULL,
  `validade_cnh` date DEFAULT NULL,
  PRIMARY KEY (`id_drivers`),
  UNIQUE KEY `id_drivers_UNIQUE` (`id_drivers`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_drivers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_drivers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_drivers` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_movfinan
CREATE TABLE IF NOT EXISTS `tb_movfinan` (
  `id_movfinan` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `valor_total` decimal(10,0) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `id_viagem` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_movfinan`),
  UNIQUE KEY `id_movfinan_UNIQUE` (`id_movfinan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_movfinan: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_movfinan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_movfinan` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_reservs
CREATE TABLE IF NOT EXISTS `tb_reservs` (
  `id_reservs` int(11) NOT NULL AUTO_INCREMENT,
  `nr_poltrona` int(11) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `id_tour` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_movfinan` int(11) DEFAULT NULL,
  `loc_embarque` text,
  `desconto` float DEFAULT NULL,
  `ultima_viagem` date DEFAULT NULL,
  `destino_ultv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_reservs`),
  UNIQUE KEY `id_reservs_UNIQUE` (`id_reservs`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_reservs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_reservs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_reservs` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_tour
CREATE TABLE IF NOT EXISTS `tb_tour` (
  `id_tour` int(11) NOT NULL AUTO_INCREMENT,
  `id_viagem` int(11) DEFAULT NULL,
  `id_car` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `data_retorno` date DEFAULT NULL,
  `id_motorista` int(11) DEFAULT NULL,
  `observacao` text,
  `preco` float DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `alimentacao` float DEFAULT NULL,
  `combustivel` float DEFAULT NULL,
  `outros` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id_tour`),
  UNIQUE KEY `id_tour_UNIQUE` (`id_tour`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_tour: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tour` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tour` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(45) DEFAULT NULL,
  `nome_comp` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `id_users_UNIQUE` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id_users`, `nome_user`, `nome_comp`, `email`, `senha`, `telefone`, `celular`, `status`) VALUES
	(1, 'adm', 'Administrador', 'adm@administrador.com.br', '202cb962ac59075b964b07152d234b70', '3388-0836', '9238-1660', 'A');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;


-- Copiando estrutura para tabela db_sispantur.tb_viagem
CREATE TABLE IF NOT EXISTS `tb_viagem` (
  `id_viagem` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_viagem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_sispantur.tb_viagem: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_viagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_viagem` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
