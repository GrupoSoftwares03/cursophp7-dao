<?php

//Este arquivo "index.php", será o primeiro arquivo a ser chamado pelo savegador.
//Esta função "require_once" é a mais recomendada para encontrar e incluir os arquivos ou classes 
//externas ou remotas de que as outras como "include" ou "require" simplesmente.
require_once("config.php");

/* Este conjunto de código comentado aqui abaixo e junto com o de cima não comentado, trás apenas um único 
   usuário da lista toda.

//O novo objeto usuario "$root" é instanciado da classe "Usuario".
$root = new Usuario();

//Aqui o novo objeto "$root" executa a função ou método "loadById(4)" com o parâmetro "Id" de número 4.
$root->loadById(2);

//Aqui com o "echo $root;" será trazido à tela do usuário os itens associados ao array do "Id" de número 4.
//Como "$root" é um objeto, ele chama o "__toString()" para apresenta-lo na tela.
echo $root;  

Fim */

/* Com esta codificação aqui a baixo, lista todos os usuário existentes.

//Aqui a variável "$lista" recebe a classe "Usuarios" que por meio dos "::" chama a função ou método  "getList()" para uma 
//chamada rápida. 
$lista = Usuario::getList();

//Aqui por meio do "echo json_encode($lista)" trazemos à tela do usuário pelo navegador, todo o conteúdo da tabela por 
//meio do parâmetro "$lista". 
echo json_encode($lista);

Fim */

//Aqui vai carregar uma lista de usuários especificada pelas "LETRAS" na instrução da função ou método -> search("ra"), 
//estabelecida pelo comando MySQL com o parâmetro "ra".
//Aqui a variável "$search" recebe a classe "Usuarios" que por meio dos "::" chama a função ou método  "search()" para uma 
//chamada rápida. 
//$search = Usuario::search("to");

//echo json_encode($search);


/* Aqui abaixo foi um teste para o início da aula em outra explicação.

//O objeto "$sql", instanciado da classe "Sql", recebe ou é atribuido à ele o conteúdo dessa classe.
$sql = new Sql();

//De posse desses arquivos o objeto "$sql", fará uso do método ou função "select()" e seus parâmetros de comando do 
//MySQL que passará em todos os seus parâmetros e fazer um "SELECT * FROM tb_usuarios" de toda a tabela "tb_usuarios".
//Passando assim, ou atribuindo, todo o conteúdo mais uma vez à variável "$usuarios"
$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//Para terminar faremos um "echo json_encode($usuarios)" para trazer à tela do usuário todo o conteúdo da tabela por 
//meio do array.
echo json_encode($usuarios);
*/


$usuario = new Usuario();
$usuario->login("root", "00123");

echo $usuario;

?>