<?php
    
    // Variables de la conexion a la DB
    $mysqli = new mysqli("127.0.0.1:3306","root","root","db_muestras"); //pruebas
    //$mysqli = new mysqli("monorail.proxy.rlwy.net:37979","root","QYknGkzhCrHRctLkLrnLyeZmjXdBssGR","db_gestor"); //servidor
    //$mysqli = new mysqli("junction.proxy.rlwy.net:58500", "root", "sDlZFmsggyUnBFAZelMOpAeReljFokJb", "db_muestras");  
    // Comprobamos la conexion
    if($mysqli->connect_errno) {
        die("Fallo la conexion");
    } else {
        //echo "Conexion exitosa";
    }

?>