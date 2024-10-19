<?php
    require "config_bd.php";
    
    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;
    
    // READ: Leer los registros de la base de datos
    if($request == 1){
      $nit_proveedor = $datos->nit_proveedor;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_proveedor, s.id_solicitud, r.nombre_es_solicitud, m.nombre_es_muestra, p.nombre_es_porcion, s.nombre_usuario, n.nombre_rol
			  FROM db_muestras.solicitudes s
		    INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
        INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
			  INNER JOIN db_muestras.estado_porcion_muestra p ON s.id_estado_porcion_muestra = p.id_estado_porcion_muestra
        INNER JOIN db_muestras.roles n ON s.id_rol = n.id_rol WHERE nit_proveedor='$nit_proveedor'";
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

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.nit_proveedor, s.nombre_proveedor, s.cant_muestras, r.nombre_es_solicitud, m.nombre_es_muestra, s.nombre_usuario, n.nombre_rol
			  FROM db_muestras.solicitudes s
		    INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
        INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
        INNER JOIN db_muestras.roles n ON s.id_rol = n.id_rol WHERE id_solicitud='$id_solicitud'";
      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 3){
      $fecha_ingreso = $datos->fecha_ingreso;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.cant_muestras, s.nit_proveedor, s.nombre_proveedor, s.nombre_solicitante, s.nombre_usuario, s.desc_muestra, r.nombre_es_solicitud, m.nombre_es_muestra,  n.nombre_solicitud
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      WHERE s.fecha_ingreso = '$fecha_ingreso'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }
    if($request == 4){
      $id_estado_muestra = $datos->id_estado_muestra;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.cant_muestras, s.nit_proveedor, s.nombre_proveedor, s.nombre_solicitante, s.nombre_usuario, s.desc_muestra, r.nombre_es_solicitud, m.nombre_es_muestra,  n.nombre_solicitud
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      WHERE s.id_estado_muestra = '$id_estado_muestra'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }

    if($request == 5){
      $id_solicitud = $datos->id_solicitud;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.cant_muestras, s.nit_proveedor, s.nombre_proveedor, s.nombre_solicitante, s.nombre_usuario, s.desc_muestra, r.nombre_es_solicitud, m.nombre_es_muestra,  n.nombre_solicitud
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
    if($request == 6){
      $id_tipo_solicitud = $datos->id_tipo_solicitud;

      $sql = "SELECT s.id_solicitud, s.fecha_ingreso, s.cant_muestras, s.nit_proveedor, s.nombre_proveedor, s.nombre_solicitante, s.nombre_usuario, s.desc_muestra, r.nombre_es_solicitud, m.nombre_es_muestra,  n.nombre_solicitud
      FROM db_muestras.solicitudes s
      INNER JOIN db_muestras.estado_solicitud r ON s.id_estado_solicitud = r.id_estado_solicitud
      INNER JOIN db_muestras.estado_muestra m ON s.id_estado_muestra = m.id_estado_muestra
      INNER JOIN db_muestras.tipo_solicitud n ON s.id_tipo_solicitud = n.id_tipo_solicitud 
      WHERE s.id_tipo_solicitud = '$id_tipo_solicitud'";

      $query = $mysqli->query($sql);
        
      $datos = array();
      while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
      }
        
      echo json_encode($datos);
      exit;
    }
?>