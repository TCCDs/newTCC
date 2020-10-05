-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.14-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para new_supermercado
CREATE DATABASE IF NOT EXISTS `new_supermercado` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `new_supermercado`;

-- Copiando estrutura para tabela new_supermercado.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `ID_ADMINISTRADOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIOS_ADMINISTRADOR` int(11) DEFAULT NULL,
  `NOME_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `RG_ADMINISTRADOR` varchar(9) DEFAULT NULL,
  `CPF_ADMINISTRADOR` varchar(11) DEFAULT NULL,
  `SEXO_ADMINISTRADOR` varchar(9) DEFAULT NULL,
  `DATA_NASCIMENTO_ADMINISTRADOR` date DEFAULT NULL,
  `EMAIL_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `CELULAR_ADMINISTRADOR` varchar(11) DEFAULT NULL,
  `CEP_ADMINISTRADOR` varchar(8) DEFAULT NULL,
  `CIDADE_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `ESTADO_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `ENDERECO_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `NUMERO_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `BAIRRO_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `NACIONALIDADE_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `COMPLEMENTO_ADMINISTRADOR` varchar(255) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT current_timestamp(),
  `DATA_MOD` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_ADMINISTRADOR`),
  KEY `FK_ID_USUARIOS_ADMINISTRADOR_LOGIN_USUARIOS` (`ID_USUARIOS_ADMINISTRADOR`),
  CONSTRAINT `FK_ID_USUARIOS_ADMINISTRADOR_LOGIN_USUARIOS` FOREIGN KEY (`ID_USUARIOS_ADMINISTRADOR`) REFERENCES `login_usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIOS` int(11) DEFAULT NULL,
  `NOME_CLIENTES` varchar(255) DEFAULT NULL,
  `RG_CLIENTES` varchar(255) DEFAULT NULL,
  `CPF_CLIENTES` varchar(255) DEFAULT NULL,
  `SEXO_CLIENTES` varchar(255) DEFAULT NULL,
  `DATA_NASCIMENTO_CLIENTES` date DEFAULT NULL,
  `EMAIL_CLIENTES` varchar(255) DEFAULT NULL,
  `CELULAR_CLIENTES` varchar(11) DEFAULT NULL,
  `RAZAO_SOCIAL_CLIENTES` varchar(255) DEFAULT NULL,
  `NOME_FANTASIA_CLIENTES` varchar(255) DEFAULT NULL,
  `CNPJ_CLIENTES` varchar(14) DEFAULT NULL,
  `CEP_CLIENTES` varchar(8) DEFAULT NULL,
  `CIDADE_CLIENTES` varchar(255) DEFAULT NULL,
  `ESTADO_CLIENTES` varchar(2) DEFAULT NULL,
  `ENDERECO_CLIENTES` varchar(255) DEFAULT NULL,
  `NUMERO_CLIENTES` varchar(255) DEFAULT NULL,
  `BAIRRO_CLIENTES` varchar(255) DEFAULT NULL,
  `NACIONALIDADE_CLIENTES` varchar(255) DEFAULT NULL,
  `COMPLEMENTO_CLIENTES` varchar(255) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT current_timestamp(),
  `DATA_MOD` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_CLIENTES`),
  KEY `FK_ID_USUARIOS_LOGIN_USUARIOS` (`ID_USUARIOS`),
  CONSTRAINT `FK_ID_USUARIOS_LOGIN_USUARIOS` FOREIGN KEY (`ID_USUARIOS`) REFERENCES `login_usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.clientes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`ID_CLIENTES`, `ID_USUARIOS`, `NOME_CLIENTES`, `RG_CLIENTES`, `CPF_CLIENTES`, `SEXO_CLIENTES`, `DATA_NASCIMENTO_CLIENTES`, `EMAIL_CLIENTES`, `CELULAR_CLIENTES`, `RAZAO_SOCIAL_CLIENTES`, `NOME_FANTASIA_CLIENTES`, `CNPJ_CLIENTES`, `CEP_CLIENTES`, `CIDADE_CLIENTES`, `ESTADO_CLIENTES`, `ENDERECO_CLIENTES`, `NUMERO_CLIENTES`, `BAIRRO_CLIENTES`, `NACIONALIDADE_CLIENTES`, `COMPLEMENTO_CLIENTES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 1, 'Jessica Oliveira', '158426359', '15824896522', 'Feminino', '0000-00-00', 'jessicaoliveira@gmail.com', '14995663225', NULL, NULL, NULL, '14852333', 'Bauru', 'SP', '13 Abril', '158', 'centro', 'brasileira', 'casa', '2020-09-08 19:22:25', '2020-09-08 19:22:25');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.cliente_pagamentos
