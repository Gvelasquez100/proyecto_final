<?php
    require "config_bd.php";
    
    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;
    
    // READ: Leer los registros de la base de datos
    if($request == 1){
      $sql = "SELECT b.id_bitacora, b.nit_usuario, u.nombre_usuario, r.nombre_rol, p.nombre_puesto, b.accion, b.fecha
              FROM db_muestras.bitacora_usuarios b
              INNER JOIN db_muestras.usuarios u ON b.nit_usuario = u.nit_usuario
              INNER JOIN db_muestras.roles r ON b.id_rol = r.id_rol
              INNER JOIN db_muestras.puestos p ON b.id_puesto = p.id_puesto";
      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 2){
      $id_solicitud = $datos->id_solicitud;
      $sql = "SELECT b.id_bitacora, b.id_solicitud, b.nit_usuario, b.nombre_usuario, r.nombre_rol, b.accion, b.fecha, b.estado_anterio, b.estado_nuevo, b.fecha_nuevo
              FROM db_muestras.bitacora_solicitud b
              INNER JOIN db_muestras.roles r ON b.id_rol = r.id_rol
              WHERE id_solicitud = '$id_solicitud'";
      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 3){
      $sql = "SELECT b.id_bitacora, b.id_solicitud, b.nit_usuario, b.nombre_usuario, r.nombre_rol, b.accion, b.fecha, b.estado_anterio, b.estado_nuevo, b.fecha_nuevo
              FROM db_muestras.bitacora_solicitud b
              INNER JOIN db_muestras.roles r ON b.id_rol = r.id_rol";
      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }
/*
	if($request == 1){
      $sql = "SELECT * FROM bitacora_usuarios";
      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }
	
    // CREATE: Insertar registro en la base de datos
    if($request == 2) {
      $nit_usuario = $datos->nit_usuario;
      $nombre_usuario = $datos->nombre_usuario;
      $id_rol = $datos->id_rol;
      $id_puesto = $datos->id_puesto;
      $correo_usuario = $datos->correo_usuario;
      $pass_usuario = $datos->pass_usuario;
      

      $sql_select = "SELECT nit_usuario FROM usuarios WHERE nit_usuario='$nit_usuario'";
      $query_select = $mysqli->query($sql_select);

      if(($query_select->num_rows) == 0) {
        // Inserta los datos correspondientes
        $sql_insert = "INSERT INTO usuarios(nit_usuario, nombre_usuario, id_rol, id_puesto, correo_usuario, pass_usuario) VALUES('$nit_usuario', '$nombre_usuario', '$id_rol', '$id_puesto', '$correo_usuario', '$pass_usuario')";
        if($mysqli->query($sql_insert) === TRUE) {
          echo "Se registro exitosamente.";
        } else {
          echo "Ocurrio un problema.";
        }
      } else {
        echo "Esos datos ya existen.";
      }
      exit;
    }

    // UPDATE: Actualizar el registro de la base de datos
    if($request == 3) {

      $nit_usuario = $datos->nit_usuario;
      $nombre_usuario = $datos->nombre_usuario;
      $id_rol = $datos->id_rol;
      $id_puesto = $datos->id_puesto;
      $correo_usuario = $datos->correo_usuario;
      $pass_usuario = $datos->pass_usuario;
      

      $sql_edit = "UPDATE usuarios SET nombre_usuario='$nombre_usuario', id_rol='$id_rol', id_puesto='$id_puesto', correo_usuario='$correo_usuario', pass_usuario='$pass_usuario'
      WHERE nit_usuario='$nit_usuario'";
      $query_update = $mysqli->query($sql_edit);

      echo "Se actualizo el registro.";
      exit;
    }

    
    // DELETE: Borrar registro de la base de datos
    if($request == 4) {
      
      $nit_usuario = $datos->nit_usuario;

      $sql_delete = "DELETE FROM usuarios WHERE nit_usuario='$nit_usuario'";
      $query_delete = $mysqli->query($sql_delete);

      echo "Registro eliminado.";
      exit;
    }
    

    // DELETE: Borrado logico de la base de datos cambio de estados
    if($request == 4) {
      
        $nit_usuario = $datos->nit_usuario;
        //$estado = $datos->estado;
        //$motivo_estado = $datos->motivo_estado;
  
        $sql_delete = "UPDATE usuarios SET estado='Inactivo', motivo_estado='Usuario inactivo' WHERE nit_usuario='$nit_usuario'";
        $query_delete = $mysqli->query($sql_delete);
  
        echo "Registro eliminado.";
        exit;
      }
      */
?>