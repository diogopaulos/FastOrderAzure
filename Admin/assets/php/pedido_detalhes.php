<?php
	
	class Pedido_Detalhes {
		//Atributos
		private $idPedido_Detalhes;
		private $idUtilizador;
		private $Quantidade;
		private $Preco;
		private $idPedido;

		//Acessores e Modificadores
		public function setIdPedido_Detalhes($value){
			$this->idPedido_Detalhes = $value;
		}

		public function getIdPedido_Detalhes(){
			return $this->idPedido_Detalhes;
		}

		public function setIdProduto($value){
			$this->idProduto = $value;
		}

		public function getIdProduto(){
			return $this->idProduto;
		}

		public function setQuantidade($value){
			$this->Quantidade = $value;
		}

		public function getQuantidade(){
			return $this->Quantidade;
		}


		public function setPreco($value){
			$this->Preco = $value;
		}

		public function getPreco(){
			return $this->Preco;
		}

		public function setIdPedido($value){
			$this->idPedido = $value;
		}

		public function getIdPedido(){
			return $this->idPedido;
		}

		public function createDetails() {
			require("dbconnect.php");

			$sql = "INSERT INTO pedido_detalhes(idProduto, Quantidade, Preco) VALUES ('" . $this->idProduto . "','" . $this->Quantidade . "'," . $this->Preco . "')";

			$connect->exec($sql);
		}

		public function deleteDetails($idPedido_Detalhes) {
			require("dbconnect.php");

			$sql = "DELETE FROM pedido_detalhes WHERE idPedido_Detalhes = " . $idPedido_Detalhes;

			$connect->exec($sql);
		}

		public function listDetails() {
			require("dbconnect.php");

			// Instrução SQL para ler todos os pedido_detalhes da BD
			$sql = "SELECT * FROM pedido_detalhes ORDER BY idProduto"; 
			// Preparação da instrução á BD
			$query = $connect->query($sql);
			// Execução da query na BD a gravar resultados numa varíavel
			$Detailss = $query->fetchAll(PDO::FETCH_ASSOC);

			// Devolver resultado 
			return $Detailss;
		}

    /*
		public function editDetails() {
			require("dbconnect.php");

			// Instrução SQL para registar o produto
			$sql = "UPDATE pedido_detalhes SET NomeProduto = '" . $this->NomeProduto . "', Preco='" . $this->Preco . "', Imagem='" . $this->Imagem . "' WHERE idProduto =" . $this->idProduto;

			//Executar instrução SQL na base de dados
			$connect->exec($sql);
		}
    */

    /*
		public function getById(){
			require("dbconnect.php");

			// Instrução SQL para selecionar dados da bd
			$sql = "SELECT * FROM pedido_detalhes WHERE idProduto =" . $this->idProduto;

			// Preparar instrução 
			$query = $connect->query($sql);
			// Executar a query e gravar resultados
			$pedido_detalhes = $query->fetchAll(PDO::FETCH_ASSOC);

			// Retornar os dados
			return $pedido_detalhes;
		}
    */
	}