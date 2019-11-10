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

        <h4 class="center-block"> Bienvenido a tu panel de control</h4> <br> <br>
        <label>Crea un nuevo Proyecto</label>
        <form role="form" action="back_socio_in.php" method="post">


            <input class="form-control" type="text" name="TIPO" 
                   placeholder="TIPO">
            <br>
            <input class="form-control" type="text" name="NOMBRE" 
                   placeholder="NOMBRE">
            <br>
            <input class="form-control" type="text" name="LATITUD EN FORMATO DOUBLE" 
                   placeholder="LATITUD">
            <br>
            <input class="form-control" type="text" name="LONGITUD EN FORMATO DOUBLE" 
                   placeholder="LONGITUD">
            <br>
            <input class="form-control" type="text" name="REGION" 
                   placeholder="REGION">
            <br>
            <input class="form-control" type="text" name="COMUNA" 
                   placeholder="COMUNA">
            <br>
            <input class="form-control" type="text" name="APERTURA EN FORMATO FECHA" 
                   placeholder="APERTURA">
            <br>
            <input class="form-control" type="text" name="OPERATIVA"
                   placeholder="OPERATIVA">
            <br>
            <input type="hidden" name="nombre_usuario" 
                   value= <?php echo $_POST["nombre_usuario"] ?>>
            <br>
            <input class="btn btn-primary form-control" type="submit" 
                   name="boton" value="INSERTAR PROYECTO">
            <br>
        </form>

        <div
            <form role="form" action="back_socio_in.php" method="post">
                <label>PLANIFICACIÓN AUTOMÁTICA</label>

                <input class="form-control" type="text" name="nombre_proyecto" 
                       placeholder="Nombre del Proyecto">
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
