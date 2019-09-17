<?php include('../templates/header.html'); ?>

<body>


<?php

require("../config/conexion.php");


$proyecto = $_POST["proyecto"];

date_default_timezone_set('America/Santiago');
$fecha_actual = date('Y-n-j');

$query = "SELECT *
          FROM movilizaciones, marchas
          WHERE '$proyecto' = movilizaciones.nombre_proyecto
            AND movilizaciones.id = marchas.id
            AND CURRENT_DATE < marchas.fecha;";
  $result = $db -> prepare($query);
  $result -> execute();
  $marchas = $result -> fetchAll();
 ?>

 <table class="table">
   <thead class="thead-dark">
     <tr>
       <th scope="col">Id</th>
       <th scope="col">Nombre ONG</th>
       <th scope="col">País de origen</th>
       <th scope="col">Descripcion</th>
     </tr>
   </thead>

       <tbody>
         <?php
         foreach ($marchas as $marcha) {
           echo "<tr> <td>$marcha[0]</td>
                      <td>$marcha[1]</td>
                      <td>$marcha[2]</td>
                      <td>$marcha[3]</td>
                      <td>$marcha[4]</td>
                      <td>$marcha[5]</td>
                      <td>$marcha[6]</td> </tr>";
                    }
            ?>
    </tbody>

    </table>

<?php include('../templates/footer.html'); ?>
