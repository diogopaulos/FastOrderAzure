-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 10:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdfastorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `NomeCategoria` text NOT NULL,
  `idSubCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `NomeCategoria`, `idSubCategoria`) VALUES
(1, 'Pizzas', 0),
(2, 'Massas', 0),
(3, 'Pratos de Carne', 0),
(4, 'Saladas', 0),
(5, 'Bebidas', 0),
(6, 'Sobremesas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `ValorTotal` decimal(11,2) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pedido_detalhes`
--

CREATE TABLE `pedido_detalhes` (
  `idPedidoDetalhes` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Preco` decimal(11,2) NOT NULL,
  `idPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pedido_detalhes_temp`
--

CREATE TABLE `pedido_detalhes_temp` (
  `idPedidoTemp` int(11) NOT NULL,
  `sessionID` text NOT NULL,
  `idProduto` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Preco` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `NomeProduto` text NOT NULL,
  `Preco` decimal(11,2) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `Imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`idProduto`, `NomeProduto`, `Preco`, `idCategoria`, `Imagem`) VALUES
(1, 'Pizza de Atum', '7.50', 1, 'produto-821866960784971pizza-atum-dom-carmino.jpg'),
(2, 'Massas Simples', '7.50', 2, 'massasimples.png'),
(3, 'Bitoque de Vaca', '7.50', 3, 'bitoquevaca.png'),
(4, 'Salada de Atum', '7.50', 4, 'saladaatum.png'),
(5, 'Ice Tea Manga', '1.50', 5, 'iceteamanga.png'),
(6, 'Leite Creme', '1.50', 6, 'leitecreme.png'),
(13, 'Pizza Bolonhesa', '7.50', 1, 'produto-4119930906130441597_mamma-jamma_bolognese_credito-rodrigo-azevedo-5.jpeg'),
(14, 'Bitoque de Porco', '7.50', 3, 'bitoqueporco.png'),
(15, 'Massas Salteadas', '7.50', 2, 'massassalteadas.png'),
(16, 'Musse Chocolate', '1.50', 6, 'mussechocolate.png'),
(17, 'Sumol de Laranja', '1.50', 5, 'produto-182425510975057sumol-sparkling-orange-can-330ml.jpg'),
(18, 'Salada de Frango', '7.50', 4, 'saladafrango.png');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `idUtilizador` int(11) NOT NULL,
  `NomeUtilizador` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`idUtilizador`, `NomeUtilizador`, `Email`, `Password`, `Perfil`) VALUES
(1, 'dpaulos6', 'itzframepvp@outlook.com', '1234', 'Administrador'),
(14, 'paulos', 'gmail@gmai.com', '1234', 'Funcionário'),
(15, 'pereira06', 'gmail@gmai.com', '1234', 'Administrador'),
(16, 'pereira', '1234@gmail.com', '1234', 'Funcionário'),
(19, 'rafsilva', 'rafsilva@epsm.pt', '1234', 'Cliente'),
(20, 'vukye', 'vukye@email.com', '1234', 'Cliente'),
(21, 'rafsilvaepsm', 'rafsilvaepsm@email.com', '1234', 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `Categoria_SubCategoria` (`idSubCategoria`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `pedido_utilizador` (`idUtilizador`);

--
-- Indexes for table `pedido_detalhes`
--
ALTER TABLE `pedido_detalhes`
  ADD PRIMARY KEY (`idPedidoDetalhes`),
  ADD KEY `pedidodetalhes_pedido` (`idPedido`),
  ADD KEY `pedidodetalhes_produto` (`idProduto`);

--
-- Indexes for table `pedido_detalhes_temp`
--
ALTER TABLE `pedido_detalhes_temp`
  ADD PRIMARY KEY (`idPedidoTemp`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `categoria_produtos` (`idCategoria`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido_detalhes`
--
ALTER TABLE `pedido_detalhes`
  MODIFY `idPedidoDetalhes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido_detalhes_temp`
--
ALTER TABLE `pedido_detalhes_temp`
  MODIFY `idPedidoTemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUtilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_utilizador` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizador` (`idUtilizador`);

--
-- Constraints for table `pedido_detalhes`
--
ALTER TABLE `pedido_detalhes`
  ADD CONSTRAINT `pedidodetalhes_pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `pedidodetalhes_produto` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`idProduto`);

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `categoria_produtos` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
