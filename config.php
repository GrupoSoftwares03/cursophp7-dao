<?php


spl_autoload_register(function($class_name) {

	//Aqui a variável "$filename", recebe o nome do arquivo ou classe designada concatenada com sua extenção -> ".php".
	//O fragmento -> "class" . DIRECTORY_SEPARATOR", informa que o arquivo -> $class_name . ".php" <-, em questão, está em uma 
	//outra pasta com o nome de "class" e o "DIRECTORY_SEPARATOR", é a barra para os diferentes SO. 
	$filename = "class" . DIRECTORY_SEPARATOR . $class_name . ".php";

	//Aqui verificamos se existe a variável "$filename" que por sinal, recebe o nome da classe.
	if (file_exists(($filename))) {

		//Se o arquivo ou classe existir, faz o "require_once($filename)" com o parâmetro "$filename". 
		require_once($filename);
	}
});

?>