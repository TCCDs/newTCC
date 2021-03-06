-- --------------------------------------------------------
-- Servidor:                     mysql669.umbler.com
-- Versão do servidor:           5.6.40 - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para caravelas
CREATE DATABASE IF NOT EXISTS `caravelas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `caravelas`;

-- Copiando estrutura para tabela caravelas.administrador
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
  `STATUS_ADMINISTRADOR` varchar(1) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATA_MOD` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_ADMINISTRADOR`),
  KEY `FK_ID_USUARIOS_ADMINISTRADOR_LOGIN_USUARIOS` (`ID_USUARIOS_ADMINISTRADOR`),
  CONSTRAINT `FK_ID_USUARIOS_ADMINISTRADOR_LOGIN_USUARIOS` FOREIGN KEY (`ID_USUARIOS_ADMINISTRADOR`) REFERENCES `login_usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.administrador: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`ID_ADMINISTRADOR`, `ID_USUARIOS_ADMINISTRADOR`, `NOME_ADMINISTRADOR`, `RG_ADMINISTRADOR`, `CPF_ADMINISTRADOR`, `SEXO_ADMINISTRADOR`, `DATA_NASCIMENTO_ADMINISTRADOR`, `EMAIL_ADMINISTRADOR`, `CELULAR_ADMINISTRADOR`, `CEP_ADMINISTRADOR`, `CIDADE_ADMINISTRADOR`, `ESTADO_ADMINISTRADOR`, `ENDERECO_ADMINISTRADOR`, `NUMERO_ADMINISTRADOR`, `BAIRRO_ADMINISTRADOR`, `NACIONALIDADE_ADMINISTRADOR`, `COMPLEMENTO_ADMINISTRADOR`, `STATUS_ADMINISTRADOR`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 2, 'Ricardo', '', '', '', '1999-06-05', '', '', '16650000', '', '', '', NULL, '', '', '', 'D', '2020-11-05 20:08:53', '2020-11-08 20:42:39');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIOS` int(11) DEFAULT NULL,
  `NOME_CLIENTES` varchar(255) DEFAULT NULL,
  `RG_CLIENTES` varchar(255) DEFAULT NULL,
  `CPF_CLIENTES` varchar(255) DEFAULT NULL,
  `SEXO_CLIENTES` varchar(255) DEFAULT NULL,
  `DATA_NASCIMENTO_CLIENTES` date DEFAULT NULL,
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
  `STATUS_CLIENTES` varchar(1) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATA_MOD` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CLIENTES`),
  KEY `FK_ID_USUARIOS_LOGIN_USUARIOS` (`ID_USUARIOS`),
  CONSTRAINT `FK_ID_USUARIOS_LOGIN_USUARIOS` FOREIGN KEY (`ID_USUARIOS`) REFERENCES `login_usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.clientes: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`ID_CLIENTES`, `ID_USUARIOS`, `NOME_CLIENTES`, `RG_CLIENTES`, `CPF_CLIENTES`, `SEXO_CLIENTES`, `DATA_NASCIMENTO_CLIENTES`, `CELULAR_CLIENTES`, `RAZAO_SOCIAL_CLIENTES`, `NOME_FANTASIA_CLIENTES`, `CNPJ_CLIENTES`, `CEP_CLIENTES`, `CIDADE_CLIENTES`, `ESTADO_CLIENTES`, `ENDERECO_CLIENTES`, `NUMERO_CLIENTES`, `BAIRRO_CLIENTES`, `NACIONALIDADE_CLIENTES`, `COMPLEMENTO_CLIENTES`, `STATUS_CLIENTES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 1, 'Jessica Oliveira', '158426359', '15245', 'Feminino', '1998-09-07', '14995663225', NULL, NULL, NULL, '62106', 'Bauru', 'SP', '13 Abril', '158', 'centro', 'Brasileira', 'casa', NULL, '2020-09-08 19:22:25', '2020-11-24 09:55:09'),
	(5, 12, 'Vítor Luís Martins de Oliveira', '55.555.555-5', '555.555.555 - 55', 'Masc', '1956-05-05', '+5514997612', NULL, NULL, NULL, '16570-00', 'Guarantã', 'SP', 'Rua Beraldo Arruda', '710', 'Centro', 'Brasileiro', 'Postinho', NULL, '2020-10-28 20:28:12', '2020-12-11 13:45:17'),
	(9, 18, 'Vítor Luís Martins de Oliveira', '55.555.555-5', '777.777.777 - 77', 'Masc', '2000-03-06', '(16)98800-8', NULL, NULL, NULL, '16570000', 'Guarantã', 'SP', 'Rua Beraldo Arruda', '710', 'Centro', 'Brasileiro', 'Ap', 'D', '2020-11-08 13:37:19', '2020-12-11 13:45:27'),
	(19, 61, 'Maria Teste', '291300753', '42341266088', 'Feminino', '1996-06-02', '14995233562', NULL, NULL, NULL, '78068421', 'Cuiabá', 'MT', 'Rua Trinta e Nove', '1596', 'Boa Esperança', 'Brasileiro', 'casa', 'A', '2020-12-11 13:39:29', '2020-12-11 13:45:09'),
	(20, 63, 'Maria Paula', '567980987', '00276613007', 'Feminino', '0000-00-00', '14996780000', NULL, NULL, NULL, '65044762', 'São Luís', 'MA', '3ª Travessa Dom Pedro II', '1783', 'Coroadinho', 'Brasileira', 'Casa', 'A', '2020-12-11 18:22:10', '2020-12-11 18:22:10'),
	(27, NULL, 'Teste Tsye', '468247233', '82640761900', 'Feminino', '0000-00-00', '14995862235', NULL, NULL, NULL, '69918730', 'Rio Branco', 'AC', 'Avenida Antônio da Rocha Viana', '1587', 'Horto Florestal', 'Brasileiro', 'casa', 'A', '2020-12-11 19:38:33', '2020-12-11 19:38:33'),
	(28, 74, 'Lucas Oliveira', '103380978', '53995769292', 'Masculino', '0000-00-00', '14995623365', NULL, NULL, NULL, '23017000', 'Rio de Janeiro', 'RJ', 'Estrada dos Caboclos', '1589', 'Campo Grande', 'Brasileiro', 'casa', 'A', '2020-12-11 20:22:39', '2020-12-11 20:22:39');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.cliente_pagamentos
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.cliente_pagamentos: ~35 rows (aproximadamente)
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
	(32, 33, 172158, 100, 'txn_1HYASsDZjX8sc9JCfi4EcojW', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(33, 34, 816561, 200, 'txn_1Ha0jqDZjX8sc9JCON6LCXKs', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(34, 35, 425059, 1000, 'txn_1Ha0vpDZjX8sc9JCGMJtie8C', 159, '02', '2024', 'succeeded', ' 4242 4242 4242 4242', NULL, 'Jessica Oliveira'),
	(35, 36, 441963, 105, 'txn_1Ha0y6DZjX8sc9JCBSaxrjY9', 159, '02', '2024', 'succeeded', ' 4242 4242 4242 4242', NULL, 'Jessica Oliveira'),
	(36, 37, 250484, 540, 'txn_1HdHiSDZjX8sc9JCOshqdf25', 159, '02', '2024', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(37, 39, 914180, 50, 'txn_1HgIguDZjX8sc9JCd35Qh7u1', 159, '02', '2022', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(38, 41, 418999, 540, 'txn_1Hk7u6DZjX8sc9JCZ27HGW8n', 159, '02', '2022', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(39, 45, 839288, 1000, 'txn_1HtGBwDZjX8sc9JClKuDw4iZ', 159, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira'),
	(40, 49, 501882, 100, 'txn_1HxEuCDZjX8sc9JCIRrsRQQE', 159, '02', '2021', 'succeeded', '4000056655665556', NULL, 'Jessica Oliveira'),
	(41, 53, 915857, 100, 'txn_1HxGYcDZjX8sc9JCFFw5jxa0', 159, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Maria Teste'),
	(42, 54, 485628, 50, 'txn_1HxJ5UDZjX8sc9JC8YHhtL6J', 159, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Maria Paula '),
	(43, 55, 971386, 50, 'txn_1HxJH7DZjX8sc9JCSN9xZQP3', 159, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Maria Paula'),
	(44, 56, 420809, 100, 'txn_1HxKyjDZjX8sc9JCoLENudVU', 159, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Lucas Oliveira'),
	(45, 57, 470461, 1000, 'txn_1HxQPcDZjX8sc9JCu1PyGARp', 159, '02', '2021', 'succeeded', '4242424242424242', NULL, 'Jessica Oliveira');
/*!40000 ALTER TABLE `cliente_pagamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `ID_COMPRAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_COMPRAS` int(11) DEFAULT NULL,
  `CODIGO_COMPRAS` varchar(10) DEFAULT NULL,
  `VALOR_COMPRAS` float(10,2) DEFAULT NULL,
  `TOTAL_DESCONTO_COMPRAS` float(10,2) DEFAULT NULL,
  `STATUS_COMPRAS` varchar(11) DEFAULT NULL,
  `TIPO_PAGAMENTO` varchar(50) DEFAULT NULL,
  `DATA_CAD_COMPRAS` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATA_MOD` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_COMPRAS`) USING BTREE,
  KEY `FK_IDCLIENTES_COMPRAS` (`ID_CLIENTES_COMPRAS`),
  CONSTRAINT `FK_IDCLIENTES_COMPRAS` FOREIGN KEY (`ID_CLIENTES_COMPRAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.compras: ~66 rows (aproximadamente)
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
	(27, 1, '930163321', 78.90, 0.00, 'F', 'Cartão de Credito', '2020-10-05 16:11:31', '2020-10-05 16:11:31'),
	(28, 1, '1145158837', 73.90, 0.00, 'F', 'Cartão de Credito', '2020-10-08 12:20:11', '2020-10-08 12:20:11'),
	(29, 1, '193102495', 73.90, 0.00, 'F', 'Cartão de Credito', '2020-10-08 12:20:56', '2020-10-08 12:20:56'),
	(30, 1, '1974209022', 5.00, 0.00, 'F', 'Moeda Virtual', '2020-10-08 12:23:10', '2020-10-08 12:23:10'),
	(31, 1, '54734180', 50.00, 0.00, 'F', 'Moeda Virtual', '2020-10-16 17:03:20', '2020-10-16 17:03:20'),
	(34, 1, '212269553', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-10-23 20:13:58', '2020-10-23 20:13:58'),
	(35, 1, '633122682', 0.50, 0.00, 'F', 'Moeda Virtual', '2020-10-23 20:18:33', '2020-10-23 20:18:33'),
	(36, 1, '1647271914', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-10-24 13:23:30', '2020-10-24 13:23:30'),
	(39, 1, '1435940938', 540.00, 0.00, 'F', 'Cartão de Credito', '2020-11-05 09:50:25', '2020-11-05 09:50:25'),
	(40, 1, '1673799351', 540.00, 0.00, 'F', 'Cartão de Credito', '2020-11-05 09:52:20', '2020-11-05 09:52:20'),
	(41, 1, '1344496395', 540.00, 0.00, 'F', 'Cartão de Credito', '2020-11-05 09:53:49', '2020-11-05 09:53:49'),
	(42, NULL, '216752025', 73.90, 0.00, 'F', 'Cartão de Credito', '2020-11-05 10:31:35', '2020-11-05 10:31:35'),
	(43, 1, '1018892394', 14.78, 0.00, 'F', 'Moeda Virtual', '2020-11-26 09:49:46', '2020-11-26 09:49:46'),
	(44, 1, '273311877', 83.90, 0.00, 'F', 'Moeda Virtual', '2020-11-29 18:30:03', '2020-11-29 18:30:03'),
	(45, 1, '1638584231', 73.90, 0.00, 'F', 'Moeda Virtual', '2020-11-30 09:12:49', '2020-11-30 09:12:49'),
	(46, 1, '977512895', 5.00, 0.00, 'F', 'Moeda Virtual', '2020-11-30 09:59:05', '2020-11-30 09:59:05'),
	(47, 1, '972869759', 73.90, 0.00, 'F', 'Moeda Virtual', '2020-11-30 13:07:06', '2020-11-30 13:07:06'),
	(48, 1, '1411444917', 5.00, 0.00, 'F', 'Moeda Virtual', '2020-11-30 13:14:02', '2020-11-30 13:14:02'),
	(49, 1, '1239038214', 15.00, 0.00, 'F', 'Moeda Virtual', '2020-11-30 13:16:31', '2020-11-30 13:16:31'),
	(50, 1, '1781134908', 0.00, 0.00, 'F', 'Moeda Virtual', '2020-11-30 13:16:31', '2020-11-30 13:16:31'),
	(51, 1, '625790128', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-07 19:59:18', '2020-12-07 19:59:18'),
	(52, 1, '216063377', 12.39, 0.00, 'F', 'Moeda Virtual', '2020-12-09 13:11:24', '2020-12-09 13:11:24'),
	(53, 1, '1154852157', 73.90, 0.00, 'F', 'Moeda Virtual', '2020-12-09 13:40:50', '2020-12-09 13:40:50'),
	(54, 1, '668314426', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-09 13:47:21', '2020-12-09 13:47:21'),
	(55, 1, '115205264', 0.50, 0.00, 'F', 'Moeda Virtual', '2020-12-09 14:18:12', '2020-12-09 14:18:12'),
	(56, 1, '706906757', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-09 14:24:45', '2020-12-09 14:24:45'),
	(57, 1, '441752247', 83.90, 0.00, 'F', 'Moeda Virtual', '2020-12-10 12:29:26', '2020-12-10 12:29:26'),
	(58, 1, '1458937679', 8.39, 0.00, 'F', 'Moeda Virtual', '2020-12-10 13:56:24', '2020-12-10 13:56:24'),
	(59, 1, '1672079233', 0.50, 0.00, 'F', 'Moeda Virtual', '2020-12-10 19:33:27', '2020-12-10 19:33:27'),
	(60, 1, '776270138', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-10 19:38:23', '2020-12-10 19:38:23'),
	(61, 1, '846661903', 22.17, 0.00, 'F', 'Moeda Virtual', '2020-12-10 22:13:42', '2020-12-10 22:13:42'),
	(62, 1, '1469847078', 73.90, 0.00, 'F', 'Moeda Virtual', '2020-12-11 09:26:58', '2020-12-11 09:26:58'),
	(63, 1, '1898035772', 0.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 09:26:58', '2020-12-11 09:26:58'),
	(64, 1, '1346603725', 5.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 09:27:39', '2020-12-11 09:27:39'),
	(65, 1, '1226443763', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 11:07:41', '2020-12-11 11:07:41'),
	(75, 1, '164469515', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:27:46', '2020-12-11 14:27:46'),
	(76, 1, '1762865463', 0.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:28:03', '2020-12-11 14:28:03'),
	(77, 1, '2001913816', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:28:29', '2020-12-11 14:28:29'),
	(78, 1, '136133719', 2.50, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:28:57', '2020-12-11 14:28:57'),
	(79, 1, '1673527634', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:30:09', '2020-12-11 14:30:09'),
	(83, 19, '1228526948', 14.78, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:41:18', '2020-12-11 15:03:59'),
	(84, 19, '1182193601', 0.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:41:27', '2020-12-11 15:04:03'),
	(85, 19, '951333222', 0.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 14:41:36', '2020-12-11 15:04:12'),
	(91, 19, '306576158', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 15:20:19', '2020-12-11 15:20:19'),
	(92, 19, '1283472213', 73.90, 0.00, 'F', 'Moeda Virtual', '2020-12-11 15:41:49', '2020-12-11 15:41:49'),
	(93, 19, '1506938344', 0.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 15:41:54', '2020-12-11 15:41:54'),
	(94, 1, '2134374839', 147.80, 0.00, 'F', 'Moeda Virtual', '2020-12-11 15:42:36', '2020-12-11 15:42:36'),
	(95, 1, '119220321', 739.00, 0.00, 'F', 'Moeda Virtual', '2020-12-11 15:42:58', '2020-12-11 15:42:58'),
	(96, 19, '131412938', 83.90, 0.00, 'F', 'Moeda Virtual', '2020-12-11 16:18:45', '2020-12-11 16:18:45'),
	(97, 19, '668449169', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 16:23:06', '2020-12-11 16:23:06'),
	(98, 19, '920683933', 73.90, 0.00, 'F', 'Moeda Virtual', '2020-12-11 16:23:39', '2020-12-11 16:23:39'),
	(99, 19, '1477042361', 7.39, 0.00, 'F', 'Moeda Virtual', '2020-12-11 16:34:49', '2020-12-11 16:34:49'),
	(100, 19, '820766069', 162.80, 0.00, 'F', 'Moeda Virtual', '2020-12-11 16:50:24', '2020-12-11 16:50:24'),
	(101, 19, '246491581', 83.90, 0.00, 'F', 'Moeda Virtual', '2020-12-11 17:01:08', '2020-12-11 17:01:08'),
	(102, 19, '1124120288', 36.95, 0.00, 'F', 'Moeda Virtual', '2020-12-11 17:04:50', '2020-12-11 17:04:50'),
	(103, 19, '334061695', 221.70, 0.00, 'F', 'Cartão de Credito', '2020-12-11 17:06:25', '2020-12-11 17:06:25'),
	(104, 28, '1112984273', 8.90, 0.00, 'F', 'Cartão de Credito', '2020-12-11 20:27:30', '2020-12-11 20:27:30'),
	(105, 28, '597117747', 1.50, 0.00, 'F', 'Moeda Virtual', '2020-12-11 20:28:12', '2020-12-11 20:28:12');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.compras_itens
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
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.compras_itens: ~85 rows (aproximadamente)
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
	(36, 27, '988001625', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '157017027'),
	(37, 28, '1625870462', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1846616920'),
	(38, 29, '651562396', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1551395785'),
	(39, 30, '572340254', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '835323602'),
	(40, 31, '537877213', 'Detergente Liquido Ype Clear ', 100, 0.50, 0.00, '834349142'),
	(41, NULL, '2013620142', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '482628046'),
	(42, 34, '1195506412', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1129032091'),
	(43, 35, '685294350', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '2021193682'),
	(44, 36, '2078811120', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1106839982'),
	(45, NULL, '2102463645', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '186629468'),
	(46, 39, '2007860661', 'Detergente Liquido Ype Clear ', 100, 0.50, 0.00, '1966949435'),
	(47, 40, '2100286151', 'Detergente Liquido Ype Clear ', 300, 0.50, 0.00, '330137351'),
	(48, 40, '2100286151', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '330137351'),
	(49, 41, '1082191065', 'Coca-Cola 2 Litros', 300, 7.39, 0.00, '792891354'),
	(50, 42, '1171371037', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '325936978'),
	(51, 43, '1090334534', 'Coca-Cola 2 Litros', 2, 7.39, 0.00, '1809559694'),
	(52, 44, '1780059196', 'Detergente Liquido Ype Clear ', 20, 0.50, 0.00, '1991743023'),
	(53, 44, '1780059196', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1991743023'),
	(54, 45, '1578808634', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '932645423'),
	(55, 46, '1503458264', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1877405669'),
	(56, 47, '1325672299', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1202448260'),
	(57, 48, '2048233238', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '2069570433'),
	(58, 49, '1631598737', 'Detergente Liquido Ype Clear ', 30, 0.50, 0.00, '1762032229'),
	(59, 51, '649816960', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '511273676'),
	(60, 52, '2067258504', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1608859534'),
	(61, 52, '2067258504', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1608859534'),
	(62, 53, '138505132', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '2044900249'),
	(63, 54, '286500455', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '301528356'),
	(64, 55, '1056704526', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '13407761'),
	(65, 56, '2056268529', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '880280767'),
	(66, 57, '60928419', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '891829743'),
	(67, 57, '60928419', 'Detergente Liquido Ype Clear ', 20, 0.50, 0.00, '891829743'),
	(68, 58, '1242285318', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '2045856357'),
	(69, 58, '1242285318', 'Detergente Liquido Ype Clear ', 2, 0.50, 0.00, '2045856357'),
	(70, 59, '1780814490', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '1114303776'),
	(71, 60, '726478584', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1937924071'),
	(72, 61, '399039347', 'Coca-Cola 2 Litros', 3, 7.39, 0.00, '230469891'),
	(73, 62, '486007794', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '997464297'),
	(74, 64, '1561991683', 'Detergente Liquido Ype Clear ', 10, 0.50, 0.00, '1997928248'),
	(75, 65, '630561598', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '9084163'),
	(76, NULL, '2102552424', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1756497559'),
	(77, NULL, '2102552424', 'Detergente Liquido Ype Clear ', 20, 0.50, 0.00, '1756497559'),
	(78, NULL, '1976882471', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '2002182866'),
	(79, NULL, '1630946446', 'Detergente Liquido Ype Clear ', 8, 0.50, 0.00, '527177995'),
	(80, NULL, '1628362453', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '530895790'),
	(81, 75, '1907024310', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1444710969'),
	(82, 77, '51969221', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '287994673'),
	(83, 78, '642573725', 'Detergente Liquido Ype Clear ', 5, 0.50, 0.00, '723681387'),
	(84, 79, '231483029', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1422394406'),
	(85, NULL, '1386266259', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '1484713323'),
	(86, 83, '348771861', 'Coca-Cola 2 Litros', 2, 7.39, 0.00, '1500398299'),
	(87, NULL, '1504594997', 'Detergente Liquido Ype Clear ', 14, 0.50, 0.00, '2140539460'),
	(88, NULL, '144191839', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '1547230341'),
	(89, NULL, '1573803296', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '1308572022'),
	(90, NULL, '1265581681', 'Detergente Liquido Ype Clear ', 1, 0.50, 0.00, '1468656913'),
	(91, NULL, '1164922014', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '655925530'),
	(92, 91, '994727260', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '263893903'),
	(93, 92, '779807702', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1166016503'),
	(94, 94, '205994844', 'Coca-Cola 2 Litros', 20, 7.39, 0.00, '1681415821'),
	(95, 95, '664748429', 'Coca-Cola 2 Litros', 100, 7.39, 0.00, '380653256'),
	(96, 96, '1779967435', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '2126381817'),
	(97, 96, '1779967435', 'Detergente Liquido Ype Clear ', 20, 0.50, 0.00, '2126381817'),
	(98, 97, '1764566886', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '355951320'),
	(99, 98, '386774021', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '1367135540'),
	(100, 99, '315621452', 'Coca-Cola 2 Litros', 1, 7.39, 0.00, '442506471'),
	(101, 100, '1314498215', 'Coca-Cola 2 Litros', 20, 7.39, 0.00, '1811060690'),
	(102, 100, '1314498215', 'Detergente Liquido Ype Clear ', 30, 0.50, 0.00, '1811060690'),
	(103, 101, '1757757009', 'Coca-Cola 2 Litros', 10, 7.39, 0.00, '104738774'),
	(104, 101, '1757757009', 'Detergente Liquido Ype Clear ', 20, 0.50, 0.00, '104738774'),
	(105, 102, '2113823391', 'Coca-Cola 2 Litros', 5, 7.39, 0.00, '1442460389'),
	(106, 103, '1668180993', 'Coca-Cola 2 Litros', 30, 7.39, 0.00, '1670999221'),
	(107, 104, '1814882065', 'Pasta Creme Dental Colgate AnticÃÂ¡rie - 180g', 1, 8.90, 0.00, '1166862151'),
	(108, 105, '1635812805', 'Detergente Liquido Ype Clear ', 3, 0.50, 0.00, '292021838');
/*!40000 ALTER TABLE `compras_itens` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.compras_pagamentos
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
  `DATA_CAD` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_COMPRAS_PAGAMENTO`),
  KEY `FK_ID_COMPRAS_ITENS_COMPRAS_ITENS` (`ID_COMPRAS_ITENS`),
  CONSTRAINT `FK_ID_COMPRAS_ITENS_COMPRAS_ITENS` FOREIGN KEY (`ID_COMPRAS_ITENS`) REFERENCES `compras_itens` (`ID_COMPRA_ITENS`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.compras_pagamentos: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_pagamentos` DISABLE KEYS */;
INSERT INTO `compras_pagamentos` (`ID_COMPRAS_PAGAMENTO`, `ID_COMPRAS_ITENS`, `NOME_CARTAO`, `NUMERO_CARTAO`, `STATUS_PAGAMENTO`, `CARTAO_VALIDADE_MES`, `CARTAO_VALIDADE_ANO`, `CODIGO_CARTAO`, `TRANSACAO`, `TOTAL_COMPRA`, `CODIGO_PAGAMENTO`, `DATA_CAD`) VALUES
	(1, 2, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2021', 148, 'txn_1HPGjbDZjX8sc9JCzetX4sN4', 9.28, '451420', '2020-09-12 20:58:21'),
	(2, 3, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HTtlHDZjX8sc9JCdEKHenHG', 73.90, '801186', '2020-09-21 15:29:18'),
	(3, 5, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HTzYpDZjX8sc9JCbuhGMXix', 73.90, '397417', '2020-09-21 21:40:50'),
	(4, 30, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HYxwYDZjX8sc9JC2hO1rMHZ', 226.70, '225125', '2020-10-05 14:57:50'),
	(5, 36, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2024', 159, 'txn_1HYz5rDZjX8sc9JCDlo21J8V', 78.90, '194821', '2020-10-05 16:11:31'),
	(6, 38, 'Jessica Oliveira', ' 4242 4242 4242 4242', 'succeeded', '02', '2024', 159, 'txn_1Ha0vLDZjX8sc9JCv6mYMjQG', 73.90, '835484', '2020-10-08 12:20:57'),
	(7, 46, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2022', 159, 'txn_1Hk7v3DZjX8sc9JCjwUQuq9h', 540.00, '643966', '2020-11-05 09:50:25'),
	(8, 48, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2022', 159, 'txn_1Hk7wtDZjX8sc9JCDNUyat9O', 540.00, '240079', '2020-11-05 09:52:20'),
	(9, 49, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2022', 159, 'txn_1Hk7yLDZjX8sc9JCVcWc1GZf', 540.00, '788240', '2020-11-05 09:53:49'),
	(10, 50, 'Jessica Oliveira', '4242424242424242', 'succeeded', '02', '2022', 159, 'txn_1Hk8YtDZjX8sc9JC2nV7KPNM', 73.90, '778106', '2020-11-05 10:31:35'),
	(11, 106, 'Maria Teste', '4242424242424242', 'succeeded', '02', '2021', 159, 'txn_1HxHsjDZjX8sc9JCHRqmc08E', 221.70, '139349', '2020-12-11 17:06:25'),
	(12, 107, 'Lucas Oliveira', '4242424242424242', 'succeeded', '02', '2021', 159, 'txn_1HxL1JDZjX8sc9JCZaZ1ywtw', 8.90, '373058', '2020-12-11 20:27:30');
/*!40000 ALTER TABLE `compras_pagamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.fornecedores
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
  `DATA_CAD` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATA_MOD` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_FORNECEDORES`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.fornecedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`ID_FORNECEDORES`, `NOME_FANTASIA_FORNECEDORES`, `CNPJ_FORNECEDORES`, `EMAIL_FORNECEDORES`, `RAZAO_SOCIAL_FORNECEDORES`, `CELULAR_FORNECEDORES`, `SEXO_FORNECEDORES`, `DATA_NASCIMENTO_FORNECEDORES`, `NACIONALIDADE_FORNECEDORES`, `CEP_FORNECEDORES`, `CIDADE_FORNECEDORES`, `ENDERECO_FORNECEDORES`, `BAIRRO_FORNECEDORES`, `NUMERO_FORNECEDORES`, `ESTADO_FORNECEDORES`, `COMPLEMENTO_FORNECEDORES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 'Felipe', '5151', 'felipe@gmail.com', 'teste', '14885263332', 'M', '2020-06-03', 'Brasileiro', '15248025', 'teste', 'teste', 'teste', '144', 'sp', 'teste', '2020-09-08 20:42:17', '2020-09-08 20:44:17'),
	(2, 'Unilever', ' 55.555.555/55', 'unileverbrasil@gmail.com', 'Unilever', '(11) 11111-', 'masculolo', '0000-00-00', 'brasil', '16570-00', 'Guarantã', 'Rua Beraldo Arruda', 'centro', '250', 'SP', 'casa', '2020-11-03 21:07:51', '2020-11-03 21:07:51'),
	(3, 'Seda', ' 00.000.000/00', 'seda@gmail', 'Seda', '(12) 52552-', 'masculolo', '0000-00-00', 'brasil', '16570-00', 'Guarantã', 'Rua Beraldo Arruda', 'centro', '250', 'SP', 'casa', '2020-11-08 20:05:30', '2020-11-08 20:05:30');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.login_usuarios
CREATE TABLE IF NOT EXISTS `login_usuarios` (
  `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN_USUARIOS` varchar(255) DEFAULT NULL,
  `SENHA_USUARIOS` varchar(255) DEFAULT NULL,
  `TIPO_USUARIOS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.login_usuarios: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `login_usuarios` DISABLE KEYS */;
INSERT INTO `login_usuarios` (`ID_USUARIOS`, `LOGIN_USUARIOS`, `SENHA_USUARIOS`, `TIPO_USUARIOS`) VALUES
	(1, 'qq2515720@gmail.com', '$2y$10$/7ne4gXT2JJu7rKZvkZZmOdluZsYoH906Hy.8SHDkDfoyQ2XFBikm', 1),
	(2, 'Vanessa ', '$2y$10$qUR1bKhzBL7VjdqqOzUS6OL30.y4Jcklpdi7dE3rM5kAityMb56Fu', 1),
	(12, 'vitorewbank48763@gmail.com', '$2y$10$hhGVJrN8pLs/3BygRO.DhOuESccYjC7c5HZPYuYaY/KaxQcmF0jZm', 2),
	(18, 'vitormartins281999@gmail.com', '$2y$10$pMEo5c8FxAzDH2lCEQk5.ecGZdIZjWYoZ9l7Nv1VLzrTolv1bRine', 1),
	(61, 'qq25157209@gmail.com', '$2y$10$DVX8IT6vkG4FYAnNbLV.6.WvJy7yZj1jixxKuqcnUj/eq0iBL1szC', 1),
	(63, 'mariapaula@gmail.com', '$2y$10$7r87jBvWEYtf/Mh75GkX6e0Ubkqy2tSEINfArk210vly1Ee8C7fJC', 1),
	(74, 'oliveiralucas.68@gmail.com', '$2y$10$sUQOc.3Aq7fkoZi0NscJhe0OgjzMHPK0SswWMw6JRRG8hoNpOZ.Uq', 1);
/*!40000 ALTER TABLE `login_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_MARCA` varchar(10) DEFAULT NULL,
  `NOME_MARCA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.marca: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`ID_MARCA`, `CODIGO_MARCA`, `NOME_MARCA`) VALUES
	(1, '256148752', 'Coca Cola'),
	(2, '148523698', 'Ypê'),
	(3, '778542269', 'Colgate'),
	(4, '1567244413', 'Pantene'),
	(5, '928759360', 'Nivea'),
	(6, '27438139', 'Coamo');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.moedas
CREATE TABLE IF NOT EXISTS `moedas` (
  `ID_MOEDAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_MOEDAS` int(11) DEFAULT NULL,
  `CODIGOS` varchar(255) DEFAULT NULL,
  `VALOR_MOEDAS` float(10,2) DEFAULT NULL,
  `DATA_CAD_MOEDAS` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_MOEDAS`),
  KEY `FK_ID_CLIENTES_MOEDAS` (`ID_CLIENTES_MOEDAS`),
  CONSTRAINT `FK_ID_CLIENTES_MOEDAS` FOREIGN KEY (`ID_CLIENTES_MOEDAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.moedas: ~36 rows (aproximadamente)
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
	(33, 1, '1871667841', 100.00, '2020-10-03 10:07:55'),
	(34, 1, '1627952041', 200.00, '2020-10-08 12:09:03'),
	(35, 1, '745062046', 1000.00, '2020-10-08 12:21:26'),
	(36, 1, '1725362676', 105.00, '2020-10-08 12:23:47'),
	(37, 1, '779421758', 540.00, '2020-10-17 12:53:08'),
	(39, 1, '1543135716', 50.00, '2020-10-25 20:32:00'),
	(41, 1, '1348432804', 540.00, '2020-11-05 09:49:27'),
	(45, 1, '650358457', 1000.00, '2020-11-30 14:29:36'),
	(49, 9, '1764409130', 100.00, '2020-12-11 13:55:44'),
	(53, 19, '393063571', 100.00, '2020-12-11 15:41:34'),
	(54, NULL, '2110550762', 50.00, '2020-12-11 18:23:40'),
	(55, 20, '1150481236', 50.00, '2020-12-11 18:35:41'),
	(56, 28, '717824000', 100.00, '2020-12-11 20:24:49'),
	(57, 1, '1316294320', 1000.00, '2020-12-12 02:12:56');
/*!40000 ALTER TABLE `moedas` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.ofertas
CREATE TABLE IF NOT EXISTS `ofertas` (
  `ID_OFERTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRODUTOS` int(11) DEFAULT NULL,
  `PRECO_OFERTA` float(10,2) DEFAULT NULL,
  `STATUS_OFERTA` varchar(1) DEFAULT NULL,
  `DESCRICAO` varchar(255) DEFAULT NULL,
  `DATA_CAD_OFERTAS` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DATA_MOD_OFERTAS` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_OFERTA`),
  KEY `FK_ID_PRODUTOS` (`ID_PRODUTOS`),
  CONSTRAINT `FK_ID_PRODUTOS` FOREIGN KEY (`ID_PRODUTOS`) REFERENCES `produtos` (`ID_PRODUTOS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.ofertas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ofertas` DISABLE KEYS */;
INSERT INTO `ofertas` (`ID_OFERTA`, `ID_PRODUTOS`, `PRECO_OFERTA`, `STATUS_OFERTA`, `DESCRICAO`, `DATA_CAD_OFERTAS`, `DATA_MOD_OFERTAS`) VALUES
	(2, 1, 0.50, 'A', 'Ofertas de Natal', '2020-12-11 11:12:02', '2020-12-11 11:12:02');
/*!40000 ALTER TABLE `ofertas` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.produtos
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
  `DATA_CAD_PRODUTOS` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATA_MOD_PRODUTOS` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_PRODUTOS`),
  KEY `FK_produtos_marca` (`ID_MARCAS_PRODUTOS`),
  KEY `FK_ID_FORNECEDORES_PRODUTOS` (`ID_FORNECEDORES_PRODUTOS`),
  CONSTRAINT `FK_ID_FORNECEDORES_PRODUTOS` FOREIGN KEY (`ID_FORNECEDORES_PRODUTOS`) REFERENCES `fornecedores` (`ID_FORNECEDORES`),
  CONSTRAINT `FK_produtos_marca` FOREIGN KEY (`ID_MARCAS_PRODUTOS`) REFERENCES `marca` (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`ID_PRODUTOS`, `ID_MARCAS_PRODUTOS`, `ID_FORNECEDORES_PRODUTOS`, `NOME_PRODUTOS`, `PRECO_CUSTO_PRODUTOS`, `PRECO_VENDA_PRODUTOS`, `PESO_PRODUTOS`, `VALIDADE_PRODUTOS`, `DESCRICAO_PRODUTOS`, `QR_CODE_PRODUTOS`, `ESTOQUE_PRODUTOS`, `CATEGORIAS_PRODUTOS`, `CORREDOR_PRODUTOS`, `PRATILEIRA_PRODUTOS`, `LOTE_PRODUTOS`, `STATUS_PRODUTOS`, `DATA_CAD_PRODUTOS`, `DATA_MOD_PRODUTOS`) VALUES
	(1, 2, 1, 'Detergente Liquido Ype Clear ', 0.50, 1.89, '500ML', '2021-09-08', 'Detergente Líquido Ypê Clear 500ml', '15962370', 10, 'Alimento', 'A', 'A', '158', 'D', '2020-09-08 20:46:44', '2020-09-21 18:33:40'),
	(2, 1, 1, 'Pasta Creme Dental Colgate Anticárie - 180g', 3.00, 8.90, '180g', '2020-12-08', 'Creme Dental Colgate Anticárie - 180g', '15962371', 25, 'Higiene', 'A', 'B', '365', 'A', '2020-09-08 20:55:13', '2020-12-11 18:01:26'),
	(4, 4, 2, 'Banana', 5.00, 4.50, '5', '2020-12-19', 'banan', '123456', 5, 'Fruta', '5', '5', '25', 'D', '2020-11-05 20:40:06', '2020-12-11 11:11:40');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.receita
CREATE TABLE IF NOT EXISTS `receita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `slug` varchar(120) DEFAULT NULL,
  `linha_fina` varchar(250) DEFAULT NULL,
  `descricao` mediumtext,
  `thumb` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_receita_categoria_id` (`categoria_id`),
  CONSTRAINT `FK_receita_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `receita_categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela caravelas.receita: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `receita` DISABLE KEYS */;
INSERT INTO `receita` (`id`, `categoria_id`, `titulo`, `slug`, `linha_fina`, `descricao`, `thumb`, `data`) VALUES
	(20, 5, 'Doce de leite', 'doce-de-leite', 'axxaeaxevgd', '&#60;h2&#62;&#60;span style=&#34;color:#c0392b&#34;&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;&#60;code&#62;Ingredientes&#60;/code&#62;&#60;/span&#62;&#60;/span&#62;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;h4&#62;&#60;span style=&#34;color:#3498db&#34;&#62;&#60;tt&#62;&#60;strong&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;&#60;code&#62;1 - manteiga&#60;/code&#62;&#60;/span&#62;&#60;/strong&#62;&#60;/tt&#62;&#60;/span&#62;&#60;/h4&#62;&#13;&#10;&#13;&#10;&#60;h4&#62;&#60;span style=&#34;color:#3498db&#34;&#62;&#60;tt&#62;&#60;strong&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;&#60;code&#62;2 - toddy&#60;/code&#62;&#60;/span&#62;&#60;/strong&#62;&#60;/tt&#62;&#60;/span&#62;&#60;/h4&#62;&#13;&#10;&#13;&#10;&#60;h4&#62;&#60;span style=&#34;color:#3498db&#34;&#62;&#60;tt&#62;&#60;strong&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;&#60;code&#62;3 - leite condensado&#60;/code&#62;&#60;/span&#62;&#60;/strong&#62;&#60;/tt&#62;&#60;/span&#62;&#60;/h4&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;&#60;span style=&#34;color:#c0392b&#34;&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;&#60;code&#62;Modo de Preparo&#60;/code&#62;&#60;/span&#62;&#60;/span&#62;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;h4&#62;&#60;span style=&#34;color:#3498db&#34;&#62;&#60;tt&#62;&#60;strong&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;&#60;code&#62;misturar tudo na panela&#60;/code&#62;&#60;/span&#62;&#60;/strong&#62;&#60;/tt&#62;&#60;/span&#62;&#60;/h4&#62;&#13;&#10;', 'https://i0.statig.com.br/bancodeimagens/0s/38/ca/0s38cad15io8i0cde3xjmvak1.jpg', '2020-10-10 10:50:20'),
	(21, 5, 'Torta de Chocolate', 'torta-doce', 'axxaeaxevgd', '&#60;h2&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;Ingredientes&#60;/span&#62;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;&#38;nbsp;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;&#60;span style=&#34;font-family:Arial,Helvetica,sans-serif&#34;&#62;Modo de Preparo&#60;/span&#62;&#60;/h2&#62;&#13;&#10;', 'https://portal-amb-imgs.clubedaana.com.br/2017/06/torta-musse-de-chocolate-600x400.jpg', '2020-10-10 13:31:36'),
	(22, 5, 'Pudim de Leite condensado', 'pudim', 'pudim de liquidificar', 'pudim teste&nbsp;', 'https://cozinhatecnica.com/wp-content/uploads/2020/02/pudim-de-leite-condensado-1.jpg', NULL),
	(23, 5, 'Mousse de Chocolate', 'mousse-de-chocolate', 'pudim de liquidificar', 'xbshaxhjaschvxjhsdvcjh', 'https://www.sabornamesa.com.br/media/k2/items/cache/878af4972e07916863ae909a162bf74b_L.jpg', NULL),
	(24, 6, 'Pernil Assado com Batata', 'prato-pronto', 'pudim de liquidificar', 'xbshaxhjaschvxjhsdvcjh', 'https://t2.rg.ltmcdn.com/pt/images/4/5/7/pernil_assado_com_molho_de_laranja_4754_600.jpg', NULL),
	(25, 6, 'Arroz a Piamontese', 'arroz-a-piamontese', '', '', 'https://pt.petitchef.com/imgupl/recipe/receita-de-arroz-piemontes--md-173017p258531.jpg', NULL);
/*!40000 ALTER TABLE `receita` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.receita_categoria
CREATE TABLE IF NOT EXISTS `receita_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela caravelas.receita_categoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `receita_categoria` DISABLE KEYS */;
INSERT INTO `receita_categoria` (`id`, `titulo`, `slug`) VALUES
	(5, 'Doce', 'doce'),
	(6, 'Prato Pronto', 'prato-pronto'),
	(7, 'Salada', 'salada'),
	(8, 'Pudim doce de leite', 'pudim-doce-de-leite'),
	(9, 'Sobremesa', 'sobremesa'),
	(10, 'Legumes', 'legumes'),
	(11, 'Verduras', 'verduras');
/*!40000 ALTER TABLE `receita_categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.saldo_clientes
CREATE TABLE IF NOT EXISTS `saldo_clientes` (
  `ID_SALDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `SALDO_CLIENTES` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_SALDO`),
  KEY `FK_ID_CLIENTE_SALDO_CLIENTES` (`ID_CLIENTE`),
  CONSTRAINT `FK_ID_CLIENTE_SALDO_CLIENTES` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela caravelas.saldo_clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `saldo_clientes` DISABLE KEYS */;
INSERT INTO `saldo_clientes` (`ID_SALDO`, `ID_CLIENTE`, `SALDO_CLIENTES`) VALUES
	(1, 1, 2754.39),
	(2, 19, 73.05),
	(9, 27, 0.00),
	(10, 28, 98.50);
/*!40000 ALTER TABLE `saldo_clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela caravelas.supermercado
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

-- Copiando dados para a tabela caravelas.supermercado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `supermercado` DISABLE KEYS */;
INSERT INTO `supermercado` (`ID_SUPERMERCADO`, `NOME`, `CNPJ`, `TELEFONE`, `CIDADE`, `ENDERECO`, `NUMERO`, `EMAIL`, `CEP`, `BAIRRO`, `ESTADO`) VALUES
	(1, 'Supermercado Caravelas', '99651235687459', '14996325514', 'Praia Grande', 'Rua Luiza Borba Ranciaro', '1589', 'supermercadocaravelas@gmail.com', '11720170', 'Vila São Jorge', 'SP');
/*!40000 ALTER TABLE `supermercado` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
