<?php
if (!isset($_SESSION['app_id'])) {
  header('location: ?view=login');
}

if (isset($_GET['tipo'])) {
  switch ($_GET['tipo']) {
    /*Redireccionar al menu de inicio*/
    case 'newv1':
      include(VIEW_DIR . 'newvisView.php');
      break;
    /*Redireccionar al menu de inicio*/
    case 'visitas':
      include(VIEW_DIR . 'inicioView.php');
      break;
    
    default:
      # code...
      break;
  }
} else {
    include(VIEW_DIR . 'loginView.php');
}


?>