CREATE TABLE IF NOT EXISTS `cliente_pagamentos` (
  `ID_PAGAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MOEDAS` int(11) DEFAULT NULL,
  `ORDER_NUMBER` int(11) DEFAULT NULL,
  `ORDER_TOTAL_AMOUNT` float DEFAULT NULL,
  `TRANSACAO` varchar(255) DEFAULT NULL,
  `CODIGO_CARTAO` int(11) DEFAULT NULL,
  `CARTAO_VALIDADE_MES` varchar(255) DEFAULT NULL,
  `CARTAO_VALIDADE_ANO` varchar(255) DEFAULT NULL,
  `ORDER_STATUS` varchar(255) DEFAULT NULL,
  `NUMERO_CARTAO` varchar(255) DEFAULT NULL,
  `EMAIL_CLIENTE` varchar(255) DEFAULT NULL,
  `NOME_CARTAO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PAGAMENTO`),
  KEY `FK_ID_MOEDAS_MOEDAS` (`ID_MOEDAS`),
  CONSTRAINT `FK_ID_MOEDAS_MOEDAS` FOREIGN KEY (`ID_MOEDAS`) REFERENCES `moedas` (`ID_MOEDAS`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.cliente_pagamentos: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente_pagamentos` DISABLE KEYS */;
INSERT INTO `cliente_pagamentos` (`ID_PAGAMENTO`, `ID_MOEDAS`, `ORDER_NUMBER`, `ORDER_TOTAL_AMOUNT`, `TRANSACAO`, `CODIGO_CARTAO`, `CARTAO_VALIDADE_MES`, `CARTAO_VALIDADE_ANO`, `ORDER_STATUS`, `NUMERO_CARTAO`, `EMAIL_CLIENTE`, `NOME_CARTAO`) VALUES
	(1, 2, 775684, 20, 'txn_1HPG3VDZjX8sc9JCEe96Y9H7', 148, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(2, 3, 920692, 50, 'txn_1HTbTcDZjX8sc9JCrmcy4f8w', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(3, 4, 168178, 50, 'txn_1HTbacDZjX8sc9JCoYdoqP7f', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(4, 5, 285777, 100, 'txn_1HTc68DZjX8sc9JC4bN7AnWw', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(5, 6, 748441, 100, 'txn_1HTcD0DZjX8sc9JCKMbFPabC', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(6, 7, 604717, 100, 'txn_1HTd4wDZjX8sc9JCqhlew4di', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(7, 8, 502677, 100, 'txn_1HTd5xDZjX8sc9JCxtrrcfn4', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(8, 9, 484373, 540, 'txn_1HTnCRDZjX8sc9JC6uqJTgzB', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(9, 10, 426962, 1000, 'txn_1HTzZIDZjX8sc9JCUMkeAdW0', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(10, 11, 356542, 540, 'txn_1HTzfVDZjX8sc9JC0cT8g0RI', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(11, 12, 854355, 1000, 'txn_1HTzkPDZjX8sc9JCu4wyfCmX', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(12, 13, 814918, 1000, 'txn_1HTzzlDZjX8sc9JC4aBcOGMi', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(13, 14, 723032, 100, 'txn_1HUDKWDZjX8sc9JChBDmC9Fm', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(14, 15, 133570, 152, 'txn_1HUdFIDZjX8sc9JCxZmpA8Y0', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(15, 16, 425419, 1000, 'txn_1HUdIrDZjX8sc9JCdI5ma0iX', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(16, 17, 619475, 1000, 'txn_1HUdNaDZjX8sc9JCmhrlX0OD', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(17, 18, 718960, 150, 'txn_1HUdRrDZjX8sc9JCOoZ5ZBAU', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(18, 19, 555546, 50, 'txn_1HUdSeDZjX8sc9JCfB5gCTu0', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(19, 20, 556076, 50, 'txn_1HUdTEDZjX8sc9JCqwk8lsrI', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(20, 21, 774714, 50, 'txn_1HUgDwDZjX8sc9JC8TM1S2zt', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(21, 22, 244655, 50, 'txn_1HUgExDZjX8sc9JCYplJDXlc', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(22, 23, 881703, 50, 'txn_1HUgGyDZjX8sc9JCVXe7fUWo', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira '),
	(23, 24, 331953, 50, 'txn_1HUgPbDZjX8sc9JCVlvttCRI', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(24, 25, 472594, 55, 'txn_1HUgQIDZjX8sc9JCDMd6OsW0', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(25, 26, 953483, 1000, 'txn_1HUikFDZjX8sc9JCuM5YBtKI', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(26, 27, 623117, 100, 'txn_1HYAALDZjX8sc9JCrdfAGlp1', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(27, 28, 793201, 100, 'txn_1HYAEIDZjX8sc9JC2uJBclSt', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(28, 29, 457284, 100, 'txn_1HYAGQDZjX8sc9JCgrrfA1JC', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(29, 30, 201930, 100, 'txn_1HYAKxDZjX8sc9JCJtnQKp9z', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(30, 31, 442130, 100, 'txn_1HYAN9DZjX8sc9JCZ4rtiht8', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(31, 32, 834241, 100, 'txn_1HYARnDZjX8sc9JC2iAnxkiz', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(32, 33, 172158, 100, 'txn_1HYASsDZjX8sc9JCfi4EcojW', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira');
/*!40000 ALTER TABLE `cliente_pagamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `ID_COMPRAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_COMPRAS` int(11) DEFAULT NULL,
  `CODIGO_COMPRAS` varchar(10) DEFAULT NULL,
  `VALOR_COMPRAS` float(10,2) DEFAULT NULL,
  `TOTAL_DESCONTO_COMPRAS` float(10,2) DEFAULT NULL,
  `STATUS_COMPRAS` varchar(11) DEFAULT NULL,
  `TIPO_PAGAMENTO` varchar(50) DEFAULT NULL,
  `DATA_CAD_COMPRAS` datetime DEFAULT current_timestamp(),
  `DATA_MOD` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_COMPRAS`) USING BTREE,
  KEY `FK_IDCLIENTES_COMPRAS` (`ID_CLIENTES_COMPRAS`),
  CONSTRAINT `FK_IDCLIENTES_COMPRAS` FOREIGN KEY (`ID_CLIENTES_COMPRAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`ID_COMPRAS`, `ID_CLIENTES_COMPRAS`, `CODIGO_COMPRAS`, `VALOR_COMPRAS`, `TOTAL_DESCONTO_COMPRAS`, `STATUS_COMPRAS`, `TIPO_PAGAMENTO`, `DATA_CAD_COMPRAS`, `DATA_MOD`) VALUES
	(1, 1, '200705041', 9.28, 0.00, 'F', NULL, '2020-08-08 21:00:23', '2020-09-21 17:38:14'),
	(2, 1, '281098268', 73.90, 0.00, 'F', NULL, '2020-08-21 15:29:17', '2020-09-21 17:37:51'),
	(3, 1, '553505031', 73.90, 0.00, 'F', NULL, '2020-09-21 16:17:47', '2020-09-21 16:17:47'),
	(4, 1, '1815404849', 73.90, 0.00, 'F', NULL, '2020-09-21 21:40:50', '2020-09-21 21:40:50'),
	(5, 1, '1581149987', 7.39, 0.00, 'F', NULL, '2020-09-21 21:42:03', '2020-09-21 21:42:03'),
	(6, 1, '1452275361', 5.00, 0.00, 'F', NULL, '2020-09-21 21:48:54', '2020-09-21 21:48:54'),
	(7, 1, '609892728', 7.39, 0.00, 'F', NULL, '2020-09-21 21:50:53', '2020-09-21 21:50:53'),
	(8, 1, '574652044', 5.00, 0.00, 'F', NULL, '2020-09-21 21:51:20', '2020-09-21 21:51:20'),
	(9, 1, '300791357', 73.90, 0.00, 'F', NULL, '2020-09-21 22:22:47', '2020-09-21 22:22:47'),
	(10, 1, '333479299', 73.90, 0.00, 'F', NULL, '2020-09-21 22:23:09', '2020-09-21 22:23:09'),
	(11, 1, '1259980631', 5.00, 0.00, 'F', NULL, '2020-09-22 12:22:01', '2020-09-22 12:22:01'),
	(12, 1, '1883435885', 221.70, 0.00, 'F', NULL, '2020-09-22 17:04:57', '2020-09-22 17:04:57'),
	(13, 1, '872431068', 221.70, 0.00, 'F', NULL, '2020-09-22 17:04:57', '2020-09-22 17:04:57'),
	(14, 1, '524037465', 221.70, 0.00, 'F', NULL, '2020-09-22 17:11:26', '2020-09-22 17:11:26'),
	(15, 1, '1101088763', 221.70, 0.00, 'F', NULL, '2020-09-22 17:12:04', '2020-09-22 17:12:04'),
	(16, 1, '726465786', 73.90, 0.00, 'F', NULL, '2020-09-23 16:13:54', '2020-09-23 16:13:54'),
	(17, 1, '892985514', 5.00, 0.00, 'F', NULL, '2020-09-23 19:26:25', '2020-09-23 19:26:25'),
	(18, 1, '1766786922', 86.29, 0.00, 'F', NULL, '2020-09-23 21:47:44', '2020-09-23 21:47:44'),
	(19, 1, '732745301', 12.39, 0.00, 'F', NULL, '2020-10-03 10:07:34', '2020-10-03 10:07:34'),
	(20, 1, '1263930165', 73.90, 0.00, 'F', NULL, '2020-10-05 10:24:51', '2020-10-05 10:24:51'),
	(21, 1, '2075650153', 78.90, 0.00, 'F', NULL, '2020-10-05 10:26:30', '2020-10-05 10:26:30'),
	(22, 1, '192348315', 78.90, 0.00, 'F', NULL, '2020-10-05 10:27:54', '2020-10-05 10:27:54'),
	(23, 1, '1130863730', 443.40, 0.00, 'F', NULL, '2020-10-05 10:56:29', '2020-10-05 10:56:29'),
	(24, 1, '773290761', 226.70, 0.00, 'F', NULL, '2020-10-05 14:57:50', '2020-10-05 14:57:50'),
	(25, 1, '1376428146', 78.90, 0.00, 'F', NULL, '2020-10-05 16:03:18', '2020-10-05 16:03:18'),
	(26, 1, '1846888747', 78.90, 0.00, 'F', 'Moeda Virtual', '2020-10-05 16:10:55', '2020-10-05 16:10:55'),
	(27, 1, '930163321', 78.90, 0.00, 'F', 'Cartão de Credito', '2020-10-05 16:11:31', '2020-10-05 16:11:31');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.compras_itens
