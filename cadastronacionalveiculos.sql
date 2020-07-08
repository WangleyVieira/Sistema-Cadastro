-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 08-Jul-2020 às 02:01
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastronacionalveiculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_cliente`
--

DROP TABLE IF EXISTS `cadastrar_cliente`;
CREATE TABLE IF NOT EXISTS `cadastrar_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `sobrenome` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `cidade` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `cep` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `uf` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(2) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`uf`, `sigla`) VALUES
('Acre', 'AC'),
('Alagoas', 'AL'),
('Amapá', 'AP'),
('Amazonas', 'AM'),
('Bahia', 'BA'),
('Ceará', 'CE'),
('Distrito Federal', 'DF'),
('Espírito Santo', 'ES'),
('Goiás', 'GO'),
('Maranhão', 'MA'),
('Mato Grosso', 'MT'),
('Mato Grosso do Sul', 'MS'),
('Minas Gerais', 'MG'),
('Pará', 'PA'),
('Paraíba', 'PB'),
('Paraná', 'PR'),
('Pernambuco', 'PE'),
('Piauí', 'PI'),
('Rio de Janeiro', 'RJ'),
('Rio Grande do Norte', 'RN'),
('Rio Grande do Sul', 'RS'),
('Rondônia', 'RO'),
('Rorraima', 'RR'),
('Santa Catarina', 'SC'),
('São Paulo', 'SP'),
('Sergipe', 'SE'),
('Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocarro`
--

DROP TABLE IF EXISTS `tipocarro`;
CREATE TABLE IF NOT EXISTS `tipocarro` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_carro` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipocarro`
--

INSERT INTO `tipocarro` (`codigo`, `tipo_carro`) VALUES
(1, 'Sedan'),
(2, 'Hatch'),
(3, 'Picape'),
(4, 'SUV');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_carro` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `renavam` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_carro` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ano_fabricacao` date NOT NULL,
  PRIMARY KEY (`id`,`placa`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
