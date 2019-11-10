<!DOCTYPE html>
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
    $query = "SELECT nombre FROM ongs";
    $result = $db -> prepare($query);
    $result->execute();
    $ongs = $result->fetchAll();
    ?>

    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre ONG</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($ongs as $ong) {
              echo "<tr> <td> <form action='ong_profile.php' method='post'>
                    <div class='form group'>
                      <input class='btn btn-link' type='submit' name='ong' value='$ong[0]'>
                    </div>
                    </form> </td> </tr>";
            }
            ?>
        </tbody>
    </table>

  </body>
</html>
