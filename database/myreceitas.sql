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


-- Copiando estrutura do banco de dados para myreceitas
CREATE DATABASE IF NOT EXISTS `myreceitas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `myreceitas`;

-- Copiando estrutura para tabela myreceitas.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `slug` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela myreceitas.categoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `titulo`, `slug`) VALUES
	(1, 'Doce', 'doces'),
	(2, 'Salgado', 'salgados'),
	(3, 'Bebidas', 'bebidas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela myreceitas.receita
CREATE TABLE IF NOT EXISTS `receita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `linha_fina` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receita_categoria_idx` (`categoria_id`),
  CONSTRAINT `fk_receita_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela myreceitas.receita: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `receita` DISABLE KEYS */;
INSERT INTO `receita` (`id`, `titulo`, `slug`, `linha_fina`, `descricao`, `thumb`, `data`, `categoria_id`) VALUES
	(1, 'brigadeiro', 'brigadeiro', 'axxaeaxevgd', '&#60;p&#62;cccrrccccrcrcrrcrcc&#60;/p&#62;&#13;&#10;', 'http://aguanabocabh.com/sites/default/files/field/image/Brigadeiro%20de%20colher.jpg', '2020-09-30 20:01:36', 1),
	(2, 'Caipirinha', 'caipirinha', 'bebidas de limão com vodka', '&#60;p&#62;1 - limao&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;2- vodka&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;modo preparo&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;misturar tudo&#60;/p&#62;&#13;&#10;', 'https://th.bing.com/th/id/OIP.AlUJKjLWJGkZCKbZMd6xjQHaE7?pid=Api&rs=1', '2020-10-01 10:10:09', 3),
	(3, 'Suco de Maracuja', 'suco-de-maracuja', 'suco natural de maracuja', '', '', '0000-00-00 00:00:00', 3),
	(19, 'Coxinha de carne', 'coxinha-de-carne', 'coxinha de carne moida', '&#60;h2 style=&#34;font-style:italic; text-align:justify&#34;&#62;&#60;code&#62;&#60;strong&#62;&#38;nbsp; &#38;nbsp; &#60;span style=&#34;color:#3498db&#34;&#62;&#60;tt&#62;INGREDIENTES&#60;/tt&#62;&#60;/span&#62;&#60;/strong&#62;&#60;/code&#62;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;ul&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;&#13;&#10;&#9;&#60;hr /&#62;1 litro de &#38;aacute;gua&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;500 g de farinha de trigo&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;3 cubos de caldo de galinha&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;1 concha de &#38;oacute;leo&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;1/2 kg de carne mo&#38;iacute;da&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;Sal a gosto&#60;/li&#62;&#13;&#10;&#60;/ul&#62;&#13;&#10;&#13;&#10;&#60;h2 style=&#34;font-style:italic; text-align:justify&#34;&#62;&#60;code&#62;&#60;strong&#62;&#38;nbsp; &#38;nbsp;&#60;span style=&#34;color:#3498db&#34;&#62; &#60;tt&#62;MODO DE PREPARO&#60;/tt&#62;&#60;/span&#62;&#60;/strong&#62;&#60;/code&#62;&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;hr /&#62;&#13;&#10;&#60;ol&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;Coloque em uma panela a &#38;aacute;gua, o &#38;oacute;leo, o caldo de galinha e o sal, deixe ferver.&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;Retire do fogo e logo em seguida coloque a farinha de trigo, mexendo sem parar, depois volte ao fogo mexendo at&#38;eacute; soltar do fundo da panela.&#60;/li&#62;&#13;&#10;&#9;&#60;li style=&#34;text-align: justify;&#34;&#62;Quanto a carne moida prepare do jeito que voc&#38;ecirc; preferir,mas depois de feita a escorra em um escorredor de macarr&#38;atilde;o para ficar bem sequinha.&#38;nbsp;&#60;/li&#62;&#13;&#10;&#60;/ol&#62;&#13;&#10;', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tudogostoso.com.br%2Freceita%2F4357-coxinha-de', '0000-00-00 00:00:00', 2);
/*!40000 ALTER TABLE `receita` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
