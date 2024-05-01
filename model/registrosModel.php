<?php
class Registros
{
    

    /*metodo para registrar una nueva visita con datos personales ya registrados*/
    public function mnewvis1(
    $_pl,$_lp,$_oc,$_tv,$_mv,$_fo,
    $_tvi,$_emp,$_fi,$_hi,$_fs,$_hs,$_ca,$_bl,$_obs,$_pe) {

        $db = new Conexion();

        $pl = $db->real_escape_string($_pl);
        $lp = $db->real_escape_string($_lp);
        $oc = $db->real_escape_string($_oc);
        $tv = $db->real_escape_string($_tv);
        $mv = $db->real_escape_string($_mv);
        $fo = $db->real_escape_string($_fo);

        $tvi = $db->real_escape_string($_tvi);
        $emp = $db->real_escape_string($_emp);
        $fi = $db->real_escape_string($_fi);
        $hi = $db->real_escape_string($_hi);
        $fs = $db->real_escape_string($_fs);
        $hs = $db->real_escape_string($_hs);
        $ca = $db->real_escape_string($_ca);
        $bl = $db->real_escape_string($_bl);
        $obs = $db->real_escape_string($_obs);

        $pe = $db->real_escape_string($_pe);
        
        $sql1 = $db->prepare("CALL p_nvis1(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $sql1->bind_param('ssissbssssssissi', $pl,$lp,$oc,$tv,$mv,$fo,$tvi,$emp,$fi,$hi,$fs,$hs, $ca,$bl,$obs,$pe);
        $sql1->execute();
        $resultado = $sql1->get_result();
        $fila = $resultado->fetch_assoc();
        if ($fila['resultado'] == 'OK') {
            $result = '1';
        } else {
            $result = '0';
        }
        $db->close();
        $sql1->free_result();
        $sql1->close();
        return $result;
    }

    /*metodo para registrar una nueva visita con vehiculo ya registraro*/
    public function mnewvis2(
    $_tvi,$_emp,$_fi,$_hi,$_fs,$_hs,$_ca,$_bl,$_obs,$_pe,$_ve) 
    {
    
        $db = new Conexion();
    
        $tvi = $db->real_escape_string($_tvi);
        $emp = $db->real_escape_string($_emp);
        $fi = $db->real_escape_string($_fi);
        $hi = $db->real_escape_string($_hi);
        $fs = $db->real_escape_string($_fs);
        $hs = $db->real_escape_string($_hs);
        $ca = $db->real_escape_string($_ca);
        $bl = $db->real_escape_string($_bl);
        $obs = $db->real_escape_string($_obs);
    
        $pe = $db->real_escape_string($_pe);
        $ve = $db->real_escape_string($_ve);
            
        $sql1 = $db->prepare("CALL p_nvis2(?,?,?,?,?,?,?,?,?,?,?);");
        $sql1->bind_param('ssssssissii', $tvi,$emp,$fi,$hi,$fs,$hs,$ca,$bl,$obs,$pe,$ve);
        $sql1->execute();
        $resultado = $sql1->get_result();
        $fila = $resultado->fetch_assoc();
            if ($fila['resultado'] == 'OK') {
                $result = '1';
            } else {
                $result = '0';
            }
            $db->close();
            $sql1->free_result();
            $sql1->close();
            return $result;
    }

    /*metodo para registrar una nueva visita*/
    public function mnewvis3(
        $_ci,$_ext,$_td,$_cel,$_nom,$_pat,$_mat,
        $_pl,$_lp,$_oc,$_tv,$_mv,$_fo,
        $_tvi,$_emp,$_fi,$_hi,$_fs,$_hs,$_ca,$_bl,$_obs,$_pe) {
    
            $db = new Conexion();

            $ci = $db->real_escape_string($_ci);
            $ext = $db->real_escape_string($_ext);
            $td = $db->real_escape_string($_td);
            $cel = $db->real_escape_string($_cel);
            $nom = $db->real_escape_string($_nom);
            $pat = $db->real_escape_string($_pat);
            $mat = $db->real_escape_string($_mat);
    
            $pl = $db->real_escape_string($_pl);
            $lp = $db->real_escape_string($_lp);
            $oc = $db->real_escape_string($_oc);
            $tv = $db->real_escape_string($_tv);
            $mv = $db->real_escape_string($_mv);
            $fo = $db->real_escape_string($_fo);
    
            $tvi = $db->real_escape_string($_tvi);
            $emp = $db->real_escape_string($_emp);
            $fi = $db->real_escape_string($_fi);
            $hi = $db->real_escape_string($_hi);
            $fs = $db->real_escape_string($_fs);
            $hs = $db->real_escape_string($_hs);
            $ca = $db->real_escape_string($_ca);
            $bl = $db->real_escape_string($_bl);
            $obs = $db->real_escape_string($_obs);
            
            $sql1 = $db->prepare("CALL p_nvis3(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            $sql1->bind_param('ississsssissbssssssiss', $ci,$ext,$td,$cel,$nom,$pat,$mat,$pl,$lp,$oc,$tv,$mv,$fo,$tvi,$emp,$fi,$hi,$fs,$hs, $ca,$bl,$obs,$pe);
            $sql1->execute();
            $resultado = $sql1->get_result();
            $fila = $resultado->fetch_assoc();
            if ($fila['resultado'] == 'OK') {
                $result = '1';
            } else {
                $result = '0';
            }
            $db->close();
            $sql1->free_result();
            $sql1->close();
            return $result;
        }

    /*metodo para registrar un nuevo cliente*/
    public function mnueva_persona($ci,$ex,$ti,$ce,
        $no,$pa,$ma
    ) {

        $db = new Conexion();

        $t = $db->real_escape_string($ci);
        $nu = $db->real_escape_string($ex);
        $ex = $db->real_escape_string($ti);
        $fe = $db->real_escape_string($ce);

        $ed = $db->real_escape_string($no);
        $na = $db->real_escape_string($pa);
        $no = $db->real_escape_string($ma);
        

        if (existeDoc($t) == "0") {
            $sql1 = $db->prepare("CALL p_nuevocliente(?,?,?,?,?,?,?,?,?,?,?,?);");
            $sql1->bind_param('ssssssssssis', $t, $nu, $ex, $no, $ap, $ce, $ec, $o, $re, $fe, $ed, $na);
            $sql1->execute();
            $resultado = $sql1->get_result();
            $fila = $resultado->fetch_assoc();

            if ($fila['resultado'] == 'OK') {
                $result = '1';
            } else {
                $result = '0';
            }
            $db->close();
            $sql1->free_result();
            $sql1->close();
            return $result;
        } else {
            return 'Documento duplicado!';
        }
    }

    /*Metodo que verifica si existe documento registrado */
    public function existeDoc($_ci)
    {
        include_once('model/Conexion.php');
        $db = new Conexion();
        $ci= $db->real_escape_string($_ci);
        $sql = $db->prepare("CALL p_existep(?);");
        $sql->bind_param('i',$ci);
        $sql->execute();
        $result = $sql->get_result();
        //$datos = $result->fetch_assoc();
    
        if ($result->num_rows > 0) {
            return "1";
        }
        else
        {
            return "0";
        }
        $result->free_result();
        $db->liberar($sql);
        $db->close();
    }
}
?>