CREATE TABLE IF NOT EXISTS `compras_itens` (
  `ID_COMPRA_ITENS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_COMPRAS` int(11) DEFAULT NULL,
  `CODIGO_ITENS` varchar(255) NOT NULL,
  `NOME_PRODUTOS` varchar(255) NOT NULL,
  `QUANTIDADE_PRODUTOS` int(11) NOT NULL,
  `PRECO_PRODUTOS` float(10,2) NOT NULL,
  `LUCRO` float(10,2) NOT NULL,
  `QR_CODE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_COMPRA_ITENS`),
  KEY `FK_ID_COMPRAS_COMPRAS_ITENS` (`ID_COMPRAS`),
  CONSTRAINT `FK_ID_COMPRAS_COMPRAS_ITENS` FOREIGN KEY (`ID_COMPRAS`) REFERENCES `compras` (`ID_COMPRAS`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_itens: ~36 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_itens` DISABLE KEYS */;
INSERT INTO `compras_itens` (`ID_COMPRA_ITENS`, `ID_COMPRAS`, `CODIGO_ITENS`, `NOME_PRODUTOS`, `QUANTIDADE_PRODUTOS`, `PRECO_PRODUTOS`, `LUCRO`, `QR_CODE`) VALUES
	(1, 1, '1026437604', 'Detergente LÃÂ­quido YpÃÂª Clear ', 1, 1.89, 0.00, '1399495777'),
	(2, 1, '1026437604', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1399495777'),
	(3, 2, '859744965', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '230114962'),
	(4, 3, '1639801521', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1457518'),
	(5, 4, '1268985656', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '281323957'),
	(6, 5, '162724908', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1809062058'),
	(7, 6, '1692008486', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1779612418'),
	(8, 7, '1983287795', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1416029630'),
	(9, 8, '1941653437', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1629918458'),
	(10, 9, '1552151521', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1937526540'),
	(11, 10, '125354585', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1799218251'),
	(12, 11, '1129021814', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '9009877'),
	(13, 12, '1647502446', 'Coca-Cola 2 Litros', 30, 7.39, 0.00, '999712114'),
	(14, 13, '2032853795', 'Coca-Cola 2 Litros', 30, 7.39, 0.00, '932454191'),
	(15, 14, '1385571446', 'Coca-Cola 2 Litros', 30, 7.39, 0.00, '773806090'),
	(16, 15, '466465074', 'Coca-Cola 2 Litros', 30, 7.39, 0.00, '1667505645'),
	(17, 16, '378446811', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '899752106'),
	(18, 17, '229251446', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1231408550'),
	(19, 18, '85029954', 'Coca-Cola 2 Litros', 11, 7.39, 0.00, '94515967'),
	(20, 18, '85029954', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '94515967'),
	(21, 19, '1511979304', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '2021267339'),
	(22, 19, '1511979304', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '2021267339'),
	(23, 20, '1234282073', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '810689166'),
	(24, 21, '1145372189', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '2111687622'),
	(25, 21, '1145372189', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '2111687622'),
	(26, 22, '84379657', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '51088953'),
	(27, 22, '84379657', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '51088953'),
	(28, 23, '1212740585', 'Coca-Cola 2 Litros', 60, 7.39, 0.00, '871302033'),
	(29, 24, '1840836154', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '332555264'),
	(30, 24, '1840836154', 'Coca-Cola 2 Litros', 30, 7.39, 0.00, '332555264'),
	(31, 25, '1936615232', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1189712067'),
	(32, 25, '1936615232', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1189712067'),
	(33, 26, '1452939741', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1085405531'),
	(34, 26, '1452939741', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1085405531'),
	(35, 27, '988001625', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '157017027'),
	(36, 27, '988001625', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '157017027');
/*!40000 ALTER TABLE `compras_itens` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.compras_pagamentos
CREATE TABLE IF NOT EXISTS `compras_pagamentos` (
  `ID_COMPRAS_PAGAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_COMPRAS_ITENS` int(11) NOT NULL,
  `NOME_CARTAO` varchar(255) NOT NULL,
  `NUMERO_CARTAO` varchar(255) NOT NULL,
  `STATUS_PAGAMENTO` varchar(255) NOT NULL,
  `CARTAO_VALIDADE_MES` varchar(255) NOT NULL,
  `CARTAO_VALIDADE_ANO` varchar(255) NOT NULL,
  `CODIGO_CARTAO` int(11) NOT NULL,
  `TRANSACAO` varchar(255) NOT NULL,
  `TOTAL_COMPRA` float(10,2) NOT NULL,
  `CODIGO_PAGAMENTO` varchar(255) NOT NULL,
  `DATA_CAD` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_COMPRAS_PAGAMENTO`),
  KEY `FK_ID_COMPRAS_ITENS_COMPRAS_ITENS` (`ID_COMPRAS_ITENS`),
  CONSTRAINT `FK_ID_COMPRAS_ITENS_COMPRAS_ITENS` FOREIGN KEY (`ID_COMPRAS_ITENS`) REFERENCES `compras_itens` (`ID_COMPRA_ITENS`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_pagamentos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_pagamentos` DISABLE KEYS */;
INSERT INTO `compras_pagamentos` (`ID_COMPRAS_PAGAMENTO`, `ID_COMPRAS_ITENS`, `NOME_CARTAO`, `NUMERO_CARTAO`, `STATUS_PAGAMENTO`, `CARTAO_VALIDADE_MES`, `CARTAO_VALIDADE_ANO`, `CODIGO_CARTAO`, `TRANSACAO`, `TOTAL_COMPRA`, `CODIGO_PAGAMENTO`, `DATA_CAD`) VALUES
	(1, 2, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2021', 148, 'txn_1HPGjbDZjX8sc9JCzetX4sN4', 9.28, '451420', '2020-09-12 20:58:21'),
	(2, 3, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HTtlHDZjX8sc9JCdEKHenHG', 73.90, '801186', '2020-09-21 15:29:18'),
	(3, 5, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HTzYpDZjX8sc9JCbuhGMXix', 73.90, '397417', '2020-09-21 21:40:50'),
	(4, 30, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HYxwYDZjX8sc9JC2hO1rMHZ', 226.70, '225125', '2020-10-05 14:57:50'),
	(5, 36, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HYz5rDZjX8sc9JCDlo21J8V', 78.90, '194821', '2020-10-05 16:11:31');
/*!40000 ALTER TABLE `compras_pagamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `ID_FORNECEDORES` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_FANTASIA_FORNECEDORES` varchar(255) DEFAULT NULL,
  `CNPJ_FORNECEDORES` varchar(14) DEFAULT NULL,
  `EMAIL_FORNECEDORES` varchar(255) DEFAULT NULL,
  `RAZAO_SOCIAL_FORNECEDORES` varchar(255) DEFAULT NULL,
  `CELULAR_FORNECEDORES` varchar(11) DEFAULT NULL,
  `SEXO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `DATA_NASCIMENTO_FORNECEDORES` date DEFAULT NULL,
  `NACIONALIDADE_FORNECEDORES` varchar(255) DEFAULT NULL,
  `CEP_FORNECEDORES` varchar(8) DEFAULT NULL,
  `CIDADE_FORNECEDORES` varchar(255) DEFAULT NULL,
  `ENDERECO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `BAIRRO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `NUMERO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `ESTADO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `COMPLEMENTO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT current_timestamp(),
  `DATA_MOD` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_FORNECEDORES`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.fornecedores: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`ID_FORNECEDORES`, `NOME_FANTASIA_FORNECEDORES`, `CNPJ_FORNECEDORES`, `EMAIL_FORNECEDORES`, `RAZAO_SOCIAL_FORNECEDORES`, `CELULAR_FORNECEDORES`, `SEXO_FORNECEDORES`, `DATA_NASCIMENTO_FORNECEDORES`, `NACIONALIDADE_FORNECEDORES`, `CEP_FORNECEDORES`, `CIDADE_FORNECEDORES`, `ENDERECO_FORNECEDORES`, `BAIRRO_FORNECEDORES`, `NUMERO_FORNECEDORES`, `ESTADO_FORNECEDORES`, `COMPLEMENTO_FORNECEDORES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 'Felipe', '5151', 'felipe@gmail.com', 'teste', '14885263332', 'M', '2020-06-03', 'Brasileiro', '15248025', 'teste', 'teste', 'teste', '144', 'sp', 'teste', '2020-09-08 20:42:17', '2020-09-08 20:44:17');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.login_usuarios
CREATE TABLE IF NOT EXISTS `login_usuarios` (
  `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN_USUARIOS` varchar(255) DEFAULT NULL,
  `SENHA_USUARIOS` varchar(255) DEFAULT NULL,
  `TIPO_USUARIOS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.login_usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `login_usuarios` DISABLE KEYS */;
INSERT INTO `login_usuarios` (`ID_USUARIOS`, `LOGIN_USUARIOS`, `SENHA_USUARIOS`, `TIPO_USUARIOS`) VALUES
	(1, 'Jessica Oliveira', '$2y$10$Wke/jyAbaSxB7QXtNeTTTemdOLlhSpwBuqyn0QdclBOZdb6SFwu1e', 1);
/*!40000 ALTER TABLE `login_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_MARCA` varchar(10) DEFAULT NULL,
  `NOME_MARCA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.marca: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`ID_MARCA`, `CODIGO_MARCA`, `NOME_MARCA`) VALUES
	(1, '256148752', 'Coca Cola'),
	(2, '148523698', 'Ypê'),
	(3, '778542269', 'Colgate');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.moedas
CREATE TABLE IF NOT EXISTS `moedas` (
  `ID_MOEDAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_MOEDAS` int(11) DEFAULT NULL,
  `CODIGOS` varchar(255) DEFAULT NULL,
  `VALOR_MOEDAS` float(10,2) DEFAULT NULL,
  `DATA_CAD_MOEDAS` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_MOEDAS`),
  KEY `FK_ID_CLIENTES_MOEDAS` (`ID_CLIENTES_MOEDAS`),
  CONSTRAINT `FK_ID_CLIENTES_MOEDAS` FOREIGN KEY (`ID_CLIENTES_MOEDAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.moedas: ~33 rows (aproximadamente)
/*!40000 ALTER TABLE `moedas` DISABLE KEYS */;
INSERT INTO `moedas` (`ID_MOEDAS`, `ID_CLIENTES_MOEDAS`, `CODIGOS`, `VALOR_MOEDAS`, `DATA_CAD_MOEDAS`) VALUES
	(1, 1, '1760117895', 20.00, '2020-07-08 19:35:35'),
	(2, 1, '353174513', 20.00, '2020-07-08 20:16:54'),
	(3, 1, '660298800', 50.00, '2020-08-20 19:57:51'),
	(4, 1, '1855387260', 50.00, '2020-08-20 20:05:04'),
	(5, 1, '252286029', 100.00, '2020-09-20 20:37:38'),
	(6, 1, '274184846', 100.00, '2020-09-20 20:44:44'),
	(7, 1, '1298494983', 100.00, '2020-09-20 21:40:28'),
	(8, 1, '1072129997', 100.00, '2020-09-20 21:41:31'),
	(9, 1, '577673157', 540.00, '2020-09-21 08:28:55'),
	(10, 1, '1245907685', 1000.00, '2020-09-21 21:41:18'),
	(11, 1, '887567943', 540.00, '2020-09-21 21:47:44'),
	(12, 1, '491827898', 1000.00, '2020-09-21 21:52:48'),
	(13, 1, '888047507', 1000.00, '2020-09-21 22:08:39'),
	(14, 1, '1381029334', 100.00, '2020-09-22 12:23:01'),
	(15, 1, '1086751271', 152.00, '2020-09-23 16:03:20'),
	(16, 1, '1563086393', 1000.00, '2020-09-23 16:07:01'),
	(17, 1, '1637633110', 1000.00, '2020-09-23 16:11:54'),
	(18, 1, '2103882055', 150.00, '2020-09-23 16:16:19'),
	(19, 1, '1825048966', 50.00, '2020-09-23 16:17:08'),
	(20, 1, '427876257', 50.00, '2020-09-23 16:17:44'),
	(21, 1, '1918809929', 50.00, '2020-09-23 19:14:09'),
	(22, 1, '1560122915', 50.00, '2020-09-23 19:15:12'),
	(23, 1, '514125404', 50.00, '2020-09-23 19:17:17'),
	(24, 1, '285011642', 50.00, '2020-09-23 19:26:11'),
	(25, 1, '1139298958', 55.00, '2020-09-23 19:26:55'),
	(26, 1, '2137141782', 1000.00, '2020-09-23 21:55:40'),
	(27, 1, '1454516190', 100.00, '2020-10-03 09:48:46'),
	(28, 1, '1083459290', 100.00, '2020-10-03 09:52:51'),
	(29, 1, '1092528551', 100.00, '2020-10-03 09:55:03'),
	(30, 1, '2115187479', 100.00, '2020-10-03 09:59:43'),
	(31, 1, '1876248460', 100.00, '2020-10-03 10:01:59'),
	(32, 1, '1002655837', 100.00, '2020-10-03 10:06:48'),
	(33, 1, '1871667841', 100.00, '2020-10-03 10:07:55');
/*!40000 ALTER TABLE `moedas` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.ofertas
CREATE TABLE IF NOT EXISTS `ofertas` (
  `ID_OFERTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRODUTOS` int(11) DEFAULT NULL,
  `PRECO_OFERTA` float(10,2) DEFAULT NULL,
  `STATUS_OFERTA` varchar(1) DEFAULT NULL,
  `DESCRICAO` varchar(255) DEFAULT NULL,
  `DATA_CAD_OFERTAS` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DATA_MOD_OFERTAS` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_OFERTA`),
  KEY `FK_ID_PRODUTOS` (`ID_PRODUTOS`),
  CONSTRAINT `FK_ID_PRODUTOS` FOREIGN KEY (`ID_PRODUTOS`) REFERENCES `produtos` (`ID_PRODUTOS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.ofertas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ofertas` DISABLE KEYS */;
INSERT INTO `ofertas` (`ID_OFERTA`, `ID_PRODUTOS`, `PRECO_OFERTA`, `STATUS_OFERTA`, `DESCRICAO`, `DATA_CAD_OFERTAS`, `DATA_MOD_OFERTAS`) VALUES
	(2, 1, 0.50, 'A', 'Ofertas de Outubro', '2020-10-05 16:05:32', '2020-10-05 16:05:32');
/*!40000 ALTER TABLE `ofertas` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `ID_PRODUTOS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MARCAS_PRODUTOS` int(11) DEFAULT NULL,
  `ID_FORNECEDORES_PRODUTOS` int(11) DEFAULT NULL,
  `NOME_PRODUTOS` varchar(255) DEFAULT NULL,
  `PRECO_CUSTO_PRODUTOS` float(10,2) DEFAULT NULL,
  `PRECO_VENDA_PRODUTOS` float(10,2) DEFAULT NULL,
  `PESO_PRODUTOS` varchar(50) DEFAULT NULL,
  `VALIDADE_PRODUTOS` date DEFAULT NULL,
  `DESCRICAO_PRODUTOS` varchar(255) DEFAULT NULL,
  `QR_CODE_PRODUTOS` varchar(8) DEFAULT NULL,
  `ESTOQUE_PRODUTOS` int(11) DEFAULT NULL,
  `CATEGORIAS_PRODUTOS` varchar(50) DEFAULT NULL,
  `CORREDOR_PRODUTOS` varchar(50) DEFAULT NULL,
  `PRATILEIRA_PRODUTOS` varchar(50) DEFAULT NULL,
  `LOTE_PRODUTOS` varchar(50) DEFAULT NULL,
  `STATUS_PRODUTOS` varchar(1) DEFAULT NULL,
  `DATA_CAD_PRODUTOS` datetime DEFAULT current_timestamp(),
  `DATA_MOD_PRODUTOS` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_PRODUTOS`),
  KEY `FK_produtos_marca` (`ID_MARCAS_PRODUTOS`),
  KEY `FK_ID_FORNECEDORES_PRODUTOS` (`ID_FORNECEDORES_PRODUTOS`),
  CONSTRAINT `FK_ID_FORNECEDORES_PRODUTOS` FOREIGN KEY (`ID_FORNECEDORES_PRODUTOS`) REFERENCES `fornecedores` (`ID_FORNECEDORES`),
  CONSTRAINT `FK_produtos_marca` FOREIGN KEY (`ID_MARCAS_PRODUTOS`) REFERENCES `marca` (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`ID_PRODUTOS`, `ID_MARCAS_PRODUTOS`, `ID_FORNECEDORES_PRODUTOS`, `NOME_PRODUTOS`, `PRECO_CUSTO_PRODUTOS`, `PRECO_VENDA_PRODUTOS`, `PESO_PRODUTOS`, `VALIDADE_PRODUTOS`, `DESCRICAO_PRODUTOS`, `QR_CODE_PRODUTOS`, `ESTOQUE_PRODUTOS`, `CATEGORIAS_PRODUTOS`, `CORREDOR_PRODUTOS`, `PRATILEIRA_PRODUTOS`, `LOTE_PRODUTOS`, `STATUS_PRODUTOS`, `DATA_CAD_PRODUTOS`, `DATA_MOD_PRODUTOS`) VALUES
	(1, 2, 1, 'Detergente Liquido Ype Clear ', 0.50, 1.89, '500ML', '2021-09-08', 'Detergente Líquido Ypê Clear 500ml', '15962370', 10, 'Alimento', 'A', 'A', '158', 'D', '2020-09-08 20:46:44', '2020-09-21 18:33:40'),
	(2, 1, 1, 'Coca-Cola 2 Litros', 3.02, 7.39, '2L', '2020-12-08', 'Coca-Cola 2 Litros', '15962371', 25, 'Bebida', 'A', 'B', '365', 'A', '2020-09-08 20:55:13', '2020-09-08 20:57:13');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.saldo_clientes
CREATE TABLE IF NOT EXISTS `saldo_clientes` (
  `ID_SALDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `SALDO_CLIENTES` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_SALDO`),
  KEY `FK_ID_CLIENTE_SALDO_CLIENTES` (`ID_CLIENTE`),
  CONSTRAINT `FK_ID_CLIENTE_SALDO_CLIENTES` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.saldo_clientes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `saldo_clientes` DISABLE KEYS */;
INSERT INTO `saldo_clientes` (`ID_SALDO`, `ID_CLIENTE`, `SALDO_CLIENTES`) VALUES
	(1, 1, 372.10);
/*!40000 ALTER TABLE `saldo_clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.supermercado
CREATE TABLE IF NOT EXISTS `supermercado` (
  `ID_SUPERMERCADO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `TELEFONE` varchar(11) DEFAULT NULL,
  `CIDADE` varchar(255) DEFAULT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL,
  `NUMERO` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `CEP` varchar(8) DEFAULT NULL,
  `BAIRRO` varchar(255) DEFAULT NULL,
  `ESTADO` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID_SUPERMERCADO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.supermercado: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `supermercado` DISABLE KEYS */;
INSERT INTO `supermercado` (`ID_SUPERMERCADO`, `NOME`, `CNPJ`, `TELEFONE`, `CIDADE`, `ENDERECO`, `NUMERO`, `EMAIL`, `CEP`, `BAIRRO`, `ESTADO`) VALUES
	(1, 'Supermercado Caravelas', '99651235687459', '14996325514', 'Praia Grande', 'Rua Luiza Borba Ranciaro', '1589', 'supermercadocaravelas@gmail.com', '11720170', 'Vila São Jorge', 'SP');
/*!40000 ALTER TABLE `supermercado` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
