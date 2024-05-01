<?php

if (isset($_SESSION['app_id'])) {
  include(VIEW_DIR . 'inicioView.php');
} else {
  header('location: ?view=login');
}

?>
