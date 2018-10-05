<?php
     
  include('conector.php');

  $data['nombre'] = "'".$_POST['nombre']."'";
  $data['password'] = "'".password_hash($_POST['contrasena'], PASSWORD_DEFAULT)."'";
  $data['email'] = "'".$_POST['email']."'";
  $data['fecha_nacimiento'] = "'".$_POST['fechaNacimiento']."'";

  $con = new ConectorBD('localhost','root','');
  $response['conexion'] = $con->initConexion('agenda_bd');

  if ($response['conexion']=='OK') {
    if($con->insertData('usuarios', $data)){
      $response['msg']="exito en la inserción";
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);


 ?>
