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

-- Copiando estrutura para tabela new_supermercado.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIOS_CLIENTES` int(11) NOT NULL DEFAULT 0,
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
  KEY `FK_ID_USUARIOS_CLIENTES` (`ID_USUARIOS_CLIENTES`),
  CONSTRAINT `FK_ID_USUARIOS_CLIENTES` FOREIGN KEY (`ID_USUARIOS_CLIENTES`) REFERENCES `usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`ID_CLIENTES`, `ID_USUARIOS_CLIENTES`, `NOME_CLIENTES`, `RG_CLIENTES`, `CPF_CLIENTES`, `SEXO_CLIENTES`, `DATA_NASCIMENTO_CLIENTES`, `EMAIL_CLIENTES`, `CELULAR_CLIENTES`, `RAZAO_SOCIAL_CLIENTES`, `NOME_FANTASIA_CLIENTES`, `CNPJ_CLIENTES`, `CEP_CLIENTES`, `CIDADE_CLIENTES`, `ESTADO_CLIENTES`, `ENDERECO_CLIENTES`, `NUMERO_CLIENTES`, `BAIRRO_CLIENTES`, `NACIONALIDADE_CLIENTES`, `COMPLEMENTO_CLIENTES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 1, 'LUCAS TESTE', '159623', '159623', 'M', '1990-04-15', 'teste@teste', '999023565', NULL, NULL, NULL, '00000000', 'teste', 'ts', 'TESTE END', '159', 'teste Ba', 'Brasil', 'casa', '2020-04-15 11:39:21', '2020-06-22 16:14:16'),
	(2, 2, 'teste', '159623', '159623', 'M', '1990-04-15', 'teste@teste', '999023565', NULL, NULL, NULL, '00000000', 'teste', 'ts', 'TESTE END', '159', 'teste Ba', 'br', 'TESTE END', '2020-04-15 11:39:21', '2020-06-22 09:14:22');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras: ~19 rows (aproximadamente)
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
	(19, 1, '1806510457', 2730.00, 0.00, 'F', '2020-06-20 10:53:33', '2020-06-20 10:53:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_itens: ~18 rows (aproximadamente)
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
	(18, 19, '2059952836', 'T-shirt 7', 1, 270.00, '349556375');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_pagamentos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_pagamentos` DISABLE KEYS */;
INSERT INTO `compras_pagamentos` (`ID_COMPRAS_PAGAMENTO`, `ID_COMPRAS_ITENS`, `NOME_CARTAO`, `NUMERO_CARTAO`, `STATUS_PAGAMENTO`, `CARTAO_VALIDADE_MES`, `CARTAO_VALIDADE_ANO`, `CODIGO_CARTAO`, `TRANSACAO`, `TOTAL_COMPRA`, `CODIGO_PAGAMENTO`) VALUES
	(1, 6, 'paula', '4242424242424242', 'succeeded', '04', '2021', 562, 'txn_1GvohtDZjX8sc9JC2r5jlc5p', 1150.00, '306362'),
	(2, 8, 'teste', '4242424242424242', 'succeeded', '02', '2021', 452, 'txn_1GvshfDZjX8sc9JCvs5YwN1U', 4950.00, '250568'),
	(3, 9, 'teste', '4242424242424242', 'succeeded', '02', '2022', 258, 'txn_1GvtSEDZjX8sc9JCdK5QfAe5', 350.00, '486524'),
	(5, 11, 'paula', '4242424242424242', 'succeeded', '01', '2021', 854, 'txn_1Gw5fsDZjX8sc9JCGpX1w40B', 750.00, '109296'),
	(6, 18, 'Jose', '4242424242424242', 'succeeded', '02', '2021', 255, 'txn_1Gw78TDZjX8sc9JC0QB3wDKx', 2730.00, '202029');
/*!40000 ALTER TABLE `compras_pagamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `ID_FORNECEDORES` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_FANTASIA_FORNECEDORES` varchar(255) DEFAULT NULL,
  `RAZAO_SOCIAL_FORNECEDORES` varchar(255) DEFAULT NULL,
  `CEP_FORNECEDORES` varchar(8) DEFAULT NULL,
  `CIDADE_FORNECEDORES` varchar(255) DEFAULT NULL,
  `ENDERECO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `BAIRRO_FORNECEDORES` varchar(255) DEFAULT NULL,
  `ESTADO_FORNECEDORES` varchar(2) DEFAULT NULL,
  `PAIS_FORNECEDORES` varchar(255) DEFAULT NULL,
  `TIPO_PESSOA_FORNECDORES` varchar(2) DEFAULT NULL,
  `CNPJ_FORNECEDORES` varchar(14) DEFAULT NULL,
  `EMAIL_FORNECEDORES` varchar(255) DEFAULT NULL,
  `CELULAR_FORNECEDORES` varchar(11) DEFAULT NULL,
  `DATA_CAD` datetime DEFAULT current_timestamp(),
  `DATA_MOD` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_FORNECEDORES`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.fornecedores: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`ID_FORNECEDORES`, `NOME_FANTASIA_FORNECEDORES`, `RAZAO_SOCIAL_FORNECEDORES`, `CEP_FORNECEDORES`, `CIDADE_FORNECEDORES`, `ENDERECO_FORNECEDORES`, `BAIRRO_FORNECEDORES`, `ESTADO_FORNECEDORES`, `PAIS_FORNECEDORES`, `TIPO_PESSOA_FORNECDORES`, `CNPJ_FORNECEDORES`, `EMAIL_FORNECEDORES`, `CELULAR_FORNECEDORES`, `DATA_CAD`, `DATA_MOD`) VALUES
	(1, 'teste f', 'teste ra', '00000000', 'teste ', 'teste', 'teste', 'tf', 'br', '1', '51515151', 'teste@teste', '999875642', '2020-04-15 11:43:00', '2020-04-15 11:43:19');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_MARCA` varchar(10) DEFAULT NULL,
  `NOME_MARCA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.marca: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` (`ID_MARCA`, `CODIGO_MARCA`, `NOME_MARCA`) VALUES
	(1, '021', 'bonno');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.moedas
CREATE TABLE IF NOT EXISTS `moedas` (
  `ID_MOEDAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTES_MOEDAS` int(11) DEFAULT NULL,
  `VALOR_MOEDAS` float(10,2) DEFAULT NULL,
  `DATA_CAD_MOEDAS` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_MOEDAS`),
  KEY `FK_ID_CLIENTES_MOEDAS` (`ID_CLIENTES_MOEDAS`),
  CONSTRAINT `FK_ID_CLIENTES_MOEDAS` FOREIGN KEY (`ID_CLIENTES_MOEDAS`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.moedas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `moedas` DISABLE KEYS */;
