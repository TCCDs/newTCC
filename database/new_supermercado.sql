-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - Source distribution
-- OS do Servidor:               Linux
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.clientes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`ID_CLIENTES`, `ID_USUARIOS`, `NOME_CLIENTES`, `RG_CLIENTES`, `CPF_CLIENTES`, `SEXO_CLIENTES`, `DATA_NASCIMENTO_CLIENTES`, `EMAIL_CLIENTES`, `CELULAR_CLIENTES`, `RAZAO_SOCIAL_CLIENTES`, `NOME_FANTASIA_CLIENTES`, `CNPJ_CLIENTES`, `CEP_CLIENTES`, `CIDADE_CLIENTES`, `ESTADO_CLIENTES`, `ENDERECO_CLIENTES`, `NUMERO_CLIENTES`, `BAIRRO_CLIENTES`, `NACIONALIDADE_CLIENTES`, `COMPLEMENTO_CLIENTES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 1, 'Jessica', '033003300330', '956842315789', 'M', '2000-02-12', 'teste02@gmail.com', '999023565', NULL, NULL, NULL, '15962000', 'Pirajui', 'SP', '13 Abril', '159', 'Centro', 'Brasileira', 'casa', '2020-04-15 11:39:21', '2020-07-16 18:15:16'),
	(2, 4, 'Jessica teste 03', '025520025520', '669953652254', 'M', '1990-04-15', 'teste@teste', '999023565', NULL, NULL, NULL, '00000000', 'teste', 'ts', 'TESTE END', '159', 'teste Ba', 'br', 'casa', '2020-04-15 11:39:21', '2020-07-16 18:16:33'),
	(4, 3, 'Jessica teste 02', '125699653', '15962335896', 'Feminino', '1995-05-03', 'paulateste03@gmail.com', '14996523365', NULL, NULL, NULL, '16650332', 'Bauru', 'SP', ' Endereco: Rua Tres', '1596', 'Bairro: Residencial Recanto das Arvores', 'Portugal', 'casa', '2020-07-04 16:09:45', '2020-07-16 18:16:25'),
	(5, 6, 'Tamara', '025520025520', '15962348715', 'Feminino', '1999-03-05', 'paula@gmail.com', '14000000000', NULL, NULL, NULL, '15962387', 'Bauru', 'SP', ' Endereco: Rua Tres', '1596', 'Bairro: Residencial Recanto das Arvores', 'Brasileira', 'casa', '2020-07-13 09:13:58', '2020-07-16 18:16:17'),
	(6, 5, 'Paula ', '025520025520', '15962348715', 'Feminino', '1999-03-05', 'paula@gmail.com', '14000000000', NULL, NULL, NULL, '15962387', 'Bauru', 'SP', ' Endereco: Rua Tres', '1596', 'Bairro: Residencial Recanto das Arvores', 'Brasileira', 'casa', '2020-07-13 09:19:15', '2020-07-16 18:16:07'),
	(7, 8, 'Jaqueline', '033003300330', '956842315789', 'Feminino', '1993-03-09', 'jaqueline@gmail.com', '14995002365', NULL, NULL, NULL, '15962387', 'Bauru', 'SP', ' Endereco: Rua Tres', '1596', 'Bairro: Residencial Recanto das Arvores', 'Brasileira', 'casa', '2020-07-13 14:25:53', '2020-07-13 14:26:06'),
	(8, 10, 'pedro', '033003300330', '956842315789', 'Masculino', '1996-05-06', 'pedro@gmail.com', '14995663322', NULL, NULL, NULL, '13180652', 'Bauru', 'SP', 'rua teste', '1596', 'Bairro: Residencial Recanto das Arvores', 'Portugal', 'casa', '2020-07-13 14:30:58', '2020-07-13 14:31:18'),
	(9, 12, 'Lilian', '033003300330', '956842315789', 'Feminino', '1993-01-06', 'lilian@gmail.com', '14999003366', NULL, NULL, NULL, '13180652', 'Bauru', 'SP', ' Endereco: Rua Tres', '1596', 'Bairro: Residencial Recanto das Arvores', 'Brasileira', 'casa', '2020-07-14 09:00:33', '2020-07-14 09:00:33');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.cliente_pagamentos
CREATE TABLE IF NOT EXISTS `cliente_pagamentos` (
  `ID_PAGAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MOEDAS` int(11) DEFAULT NULL,
  `ORDER_NUMBER` int(11) NOT NULL DEFAULT 0,
  `ORDER_TOTAL_AMOUNT` float NOT NULL DEFAULT 0,
  `TRANSACAO` varchar(255) NOT NULL DEFAULT '0',
  `CODIGO_CARTAO` int(11) NOT NULL DEFAULT 0,
  `CARTAO_VALIDADE_MES` varchar(255) NOT NULL DEFAULT '0',
  `CARTAO_VALIDADE_ANO` varchar(255) NOT NULL DEFAULT '0',
  `ORDER_STATUS` varchar(255) NOT NULL DEFAULT '0',
  `NUMERO_CARTAO` varchar(255) NOT NULL DEFAULT '0',
  `EMAIL_CLIENTE` varchar(255) NOT NULL DEFAULT '0',
  `NOME_CARTAO` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_PAGAMENTO`),
  KEY `FK_ID_MOEDAS_MOEDAS` (`ID_MOEDAS`),
  CONSTRAINT `FK_ID_MOEDAS_MOEDAS` FOREIGN KEY (`ID_MOEDAS`) REFERENCES `moedas` (`ID_MOEDAS`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.cliente_pagamentos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente_pagamentos` DISABLE KEYS */;
INSERT INTO `cliente_pagamentos` (`ID_PAGAMENTO`, `ID_MOEDAS`, `ORDER_NUMBER`, `ORDER_TOTAL_AMOUNT`, `TRANSACAO`, `CODIGO_CARTAO`, `CARTAO_VALIDADE_MES`, `CARTAO_VALIDADE_ANO`, `ORDER_STATUS`, `NUMERO_CARTAO`, `EMAIL_CLIENTE`, `NOME_CARTAO`) VALUES
	(1, NULL, 926113, 199, 'txn_1GxbkpDZjX8sc9JCVQJKznrO', 134, '02', '2023', 'succeeded', '4242424242424242', 'teste@gmail.com', 'teste'),
	(2, NULL, 239999, 50, 'txn_1GzYOVDZjX8sc9JC77hLiEMp', 159, '01', '2021', 'succeeded', '4242424242424242', 'paula@gmail.com', 'paula'),
	(3, NULL, 751514, 199, 'txn_1GzjU9DZjX8sc9JCCsOM8gXc', 210, '01', '2021', 'succeeded', '4242424242424242', 'paula@gmail.com', 'paula'),
	(4, NULL, 735011, 101, 'txn_1GzjWvDZjX8sc9JCCgVEvpuI', 123, '02', '2021', 'succeeded', '4242424242424242', 'teste@gmail.com', 'teste'),
	(5, 4, 153846, 234, 'txn_1GzkOcDZjX8sc9JCBdhlnTd3', 159, '01', '2021', 'succeeded', '4242424242424242', 'paula@gmail.com', 'paula');
/*!40000 ALTER TABLE `cliente_pagamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `ID_COMPRAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_COMPRAS` int(11) DEFAULT NULL,
  `CODIGO_COMPRAS` varchar(10) DEFAULT NULL,
  `VALOR_COMPRAS` float(10,2) DEFAULT NULL,
  `TOTAL_DESCONTO_COMPRAS` float(10,2) DEFAULT NULL,
  `STATUS_COMPRAS` varchar(11) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT current_timestamp(),
  `DATA_MOD` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_COMPRAS`) USING BTREE,
  KEY `FK_IDCLIENTES_COMPRAS` (`ID_CLIENTES_COMPRAS`),
  CONSTRAINT `FK_IDCLIENTES_COMPRAS` FOREIGN KEY (`ID_CLIENTES_COMPRAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras: ~35 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`ID_COMPRAS`, `ID_CLIENTES_COMPRAS`, `CODIGO_COMPRAS`, `VALOR_COMPRAS`, `TOTAL_DESCONTO_COMPRAS`, `STATUS_COMPRAS`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 1, '156', 250.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(2, 1, '771183557', 670.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(3, 1, '341894991', 1720.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(4, 1, '1935732625', 350.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(5, 1, '2007787568', 860.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(6, 1, '2115011636', 1370.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(7, 1, '173185783', 2460.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(8, 1, '1069276858', 810.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(9, 1, '1203902676', 1320.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(10, 1, '1287848816', 720.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(11, 1, '323982435', 320.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(12, 1, '596765116', 350.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(13, 1, '735125327', 860.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(14, 1, '1937819516', 1150.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(15, 1, '346172089', 4950.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(16, 1, '344113575', 350.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(17, 1, '509550434', 810.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(18, 1, '777692831', 750.00, 0.00, 'F', '2020-06-20 10:00:01', '2020-06-20 10:00:01'),
	(19, 1, '1806510457', 2730.00, 0.00, 'F', '2020-06-20 10:53:33', '2020-06-20 10:53:33'),
	(20, 2, '1154926368', 810.00, 0.00, 'F', '2020-06-24 15:12:07', '2020-06-24 15:12:07'),
	(21, 1, '1131247833', 350.00, 0.00, 'F', '2020-06-24 20:23:50', '2020-06-24 20:23:50'),
	(22, 1, '713038048', 1210.00, 0.00, 'F', '2020-06-24 20:28:49', '2020-06-24 20:28:49'),
	(23, 1, '420529841', 350.00, 0.00, 'F', '2020-06-24 20:33:19', '2020-06-24 20:33:19'),
	(24, 1, '1689048678', 700.00, 0.00, 'F', '2020-06-28 15:15:37', '2020-06-28 15:15:37'),
	(25, 8, '1742262892', 810.00, 0.00, 'F', '2020-07-15 09:05:33', '2020-07-15 09:05:33'),
	(26, 8, '2020541774', 400.00, 0.00, 'F', '2020-07-15 09:56:17', '2020-07-15 09:56:17'),
	(27, 8, '773159264', 350.00, 0.00, 'F', '2020-07-15 09:57:08', '2020-07-15 09:57:08'),
	(28, 8, '202022646', 460.00, 0.00, 'F', '2020-07-15 10:03:51', '2020-07-15 10:03:51'),
	(29, 8, '1056423607', 620.00, 0.00, 'F', '2020-07-15 10:12:52', '2020-07-15 10:12:52'),
	(30, 8, '1193549556', 860.00, 0.00, 'F', '2020-07-15 10:26:42', '2020-07-15 10:26:42'),
	(31, 8, '1681683565', 670.00, 0.00, 'F', '2020-07-15 10:34:31', '2020-07-15 10:34:31'),
	(32, 8, '510199868', 6040.00, 0.00, 'F', '2020-07-15 11:28:20', '2020-07-15 11:28:20'),
	(33, 8, '1074084169', 5750.00, 0.00, 'F', '2020-07-15 11:30:47', '2020-07-15 11:30:47'),
	(34, 8, '157597621', 460.00, 0.00, 'F', '2020-07-15 14:22:24', '2020-07-15 14:22:24'),
	(35, 8, '1020431056', 750.00, 0.00, 'F', '2020-07-16 18:06:28', '2020-07-16 18:06:28');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.compras_itens
CREATE TABLE IF NOT EXISTS `compras_itens` (
  `ID_COMPRA_ITENS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_COMPRAS` int(11) DEFAULT NULL,
  `CODIGO_ITENS` varchar(255) NOT NULL,
  `NOME_PRODUTOS` varchar(255) NOT NULL,
  `QUANTIDADE_PRODUTOS` int(11) NOT NULL,
  `PRECO_PRODUTOS` float(10,2) NOT NULL,
  `QR_CODE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_COMPRA_ITENS`),
  KEY `FK_ID_COMPRAS_COMPRAS_ITENS` (`ID_COMPRAS`),
  CONSTRAINT `FK_ID_COMPRAS_COMPRAS_ITENS` FOREIGN KEY (`ID_COMPRAS`) REFERENCES `compras` (`ID_COMPRAS`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_itens: ~48 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_itens` DISABLE KEYS */;
INSERT INTO `compras_itens` (`ID_COMPRA_ITENS`, `ID_COMPRAS`, `CODIGO_ITENS`, `NOME_PRODUTOS`, `QUANTIDADE_PRODUTOS`, `PRECO_PRODUTOS`, `QR_CODE`) VALUES
	(1, NULL, '1', 'T-shirt 1', 1, 350.00, '1640670487'),
	(2, NULL, '1237047275', 'T-shirt 2', 1, 460.00, '23430815'),
	(3, NULL, '1237047275', 'T-shirt 3', 1, 400.00, '23430815'),
	(4, NULL, '496998685', 'T-shirt 1', 1, 350.00, '726117784'),
	(5, NULL, '496998685', 'T-shirt 3', 1, 400.00, '726117784'),
	(6, NULL, '496998685', 'T-shirt 5', 1, 400.00, '726117784'),
	(7, NULL, '1391235114', 'T-shirt 1', 1, 350.00, '1328331949'),
	(8, 5, '1391235114', 'T-shirt 2', 10, 460.00, '1328331949'),
	(9, NULL, '2084227951', 'T-shirt 1', 1, 350.00, '88587370'),
	(10, 18, '627104222', 'T-shirt 1', 1, 350.00, '385161290'),
	(11, 18, '627104222', 'T-shirt 5', 1, 400.00, '385161290'),
	(12, 19, '2059952836', 'T-shirt 1', 1, 350.00, '349556375'),
	(13, 19, '2059952836', 'T-shirt 2', 1, 460.00, '349556375'),
	(14, 19, '2059952836', 'T-shirt 3', 1, 400.00, '349556375'),
	(15, 19, '2059952836', 'T-shirt 6', 1, 320.00, '349556375'),
	(16, 19, '2059952836', 'T-shirt 4', 1, 530.00, '349556375'),
	(17, 19, '2059952836', 'T-shirt 5', 1, 400.00, '349556375'),
	(18, 19, '2059952836', 'T-shirt 7', 1, 270.00, '349556375'),
	(19, 20, '286644591', 'T-shirt 1', 1, 350.00, '117357517'),
	(20, 20, '286644591', 'T-shirt 2', 1, 460.00, '117357517'),
	(21, 21, '1134565524', 'T-shirt 1', 1, 350.00, '2000737038'),
	(22, 22, '2114234287', 'T-shirt 1', 1, 350.00, '1950755121'),
	(23, 22, '2114234287', 'T-shirt 3', 1, 400.00, '1950755121'),
	(24, 22, '2114234287', 'T-shirt 2', 1, 460.00, '1950755121'),
	(25, 23, '1363230004', 'T-shirt 1', 1, 350.00, '553051802'),
	(26, 24, '1283213526', 'T-shirt 1', 2, 350.00, '1197751091'),
	(27, 25, '725521374', 'T-shirt 1', 1, 350.00, '1175941715'),
	(28, 25, '725521374', 'T-shirt 2', 1, 460.00, '1175941715'),
	(29, 26, '158587594', 'T-shirt 3', 1, 400.00, '1984132307'),
	(30, 27, '1747442350', 'T-shirt 1', 1, 350.00, '1370189601'),
	(31, 28, '1865374826', 'T-shirt 2', 1, 460.00, '1744206548'),
	(32, 29, '1386765668', 'T-shirt 1', 1, 350.00, '648065911'),
	(33, 29, '1386765668', 'T-shirt 7', 1, 270.00, '648065911'),
	(34, 30, '1761823533', 'T-shirt 3', 1, 400.00, '703614452'),
	(35, 30, '1761823533', 'T-shirt 2', 1, 460.00, '703614452'),
	(36, 31, '557591472', 'T-shirt 6', 1, 320.00, '67454463'),
	(37, 31, '557591472', 'T-shirt 1', 1, 350.00, '67454463'),
	(38, 32, '1510769477', 'T-shirt 5', 2, 400.00, '248771977'),
	(39, 32, '1510769477', 'T-shirt 6', 1, 320.00, '248771977'),
	(40, 32, '1510769477', 'T-shirt 2', 2, 460.00, '248771977'),
	(41, 32, '1510769477', 'T-shirt 3', 10, 400.00, '248771977'),
	(42, 33, '1578876080', 'T-shirt 3', 1, 400.00, '492029320'),
	(43, 33, '1578876080', 'T-shirt 2', 10, 460.00, '492029320'),
	(44, 33, '1578876080', 'T-shirt 1', 1, 350.00, '492029320'),
	(45, 33, '1578876080', 'T-shirt 5', 1, 400.00, '492029320'),
	(46, 34, '1938335561', 'T-shirt 2', 1, 460.00, '501914261'),
	(47, 35, '1962692842', 'T-shirt 1', 1, 350.00, '1141028552'),
	(48, 35, '1962692842', 'T-shirt 3', 1, 400.00, '1141028552');
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
  PRIMARY KEY (`ID_COMPRAS_PAGAMENTO`),
  KEY `FK_ID_COMPRAS_ITENS_COMPRAS_ITENS` (`ID_COMPRAS_ITENS`),
  CONSTRAINT `FK_ID_COMPRAS_ITENS_COMPRAS_ITENS` FOREIGN KEY (`ID_COMPRAS_ITENS`) REFERENCES `compras_itens` (`ID_COMPRA_ITENS`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_pagamentos: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_pagamentos` DISABLE KEYS */;
INSERT INTO `compras_pagamentos` (`ID_COMPRAS_PAGAMENTO`, `ID_COMPRAS_ITENS`, `NOME_CARTAO`, `NUMERO_CARTAO`, `STATUS_PAGAMENTO`, `CARTAO_VALIDADE_MES`, `CARTAO_VALIDADE_ANO`, `CODIGO_CARTAO`, `TRANSACAO`, `TOTAL_COMPRA`, `CODIGO_PAGAMENTO`) VALUES
	(1, 6, 'paula', '4242424242424242', 'succeeded', '04', '2021', 562, 'txn_1GvohtDZjX8sc9JC2r5jlc5p', 1150.00, '306362'),
	(2, 8, 'teste', '4242424242424242', 'succeeded', '02', '2021', 452, 'txn_1GvshfDZjX8sc9JCvs5YwN1U', 4950.00, '250568'),
	(3, 9, 'teste', '4242424242424242', 'succeeded', '02', '2022', 258, 'txn_1GvtSEDZjX8sc9JCdK5QfAe5', 350.00, '486524'),
	(5, 11, 'paula', '4242424242424242', 'succeeded', '01', '2021', 854, 'txn_1Gw5fsDZjX8sc9JCGpX1w40B', 750.00, '109296'),
	(6, 18, 'Jose', '4242424242424242', 'succeeded', '02', '2021', 255, 'txn_1Gw78TDZjX8sc9JC0QB3wDKx', 2730.00, '202029'),
	(7, 20, 'paula', '4242424242424242', 'succeeded', '12', '2021', 156, 'txn_1Gxd4tDZjX8sc9JC0lt2zS9p', 810.00, '944648'),
	(8, 21, 'teste', '4242424242424242', 'succeeded', '02', '2021', 256, 'txn_1GxhwYDZjX8sc9JCw8IXafU5', 350.00, '459905'),
	(9, 24, 'paula', '4242424242424242', 'succeeded', '02', '2025', 625, 'txn_1Gxi1NDZjX8sc9JC9EYRiRRm', 1210.00, '935751'),
	(10, 25, 'paula', '4242424242424242', 'succeeded', '03', '2022', 568, 'txn_1Gxi5jDZjX8sc9JCEOVDAdhQ', 350.00, '409648'),
	(11, 26, 'Jose', '4242424242424242', 'succeeded', '02', '2022', 235, 'txn_1Gz52TDZjX8sc9JCi6Hx104V', 700.00, '873050'),
	(12, 28, 'jaqueline', '4242424242424242', 'succeeded', '01', '2022', 23, 'txn_1H59MeDZjX8sc9JCpajl3jCh', 810.00, '335041'),
	(13, 29, 'jaqueline', '4242424242424242', 'succeeded', '02', '2022', 158, 'txn_1H5A9lDZjX8sc9JCkKxmsa0H', 400.00, '738152'),
	(14, 30, 'jaqueline', '4242424242424242', 'succeeded', '02', '2022', 568, 'txn_1H5AAaDZjX8sc9JCim70utgA', 350.00, '308170'),
	(15, 31, 'pedro', '4242424242424242', 'succeeded', '02', '2022', 159, 'txn_1H5AH4DZjX8sc9JCgzk8ZQW3', 460.00, '116341'),
	(16, 33, 'jaqueline', '4242424242424242', 'succeeded', '06', '2024', 359, 'txn_1H5APnDZjX8sc9JCYE8NV1A8', 620.00, '278576'),
	(17, 35, 'jaqueline', '4242424242424242', 'succeeded', '05', '2026', 325, 'txn_1H5AdCDZjX8sc9JCZiWsPRJb', 860.00, '562292'),
	(18, 37, 'jaqueline', '4242424242424242', 'succeeded', '03', '2023', 365, 'txn_1H5AkkDZjX8sc9JCPKBzn0bU', 670.00, '357887'),
	(19, 41, 'jaqueline', '4242424242424242', 'succeeded', '05', '2022', 358, 'txn_1H5BaqDZjX8sc9JCmKuEcQNk', 6040.00, '853364'),
	(20, 45, 'jaqueline', '4242424242424242', 'succeeded', '06', '2025', 265, 'txn_1H5BdCDZjX8sc9JCdL6QHdUD', 5750.00, '460200'),
	(21, 46, 'jaqueline', '4242424242424242', 'succeeded', '02', '2022', 158, 'txn_1H5EJIDZjX8sc9JCUpvhlw0c', 460.00, '202093'),
	(22, 48, 'jaqueline', '4242424242424242', 'succeeded', '02', '2021', 158, 'txn_1H5eHgDZjX8sc9JCMVE4zHam', 750.00, '522235');
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
  `DATA_NASCIMENTO_FORNECEDORES` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.fornecedores: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`ID_FORNECEDORES`, `NOME_FANTASIA_FORNECEDORES`, `CNPJ_FORNECEDORES`, `EMAIL_FORNECEDORES`, `RAZAO_SOCIAL_FORNECEDORES`, `CELULAR_FORNECEDORES`, `SEXO_FORNECEDORES`, `DATA_NASCIMENTO_FORNECEDORES`, `NACIONALIDADE_FORNECEDORES`, `CEP_FORNECEDORES`, `CIDADE_FORNECEDORES`, `ENDERECO_FORNECEDORES`, `BAIRRO_FORNECEDORES`, `NUMERO_FORNECEDORES`, `ESTADO_FORNECEDORES`, `COMPLEMENTO_FORNECEDORES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 'teste f', '51515151', 'teste@teste', 'teste ra', '999875642', NULL, NULL, NULL, '00000000', 'teste ', 'teste', 'teste', NULL, 'tf', 'br', '2020-04-15 11:43:00', '2020-04-15 11:43:19'),
	(2, 'Paula teste', '15124829', 'paula@gmail.com', 'teste', '14996523326', 'F', '1999-02-03', 'br', '16652365', 'Bauru', 'teste', 'teste', '1562', 'SP', 'casa', '2020-07-04 21:27:39', '2020-07-04 21:27:39'),
	(3, 'teste', '15124829', 'teste@gmail.com', 'teste', '1400000000', 'Masculino', '1996-06-08', 'Brasileira', '16652365', 'hhyhyhyh', 'teste', 'teste', '1562', 'SP', 'casa', '2020-07-13 09:27:56', '2020-07-13 09:27:56'),
	(4, 'Lilian', '15124829', 'lilian@gmail.com', 'teste', '14996332541', 'Masculino', '1993-05-06', 'Brasileiro', '16652365', 'Bauru', 'teste', 'teste', '1562', 'SP', 'casa', '2020-07-14 09:10:36', '2020-07-14 09:10:36');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.login_usuarios
CREATE TABLE IF NOT EXISTS `login_usuarios` (
  `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN_USUARIOS` varchar(255) DEFAULT NULL,
  `SENHA_USUARIOS` varchar(255) DEFAULT NULL,
  `TIPO_USUARIOS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.login_usuarios: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `login_usuarios` DISABLE KEYS */;
INSERT INTO `login_usuarios` (`ID_USUARIOS`, `LOGIN_USUARIOS`, `SENHA_USUARIOS`, `TIPO_USUARIOS`) VALUES
	(1, 'Jessica', '$2y$10$rGMXh8GCi.Miv0.fD78vseeH6IuK/7mwr.zOOU4Dl0kPGSyUewAAW', 1),
	(2, 'Beatriz', '$2y$10$QodMPcFu3o4N9tlxBbTRreCa3vQmZGJwCufzl9LPGikvqOcfnMJce', 2),
	(3, 'Jessica teste 02', '15962315', 1),
	(4, 'Jessica teste 03', '$2y$10$19PsW/fB43uoSZR/cVB.heMqQa69kt7Nuti6TsZrm8AHswqZUIXKu', 1),
	(5, 'paula', '$2y$10$tYlHTE6mAe8b9MC9lL3wl.UMEkR7qnfSHgKnO1WZdh8H6sL9Gtye2', 1),
	(6, 'Tamara', '$2y$10$Qnyz2KSu8sCk4viEOwkozui2fVm0pQo4xGTmHaksQv4APhVgBx5Z2', 1),
	(7, 'Laura', '$2y$10$3ngMwmGNpDlNYCvOF6mk8eHtg/yxGCfuwwVEHHQULRUhtxLJQHOna', 1),
	(8, 'Jaqueline', '$2y$10$u1EMG0rcSP5zoB8b41AnyuvueHQINB.8cfj7ToR7aAuIzx84qk7FC', 1),
	(9, 'jaqueline 01', '$2y$10$OKWiD6QKIm1xuJ91Eo1kqeoNJMyLA6WTY3UfNHyLAVmFN4PE.w3l2', 1),
	(10, 'pedro', '$2y$10$V886zfBWIsF2lwTyz4t7YukrtP6D0oIRfL.swubweq3twIRYY4Ejq', 1),
	(11, 'Beatriz 01', '$2y$10$HgNCFAppJ9DoMuhJE0sYkOIy5.GrORUOsh1747gvg17o7fcLNe/oK', 1),
	(12, 'LilIan', '$2y$10$uKmufhQzjaxg9nSQCRbc4u2grLGQ0GwuBQ8j298OUuYqGDEgmmuOO', 1);
/*!40000 ALTER TABLE `login_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_MARCA` varchar(10) DEFAULT NULL,
  `NOME_MARCA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.marca: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`ID_MARCA`, `CODIGO_MARCA`, `NOME_MARCA`) VALUES
	(1, '021', 'bonno'),
	(2, '1491995944', 'Coca Cola'),
	(3, '971853155', 'ype'),
	(4, '931863397', 'Vanish');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.moedas
CREATE TABLE IF NOT EXISTS `moedas` (
  `ID_MOEDAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_MOEDAS` int(11) DEFAULT NULL,
  `CODIGOS` int(11) DEFAULT NULL,
  `VALOR_MOEDAS` float(10,2) DEFAULT NULL,
  `DATA_CAD_MOEDAS` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_MOEDAS`),
  KEY `FK_ID_CLIENTES_MOEDAS` (`ID_CLIENTES_MOEDAS`),
  CONSTRAINT `FK_ID_CLIENTES_MOEDAS` FOREIGN KEY (`ID_CLIENTES_MOEDAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.moedas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `moedas` DISABLE KEYS */;
INSERT INTO `moedas` (`ID_MOEDAS`, `ID_CLIENTES_MOEDAS`, `CODIGOS`, `VALOR_MOEDAS`, `DATA_CAD_MOEDAS`) VALUES
	(1, 1, 1, 500.00, '2020-04-15 12:25:11'),
	(2, 1, 1, 10.00, '2020-06-21 08:05:41'),
	(3, 1, 4, 101.00, '2020-06-30 10:29:45'),
	(4, 1, 158908521, 234.00, '2020-06-30 11:25:14'),
	(5, 1, 714260877, 50.00, '2020-06-30 11:46:47');
/*!40000 ALTER TABLE `moedas` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.produtos: ~30 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`ID_PRODUTOS`, `ID_MARCAS_PRODUTOS`, `ID_FORNECEDORES_PRODUTOS`, `NOME_PRODUTOS`, `PRECO_CUSTO_PRODUTOS`, `PRECO_VENDA_PRODUTOS`, `PESO_PRODUTOS`, `VALIDADE_PRODUTOS`, `DESCRICAO_PRODUTOS`, `QR_CODE_PRODUTOS`, `ESTOQUE_PRODUTOS`, `CATEGORIAS_PRODUTOS`, `CORREDOR_PRODUTOS`, `PRATILEIRA_PRODUTOS`, `LOTE_PRODUTOS`, `STATUS_PRODUTOS`, `DATA_CAD_PRODUTOS`, `DATA_MOD_PRODUTOS`) VALUES
	(4, 1, 1, 'bolacha bono chocolate', 1.00, 2.99, '1.00', '2020-04-15', 'bolacha chocolate', '15962380', 10, 'alimento', 'A', 'B', '1564854', 'D', '2020-04-15 11:43:33', '2020-07-02 21:13:32'),
	(5, 1, 1, 'bolacha bono chocolate branco', 2.00, 4.60, '2.00', '2020-04-19', 'bolacha chocolate branco', '15962390', 15, 'alimento', 'A', 'B', '1564523', 'D', '2020-04-19 10:30:19', '2020-07-02 21:14:32'),
	(8, 1, 1, 'Oleo de Soja Liza 900ml', 2.00, 3.99, '900ml', '2020-08-30', 'Oleo de Soja Liza 900ml', '15962373', 9, 'alimento', 'A', 'B', '1562354', 'D', '2020-06-30 12:10:33', '2020-07-02 21:15:21'),
	(9, 1, 1, 'Arroz Branco Longo-fino Tipo 1 Camil Todo Dia 5Kg', 13.59, 17.29, '5kg', '2020-08-30', 'Arroz Branco Longo-fino Tipo 1 Camil Todo Dia 5Kg', '15962371', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:18'),
	(10, 1, 1, 'Arroz Branco Longo-fino Tipo 1 Prato Fino 5 Kg', 15.47, 20.59, '5kg', '2020-08-30', 'Arroz Branco Longo-fino Tipo 1 Prato Fino 5 Kg', '15962372', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:20'),
	(11, 1, 1, 'Molho de Tomate Tradicional Pomarola Sachê 340g', 1.00, 2.19, '340g', '2020-08-30', 'Molho de Tomate Tradicional Pomarola Sachê 340g', '15962374', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:20'),
	(12, 1, 1, 'Molho de Tomate Tradicional Pomarola Lata 340g', 2.60, 4.05, '340g', '2020-08-30', 'Molho de Tomate Tradicional Pomarola Lata 340g', '15962375', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:21'),
	(13, 1, 1, 'Leite Condensado Moça Lata 395g', 3.69, 5.25, '395g', '2020-08-30', 'Leite Condensado Moça Lata 395g', '15962376', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:24'),
	(14, 1, 1, 'Macarrão Instantâneo Nissin Sabor Tomate 85g', 0.50, 1.59, '85g', '2020-08-30', 'Macarrão Instantâneo Nissin Sabor Tomate 85g', '15962377', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:25'),
	(15, 1, 1, 'Cerveja Heineken Premium Pilsen Lager 350ml', 2.63, 3.59, '350ml', '2020-08-30', 'Cerveja Heineken Premium Pilsen Lager 350ml', '15962378', 9, 'Bebidas', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:26'),
	(16, 1, 1, 'Cerveja Budweiser Pilsen Lager 350ml', 2.50, 3.55, '350ml', '2020-08-30', 'Cerveja Budweiser Pilsen Lager 350ml', '15962379', 9, 'Bebidas', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:28'),
	(17, 1, 1, 'Cerveja Budweiser Pilsen Lager 350ml 12 Unidades', 18.20, 34.80, '350ml - 12 Unidadades', '2020-08-30', 'Cerveja Budweiser Pilsen Lager 350ml 12 Unidades', '15962381', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:29'),
	(18, 1, 1, 'Cerveja Heineken Premium Pilsen Lager 350ml 12 Unidades', 26.99, 47.77, '350ml - 12 Unidades', '2020-08-30', 'Cerveja Heineken Premium Pilsen Lager 350ml 12 Unidades', '15962382', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:30'),
	(19, 1, 1, 'Refrigerante Guaraná Antarctica 2 Litros', 3.10, 6.99, '2 Litros', '2020-08-30', 'Refrigerante Guaraná Antarctica 2 Litros', '15962383', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:32'),
	(20, 1, 1, 'Fanta Laranja 2 Litros', 2.69, 6.99, '2 Litros', '2020-08-30', 'Fanta Laranja 2 Litros', '15962384', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:31'),
	(21, 1, 1, 'Refrigerante Guaraná Antarctica 600ml', 1.32, 2.65, '600ml', '2020-08-30', 'Refrigerante Guaraná Antarctica 600ml', '15962385', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:33'),
	(22, 1, 1, 'Refrigerante Guaraná Antarctica 350ml - 12 Unidades', 15.65, 26.11, '350ml - 12 Unidades', '2020-08-30', 'Refrigerante Guaraná Antarctica 350ml - 12 Unidades', '15962386', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:34'),
	(23, 1, 1, 'Tira-Manchas em Pó para Roupas Brancas e Coloridas Vanish 900g', 23.20, 35.50, '900g', '2020-08-30', 'Tira-Manchas em Pó para Roupas Brancas e Coloridas Vanish 900g', '15962387', 9, 'Limpeza', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:35'),
	(24, 1, 1, 'Tira-Manchas em Pó para Roupas Brancas Vanish Oxi Action Crytal White 900g', 25.99, 40.50, '900g', '2020-08-30', 'Tira-Manchas em Pó para Roupas Brancas Vanish Oxi Action Crytal White 900g', '15962388', 9, 'Limpeza', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:40'),
	(25, 1, 1, 'Detergente para Louças Líquido Ypê Maça 500ml', 0.50, 1.80, '500ml', '2020-08-30', 'Detergente para Louças Líquido Ypê Maça 500ml', '15962389', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:37'),
	(26, 1, 1, 'Detergente Líquido Ypê Capim Limão 500ml', 0.50, 1.79, '500ml', '2020-08-30', 'Detergente Líquido Ypê Capim Limão 500ml', '15962391', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:41'),
	(27, 1, 1, 'Detergente para Louças Líquido Ypê Clear Care 500ml', 0.50, 1.80, '500ml', '2020-08-30', 'Detergente para Louças Líquido Ypê Clear Care 500ml', '15962392', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:42'),
	(28, 1, 1, 'Desinfetante Pinho Bril Flores de Limão 1 Litro', 2.69, 5.99, '1 Litro', '2020-08-30', 'Desinfetante Pinho Bril Flores de Limão 1 Litro', '15962393', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:45'),
	(29, 1, 1, 'Desinfetante Pinho Sol Lavanda 1 Litro', 5.62, 8.99, '1 Litro', '2020-08-30', 'Desinfetante Pinho Sol Lavanda 1 Litro', '15962394', 9, 'alimento', 'A', 'B', '1562354', 'A', '2020-06-30 12:10:33', '2020-07-01 07:23:50'),
	(31, NULL, NULL, 'Feijao', 2.65, 5.36, '1kg', '2021-02-06', 'feijao branco', '15962343', 15, 'alimento', 'b', 'b', '15623', 'A', '2020-07-04 21:48:17', '2020-07-04 21:48:17'),
	(32, NULL, NULL, 'Feijao teste', 1.56, 5.36, '1kg', '2020-03-06', 'teste cadastro', '15962342', 15, 'alimento', 'b', 'b', '15623', 'D', '2020-07-05 21:07:02', '2020-07-05 21:07:02'),
	(33, NULL, NULL, 'Feijao teste', 2.65, 2.96, '1kg', '2020-03-06', 'teste cadastro', '15962342', 15, 'alimento', 'b', 'b', '15623', 'D', '2020-07-05 22:32:09', '2020-07-05 22:32:09'),
	(34, 2, 2, 'teste cadastro', 2.65, 2.96, '1kg', '2021-02-06', 'teste cadastro', '15962342', 15, 'e', 'b', 'b', '15623', 'D', '2020-07-08 20:19:12', '2020-07-08 20:19:12'),
	(35, NULL, NULL, 'Feijao teste 02', 2.65, 5.36, '1kg', '2021-02-06', 'e teste 02', '15962342', 15, 'Limpeza', 'b', 'b', '15623', 'D', '2020-07-13 09:51:21', '2020-07-13 09:51:21'),
	(36, 3, 3, 'Feijao teste 03', 2.65, 5.36, '1kg', '2021-02-06', 'e teste 03', '15962342', 15, 'Limpeza', 'b', 'b', '15623', 'D', '2020-07-13 10:38:23', '2020-07-13 10:38:23');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
