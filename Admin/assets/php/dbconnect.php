<?php 
  $dsn = "mysql:host=fastorderdb.mysql.database.azure.com;dbname=bdfastorder";
  $user = "FastOrderAdmin";
  $passwd = "JDwjf#1&ak";
  $connect = new PDO($dsn, $user, $passwd);


  $conn = mysqli_init();
  mysqli_real_connect($conn, 
  'fastorderdb.mysql.database.azure.com', 
  'FastOrderAdmin', 
  'JDwjf#1&ak', 
  'bdfastorder');

  mysqli_query($conn, "CREATE TABLE `categoria` (`idCategoria` int(11) NOT NULL,`NomeCategoria` text NOT NULL);");

  mysqli_query($conn,"INSERT INTO `categoria` (`idCategoria`, `NomeCategoria`) VALUES
  (1, 'Pizzas'),
  (2, 'Massas'),
  (3, 'Pratos de Carne'),
  (4, 'Saladas'),
  (5, 'Bebidas'),
  (6, 'Sobremesas'),
  (7, 'Entradas');
  ");
  mysqli_query($conn,"CREATE TABLE `pedido` (
    `idPedido` int(111) NOT NULL,
    `idUtilizador` int(11) NOT NULL,
    `ValorTotal` decimal(11,2) NOT NULL,
    `Estado` tinyint(1) NOT NULL,
    `Tipo` text NOT NULL
  );");
  mysqli_query($conn,"CREATE TABLE `pedido_detalhes` (
    `idPedidoDetalhes` int(111) NOT NULL,
    `idProduto` int(11) NOT NULL,
    `Quantidade` int(11) NOT NULL,
    `Preco` decimal(11,2) NOT NULL,
    `idPedido` int(11) NOT NULL,
    `Notas` text NOT NULL
  );");
  mysqli_query($conn,"CREATE TABLE `pedido_detalhes_temp` (
    `idPedidoTemp` int(111) NOT NULL,
    `sessionID` text NOT NULL,
    `idProduto` int(11) NOT NULL,
    `Quantidade` int(11) NOT NULL,
    `Tamanho` text DEFAULT NULL,
    `Preco` decimal(11,2) NOT NULL,
    `HoraEntrega` time NOT NULL,
    `CreateDate` date DEFAULT NULL
  );");
  mysqli_query($conn,"INSERT INTO `pedido_detalhes_temp` (`idPedidoTemp`, `sessionID`, `idProduto`, `Quantidade`, `Tamanho`, `Preco`, `HoraEntrega`, `CreateDate`) VALUES
  (183, 'vb87v81o0fpb7j72a59u22ktri', 29, 1, 'Média', '8.75', '00:00:00', '2022-04-21'),
  (184, 'vb87v81o0fpb7j72a59u22ktri', 42, 2, '', '1.95', '00:00:00', '2022-04-21'),
  (185, 'vb87v81o0fpb7j72a59u22ktri', 61, 1, '', '6.50', '00:00:00', '2022-04-21');");
  mysqli_query($conn,"CREATE TABLE `produtos` (
    `idProduto` int(11) NOT NULL,
    `NomeProduto` text NOT NULL,
    `Preco` decimal(10,2) DEFAULT NULL,
    `Preco_Individual` decimal(10,2) DEFAULT NULL,
    `Preco_Media` decimal(10,2) DEFAULT NULL,
    `Preco_Familiar` decimal(10,2) DEFAULT NULL,
    `idCategoria` int(11) NOT NULL,
    `Imagem` text NOT NULL,
    `Descricao` text NOT NULL
  );");
  mysqli_query($conn,"INSERT INTO `produtos` (`idProduto`, `NomeProduto`, `Preco`, `Preco_Individual`, `Preco_Media`, `Preco_Familiar`, `idCategoria`, `Imagem`, `Descricao`) VALUES
  (18, 'Salada de Frango', '6.10', NULL, NULL, NULL, 4, 'produto-19177399976120Salada-de-Frango.jpg', ''),
  (29, 'Pizza Cheese', '7.99', '7.99', '8.75', '11.50', 1, 'produto-102040101312473cheese.png', ''),
  (30, 'Pizza Garden', '7.99', '7.99', '8.75', '11.50', 1, 'produto-398960068810798garden.png', ''),
  (32, 'Pizza Havaiana', '7.99', '7.99', '8.75', '11.50', 1, 'produto-206007258892951havaiana.png', ''),
  (33, 'Pizza Margarita', '7.99', '7.99', '8.75', '11.50', 1, 'produto-626380992509629margarita.png', ''),
  (34, 'Pizza Pepperoni', '7.99', '7.99', '8.75', '11.50', 1, 'produto-824430190597346pepperoni.png', ''),
  (35, 'Pizza Portuguesa', '7.99', '7.99', '8.75', '11.50', 1, 'produto-185951386135942PORTUGUESA.png', ''),
  (36, 'Pizza Serrana', '7.99', '7.99', '8.75', '11.50', 1, 'produto-389595710086132produto-660037547698966serrana.png', ''),
  (37, 'Pizza Tropical', '7.99', '7.99', '8.75', '11.50', 1, 'produto-774560854597427tropical.png', ''),
  (38, 'Pizza Veggie', '7.99', '7.99', '8.75', '11.50', 1, 'produto-188836817924547produto-103954076533923veggie.png', ''),
  (39, 'Lata Pepsi Max', '1.95', NULL, NULL, NULL, 5, 'produto-20555625542441Lata-Pepsi-Max.png', ''),
  (40, 'Lata Pepsi', '1.95', NULL, NULL, NULL, 5, 'produto-872517448372853Lata-Pepsi.png', ''),
  (41, 'Lata Guarana', '1.95', NULL, NULL, NULL, 5, 'produto-282654587086908Lata-Guarana.png', ''),
  (42, 'Lata 7UP', '1.95', NULL, NULL, NULL, 5, 'produto-217773602261456Lata-7UP.png', ''),
  (43, 'Lata 7UP Free', '1.95', NULL, NULL, NULL, 5, 'produto-515878942726949Lata-7UP-Free.png', ''),
  (44, 'Lata Sumol Ananas', '1.95', NULL, NULL, NULL, 5, 'produto-847710211111979Lata-Sumol-Ananas.png', ''),
  (45, 'Lata Cerveja', '2.10', NULL, NULL, NULL, 5, 'produto-429771921757676Lata-Cerveja.png', ''),
  (46, 'Lata Ice Tea Pessego', '1.95', NULL, NULL, NULL, 5, 'produto-984529777415692Lata-IceTea-Pessego.png', ''),
  (47, 'Lata Ice Tea Manga', '1.95', NULL, NULL, NULL, 5, 'produto-496935905948001Lata-Ice-Tea-Manga.png', ''),
  (48, 'Lata Sumol Laranja', '1.95', NULL, NULL, NULL, 5, 'produto-837666826807260Lata-Sumol-Laranja.png', ''),
  (49, 'Lata Somersby 50cl', '3.40', NULL, NULL, NULL, 5, 'produto-111345481193901Lata-Somersby-sidra-50cl.png', ''),
  (50, 'Garrafa Água 33cl', '1.30', NULL, NULL, NULL, 5, 'produto-400597309453595Garrafa-Água-33cl.png', ''),
  (51, 'Salada Vegetariana', '6.00', NULL, NULL, NULL, 4, 'produto-917693492553581Salada-Vegetariana.jpg', ''),
  (52, 'Salada César', '6.00', NULL, NULL, NULL, 4, 'produto-697402331106394Salada-César.jpg', ''),
  (53, 'Mousse de Chocolate', '2.00', NULL, NULL, NULL, 6, 'produto-401976496856945produto-399470250396533Mousse-Chocolate.png', ''),
  (54, 'Pão de Alho', '3.20', '0.00', '0.00', '0.00', 7, 'produto-832879256670824Pão de Alho.jpg', '0'),
  (55, 'Brownie', '2.50', '0.00', '0.00', '0.00', 6, 'produto-231402749513053Brownie.jpg', '0'),
  (56, 'Gelatina', '2.50', '0.00', '0.00', '0.00', 6, 'produto-468977150746341Gelatina.png', '0'),
  (58, 'Profiteroles', '2.50', '0.00', '0.00', '0.00', 6, 'produto-266788318362812Profiteroles.png', '0'),
  (59, 'Bife de Novilho Grelhado', '14.00', '0.00', '0.00', '0.00', 3, 'produto-925969700620931Bife-de-novilho-grelhado.png', '0'),
  (60, 'Bife da Vazia', '11.00', '0.00', '0.00', '0.00', 3, 'produto-136173762320114Bife-da-vazia.png', '0'),
  (61, 'Massa Bolonhesa', '6.50', '0.00', '0.00', '0.00', 2, 'produto-54082260542944Massa Bolonhesa.png', '0'),
  (63, 'Massa Carbonara', '6.50', '0.00', '0.00', '0.00', 2, 'produto-933773098833233produto-4343954320372821111.png', '0');");
  mysqli_query($conn,"CREATE TABLE `utilizador` (
    `idUtilizador` int(11) NOT NULL,
    `NomeUtilizador` text NOT NULL,
    `Nome` text NOT NULL,
    `Apelido` text NOT NULL,
    `Morada` text NOT NULL,
    `Cidade` text NOT NULL,
    `CodigoPostal` text NOT NULL,
    `Contribuinte` int(11) NOT NULL,
    `Telefone` int(11) NOT NULL,
    `Email` text NOT NULL,
    `Password` text NOT NULL,
    `Perfil` text NOT NULL
  );");
  mysqli_query($conn,"INSERT INTO `utilizador` (`idUtilizador`, `NomeUtilizador`, `Nome`, `Apelido`, `Morada`, `Cidade`, `CodigoPostal`, `Contribuinte`, `Telefone`, `Email`, `Password`, `Perfil`) VALUES
  (1, 'dpaulos6', 'Diogo', 'Paulos', '', '', '', 0, 0, 'itzframepvp@outlook.com', '1234', 'Administrador'),
  (2, 'pereiraa06', 'Leonardo', 'Pereira', '', '', '', 0, 0, 'pereira06@gmail.com', '1234', 'Administrador');");
  mysqli_query($conn,"ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);");
  mysqli_query($conn,"ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `pedido_utilizador` (`idUtilizador`);");
  mysqli_query($conn,"ALTER TABLE `pedido_detalhes`
  ADD PRIMARY KEY (`idPedidoDetalhes`),
  ADD KEY `pedidodetalhes_pedido` (`idPedido`),
  ADD KEY `pedidodetalhes_produto` (`idProduto`);");
  mysqli_query($conn,"ALTER TABLE `pedido_detalhes_temp`
  ADD PRIMARY KEY (`idPedidoTemp`);");
  mysqli_query($conn,"ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtilizador`);");
  mysqli_query($conn,"ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;");
  mysqli_query($conn,"ALTER TABLE `pedido`
  MODIFY `idPedido` int(111) NOT NULL AUTO_INCREMENT;");
  mysqli_query($conn,"ALTER TABLE `pedido_detalhes`
  MODIFY `idPedidoDetalhes` int(111) NOT NULL AUTO_INCREMENT;
");
  mysqli_query($conn,"ALTER TABLE `pedido_detalhes_temp`
  MODIFY `idPedidoTemp` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;");
  mysqli_query($conn,"ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;");
  mysqli_query($conn,"ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_utilizador` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizador` (`idUtilizador`);");
  mysqli_query($conn,"ALTER TABLE `pedido_detalhes`
  ADD CONSTRAINT `pedidodetalhes_pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `pedidodetalhes_produto` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`idProduto`);");
  mysqli_query($conn,"ALTER TABLE `produtos`
  ADD CONSTRAINT `categoria_produtos` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;");
?>