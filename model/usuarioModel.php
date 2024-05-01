<?php  

class Usuario
{
	/*Metodo back para iniciar sesion */
	public function iSesion($user,$pass)
	{
		$db = new Conexion();
		$usuario = $db->real_escape_string($user);
		$p = $db->real_escape_string($pass);
		$password= md5($p);
		
		$sql = $db->prepare("CALL sesion(?,?)");
		$sql->bind_param('ss',$usuario,$password);
		$sql->execute();
		$resultado = $sql->get_result();
		$fila = $resultado->fetch_assoc();
		
		if ($fila['resultado'] > 0) {
			$tipo = $fila['resultado'];
			$_SESSION['app_id'] = $tipo;
			$_SESSION['tipo'] = $tipo;
			
			return $tipo;
			self::m_evento(1,$_SESSION['app_id']);
			
		}else{
			return '0';
		}
		$sql->free_result();
		$sql->close();
		$db->close();
	}

	/*Metodo back para ver el tipo de usuario activo */
	public function uNum()
	{
		/*La funcion trim elimina los espacios en blanco para retornar una cadena con solo la respuesta */
		$tipo = trim($_SESSION['tipo']);
		echo $tipo;
	}

	/*Metodo back para ver el tipo de usuario activo */
	public function muActivo($idu)
	{
		$db = new Conexion();
		$id = $db->real_escape_string($idu);
		$sql = $db->prepare("CALL p_activo(?)");
		$sql->bind_param('i',$id);
		$sql->execute();
		$resultado = $sql->get_result();
		$fila = $resultado->fetch_assoc();
		$activo = $fila['usuario'];
		return $activo;
		$sql->free_result();
		$sql->close();
		$db->close();
	}

	public function cerrar_sesion() 
	{
    $db = new Conexion();
    $id = $_SESSION['app_id'];
    $db->close();
    session_destroy();
    session_unset();
  	}


}

?>