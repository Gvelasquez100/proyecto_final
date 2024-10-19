<?php
    require "config_bd.php";
    
    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;
    
    // READ: Leer los registros de la base de datos
   
    if($request == 1){
      $fecha_ingreso = $datos->fecha_ingreso;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, e.nombre_tipo_entidad, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      INNER JOIN db_muestras.tipo_entidad e ON s.id_tipo_entidad = e.id_tipo_entidad 
      WHERE s.fecha_ingreso = '$fecha_ingreso'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 2){
      $nit_solicitante = $datos->nit_solicitante;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, e.nombre_tipo_entidad, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      INNER JOIN db_muestras.tipo_entidad e ON s.id_tipo_entidad = e.id_tipo_entidad 
      WHERE s.nit_solicitante = '$nit_solicitante'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 3){
      $nombre_solicitante = $datos->nombre_solicitante;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, e.nombre_tipo_entidad, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      INNER JOIN db_muestras.tipo_entidad e ON s.id_tipo_entidad = e.id_tipo_entidad  
      WHERE s.nombre_solicitante = '$nombre_solicitante'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 4){
      $id_tipo_entidad = $datos->id_tipo_entidad;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, e.nombre_tipo_entidad, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      INNER JOIN db_muestras.tipo_entidad e ON s.id_tipo_entidad = e.id_tipo_entidad 
      WHERE s.id_tipo_entidad = '$id_tipo_entidad'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 5){
      $nombre_entidad = $datos->nombre_entidad;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, e.nombre_tipo_entidad, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      INNER JOIN db_muestras.tipo_entidad e ON s.id_tipo_entidad = e.id_tipo_entidad  
      WHERE s.nombre_entidad = '$nombre_entidad'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 6){
      $nombre_usuario = $datos->nombre_usuario;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud  
      WHERE s.nombre_usuario = '$nombre_usuario'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 7){
      $id_solicitud = $datos->id_solicitud;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_usuario, s.nombre_usuario, s.id_rol, n.nombre_solicitud, s.nombre_entidad, s.nit_proveedor, 
      s.nombre_proveedor, s.nit_solicitante, s.nombre_solicitante, s.desc_muestra,  r.nombre_es_solicitud, m.nombre_es_muestra
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud  
      WHERE s.id_solicitud = '$id_solicitud'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }


?>