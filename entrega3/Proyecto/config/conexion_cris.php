<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php'); 
    # Se crea la instancia de PDO
    $db = new PDO("pgsql:dbname=$databaseName_1;host=localhost;port=5432;user=$user_1;password=$password_1");
    $db2 = new PDO("pgsql:dbname=$databaseName_2;host=localhost;port=5431;user=$user_2;password=$password_2");
    
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
