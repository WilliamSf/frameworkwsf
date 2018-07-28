-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jul-2018 às 17:07
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework_wsf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome_autor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id_autor`, `nome_autor`, `email`) VALUES
(1, 'Joaquim Teixeira', 'joaquim@gmail.com'),
(2, 'Arlindo de Souza', 'arlindinho@gmail.com'),
(3, 'Moacir da Silva ', 'moacir@gmail.com'),
(4, 'Faraó do Egito Souza', 'faraoooo@gmail.com'),
(5, 'Jacinto Leite Aquino Rego', 'jacintorego@gmail.com'),
(6, 'Otávio Bundasseca', 'bundasseca@gmail.com'),
(7, 'Antônio Veado Prematuro', 'antonioveado@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `corpo` text NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `autor` int(11) NOT NULL,
  `data_noticia` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `corpo`, `categoria`, `autor`, `data_noticia`) VALUES
(1, 'Teste titulo', 'Corpo noticia', '', 2, '2018-05-26 03:00:00'),
(2, 'Segunda noticia', 'Bacon ipsum dolor amet andouille ground round filet mignon kevin, beef ribs chuck brisket ham doner drumstick kielbasa shankle tenderloin. Flank pancetta ham hock, burgdoggen short ribs pork chop porchetta. ', '', 1, '2018-03-20 19:41:00'),
(3, 'Terceira noticia', 'Bacon ipsum dolor amet andouille ground round filet mignon kevin, beef ribs chuck brisket ham doner drumstick kielbasa shankle tenderloin. Flank pancetta ham hock, burgdoggen short ribs pork chop porchetta. ', '', 3, '2018-03-26 19:41:00'),
(4, 'Teste testando', 'testando o corpinho', 'Teste 2', 4, '2018-02-16 18:41:00'),
(5, 'Testinho', 'Colocando no corpo', 'Teste ', 5, '2018-07-15 19:41:00'),
(6, 'Teste do teste', 'Corpinho testado', '', 6, '2018-07-02 19:41:00'),
(33, 'Como ser bonitão', 'É só seguir os passos do William', '', 7, '2018-06-10 19:41:00'),
(46, 'Como ser bem sucedido na vida', 'Vem trabalha no Souza Novaes que é sucesso garantido !', 'Vida', 5, '2018-05-01 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `loginhash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
