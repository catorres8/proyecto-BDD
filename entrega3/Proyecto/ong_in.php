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
        <title>Inicio Sesión</title>
    </head>
    <body>
        <?php
        $nombre_ong = $_POST['nombre_ong'];
        ?>


        <h4 class="center-block"> Bienvenido a tu panel de control</h4> <br> <br>
        <div class="center-block"
             <form role="form" action="back_ong_in.php" method="post">
                <label>Ver Movilizaciones</label>
                <br>
                <input type="hidden" name="nombre_usuario" 
                       value= <?php echo $nombre_ong ?> >
                <br>
                <input class="btn btn-primary form-control" type="submit" 
                       name="boton" value="Ver movilizaciones">
                <br>
            </form>
        </div>
        <div
            <form role="form" action="back_socio_in.php" method="post">
                <label>PLANIFICADOR DE MOVILIZACIONES</label>

                <input class="form-control" type="text" name="comuna_movilizacion" 
                       placeholder="Ingresa comuna">
                <br>
                <input class="form-control" type="text" name="presupuesto_movilizacion" 
                       placeholder="Ingresa presupuesto">
                <br>
                <input type="hidden" name="nombre_usuario" 
                       value= <?php echo $_POST["nombre_usuario"] ?> >
                <br>
                <input class="btn btn-primary form-control" type="submit" 
                       name="boton" value="Agregar mi nombre">
                <br>
            </form>
        </div>


    </body>
</html>
