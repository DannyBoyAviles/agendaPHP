<?php
  session_start();
  include('conector.php');
  $con = new ConectorBD('localhost','root','');
  $response['conexion'] = $con->initConexion('agenda_bd');
  $tabla='eventos';
  $condicion='id= '.$_POST['id'];
  if ($response['conexion']=='OK') {
    $response['msg']='OK';
    $con->eliminarRegistro($tabla, $condicion);
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);


 ?>
