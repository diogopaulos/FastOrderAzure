<?php
	
	class Pedido {
		//Atributos
		private $idPedido;
		private $idUtilizador;
		private $ValorTotal;
		private $Estado;
		private $Tipo;

		//Acessores e Modificadores
		public function setIdPedido($value){
			$this->idPedido = $value;
		}
		public function getIdPedido(){
			return $this->idPedido;
		}

		public function setIdUtilizador($value){
			$this->idUtilizador = $value;
		}
		public function getIdUtilizador(){
			return $this->idUtilizador;
		}

		public function setValorTotal($value){
			$this->ValorTotal = $value;
		}
		public function getValorTotal(){
			return $this->ValorTotal;
		}

		public function setEstado($value){
			$this->Estado = $value;
		}
		public function getEstado(){
			return $this->Estado;
		}

		public function setTipo($value){
			$this->Tipo = $value;
		}
		public function getTipo(){
			return $this->Tipo;
		}

		public function createPedido() {
			require("dbconnect.php");

			$sql = "INSERT INTO pedido(idUtilizador, ValorTotal, Estado, Tipo)
      VALUES ('" . $this->idUtilizador . "','" . $this->ValorTotal . "','" . $this->Estado . "','" . $this->Tipo . "')";

			$connect->exec($sql);
		}

		public function showPedidos(){
			require("dbconnect.php");

			// Instrução SQL para selecionar dados da bd
			$sql = "SELECT * FROM pedido";

			// Preparar instrução 
			$query = $connect->query($sql);
			// Executar a query e gravar resultados
			$pedido = $query->fetchAll(PDO::FETCH_ASSOC);

			// Retornar os dados
			return $pedido;
		}

    public function deletePedido($idUtilizador) {
			require("dbconnect.php");

			$sql = "DELETE FROM pedido WHERE Estado = Fechado";

			$connect->exec($sql);
		}

		public function getById(){
			require("dbconnect.php");

			// Instrução SQL para selecionar dados da bd
			$sql = "SELECT * FROM pedido WHERE idUtilizador =" . $this->idUtilizador;

			// Preparar instrução 
			$query = $connect->query($sql);
			// Executar a query e gravar resultados
			$pedido = $query->fetchAll(PDO::FETCH_ASSOC);

			// Retornar os dados
			return $pedido;
		}
	}