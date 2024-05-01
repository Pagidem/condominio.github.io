<?php
    if (isset($_SESSION['app_id'])) {
        if (isset($_GET['tipo'])) {
            switch ($_GET['tipo']) {
                /*Metodo que solicita el nick del usuario activo*/
                case 'uactivo':
                    cuactivo();
                break;
                case 'verper':
                    c_vpersona();
                    break;
                case 'verveh':
                    c_vvehiculo();
                    break;
                case 'visitas':
                    c_visitasRegistradas();
                    break;  
                default:
                    # code...
                    break;
            }
        }
    } else {
        header('location: ?view=login');
    }

    /*Obener datos del nick de usuario */
    function cuactivo()
    {
        require('model/usuarioModel.php');
        $idu = $_POST['id'];
        $login = new Usuario();
        $result = $login->muActivo($idu);
        echo $result;
    }

    /*metodo del controlador para consultar datos de persona*/
    function c_vpersona() {
        require('model/consultasModel.php');
        $visita = new Consultas();
        $ci = $_GET['ci'];
        $result = $visita->mdatos_persona($ci);
        if ($result != null) {
            echo json_encode($result);
        }else{
            echo '0';
        }
    }

    function c_vvehiculo() {
        require('model/consultasModel.php');
        $visita = new Consultas();
        $placa = $_GET['placa'];
        $letras = $_GET['lp'];
        $result = $visita->mdatos_vehiculo($placa,$letras);
        if ($result != null) {
            echo json_encode($result);
        }else{
            echo '0';
        }
    }

    /* metodo para consultar todas las visitas registradas*/
    function c_visitasRegistradas()
    {
        require('model/consultasModel.php');
        $consulta = new Consultas();
        $result = $consulta->mvisitas_gral();
        if ($result != null) {
            echo json_encode($result);
        } else {
            echo '0';
        }
    }
?>