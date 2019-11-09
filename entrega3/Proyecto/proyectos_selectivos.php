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


    

    <?php
    include 'config/conexion_cris.php';
    $nombre_boton = $_POST['info'];
    echo $nombre_boton;


    #echo "DE SHORO", $nombre_boton;


    if ($nombre_boton == 'mina') {
        $query = "SELECT p_id, p_nombre_, p_tipo FROM proyectos WHERE p_tipo = 1 ";
        echo 'MINAS';
    }
    if ($nombre_boton == 'central') {
        $query = "SELECT p_id, p_nombre_, p_tipo FROM proyectos WHERE p_tipo = 2 ";
        echo 'CENTRAL';
    }
    if ($nombre_boton == 'vertedero') {
        $query = "SELECT p_id, p_nombre_, p_tipo FROM proyectos WHERE p_tipo = 3 ";
        echo 'VERTEDERO';
    }
    if ($nombre_boton == 'texto_busqueda_proyectos') {
        $texto_busqueda_proyectos = $_POST["texto_busqueda_proyectos"];
        $query = "SELECT p_id, p_nombre_, p_tipo FROM proyectos WHERE proyectos.nombre LIKE '%$texto_busqueda_proyectos%'; ";
        echo 'Busqueda proyectos';
    }
    #ACA FALTA VINCULAR A LA BASE DE DATOS
    $result = $db2->prepare($query);
    $result -> execute();
    $proyectos = $result->fetchAll();
    ?>




    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Proyecto</th>
                <th scope="col">tipo</th>
            </tr>
        </thead>

        <tbody>

            <?php
            # Aquí falta poner cada una de las cosas en su columna respectiva
            foreach ($proyectos as $proyecto) {
                echo "<tr> <td> $proyecto[0] </td>"
                        . " <td> $proyecto[1] </td>"
                        . " <td> $proyecto[2] </td></tr>";
            }
            ?>
        </tbody>

    </table>





</html>
