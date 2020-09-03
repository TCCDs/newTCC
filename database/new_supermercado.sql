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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.cliente_pagamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente_pagamentos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_itens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_itens` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.compras_pagamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compras_pagamentos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.fornecedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.login_usuarios
CREATE TABLE IF NOT EXISTS `login_usuarios` (
  `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN_USUARIOS` varchar(255) DEFAULT NULL,
  `SENHA_USUARIOS` varchar(255) DEFAULT NULL,
  `TIPO_USUARIOS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.login_usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `login_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_MARCA` varchar(10) DEFAULT NULL,
  `NOME_MARCA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.marca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.moedas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `moedas` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.produtos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela new_supermercado.saldo_clientes
CREATE TABLE IF NOT EXISTS `saldo_clientes` (
  `ID_SALDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `SALDO_CLIENTES` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_SALDO`),
  KEY `FK_ID_CLIENTE_SALDO_CLIENTES` (`ID_CLIENTE`),
  CONSTRAINT `FK_ID_CLIENTE_SALDO_CLIENTES` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID_CLIENTES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela new_supermercado.saldo_clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `saldo_clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `saldo_clientes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
