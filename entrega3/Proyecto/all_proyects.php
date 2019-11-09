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
    $query = "SELECT p_nombre FROM proyectos;";
    $result = $db2->prepare($query);
    $result->execute();
    $proyectos = $result->fetchAll();
    ?>




    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Proyectos</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($proyectos as $proyecto) {
              echo "<tr> <td> <form action='proyect.php' method='post'>
                <div class='form group'>
                  <input class='btn btn-secondary' type='submit' name='proyecto' value='$proyecto[0]'>
                </div>
              </form> </td> </tr>";
            }
            ?>
        </tbody>

    </table>





</html>
