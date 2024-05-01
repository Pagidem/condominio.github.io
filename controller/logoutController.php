<?php

if (isset($_SESSION['app_id'])) {
  require('model/usuarioModel.php');
  $login = new Usuario();
  $login->cerrar_sesion();
}

header('location: ?view=login');

?>
