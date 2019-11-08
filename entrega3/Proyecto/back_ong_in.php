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
    include 'config/conexion_pruebas.php';
    $nombre_ong = $_POST['nombre_usuario'];
    $query = "SELECT * FROM movilizaciones WHERE ong = $nombre_ong;";
    $result = $bdd_76->prepare($query);
    $result->execute();
    $movilizaciones = $result->fetchAll();
    ?>




    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Proyecto</th>
                <th scope="col">presupuesto</th>
                <th scope="col">ong</th>
                <th scope="col">tipo</th>
            </tr>
        </thead>

        <tbody>

            <?php
            # Aquí falta poner cada una de las cosas en su columna respectiva
            foreach ($movilizaciones as $movilizacion) {
                echo "<tr> <td> $movilizacion[0] </td>"
                . "<td> $movilizacion[1] </td>"
                . "<td> $movilizacion[2] </td>"
                . "<td> $movilizacion[3] </td>"
                . "<td> $movilizacion[4] </td> </tr>";
            }
            ?>
        </tbody>

    </table>





</html>
