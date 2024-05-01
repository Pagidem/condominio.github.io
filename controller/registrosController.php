<?php
if (!isset($_SESSION['app_id'])) {
  header('location: ?view=login');
}

if (isset($_GET['tipo'])) {
    switch ($_GET['tipo']) {
      case 'newv1':
        cregvis1();
      break;
      case 'newv2':
        cregvis2();
      break;
      case 'newv3':
        cregvis3();
      break;
      case 'verificar':
        vpersona();
      break;
      case 'newper':
        cnueva_persona();
      break;
      case 'newvis':
      cnueva_visita();
      break;
      
      
      default:
        # code...
      break;
    }
  } else {
    include(VIEW_DIR . 'principalView.php');
  }


  /*metodo del controlador para registrar una nueva visita*/
  function cregvis1() {
    require('model/registrosModel.php');
    $visita = new Registros();
    
    $pl = $_POST['pl'];
    $lp = $_POST['lp'];
    $oc = $_POST['oc'];
    $tv = $_POST['tv'];
    $mv = $_POST['mv'];
    $fo = $_POST['fo'];
    
    $tvi = $_POST['tvi'];
    $emp = $_POST['emp'];
    $fi = $_POST['fi'];
    $hi = $_POST['hi'];
    $fs = $_POST['fs'];
    $hs = $_POST['hs'];
    $ca = $_POST['ca'];
    $bl = $_POST['bl'];
    $obs = $_POST['ob'];

    $pe = $_POST['pe'];
    
    $result = $visita->mnewvis1(
    $pl,$lp,$oc,$tv,$mv,$fo,
    $tvi,$emp,$fi,$hi,$fs,$hs,$ca,$bl,$obs,
    $pe);
    echo $result;
  }

  /*metodo del controlador para registrar una nueva visita*/
  function cregvis2() {
    require('model/registrosModel.php');
    $visita = new Registros();
    
    $tvi = $_POST['tvi'];
    $emp = $_POST['emp'];
    $fi = $_POST['fi'];
    $hi = $_POST['hi'];
    $fs = $_POST['fs'];
    $hs = $_POST['hs'];
    $ca = $_POST['ca'];
    $bl = $_POST['bl'];
    $obs = $_POST['ob'];

    $pe = $_POST['pe'];
    $ve = $_POST['veh'];
    
    $result = $visita->mnewvis2(
    $tvi,$emp,$fi,$hi,$fs,$hs,$ca,$bl,$obs,
    $pe,$ve);
    echo $result;
  }

  /*metodo del controlador para registrar una nueva visita*/
  function cregvis3() {
    require('model/registrosModel.php');
    $visita = new Registros();

    $ci = $_POST['ci'];
    $ext = $_POST['ext'];
    $td = $_POST['td'];
    $cel = $_POST['ce'];
    $nom = $_POST['no'];
    $pat = $_POST['pat'];
    $mat = $_POST['mat'];

    $pl = $_POST['pl'];
    $lp = $_POST['lp'];
    $oc = $_POST['oc'];
    $tv = $_POST['tv'];
    $mv = $_POST['mv'];
    $fo = $_POST['fo'];
    
    $tvi = $_POST['tvi'];
    $emp = $_POST['emp'];
    $fi = $_POST['fi'];
    $hi = $_POST['hi'];
    $fs = $_POST['fs'];
    $hs = $_POST['hs'];
    $ca = $_POST['ca'];
    $bl = $_POST['bl'];
    $obs = $_POST['ob'];
    
    $result = $visita->mnewvis3(
    $ci,$ext,$td,$cel,$nom,$pat,$mat,
    $pl,$lp,$oc,$tv,$mv,$fo,
    $tvi,$emp,$fi,$hi,$fs,$hs,$ca,$bl,$obs);
    echo $result;
  }


/*metodo del controlador para registrar un nuevo cliente*/
function cnueva_persona() {
  require('model/registrosModel.php');
  $visita = new Registros();

  $ci = $_POST['ci'];
  $ex = $_POST['ex'];
  $ti = $_POST['ti'];
  $ce = $_POST['ce'];

  $no = $_POST['no'];
  $pa = $_POST['pa'];
  $ma = $_POST['ma'];
  
  $result = $visita->mnueva_persona($ci,$ex,$ti,$ce,
  $no,$pa,$ma);
  echo $result;
}

  /*metodo del controlador para registrar un nuevo cliente*/
function cnueva_visita() {
    require('model/registrosModel.php');
    $visita = new Registros();
  
    $ci = $_POST['ci'];
    $ex = $_POST['ex'];
    $ti = $_POST['ti'];
    $ce = $_POST['ce'];

    $no = $_POST['no'];
    $pa = $_POST['pa'];
    $ma = $_POST['ma'];

    $pl = $_POST['pl'];
    $lp = $_POST['lp'];
    $oc = $_POST['oc'];
    $tv = $_POST['tv'];
    $mv = $_POST['mv'];
    $fo = $_POST['fo'];
    

    $tvi = $_POST['tvi'];
    $emp = $_POST['emp'];
    $fi = $_POST['fi'];
    $hi = $_POST['hi'];
    $fs = $_POST['fs'];
    $hs = $_POST['hs'];
    $ca = $_POST['ca'];
    $bl = $_POST['bl'];
    $obs = $_POST['obs'];

    $e = $_POST['es'];
    
    
  
    $result = $visita->mnueva_visita($ci,$ex,$ti,$ce,
    $no,$pa,$ma,
    $pl,$lp,$oc,$tv,$mv,$fo,
    $tvi,$emp,$fi,$hi,$fs,$hs,$ca,$bl,$ob,
    $es);
    echo $result;
  }