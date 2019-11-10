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
    include 'config/conexion_cris.php';
    $nombre_boton = $_POST;


     if (key($nombre_boton) == 'texto_busqueda_recursos') {
        $texto_busqueda_recursos = $_POST["texto_busqueda_recursos"];
        $query = "SELECT id, numero, nombre, fecha_dictamen FROM recursos WHERE numero LIKE '%$texto_busqueda_recursos%' ";
    }

    $result = $db->prepare($query);
    $result->execute();
    $recursos = $result->fetchAll();
    ?>


    <table class="table">
      <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Numero</th>
            <th scope="col">Nombre Proyecto</th>
            <th scope="col">Ong Asociada</th>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach ($recursos as $recurso) {
            echo "<tr>
            <td>$recurso[0]</td>
            <td> <form action='recurso.php' method='post'>
              <div class='form group'>
                <input type='hidden' name='id_recurso' value='$recurso[0]'>
                <input class='btn btn-link' type='submit' value='$recurso[1]'>
              </div>
            </form> </td>
            <td>$recurso[2]</td>
            <td>$recurso[3]</td>
            </tr>";
          }
          ?>
      </tbody>
    </table>
</body>
</html>
