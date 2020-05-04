-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13/01/2020 às 12:26
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `supermercado`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(150) DEFAULT NULL,
  `rgCliente` varchar(150) DEFAULT NULL,
  `cpfCliente` int(11) DEFAULT NULL,
  `celularCliente` varchar(150) DEFAULT NULL,
  `cidadeCliente` varchar(150) DEFAULT NULL,
  `enderecoCliente` varchar(150) DEFAULT NULL,
  `usuario_idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nomeCliente`, `rgCliente`, `cpfCliente`, `celularCliente`, `cidadeCliente`, `enderecoCliente`, `usuario_idUsuario`) VALUES
(1, 'teste 001', '159263', 16161666, '258741369', 'promissao', 'rua teste 01', 1),
(2, 'teste002', '164161981', 256248645, '5548925865', 'teste002', 'teste002', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `credito`
--

CREATE TABLE `credito` (
  `idCredito` int(11) NOT NULL,
  `valorCredito` float(10,2) DEFAULT NULL,
  `datatimeCredito` datetime DEFAULT NULL,
  `cliente_idCliente` int(11) DEFAULT NULL,
  `pagamentoCredito` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `credito`
--

INSERT INTO `credito` (`idCredito`, `valorCredito`, `datatimeCredito`, `cliente_idCliente`, `pagamentoCredito`) VALUES
(1, 100.00, '2020-02-15 15:42:00', 1, 'B'),
(2, 200.00, '2020-06-15 15:06:00', 1, 'cartao'),
(3, 200.00, '2020-02-01 02:03:00', 1, 'boleto'),
(4, 1592.00, '2020-01-12 19:56:42', 1, 'boleto'),
(5, 1000.00, '2020-01-12 20:20:00', 2, 'Boleto'),
(6, 200.00, '2020-01-12 20:25:43', 2, 'cartao'),
(7, 1259.00, '2020-01-13 07:49:27', 2, 'boleto'),
(8, 1002.00, '2020-01-13 08:07:49', 2, 'boleto'),
(9, 100.00, '2020-01-13 08:10:33', 2, 'cartao'),
(10, 2563.00, '2020-01-13 08:11:05', 2, 'cartao'),
(11, 200.00, '2020-01-13 08:11:41', 2, 'cartao'),
(12, 10.00, '2020-01-13 08:13:36', 2, 'boleto'),
(13, 100.00, '2020-01-13 08:16:50', 1, 'boleto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(50) DEFAULT NULL,
  `precoProduto` float(10,2) DEFAULT NULL,
  `validadeProduto` date DEFAULT NULL,
  `estoqueProduto` int(11) DEFAULT NULL,
  `corredorProduto` varchar(50) DEFAULT NULL,
  `pratilheiraProduto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nomeProduto`, `precoProduto`, `validadeProduto`, `estoqueProduto`, `corredorProduto`, `pratilheiraProduto`) VALUES
(1, 'Arroz', 15.60, '2020-01-15', 50, 'A', '10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(150) DEFAULT NULL,
  `loginUsuario` varchar(16) DEFAULT NULL,
  `senhaUsuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `loginUsuario`, `senhaUsuario`) VALUES
(1, 'teste', 'teste01', '123'),
(2, 'teste02', 'teste02', '123');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `FK_usuario_idUsuario` (`usuario_idUsuario`);

--
-- Índices de tabela `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`idCredito`),
  ADD KEY `FK_cliente_idCliente` (`cliente_idCliente`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `credito`
--
ALTER TABLE `credito`
  MODIFY `idCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_usuario_idUsuario` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `FK_cliente_idCliente` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
