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
        <title>Grupo 76-87</title>
    </head>



    <?php
    include 'config/conexion_pruebas.php';
    $nombre_boton = $_POST;

    
     if (key($nombre_boton) == 'texto_busqueda_recursos') {
        $texto_busqueda_recursos = $_POST["texto_busqueda_recursos"];
        $query = "SELECT id, nombre FROM Ongs WHERE Ongs.nombre LIKE '%$texto_busqueda_recursos%' ";
        echo 'Busqueda Recursos';
    }
    #ACA FALTA VINCULAR A LA 
    #OTRA BASE DE DATOS
    $result = $bdd_76->prepare($query);
    #$result->execute();
    $recursos = $result->fetchAll();
    ?>




    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre recurso</th>

            </tr>
        </thead>

        <tbody>

            <?php
            # Aquí falta poner cada una de las cosas en su columna respectiva
            foreach ($recursos as $recurso) {
                echo "<tr> <td> $recurso[0] </td>"
                . "<td> $recurso[1] </td></tr>";
            }
            ?>
        </tbody>

    </table>





</html>
