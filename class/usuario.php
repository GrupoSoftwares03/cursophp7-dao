<?php

//Aqui criamos a classe "Usuario" para ser instanciada posteriormente.
class Usuario {

	//Aqui temos as quatro variáveis que tem o encapsulamento privado -> "private".
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
	//Fim.

	//A função ou método "function loadById()", carrega os arquivos pela referência do "$id".
	public function loadById($id) {

		//Aqui nós instanciamos um novo objeto "$sql" da classe "Sql" que por sinal já é uma instância da classe "PDO" e
		//que receberá a conexão junto ao Banco de Dados.
		$sql = new Sql();

		//Aqui a variável "$results", receberá a conexão do objeto "$sql" com o Banco de Dados e a execução da função 
		//ou método "select()" do comando MySQL -> "SELECT * FROM tb_usuarios WHERE idusuario = :ID"
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

	//Aqui a função ou método "function getList()" trará todos os usuarios da lista da tabela "tb_usuario".
	public function getList() {

		//Aqui o objeto "$sql" que foi instanciado da classe "Sql", que por sua vez já foi instanciado da classe "PDO"
		//nativa do próprio PHP7.
		$sql = new Sql();

		//Aqui o objeto "$sql" fará uma conexão junto ao Banco de Dados e executará a função ou método "select()" com 
		//o parâmetro ou instruções relativa ao solicitado ao Banco. -> "SELECT * FROM tb_usuarios ORDER BY deslogin;" 
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	//Aqui por meio da função ou método stático "function search($login)" que pesquisará (search) ou buscará um usuário por 
	//meio do parâmetro "$login" 
	public static function search($login) {

		//Aqui nós instanciamos um novo objeto "$sql" da classe "Sql" que por sinal já é uma instância da classe "PDO" e
		//que receberá a conexão junto ao Banco de Dados.
		$sql = new Sql();

		//Aqui o objeto "$sql" fará uma conexão junto ao Banco de Dados e executará a função ou método "select()" com 
		//o parâmetro ou instruções relativa ao solicitado ao Banco. 
		//  -> " SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin".
		//E que trará em seu array o especificado em -> "array(':search'=>"%" . $login . "%" " 
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%" . $login . "%"
		));
	}

		//Aqui como vai ser usado os get e set, a função não pode ser estática.
		public function login($login, $password) {

		//Aqui nós instanciamos um novo objeto "$sql" da classe "Sql" que por sinal já é uma instância da classe "PDO" e
		//que receberá a conexão junto ao Banco de Dados.
		$sql = new Sql();

		//Aqui a variável "$results", receberá a conexão do objeto "$sql" com o Banco de Dados e a execução da função 
		//ou método "select()" do comando MySQL -> "SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD".
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		//Aqui com o "count($results)", é feita a contagem para ver se é maior que zero.
		if (count($results) > 0) {

			//A variável "$row", armazena a contagem do conteúdo que está no "array" aparti da posição zero.
			$row = $results[0];
			
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		} else {

			throw new Exception("Login e/ou Senha Inválidos.");
		}
	}
	//Aqui nós temos o método mágico "__toString()", que diante de um echo no objeto, ele mostra na tela para o usuário.
	//Aqui ele mostra todo o conteúdo sem exeção.
	public function __toString() {

		//Aqui nós fazemos um retorno com o "json_encode(array()" json e oarray.
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}

?>
