<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>Proyecto\proyectos_selectivos.php
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=devide-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <title>Inicio para Socios</title>
    </head>




    <?php
    include 'config/conexion_pruebas.php';
    $nombre_usuario = (int)$_POST['variable_socio'];


    echo "El nombre del usuario a buscar es", $nombre_usuario;
    $query = "SELECT COUNT(*) FROM sociosdeproyectos WHERE snombre = $nombre_usuario";
    $result = $bdd_87->prepare($query);
    $result->execute();
    $numero_coincidencias = $result->fetchAll();
    if ($numero_coincidencias[0] = 0) {
        echo "Acceso concedido, bienvenido", $nombre_usuario;
        ?>
        <form role="form" action="socio_in.php" method="post">

            <br>                        
            <input class="btn btn-primary form-control" type="submit" 
                   name="boton_socio" value="Continuar">
            <input type="hidden" name="nombre_usuario" value=<?php echo$nombre_usuario?>>
            <br>
        </form>
    <?php
    } else {
        echo "No existen coincidencias, lo que se obtuvo fue", $numero_coincidencias[0];
    }
    ?>







</html>
