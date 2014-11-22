-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.36 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2014-08-09 09:16:33
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for db_sispantur
CREATE DATABASE IF NOT EXISTS `db_sispantur` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_sispantur`;


-- Dumping structure for table db_sispantur.tb_cars
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_cars: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_cars` DISABLE KEYS */;
INSERT INTO `tb_cars` (`id_cars`, `montadora`, `modelo`, `chassis`, `placa`, `ano`, `codigo`, `nr_poltrona`, `status`, `observacao`, `antt`, `agepan`, `vistec`, `inmetro`, `seguro_inicio`, `seguro_final`) VALUES
	(7, 'Scania Marcopolo', 'LD 1550', '', 'BWF-4567', '2001/2001', '5001', 42, 'A', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
	(8, 'Scania Marcopolo', 'LD 1550', '', 'MCF-3282', '2006/2006', '5006', 44, 'A', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
	(9, 'Mercedes Marcopolo', 'O500', '', 'JHZ-9364', '2009/2009', '5009', 44, 'A', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
	(10, 'Scania Marcopolo', 'LD 1600', '', 'NRZ-2298', '2013/2014', '5013', 44, 'A', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
	(11, 'Scania Marcopolo', 'GV 1450', '', 'IGV-7299', '1995/1998', '5002', 42, 'A', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
/*!40000 ALTER TABLE `tb_cars` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_clients
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_clients: ~65 rows (approximately)
/*!40000 ALTER TABLE `tb_clients` DISABLE KEYS */;
INSERT INTO `tb_clients` (`id_clients`, `nome`, `rua`, `bairro`, `cidade`, `loc_embarque`, `telefone`, `celular`, `data_nascimento`, `observacao`, `cpf`, `rg`, `email`, `ult_viagem`, `cor_viagem`) VALUES
	(7, 'BRUNO MARCOS KUSELIAUSKAS MARTINS', 'RUA DOS ALAMOS, 507', 'CIDADE JARDIM', 'CAMPO GRANDE', '', '(', '(67)9107-6370', '1979-11-20', '', '859.096.701-82', '2035407 SSPMS', 'contato@pantanalsultur.com.br', NULL, NULL),
	(8, 'LUCIENE PERES MARTINS', '', '', 'CAMPO GRANDE', '', '(67)3341-4997', '(67)9212-2344', '0000-00-00', '', '', '57322 SSPMS', '', NULL, NULL),
	(9, 'DIANA LEITE DA SILVA', '', '', '', '', '(67)9255-5531', '(67)9255-5531', '0000-00-00', '', '', '1486218 SSPMS', '', NULL, NULL),
	(10, 'MARCIA CRISTINA PASSAIA', '', '', '', '', '', '', '0000-00-00', '', '', '763319 SSPMS', '', NULL, NULL),
	(11, 'LARISSA LEITE NANTES', '', '', '', 'RODOVIARIA', '(67)3388-5484', '(67)9286-1478', '0000-00-00', '', '', '107227 SSPMS', '', NULL, NULL),
	(12, 'CLARICE PEREIRA DE OLIVEIRA', '', '', '', '', '(67)9919-7361', '(67)9919-7361', '0000-00-00', '', '', '847096 SSPMS', '', NULL, NULL),
	(13, 'AMELIA TEREZINHA P. NANTES COELHO', '', '', '', '', '(67)9245-7141', '(67)9245-7141', '0000-00-00', '', '', '362056 SSPMS', '', NULL, NULL),
	(14, 'AMIRA HIJAZI GHADDARA', '', '', '', '', '', '', '0000-00-00', '', '', '361438 SSPMS', '', NULL, NULL),
	(15, 'ROSELI PALERMO', '', '', '', '', '', '(67)9248-9820', '0000-00-00', '', '', '1035189 SSPMS', '', NULL, NULL),
	(16, 'JAIR MARTINS FARIAS', '', '', '', '', '', '(67)9248-9820', '0000-00-00', '', '', '584084 SSPMS', '', NULL, NULL),
	(17, 'ALEXINA MARTINS ARAUJO', '', '', '', '', '', '(67)9226-3073', '0000-00-00', '', '', '175330 SSPMS', '', NULL, NULL),
	(18, 'MARIA HELENA DE SOUZA MACHADO', '', '', '', 'NOVA BAHIA', '(67)9288-1349', '(67)9288-1349', '0000-00-00', '', '', '799118 SSPMS', '', NULL, NULL),
	(19, 'ZILDENEIA VIANA', '', '', '', '', '', '(67)9297-4269', '0000-00-00', '', '', '873588 SSPMS', '', NULL, NULL),
	(20, 'BRUNA PEREIRA DOS SANTOS', '', '', '', '', '', '(67)9926-6419', '0000-00-00', '', '', '1649657 SSPMS', '', NULL, NULL),
	(21, 'RAFAELA DELGADO', '', '', '', '', '', '(67)9699-7101', '0000-00-00', '', '', '461879 SSPMS', '', NULL, NULL),
	(22, 'LAIS DE SOUZA BENTO', '', '', '', 'RODOVIARIA', '', '(67)9620-5358', '0000-00-00', '', '', '001615509 SSPMS', '', NULL, NULL),
	(23, 'MARIANA ARAUJO DOS SANTOS', '', '', '', '', '', '(67)9100-1106', '0000-00-00', '', '', '1753477 SSPMS', '', NULL, NULL),
	(24, 'SOLANGE FATIMA DE MATOS', '', '', '', '', '', '(67)9271-9107', '0000-00-00', '', '', '707551599 SSPRS', '', NULL, NULL),
	(25, 'MONIKLEIA KEIKO', '', '', '', '', '(67)3362-7476', '', '0000-00-00', 'TENTAR DEIXAR SOZINHA', '', '761572 SSPMS', '', NULL, NULL),
	(26, 'TARINA SARTORI', '', '', '', '', '', '(67)9282-3088', '0000-00-00', '', '', '1277534 SSPMS', '', NULL, NULL),
	(27, 'CLARICE SCHUSTER', '', '', '', '', '', '(67)9870-8145', '0000-00-00', '', '', '684991 SSPMS', '', NULL, NULL),
	(28, 'VANILDA SALDANHA DA SILVA', '', '', '', '', '', '(67)9264-4444', '0000-00-00', '', '', '576430 SSPMS', '', NULL, NULL),
	(29, 'UELIDA MENEZES DE SOUZA', '', '', '', '', '', '(67)9166-4401', '0000-00-00', '', '', '488366 SSPMS', '', NULL, NULL),
	(30, 'JOSILENE DA CONCEIÇÃO', '', '', '', '', '', '(67)9266-4326', '0000-00-00', '', '', '', '', NULL, NULL),
	(31, 'ALLANA TABITAT ZANETTIN', '', '', '', '', '', '(67)8140-9646', '0000-00-00', '', '', '1180382 SSPMS', '', NULL, NULL),
	(32, 'INGRID ARIANE FREITAS XAVIER', '', '', '', '', '', '(67)8163-0495', '0000-00-00', '', '', '1879307 SSPMS', '', NULL, NULL),
	(33, 'MARCIO XAVIER', '', '', '', '', '', '(67)8163-0495', '0000-00-00', '', '', '', '', NULL, NULL),
	(34, 'ESTEFANIA PEREIRA DOS SANTOS', '', '', '', '', '', '(67)9149-2728', '0000-00-00', '', '', '302472872 RCN', '', NULL, NULL),
	(35, 'NILDA LOUREIRO DE ALMEIDA', '', '', '', '', '(67)3397-6197', '', '0000-00-00', '', '', '339308 SSPMS', '', NULL, NULL),
	(36, 'ISABELE LUCAS LOUREIRO', '', '', '', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL),
	(37, 'SOLANGE ALVES OLIVEIRA GOMES', '', '', '', 'RODOVIARIA', '', '(67)8124-9832', '0000-00-00', '', '', '', '', NULL, NULL),
	(38, 'IVANI EUGENIA', '', '', '', '', '', '', '0000-00-00', '', '', '8581610 SSPSP', '', NULL, NULL),
	(39, 'MARIA DONIZETE MENEZES', '', '', '', '', '', '(67)9268-8669', '0000-00-00', '', '', '138171 SSPMS', '', NULL, NULL),
	(40, 'CAROLINA MENEZES ARANDA', '', '', '', '', '', '(67)9214-0775', '0000-00-00', '', '', '', '', NULL, NULL),
	(41, 'LUCIANA PAULA DELFINO', '', '', '', '', '', '(67)9233-9756', '0000-00-00', '', '', '1885121 SSPMS', '', NULL, NULL),
	(42, 'YASMIM YUN PEREIRA DUQUE', '', '', '', '', '', '(67)9173-0018', '0000-00-00', '', '059.066.551-07', '05906655107', '', NULL, NULL),
	(43, 'ALEICA BARBOSA FERREIRA', '', '', '', '', '', '(67)9994-8559', '0000-00-00', '', '', '', '', NULL, NULL),
	(44, 'CLEBERSON MONTEIRO MARTINS', '', '', '', '', '', '(67)9250-5479', '0000-00-00', '', '033.380.811-89', '1655573 SSPMS', '', NULL, NULL),
	(45, 'LUCIMAR DOMINGUES ECHEVERRIA', '', '', '', '', '', '(67)9107-7483', '0000-00-00', '', '', '001457731 SSPMS', '', NULL, NULL),
	(46, 'CRISTIANE CANTIERI SANTANA', '', '', '', '', '(67)3042-2797', '(67)9232-6968', '0000-00-00', '', '', '877468 SSPMS', '', NULL, NULL),
	(47, 'JOICIELI DE MELO E SILVA', '', '', '', 'CAMAPUÃ', '(67)9621-4938', '(67)9621-4938', '0000-00-00', '', '', '', '', NULL, NULL),
	(48, 'RONIVON PEREIRA DOS SANTOS', '', '', '', 'CAMAPUÃ', '', '(67)9621-4938', '0000-00-00', '', '', '', '', NULL, NULL),
	(49, 'LUIZA SILVA MORTARI', '', '', 'AQUIDAUANA-MS', 'RODOVIARIA', '(67)3241-7147', '(67)9268-1272', '0000-00-00', '', '', '1079192 SSPMS', '', NULL, NULL),
	(50, 'ADENOR GOMES MOREIRA', '', '', '', '', '(67)9109-9584', '(67)9109-9584', '0000-00-00', '', '', '408864 SSPMS', '', NULL, NULL),
	(51, 'NADIR INES GOMES MOREIRA', '', '', '', '', '', '(67)9109-9584', '0000-00-00', '', '', '422497 SSPMS', '', NULL, NULL),
	(52, 'SUELI CHAVES PIRES', '', '', '', 'POSTO SÃO PEDRO', '(67)3295-1605', '(67)9602-2226', '0000-00-00', '', '', '5718080214 SSPMS', '', NULL, NULL),
	(53, 'KETLIN MOTA', '', '', '', '', '', '(67)9870-0270', '0000-00-00', '', '', '1055523 SSPMS', '', NULL, NULL),
	(54, 'ANA PAULA CORDEIRO VALENCIA', '', '', '', '', '', '(67)9229-8132', '0000-00-00', '', '', '1586595 SSPMS', '', NULL, NULL),
	(55, 'MARCIA BARBOSA', '', '', '', '', '', '(67)9204-1728', '0000-00-00', '', '', '', '', NULL, NULL),
	(56, 'MARIA APARECIDA DA SILVA OLIVEIRA', '', '', '', '', '', '(67)9271-9580', '0000-00-00', '', '', '0938215340 MEX', '', NULL, NULL),
	(57, 'GISLAINE SILVA SANTOS', '', '', '', '', '', '(67)9108-7379', '0000-00-00', '', '', '1479045 SSPMS', '', NULL, NULL),
	(58, 'RAQUEL DIAS MARTINS DOS SANTOS', '', '', '', '', '', '(67)9249-8307', '0000-00-00', '', '', '1160724 SSPMS', '', NULL, NULL),
	(59, 'SELLY CRISTIANE DE OLIVEIRA MACHADO', '', '', '', '', '', '(67)9144-5870', '0000-00-00', '', '', '', '', NULL, NULL),
	(60, 'DAIANE PEREIRA RODRIGUES', '', '', '', '', '', '(67)9106-7976', '0000-00-00', '', '', '', '', NULL, NULL),
	(61, 'CLAUDIA CRISTIANE BARION', '', '', '', '', '', '(67)8189-6392', '0000-00-00', '', '', '135501155 SSPMS', '', NULL, NULL),
	(62, 'RITA FERREIRA DOS SANTOS', '', '', '', '', '', '(67)9656-7670', '0000-00-00', '', '', '240677 SSPMS', '', NULL, NULL),
	(63, 'IVO JOSE DOS SANTOS', '', '', '', '', '', '(67)9656-7670', '0000-00-00', '', '', '112951 SSPMS', '', NULL, NULL),
	(64, 'ROSIMEIRE DE JESUS SOUZA', '', '', '', 'RODOVIARIA', '(67)9245-2143', '(67)9245-2143', '0000-00-00', '', '', '734518 SSPMS', '', NULL, NULL),
	(65, 'TAIS LARA MEDEIROS DOS ANJOS', '', '', '', '', '', '(67)9120-8059', '0000-00-00', '', '', '1326848 SSPMS', '', NULL, NULL),
	(66, 'ISABELA MEDEIROS DOS ANJOS', '', '', '', '', '', '(67)9120-8059', '0000-00-00', '', '', '1326510 SSPMS', '', NULL, NULL),
	(67, 'JULIANA CRISTINA DAVID', '', '', '', '', '', '(67)9167-4884', '0000-00-00', '', '', '17571049 SSPMT', '', NULL, NULL),
	(68, 'TATIANE ZENTENO DE ALBUQUERQUE', '', '', '', '', '', '(67)9167-4884', '0000-00-00', '', '', '01314335 SSPMS', '', NULL, NULL),
	(69, 'MATILDE ARAUJO', '', '', '', '', '(67)3386-2523', '', '0000-00-00', '', '', '1185763 SSPMS', '', NULL, NULL),
	(70, 'EUNICE SIMOES LIMA', '', '', '', '', '', '(67)9252-2229', '0000-00-00', '', '', '716050 SSPMS', '', NULL, NULL),
	(71, 'ILDA ORTIZ', '', '', '', '', '', '(67)9148-2999', '0000-00-00', '', '', '', '', NULL, NULL);
/*!40000 ALTER TABLE `tb_clients` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_ctasrecpag
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

-- Dumping data for table db_sispantur.tb_ctasrecpag: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_ctasrecpag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_ctasrecpag` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_drivers
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_drivers: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_drivers` DISABLE KEYS */;
INSERT INTO `tb_drivers` (`id_drivers`, `nome`, `rua`, `bairro`, `cidade`, `telefone`, `celular`, `status`, `data_nascimento`, `rg`, `cpf`, `cnh`, `observacao`, `email`, `validade_cnh`) VALUES
	(4, 'FRANCISCO FLEURY ZANON', 'SANTA MARIA, 1424', 'CEL ANTONINO', 'CAMPO GRANDE-MS', '(67)30261824', '6792854405', 'A', '0000-00-00', '', '', '', '', '', '0000-00-00'),
	(6, 'ADEMIR SARTORI', 'RUA ESTANCIA, 182', 'JARDIM BELO HORIZONTE', 'CAMPO GRANDE-MS', '(67)9947-7586', '67 99477586', 'A', '1951-06-20', '362976 SSPMS', '80253652804', '00105389105', '', '', '2016-07-21'),
	(7, 'JUSCELINO PEREIRA DOS SANTOS', '', 'NOVA LIMA', 'CAMPO GRANDE-MS', '(67)9153-1364', '', 'A', '1971-06-30', '35805 SSPMS', '620.929.281-04', '02202694116', '', '', '0000-00-00'),
	(8, 'LUIS CARLOS DA SILVA', 'RUA BOA VENTURA DA SILVA, 264', 'TAVEIROPOLIS', 'CAMPO GRANDE-MS', '(67)9203-7978', '', 'A', '1967-06-28', '415211 SSPMS', '445.174.911-53', '00016302207', '', '', '2015-06-30'),
	(9, 'EVERTON DANTAS DA SILVA', '', '', '', '(67)9179-6963', '', 'A', '0000-00-00', '', '', '', '', '', '0000-00-00');
/*!40000 ALTER TABLE `tb_drivers` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_movfinan
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

-- Dumping data for table db_sispantur.tb_movfinan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_movfinan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_movfinan` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_reservs
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_reservs: ~18 rows (approximately)
/*!40000 ALTER TABLE `tb_reservs` DISABLE KEYS */;
INSERT INTO `tb_reservs` (`id_reservs`, `nr_poltrona`, `tipo`, `id_tour`, `id_client`, `id_movfinan`, `loc_embarque`, `desconto`, `ultima_viagem`, `destino_ultv`) VALUES
	(57, 2, 'd', 7, 8, NULL, '', 0, '2014-08-07', 'Goiania'),
	(59, 13, 'd', 7, 39, NULL, '', 0, '2014-08-07', 'Goiania'),
	(60, 14, 'd', 7, 40, NULL, '', 0, '2014-08-07', 'Goiania'),
	(61, 1, 'd', 7, 41, NULL, '', 0, '2014-08-07', 'Goiania'),
	(62, 9, 'd', 7, 42, NULL, '', 0, '2014-08-07', 'Goiania'),
	(66, 23, 'd', 7, 28, NULL, '', 0, '2014-08-07', 'Goiania'),
	(67, 40, 'd', 7, 44, NULL, '', 0, '2014-08-07', 'Goiania'),
	(68, 9, 'd', 8, 45, NULL, '', 0, '2014-08-14', 'GOIANIA-GO'),
	(69, 11, 'd', 8, 46, NULL, '', 0, '2014-08-14', 'GOIANIA-GO'),
	(70, 20, 'd', 7, 49, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(71, 5, 'd', 7, 50, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(72, 6, 'd', 7, 51, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(73, 10, 'd', 7, 20, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(74, 19, 'd', 8, 69, NULL, '', 0, '2014-08-14', 'GOIANIA-GO'),
	(75, 15, 'd', 7, 54, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(76, 16, 'd', 7, 55, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(77, 17, 'd', 7, 47, NULL, '', 0, '2014-08-07', 'GOIANIA-GO'),
	(78, 18, 'd', 7, 48, NULL, '', 0, '2014-08-07', 'GOIANIA-GO');
/*!40000 ALTER TABLE `tb_reservs` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_tour
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_tour: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_tour` DISABLE KEYS */;
INSERT INTO `tb_tour` (`id_tour`, `id_viagem`, `id_car`, `id_user`, `data_saida`, `data_retorno`, `id_motorista`, `observacao`, `preco`, `tipo`, `id_client`, `status`, `alimentacao`, `combustivel`, `outros`, `total`) VALUES
	(7, 5, 7, 0, '2014-08-07', '2014-08-09', 4, '', 200, 'v', 0, 'A', NULL, NULL, NULL, NULL),
	(8, 5, 7, 6, '2014-08-14', '2014-08-16', 4, '', 200, 'e', 0, 'A', NULL, NULL, NULL, NULL),
	(9, 5, 7, 6, '2014-08-21', '2014-08-23', 4, '', 200, 'e', 0, 'A', NULL, NULL, NULL, NULL),
	(10, 6, 7, 6, '2014-08-22', '2014-08-26', 0, '', 840, 't', 0, 'A', NULL, NULL, NULL, NULL),
	(11, 5, 7, 0, '2014-08-28', '2014-08-30', 4, '', 200, 'v', 0, 'A', NULL, NULL, NULL, NULL),
	(12, 5, 7, 6, '2014-09-04', '2014-09-06', 4, '', 200, 'v', 0, 'A', NULL, NULL, NULL, NULL),
	(13, 5, 7, 6, '2014-09-11', '2014-09-13', 4, '', 200, 'v', 0, 'A', NULL, NULL, NULL, NULL),
	(14, 6, 7, 6, '2014-08-22', '2014-08-26', 8, '', 840, 'v', 0, 'A', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tb_tour` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_users
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id_users`, `nome_user`, `nome_comp`, `email`, `senha`, `telefone`, `celular`, `status`) VALUES
	(1, 'adm', 'Administrador', 'adm@administrador.com.br', '202cb962ac59075b964b07152d234b70', '3388-0836', '9238-1660', 'A'),
	(6, 'bruno', 'Bruno Martins', 'contato@pantanalsultur.com.br', '202cb962ac59075b964b07152d234b70', '67 33512520', '67 9107-6370', 'A');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;


-- Dumping structure for table db_sispantur.tb_viagem
CREATE TABLE IF NOT EXISTS `tb_viagem` (
  `id_viagem` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_viagem`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sispantur.tb_viagem: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_viagem` DISABLE KEYS */;
INSERT INTO `tb_viagem` (`id_viagem`, `destino`) VALUES
	(5, 'GOIANIA-GO'),
	(6, 'TRINDADE-GO X CALDAS NOVAS-GO');
/*!40000 ALTER TABLE `tb_viagem` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