INSERT INTO `moedas` (`ID_MOEDAS`, `ID_CLIENTES_MOEDAS`, `VALOR_MOEDAS`, `DATA_CAD_MOEDAS`) VALUES
	(1, 1, 500.00, '2020-04-15 12:25:11'),
	(2, 1, 10.00, '2020-06-21 08:05:41');
/*!40000 ALTER TABLE `moedas` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `ID_PRODUTOS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MARCAS_PRODUTOS` int(11) NOT NULL DEFAULT 0,
  `ID_FORNECEDORES_PRODUTOS` int(11) NOT NULL DEFAULT 0,
  `NOME_PRODUTOS` varchar(255) DEFAULT NULL,
  `PRECO_CUSTO_PRODUTOS` float(10,2) DEFAULT NULL,
  `PRECO_VENDA_PRODUTOS` float(10,2) DEFAULT NULL,
  `PESO_PRODUTOS` float(10,2) DEFAULT NULL,
  `VALIDADE_PRODUTOS` date DEFAULT NULL,
  `DESCRICAO_PRODUTOS` varchar(255) DEFAULT NULL,
  `QR_CODE_PRODUTOS` varchar(8) DEFAULT NULL,
  `ESTOQUE_PRODUTOS` int(11) DEFAULT NULL,
  `CATEGORIAS_PRODUTOS` varchar(50) DEFAULT NULL,
  `CORREDOR_PRODUTOS` varchar(50) DEFAULT NULL,
  `PRATILEIRA_PRODUTOS` varchar(50) DEFAULT NULL,
  `LOTE_PRODUTOS` varchar(50) DEFAULT NULL,
  `DATA_CAD_PRODUTOS` datetime DEFAULT current_timestamp(),
  `DATA_MOD_PRODUTOS` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_PRODUTOS`),
  KEY `FK_produtos_marca` (`ID_MARCAS_PRODUTOS`),
  KEY `FK_ID_FORNECEDORES_PRODUTOS` (`ID_FORNECEDORES_PRODUTOS`),
  CONSTRAINT `FK_ID_FORNECEDORES_PRODUTOS` FOREIGN KEY (`ID_FORNECEDORES_PRODUTOS`) REFERENCES `fornecedores` (`ID_FORNECEDORES`),
  CONSTRAINT `FK_produtos_marca` FOREIGN KEY (`ID_MARCAS_PRODUTOS`) REFERENCES `marca` (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`ID_PRODUTOS`, `ID_MARCAS_PRODUTOS`, `ID_FORNECEDORES_PRODUTOS`, `NOME_PRODUTOS`, `PRECO_CUSTO_PRODUTOS`, `PRECO_VENDA_PRODUTOS`, `PESO_PRODUTOS`, `VALIDADE_PRODUTOS`, `DESCRICAO_PRODUTOS`, `QR_CODE_PRODUTOS`, `ESTOQUE_PRODUTOS`, `CATEGORIAS_PRODUTOS`, `CORREDOR_PRODUTOS`, `PRATILEIRA_PRODUTOS`, `LOTE_PRODUTOS`, `DATA_CAD_PRODUTOS`, `DATA_MOD_PRODUTOS`) VALUES
	(4, 1, 1, 'bolacha', 1.00, 3.00, 1.00, '2020-04-15', 'bolacha chocolate', '15962380', 10, 'alimento', 'A', 'B', '1564854', '2020-04-15 11:43:33', '2020-04-19 10:30:29'),
	(5, 1, 1, 'bolacha', 2.00, 4.00, 2.00, '2020-04-19', 'bolacha chocolate branco', '15962390', 15, 'alimento', 'A', 'B', '1564523', '2020-04-19 10:30:19', '2020-04-19 10:31:43');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN_USUARIOS` varchar(11) DEFAULT NULL,
  `SENHA_USUARIOS` varchar(255) DEFAULT NULL,
  `CSENHA_USUARIOS` varchar(255) DEFAULT NULL,
  `TIPO_USUARIOS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIOS`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`ID_USUARIOS`, `LOGIN_USUARIOS`, `SENHA_USUARIOS`, `CSENHA_USUARIOS`, `TIPO_USUARIOS`) VALUES
	(1, 'LUCAS', '123', '123', 1),
	(2, 'teste', '159', '159', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
