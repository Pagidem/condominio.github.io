<?php
    class Consultas
    {
        

        /*Metodo que retorna los datos personales de una visita */
        public function mdatos_persona($_ci)
        {
            include_once('model/Conexion.php');
            $db = new Conexion();
            $ci= $db->real_escape_string($_ci);
            $result = $db->prepare("CALL p_datosp(?);");
            $result->bind_param('i',$ci);
            $result->execute();
            $arrays = $result->get_result();
            $resultado = array();
            if ($arrays -> num_rows >= 1) {
                while ($row = $arrays -> fetch_assoc()) {
                    $resultado[] = $row;
                }
                return $resultado;
            } else {
                return "0";
            }
            $result->free_result();
            $db->liberar($result);
            $db->close();
        }

        /*Metodo que retorna los datos de un vehiculo */
        public function mdatos_vehiculo($_placa,$_letras)
        {
            include_once('model/Conexion.php');
            $db = new Conexion();
            $placa= $db->real_escape_string($_placa);
            $letras= $db->real_escape_string($_letras);
            $result = $db->prepare("CALL p_datosve(?,?);");
            $result->bind_param('ss',$placa,$letras);
            $result->execute();
            $arrays = $result->get_result();
            $resultado = array();
            if ($arrays -> num_rows >= 1) {
                while ($row = $arrays -> fetch_assoc()) {
                    
                    // Convertir el blob a una cadena base64
                    $blobData = base64_encode($row['foto']);

                    // Agregar los resultados al arreglo
                    $row['foto'] = $blobData;
                    $resultado[] = $row;
                }
                return $resultado;
            } else {
                return "0";
            }
            $result->free_result();
            $db->liberar($result);
            $db->close();
        }

        /*Metodo que retorna el listado de reservas desde BD*/
        public function mvisitas_gral()
        {
            include_once('model/Conexion.php');
            $db = new Conexion();
            $result = $db->prepare("CALL p_visitas();");
            $result->execute();
            $arrays = $result->get_result();
            $resultado = array();
            if ($arrays -> num_rows >= 1) {
                while ($row = $arrays -> fetch_assoc()) {
                    $resultado[] = $row;
                }
                return $resultado;
            } else {
                return "0";
            }
            $result->free_result();
            $db->liberar($result);
            $db->close();
        }

        


/*
        public function visitas()
        {
            include_once('model/Conexion.php');
            
            
            $db = new Conexion();
            
            
            $result = $db->query("SELECT v.idvisita, 
                                p.nombres, p.apaterno, p.amaterno,
                                ve.placa, ve.letras,
                                v.casa,v.bloque,v.fingreso,v.hingreso,v.estadov,p.idp,ve.idv
                                            FROM visita as v
                                            INNER JOIN persona as p
                                            ON v.persona=p.idp
                                            INNER JOIN vehiculo as ve
                                            ON v.veh=ve.idv
            ");
            $resultado =array();
           
            
            $resultado = array();
            if ($db->rows($result) > 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $resultado[] = $row;
                }
                return $resultado;
            } else {
                return "No hay habitación con ese número";
            }
            $db->liberar($result);
            $db->close();
        }*/
    }
?>