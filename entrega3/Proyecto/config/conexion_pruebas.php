<?php

try{
    $nombre_servidor = '127.0.0.1';
    $nombre_usuario = 'root';
    $password = '';
    $nombre_base_datos = 'pruebas';
    $puerto = '3306';
    $bdd = new PDO("mysql:host=$nombre_servidor;dbname=$nombre_base_datos",$nombre_usuario,$password);
    
    
    $nombre_servidor_76 = '127.0.0.1';
    $nombre_usuario_76 = 'root';
    $password_76 = '';
    $nombre_base_datos_76 = 'pruebas';
    $puerto_76 = '3306';
    $bdd_76 = new PDO("mysql:host=$nombre_servidor_76;dbname=$nombre_base_datos",$nombre_usuario_76,$password_76);
    
    $nombre_servidor_87 = '127.0.0.1';
    $nombre_usuario_87 = 'root';
    $password_87 = '';
    $nombre_base_datos_87 = 'pruebas';
    $puerto_87 = '3306';
    $bdd_87 = new PDO("mysql:host=$nombre_servidor_87;dbname=$nombre_base_datos",$nombre_usuario_87,$password_87);
    
} catch (Exception $ex) {
    echo "Error en la configuración de la base de datos. $ex";

}


?>