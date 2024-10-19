<?php
    require "config_bd.php";
    
    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;
    
    // READ: Leer los registros de la base de datos
    
    if($request == 1){
      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.cant_muestras, s.desc_muestra, r.nombre_es_solicitud, m.nombre_tipo_entidad
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.tipo_entidad m ON s.id_tipo_entidad = m.id_tipo_entidad
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud";
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
      $id_solicitud = $datos->id_solicitud;
      $nit_usuario = $datos->nit_usuario;
      $nombre_usuario = $datos->nombre_usuario;
      $id_rol = $datos->id_rol;
      $id_tipo_solicitud = $datos->id_tipo_solicitud;
      $id_tipo_entidad = $datos->id_tipo_entidad;
      $nombre_entidad = $datos->nombre_entidad;
      $nit_proveedor = $datos->nit_proveedor;
      $nombre_proveedor = $datos->nombre_proveedor;
      $correo_proveedor = $datos->correo_proveedor;
      $direccion_proveedor = $datos->direccion_proveedor;
      $telefono_proveedor = $datos->telefono_proveedor;
      $nit_solicitante = $datos->nit_solicitante;
      $nombre_solicitante = $datos->nombre_solicitante;
      $correo_solicitante = $datos->correo_solicitante;
      $cant_muestras = $datos->cant_muestras;
      $desc_muestra = $datos->desc_muestra;
      $id_documento = $datos->id_documento;
      $documento = $datos->documento;

      $sql_select = "SELECT id_solicitud FROM solicitudes WHERE id_solicitud='$id_solicitud'";
      $query_select = $mysqli->query($sql_select);

      if(($query_select->num_rows) == 0) {
        // Inserta los datos correspondientes
        $sql_insert = "INSERT INTO solicitudes(nit_usuario, nombre_usuario, id_rol, id_tipo_solicitud, id_tipo_entidad, nombre_entidad, nit_proveedor, nombre_proveedor, correo_proveedor,
        direccion_proveedor, telefono_proveedor, nit_solicitante, nombre_solicitante, correo_solicitante, cant_muestras, desc_muestra, id_documento, documento) 
        VALUES('$nit_usuario', '$nombre_usuario', '$id_rol', '$id_tipo_solicitud', '$id_tipo_entidad', '$nombre_entidad', '$nit_proveedor', '$nombre_proveedor', '$correo_proveedor',
        '$direccion_proveedor', '$telefono_proveedor', '$nit_solicitante', '$nombre_solicitante', '$correo_solicitante', '$cant_muestras', '$desc_muestra', '$id_documento', '$documento')";
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

    /*
    // DELETE: Borrar registro de la base de datos
    if($request == 4) {
      
      $nit_usuario = $datos->nit_usuario;

      $sql_delete = "DELETE FROM usuarios WHERE nit_usuario='$nit_usuario'";
      $query_delete = $mysqli->query($sql_delete);

      echo "Registro eliminado.";
      exit;
    }
    */

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

?>