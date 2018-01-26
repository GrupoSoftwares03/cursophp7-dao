<?php

//Aqui criamos a classe "Usuario" para ser instanciada posteriormente.
class Usuario {

	//Aqui temos as variáveis que tem o encapsulamento privado -> "private".
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//Início dos "get" and "set".
	public function getIdusuario() {
		return $this->idusuario;
	}

	public function setIdusuario($value) {
		$this->idusuario = $value;//
	}

	public function getDeslogin() {
		return $this->deslogin;
	}

	public function setDeslogin($value) {
		$this->deslogin = $value;//
	}

	public function getDessenha() {
		return $this->dessenha;
	}

	public function setDessenha($value) {
		$this->dessenha = $value;//
	}

	public function getDtcadastro() {
		return $this->dtcadastro;
	}

	public function setDtcadastro($value) {
		$this->dtcadastro = $value;//
	}

	//A função ou método "function loadById()", carrega os arquivos pela referência do "Id".
	public function loadById($id) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		//Aqui com o "count($results)", é feita a contagem para ver se é maior que zero.
		if (count($results) > 0) {

			//A variável "$row", armazena a contagem do conteúdo que está no "array" aparti da posição zero.
			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString() {

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}










?>