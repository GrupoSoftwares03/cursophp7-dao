<?php
//Este arqui "index.php", será o primeiro arquivo a ser chamado pelo savegador.
//Esta função "require_once" é a mais recomendada para encontrar e incluir os arquivos ou classes 
//externas ou remotas de que as outras como "include" ou "require" simplesmente.
require_once("config.php");

//O objeto "$sql", instanciado da classe "Sql", recebe ou é atribuido à ele o conteúdo dessa classe.
$sql = new Sql();

//De posse desses arquivos o objeto "$sql", fará uso do método ou função "select()" e seus parâmetros de comando do 
//MySQL que passará em todos os seus parâmetros e fazer um "SELECT * FROM tb_usuarios" de toda a tabela "tb_usuarios".
//Passando assim, ou atribuindo, todo o conteúdo mais uma vez à variável "$usuarios"
$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//Para terminar faremos um "echo json_encode($usuarios)" para trazer à tela do usuário todo o conteúdo da tabela por 
//meio do array.
echo json_encode($usuarios);

?>