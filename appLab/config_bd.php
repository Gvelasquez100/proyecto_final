<?php
    
    // Variables de la conexion a la DB
    $mysqli = new mysqli("autorack.proxy.rlwy.net:36813","root","iHKhFJnTGuaLomaVumNEszlzdyQOivHL","db_muestra"); //pruebas
    //$mysqli = new mysqli("monorail.proxy.rlwy.net:37979","root","QYknGkzhCrHRctLkLrnLyeZmjXdBssGR","db_gestor"); //servidor
    
    // Comprobamos la conexion
    if($mysqli->connect_errno) {
        die("Fallo la conexion");
    } else {
        //echo "Conexion exitosa";
    }

?>
