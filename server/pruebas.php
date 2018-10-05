<?php
require('./conector.php');
$con = new ConectorBD('localhost','root','');
$response['conexion'] = $con->initConexion('agenda_bd');
$condicion='WHERE id="1"';
if ($response['conexion']=='OK') {
/*
    #$con->consultar(['usuarios'],['id'], 'WHERE email="'.'julio@email.com'.'"');
    #$con->consultar(['usuarios'],['id'], 'WHERE email="'.$_POST['username'].'"');
    #$con->consultar(['personas'],['nombre', 'apellido', 'telefono',],'WHERE id<10 ORDER BY nombre ASC');
    #$resultado_consulta = $con->consultar(['usuarios'],['*'], 'WHERE fk_usuarios="8"');
   
*/    #if ($resultado = $con->consultar(['usuarios'], ['*'])) {
/*
    if ($resultado = $con->consultar(['eventos'], ['*'], 'WHERE fk_usuarios="8"')) {
        echo "Se consultaron los registros exitosamente</br>";
        while ($fila = $resultado->FETCH_ASSOC()){
          #echo $fila['id']." ".$fila['nombre']." ".$fila['password']." ".$fila['email']." ".$fila['fecha_nacimiento']."<br/>";
          echo $fila['id']." ".$fila['titulo']." ".$fila['fecha_inicio']." ".$fila['fecha_fin']." ".$fila['hora_inicio']." ".$fila['hora_fin']." ".$fila['dia_completo']." ".$fila['fk_usuarios']."<br/>";
        }
      }else echo "Hubo un problema y los registros no fueron consultados";
*/
  #$datos['fecha_inicio']='start_date';
  #$datos['hora_inicio']='start_hour';
  #$datos['fecha_fin']='end_date';
/*
    $datos['nombre'] = "'Pablo Garcia'";
    $datos['telefono'] = "'4328754'";

    if ($con->actualizarRegistro('usuarios', $datos, $condicion)) {
      echo "Se han actualizado los datos correctamente";
    }//else echo "Se ha producido un error en la actualización";


    $con->cerrarConexion();
*/
  
$con->eliminarRegistro('eventos', 'id = 1');

  }else {
    echo "Se presentó un error en la conexión";
  }





?>