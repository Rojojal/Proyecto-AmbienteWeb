<?php
    // Conexión Dennis
    
    /*
    $conexion = new mysqli("localhost", "dennis4", "1234", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        //echo "Conexión exitosa";
    }

    // Conexion Esteban
    /*
    $conexion = new mysqli("localhost", "root", "", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo "Conexión exitosa";
    }
        */

    // Otra conexión

    /*$conexion = new mysqli("localhost", "dennis4", "1234", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo "Conexión exitosa";
    }*/

 
    // Conexión Daniela

    /*$conexion = new mysqli("localhost", "daniela", "1234", "proyecto");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo "Conexión exitosa";
    }*/

    // Conexion Josué

      $conexion = new mysqli("localhost", "root", "Josue09123g", "proyecto");

      if ($conexion->connect_error) {
          die("Conexión fallida: " . $conexion->connect_error);
      } else {
        // Para q no se muestre el ecoho en dashboard general
        error_log("Conexión exitosa");
      }
?>