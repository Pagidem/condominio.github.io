<?php 

class Conexion extends mysqli {

	function __construct() {
		//Funcion nativa para conectarse a un DBMS, si la conexion es exitosa se podra usar la base de datos.
		parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		/*Usamos esta funcion asegurandonos que funcione en todas las versiones de php
		incluso en versiones pasadas  en caso de error, arrojara el mensaje "Error en la conexion a la base de datos"*/
		if (mysqli_connect_errno()) {
			die();			
		}
		$this->set_charset("utf8");
	}

	
	/*Funcion que retorna el numero de filas arrojadas por una consulta SQL */
	public function rows($query) {
		return mysqli_num_rows($query);
	}

	/*Funcion que libera una variable con el resultado de una consulta SQL */
	public function liberar($query) {
		return mysqli_free_result($query);
	}

	/*Funcion que recorre todas las filas retornadas por una consulta SQL */
	public function recorrer($query) {
		return mysqli_fetch_array($query);
	}

}

?>