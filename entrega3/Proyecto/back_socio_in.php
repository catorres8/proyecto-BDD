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
        <h1 class="text-center">BACK SOCIO</h1>
        <?php
        require 'config/conexion_cris.php';
        $nombre_boton = $_POST['boton'];


        echo "DE SHORO";



        if ($nombre_boton == 'INSERTAR PROYECTO') {
            $tipo = $_POST["TIPO"];
            $nombre = $_POST["NOMBRE"];
            $latitud = $_POST["LATITUD"];
            $region = $_POST["REGION"];
            $comuna = $_POST["COMUNA"];
            $apertura = $_POST["APERTURA"];
            $operativa = $_POST["OPERATIVA"];
            #Acá Falta hacer que la tabla se llene para ID de manera autónoma
            $query = "INSERT INTO proyectos VALUES($tipo, $nombre,
                $latitud, $longitud
                $region, $comuna,
                $apertura, $operativa);";
            echo 'PONIENDO ALGUNA CONSULTA';
        }
        if ($nombre_boton == 'Agregar mi nombre') {
            $nombre = $_POST["nombre_usuario"];
            $proyecto = $_POST["nombre_proyecto"];
            $query = "INSERT INTO sociosdeproyectos VALUES($nombre,
                $proyecto);";
            echo 'AGREGANDO NOMBRE A PROYECTO';
        }

        #ACA FALTA VINCULAR A LA BASE DE DATOS
        $result = $db2->prepare($query);

        $result->execute();


        $proyectos = $result->fetchAll();
        ?>
    </body>










</html>
