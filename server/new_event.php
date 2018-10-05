<?php
  session_start();
  require ('conector.php');
  $con = new ConectorBD('localhost','root','');
  $response['conexion'] = $con->initConexion('agenda_bd');
  $id_usuario=$_SESSION['id_usuario'];
  $data=Array();
  $data['titulo'] = "'".$_POST['titulo']."'";
  $data['fecha_inicio'] = "'".$_POST['start_date']."'";
  $data['fecha_fin'] = "'".$_POST['end_date']."'";
  $data['hora_inicio'] = "'".$_POST['start_hour']."'";
  $data['hora_fin'] = "'".$_POST['end_hour']."'";
    if($_POST['allDay']=='true'){$data['dia_completo']="1";}else{$data['dia_completo']="0";}
  $data['fk_usuarios'] = $id_usuario;

  if ($response['conexion']=='OK') {
    if($con->insertData('eventos', $data)){
      $response['msg']="OK";
      //$response['msg']="exito en la inserción";
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }
  echo json_encode($response);
 ?>
