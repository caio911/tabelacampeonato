
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/06/2016 às 15:48:12
-- Versão do Servidor: 10.0.22-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u182139768_seap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase1`
--

CREATE TABLE IF NOT EXISTS `fase1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` varchar(50) NOT NULL,
  `id_time_a` varchar(50) NOT NULL,
  `ponto_a` varchar(50) NOT NULL DEFAULT '0',
  `id_time_b` varchar(50) NOT NULL,
  `ponto_b` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `fase1`
--

INSERT INTO `fase1` (`id`, `id_jogo`, `id_time_a`, `ponto_a`, `id_time_b`, `ponto_b`) VALUES
(1, 'jogo_0', '54', '18.40', '57', '44.92'),
(2, 'jogo_1', '46', '37.45', '50', '38.15'),
(3, 'jogo_2', '29', '24.18', '40', '42.45'),
(4, 'jogo_3', '28', '32.21', '42', '32.17'),
(5, 'jogo_4', '38', '36.11', '35', '53.78'),
(6, 'jogo_5', '43', '41.79', '53', '14.05'),
(7, 'jogo_6', '45', '51.82', '41', '33.97'),
(8, 'jogo_7', '52', '29.11', '44', '34.15'),
(9, 'jogo_8', '31', '39.18', '36', '58.85'),
(10, 'jogo_9', '37', '62.37', '59', '59.71'),
(11, 'jogo_10', '51', '41.82', '48', '74.45'),
(12, 'jogo_11', '39', '15.67', '24', '84.25'),
(13, 'jogo_12', '25', '63.77', '32', '67.28'),
(14, 'jogo_13', '30', '34.25', '47', '50.28'),
(15, 'jogo_14', '49', '47.75', '55', '39.42'),
(16, 'jogo_15', '27', '43.32', '58', '72.58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase2`
--

CREATE TABLE IF NOT EXISTS `fase2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` varchar(50) NOT NULL,
  `jogo_a` varchar(50) NOT NULL,
  `id_time_a` varchar(50) NOT NULL,
  `ponto_a` varchar(50) NOT NULL DEFAULT '0',
  `jogo_b` varchar(50) NOT NULL,
  `id_time_b` varchar(50) NOT NULL,
  `ponto_b` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `fase2`
--

