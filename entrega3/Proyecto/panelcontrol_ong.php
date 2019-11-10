<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=devide-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <title>Grupo 76-87</title>
    </head>

    <body>

        <?php
        require 'config/conexion_cris.php';
        $nombre_ong = $_POST['nombre_ong'];
        ?>
        <h1 class="text-justify">Bienvenido al Panel de Control de <?php echo $nombre_ong?></h1>
        <br><br>
        
        <h4>Escoge una opción</h4>
        <br>
        <form role="form" action="back_ong_in.php" method="post">
            <input class="btn btn-primary form-control" type="submit" 
                   name="boton_ong" value="Revisar mis movilizaciones">
            <input type="hidden" name="nombre_ong" 
            value=<?php echo$nombre_ong ?>>
        </form>
        
        <h5 class="text-justify">Función planificadora.</h5>
        <form role="form" action="back_ong_in.php" method="post">
            <input class="form-control" type="text" name="presupuesto" 
                   placeholder="Presupuesto">
            <input class="form-control" type="text" name="comuna" 
                   placeholder="Comuna">
            <input class="btn btn-primary form-control" type="submit" 
                   name="boton_ong" value="Crear Movilización">
            <input type="hidden" name="nombre_ong" 
            value=<?php echo$nombre_ong ?>>
        </form>

    </body>


</html>
