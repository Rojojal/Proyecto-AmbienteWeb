<?php
    // Conexión Dennis
    
    
    $conexion = new mysqli("localhost", "dennis4", "1234", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
    }

    // Conexion Esteban
    /*
    $conexion = new mysqli("localhost", "root", "", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
    }
        */

    // Otra conexión

    /*$conexion = new mysqli("localhost", "dennis4", "1234", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
    }*/

 
    // Conexión Daniela

    /*$conexion = new mysqli("localhost", "daniela", "1234", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
    }*/

    // Conexion Josué

      /*$conexion = new mysqli("localhost", "root", "Josue09123g", "proyecto");

      if ($conexion->connect_error) {
          die("Conexión fallida: " . $conexion->connect_error);
      } else {
      }*/
?>