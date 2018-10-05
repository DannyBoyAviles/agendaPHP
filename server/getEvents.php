<?php
  session_start();
  require('conector.php');
  $con = new ConectorBD('localhost','root','');
  $response['conexion'] = $con->initConexion('agenda_bd');
  $id_usuario=$_SESSION['id_usuario'];
  $condicion='WHERE fk_usuarios="'.$id_usuario.'"';
  $eventos=array();

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['eventos'],['*'],$condicion);
    #echo "Se consultaron los registros exitosamente</br>";
        while ($fila = $resultado_consulta->FETCH_ASSOC()){
          $evento = array(
            'id'=>$fila['id'],
            'title'=>$fila['titulo'],
            'start'=>$fila['fecha_inicio']." ".$fila['hora_inicio'],
            'end'=> $fila['fecha_fin']." ".$fila['hora_fin'],
            'allday'=>$fila['dia_completo'],
            'fk_usuario'=>$fila['fk_usuarios']);
            array_push($eventos, $evento);
        }

    #$response['sentencia SQL']=[$condicion];
    $response['eventos']=$eventos;
    $response['msg']='OK';
    $response['id_Usuario']=[$id_usuario];
    
  }
  echo json_encode($response);

  $con->cerrarConexion();

    ?>
  