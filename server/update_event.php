<?php
   session_start();
   require ('conector.php');
   $con = new ConectorBD('localhost','root','');
   $response['conexion'] = $con->initConexion('agenda_bd');
   $id_usuario=$_SESSION['id_usuario'];
   #$condicion= ' id= '.$id_usuario;
   $condicion='id= '.$_POST['id'];
   $datos=array();

    if ($response['conexion']=='OK') {

        $datos['id']=$_POST['id'];
        $datos['fecha_inicio'] = "'".$_POST['start_date']."'";
        $datos['fecha_fin'] = "'".$_POST['end_date']."'";
        $datos['hora_inicio'] = "'".$_POST['start_hour']."'";
        $datos['hora_fin'] = "'".$_POST['end_hour']."'";
    
        if ($con->actualizarRegistro('eventos', $datos, $condicion)) {
          $response['msg']='OK';
          $response['Actualizacion']=$datos;
        }else {
          $response['msg']= "Se ha producido un error en la actualización";
          $response['Actualizacion']=$datos;
        }
    
    
        $con->cerrarConexion();
    
      }else {
        echo "Se presentó un error en la conexión";
      }
      echo json_encode($response);

 ?>