INSERT INTO `fase2` (`id`, `id_jogo`, `jogo_a`, `id_time_a`, `ponto_a`, `jogo_b`, `id_time_b`, `ponto_b`) VALUES
(1, 'jogo_0', 'jogo_0', '57', '50.22', 'jogo_1', '50', '52.34'),
(2, 'jogo_1', 'jogo_2', '40', '47.70', 'jogo_3', '28', '52.72'),
(3, 'jogo_2', 'jogo_4', '35', '60.82', 'jogo_5', '43', '49.82'),
(4, 'jogo_3', 'jogo_6', '45', '54.42', 'jogo_7', '44', '75.22'),
(5, 'jogo_4', 'jogo_8', '36', '66.82', 'jogo_9', '37', '58.08'),
(6, 'jogo_5', 'jogo_10', '48', '50.27', 'jogo_11', '24', '70.85'),
(7, 'jogo_6', 'jogo_12', '32', '76.88', 'jogo_13', '47', '26.98'),
(8, 'jogo_7', 'jogo_14', '49', '34.02', 'jogo_15', '58', '56.18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase3`
--

CREATE TABLE IF NOT EXISTS `fase3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` varchar(50) NOT NULL,
  `jogo_a` varchar(50) NOT NULL,
  `id_time_a` varchar(50) NOT NULL,
  `ponto_a` varchar(50) NOT NULL,
  `jogo_b` varchar(50) NOT NULL,
  `id_time_b` varchar(50) NOT NULL,
  `ponto_b` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `fase3`
--

INSERT INTO `fase3` (`id`, `id_jogo`, `jogo_a`, `id_time_a`, `ponto_a`, `jogo_b`, `id_time_b`, `ponto_b`) VALUES
(1, 'jogo_0', 'jogo_0', '50', '40.83', 'jogo_1', '28', '38.68'),
(2, 'jogo_1', 'jogo_2', '35', '72.25', 'jogo_3', '44', '44.68'),
(3, 'jogo_3', 'jogo_4', '36', '65.08', 'jogo_5', '24', '72.48'),
(5, 'jogo_4', 'jogo_6', '32', '73.88', 'jogo_7', '58', '69.18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase4`
--

CREATE TABLE IF NOT EXISTS `fase4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` varchar(50) NOT NULL,
  `jogo_a` varchar(50) NOT NULL,
  `id_time_a` varchar(50) NOT NULL,
  `ponto_a` varchar(50) NOT NULL,
  `jogo_b` varchar(50) NOT NULL,
  `id_time_b` varchar(50) NOT NULL,
  `ponto_b` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `fase4`
--

INSERT INTO `fase4` (`id`, `id_jogo`, `jogo_a`, `id_time_a`, `ponto_a`, `jogo_b`, `id_time_b`, `ponto_b`) VALUES
(1, 'jogo_0', 'jogo_0', '50', '0', 'jogo_1', '35', '0'),
(2, 'jogo_1', 'jogo_2', '32', '0', 'jogo_3', '24', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase5`
--

CREATE TABLE IF NOT EXISTS `fase5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` varchar(50) NOT NULL,
  `jogo_a` varchar(50) NOT NULL,
  `id_time_a` varchar(50) NOT NULL,
  `ponto_a` varchar(50) NOT NULL,
  `jogo_b` varchar(50) NOT NULL,
  `id_time_b` varchar(50) NOT NULL,
  `ponto_b` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `fase5`
--

INSERT INTO `fase5` (`id`, `id_jogo`, `jogo_a`, `id_time_a`, `ponto_a`, `jogo_b`, `id_time_b`, `ponto_b`) VALUES
(1, 'jogo_0', 'jogo_0', '', '', 'jogo_1', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(50) NOT NULL,
  `foto_perfil` varchar(200) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_cartola` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT 'default',
  `url_escudo_svg` varchar(100) NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `time_id`, `foto_perfil`, `nome`, `nome_cartola`, `slug`, `url_escudo_svg`) VALUES
(24, 651999, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'mata mais que câncer', 'Marcus Vinicius', 'mata-mais-que-cancer', 'mata-mais-que-cancer'),
(25, 1019775, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'cesari soccer', 'Robson Cesari', 'cesari-soccer', 'cesari-soccer'),
(31, 1366391, 'https://graph.facebook.com/v2.2/1574948082778325/picture?width=100&height=100', 'fjs metal', 'Fernando', 'fjs-metal', 'fjs-metal'),
(27, 1141240, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'meta-le fuego fc', 'Wellington Dantas', 'meta-le-fuego-fc', 'meta-le-fuego-fc'),
(28, 1307168, 'https://graph.facebook.com/v2.2/100002283216285/picture?width=100&height=100', 'chupa chelsea 2012', 'Rodrigo lopes', 'chupa-chelsea-2012', 'chupa-chelsea-2012'),
(29, 2968473, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'adidas sports', 'rafael', 'adidas-sports', 'adidas-sports'),
(30, 775398, 'https://graph.facebook.com/v2.2/373921512746302/picture?width=100&height=100', 'valerianus fc', 'Joseane Valeriano', 'valerianus-fc', 'valerianus-fc'),
(38, 1697113, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'blues 11fc', 'Cláudio Sparrow', 'blues-11fc', 'blues-11fc'),
(39, 572062, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'sport club juquitiba', 'Jhonatan Machado', 'sport-club-juquitiba', 'sport-club-juquitiba'),
(40, 2897020, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'ricaneta fc', 'alessandro dias', 'ricaneta-fc', 'ricaneta-fc'),
(32, 4421897, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'chupanando fc', 'Marco Dognani', 'chupanando-fc', 'chupanando-fc'),
(35, 1220904, 'https://graph.facebook.com/v2.2/230037534039509/picture?width=100&height=100', 'rattlehead soccer', 'Caio Mustaine', 'rattlehead-soccer', 'rattlehead-soccer'),
(36, 827198, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'real philadelphia', 'Denis Silva ', 'real-philadelphia', 'real-philadelphia'),
(37, 836798, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'no malla`s fc', 'Wagner Messi', 'no-mallas-fc', 'no-mallas-fc'),
(41, 1663306, 'https://graph.facebook.com/v2.2/695751900536630/picture?width=100&height=100', 'reddevils09', 'Leandro Luiz', 'reddevils09', 'reddevils09'),
(42, 1000544, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'marcelo ladeia fc', 'Marcelo Ladeia', 'marcelo-ladeia-fc', 'marcelo-ladeia-fc'),
(43, 2848903, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'quetinho fc', 'ReeArly', 'quetinho-fc', 'quetinho-fc'),
(44, 1851155, 'https://graph.facebook.com/v2.2/636561273091058/picture?width=100&height=100', 'tufão sport clube', 'Anderson Cordeiro', 'tufao-sport-clube', 'tufao-sport-clube'),
(45, 840793, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'unidos da soraia', 'Tallis Fischer', 'unidos-da-soraia', 'unidos-da-soraia'),
(46, 1546013, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'redbulls c.f.c', 'Rafael Fischer ', 'redbulls-c-f-c', 'redbulls-c-f-c'),
(47, 3699632, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'carrerinha13fc', 'Rubens Moises', 'carrerinha13fc', 'carrerinha13fc'),
(48, 3413679, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'finissimos bola bier', 'Betão', 'finissimos-bola-bier', 'finissimos-bola-bier'),
(49, 3385829, 'https://graph.facebook.com/v2.2/100003035248292/picture?width=100&height=100', 'la vuelta al mundo fc', 'Adriel', 'la-vuelta-al-mundo-fc', 'la-vuelta-al-mundo-fc'),
(50, 784253, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'machadofb', 'Gabriel Machado', 'machadofb', 'machadofb'),
(51, 154671, 'https://graph.facebook.com/v2.2/594574213967639/picture?width=100&height=100', 'bar 100 lona  reys', 'REYS SANTOS', 'bar-100-lona-reys', 'bar-100-lona-reys'),
(52, 556130, 'https://graph.facebook.com/v2.2/846706795354965/picture?width=100&height=100', 'let''s go leicester', 'Renan Dominguees', 'let-s-go-leicester', 'let-s-go-leicester'),
(53, 3236404, 'https://graph.facebook.com/v2.2/821658787940527/picture?width=100&height=100', 'f.c zero 8', 'LEANDRO EDUARDO', 'f-c-zero-8', 'f-c-zero-8'),
(54, 3449790, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'ec.flamenguino', 'heluar oliveira', 'ec-flamenguino', 'ec-flamenguino'),
(55, 2471076, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', '51 c/ limão', 'Douglas Fabrício', '51-c-limao', '51-c-limao'),
(58, 3299585, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'avanti_palmeiras88', 'ROBELIO NUNES', 'avanti-palmeiras88', 'avanti-palmeiras88'),
(57, 3505086, 'https://graph.facebook.com/v2.2/627744083968165/picture?width=100&height=100', 'vsn -sp', 'Vsilva', 'vsn-sp', 'vsn-sp'),
(59, 3228712, 'https://cartolafc.globo.com/static/img/placeholder_perfil.png', 'savoya f.c', 'Clayton', 'savoya-f-c', 'savoya-f-c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
