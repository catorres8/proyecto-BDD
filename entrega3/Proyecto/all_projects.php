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

    $tipo = $_POST["tipo"];
    if ($tipo == 0) {
      $query = "SELECT p_nombre FROM proyectos";
    } elseif ($tipo == 4) {
      $texto_busqueda_proyectos = $_POST["texto_busqueda_proyectos"];
      $query = "SELECT p_nombre FROM proyectos WHERE p_nombre LIKE '%$texto_busqueda_proyectos%';";

    } else {
      $query = "SELECT p_nombre FROM proyectos WHERE p_tipo = '$tipo';";
    }


    include 'config/conexion_cris.php';

    $result = $db2 -> prepare($query);
    $result->execute();
    $proyectos = $result->fetchAll();
    ?>

    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre Proyecto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            # Aquí falta poner cada una de las cosas en su columna respectiva
            foreach ($proyectos as $proyecto) {
              echo "<tr> <td> <form action='project_profile.php' method='post'>
                    <div class='form group'>
                      <input class='btn btn-link' type='submit' name='proyecto' value='$proyecto[0]'>
                    </div>
                    </form> </td> </tr>";
            }
            ?>
        </tbody>

    </table>
    </body>
</html>
