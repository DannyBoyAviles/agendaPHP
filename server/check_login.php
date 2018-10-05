<?php 
require('./conector.php');

  $con = new ConectorBD('localhost','root','');

  $response['conexion'] = $con->initConexion('agenda_bd');


  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],['id',' email', 'password'], 'WHERE email="'.$_POST['username'].'"');
    if ($resultado_consulta->num_rows != 0) {
      $fila = $resultado_consulta->fetch_assoc();
      if (password_verify($_POST['password'], $fila['password'])) {
        //if (  $_POST['password'] == $fila['password']) {
          session_start();
        $response['acceso'] = 'concedido';
        $_SESSION['id_usuario']=$fila['id'];
        $_SESSION['username']=$fila['email'];
        $response['msg']='OK';
      }else {
        $response['motivo'] = 'Contraseña incorrecta';
        $response['acceso'] = 'rechazado';
        $response['msg']='Password incorrecto';
      }
    }else{
      $response['motivo'] = 'Email incorrecto';
      $response['acceso'] = 'rechazado';
      $response['msg']='Usuario incorrecto';
    }
  }
 
  echo json_encode($response);

  $con->cerrarConexion();



  ?>
