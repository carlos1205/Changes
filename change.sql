-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Out-2021 às 00:35
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `change`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `change_item`
--

DROP TABLE IF EXISTS `change_item`;
CREATE TABLE IF NOT EXISTS `change_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `change_item`
--

INSERT INTO `change_item` (`id`, `name`, `description`, `price`, `image`, `user_id`, `type_id`) VALUES
(1, 'Item', 'Esse item Ã© muito bom', '3.00', 'Array', 1, 1),
(2, 'Faxina', 'FaÃ§o Faxinas', '50.00', 'Array', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `change_type`
--

DROP TABLE IF EXISTS `change_type`;
CREATE TABLE IF NOT EXISTS `change_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `change_type`
--

INSERT INTO `change_type` (`id`, `name`) VALUES
(1, 'Produto'),
(2, 'Serviço');

-- --------------------------------------------------------

--
-- Estrutura da tabela `change_user`
--

DROP TABLE IF EXISTS `change_user`;
CREATE TABLE IF NOT EXISTS `change_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `change_user`
--

INSERT INTO `change_user` (`id`, `name`, `email`, `pass`) VALUES
(1, 'carlos', 'carloslima68.cs@gmail.com', 'c1681f8ea2a765be2a1c741a5916dd22'),
(3, 'joao', 'joao@silva.com', 'dccd96c256bc7dd39bae41a405f25e43'),
(4, 'Maria JoÃ£o', 'maria@maria.com', '263bce650e68ab4e23f28263760b9fa5'),
(5, 'elem', 'elem@elem.com', '3babe96d0bef4b896401917f1f6035fe'),
(6, 'meuUser', 'meuUser@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
