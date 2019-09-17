<?php include('../templates/header.html'); ?>

<body>

  <?php

    require("../config/conexion.php");


    date_default_timezone_set('America/Santiago');
    $fecha_actual = date('Y-n-j');

    $query = "SELECT *
              FROM recursos, movilizaciones, redes_sociales, marchas
              WHERE recursos.status = 'en trámite'
                AND recursos.nombre = movilizaciones.nombre_proyecto
                AND movilizaciones.id = marchas.id
                AND movilizaciones.id = redes_sociales.id
                AND '2019-9-16' < marchas.fecha
                AND '2019-9-16' < (redes_sociales.fecha_inicio + redes_sociales.duracion);";
    $result = $db -> prepare($query);
    $result -> execute();
    $proyectos = $result -> fetchAll();
    ?>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id Recursos Ambientales</th>
        <th scope="col">Area</th>
        <th scope="col">Comuna</th>
        <th scope="col">Region</th>
        <th scope="col">Causa Contaminante</th>
        <th scope="col">Estatus</th>
        <th scope="col">Nombre proyecto RA</th>
        <th scope="col">Id Movilizaciones</th>
        <th scope="col">Nombre_proyecto Mov</th>
        <th scope="col">Presupuesto Anual</th>
        <th scope="col">Nombre Ong</th>
        <th scope="col">Tipo Mov</th>
        <th scope="col">Id Redes Sociales</th>
        <th scope="col">Duracion</th>
        <th scope="col">Tipo Contenido</th>
        <th scope="col">Fecha Termino</th>
        <th scope="col">Fecha comienzo</th>
        <th scope="col">Tipo RRSS</th>
        <th scope="col">Id Marcha</th>
        <th scope="col">Numero Estimado de Personas</th>
        <th scope="col">Lugar</th>
        <th scope="col">Fecha</th>
        <th scope="col">Fecha Termino</th>
        <th scope="col">Tipo Marcha</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($proyectos as $proyecto) {
        echo "<tr> <td>$proyecto[0]</td>
                   <td>$proyecto[1]</td>
                   <td>$proyecto[2]</td>
                   <td>$proyecto[3]</td>
                   <td>$proyecto[4]</td>
                   <td>$proyecto[5]</td>
                   <td>$proyecto[6]</td>
                   <td>$proyecto[7]</td>
                   <td>$proyecto[8]</td>
                   <td>$proyecto[9]</td>
                   <td>$proyecto[10]</td>
                   <td>$proyecto[11]</td>
                   <td>$proyecto[12]</td>
                   <td>$proyecto[13]</td>
                   <td>$proyecto[14]</td>
                   <td>$proyecto[15]</td>
                   <td>$proyecto[16]</td>
                   <td>$proyecto[17]</td>
                   <td>$proyecto[18]</td>
                   <td>$proyecto[19]</td>
                   <td>$proyecto[20]</td>
                   <td>$proyecto[21]</td>
                   <td>$proyecto[22]</td>
                   <td>$proyecto[23]</td> </tr>";
      }
      ?>
    </tbody>

  </table>


<?php include('../templates/footer.html'); ?>
