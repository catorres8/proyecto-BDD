<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=devide-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>ONGs y Movilizaciones</title>
  </head>

  <body>

    <div class="container">
      <div class="jumbotron">
        <h1 class="text-center"> Entrega 3 </h1>
      </div>
    </div>

    <div class="container"> 
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Consulta 1 </h3>
            </div>
            <div class="panel-body">
              <p class="text-justify">En esta consulta se pide mostrar todas las marchas planificadas para el año
              2020, pero nos dimos cuenta de que no existen marchas que cumplan tal requisitos,
            así que acontinuacion dejamos la opcion de ingresar 2 fechas limites para consultar las
          marchas planificadaspara ese periodo de tiempo, pero si decide no ingresar fechas en los espacios especificados entonces
        se realizará la consulta especificada para este item, es decir, aquellas marchas planificadas para el 2020 </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="consultas/consulta_1.php" method="post">
                <div class="form group">
                  <label>Fecha inicio</label>
                  <input class="form-control" type="text" name="fecha_a" placeholder="YYYY-MM-DD">
                </div>
                <div class="form group">
                  <label>Fecha termino</label>
                  <input class="form-control" type="text" name="fecha_b" placeholder="YYYY-MM-DD">
                <div class="form group">
                <input class="btn btn-primary form-control" type="submit" name="boton1" value="CONSULTAR">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<br><br>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Consulta 2 </h3>
            </div>
            <div class="panel-body">
              <p class="text-justify">En esta consulta solicitamos ingresar una fecha inicial y una final para consultar en la base de datos
              por aquellos recursos ambientales que fueron abiertos en las fechas especicadas. No ingresar datos, significa que
            no será mostrado nada en pantalla  </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="consultas/consulta_2.php" method="post">
                <div class="form group">
                  <label>Fecha inicio</label>
                  <input class="form-control" type="text" name="fecha_a" placeholder="YYYY-MM-DD">
                </div>
                <div class="form group">
                  <label>Fecha termino</label>
                  <input class="form-control" type="text" name="fecha_b" placeholder="YYYY-MM-DD">
                </div>
                <input class="btn btn-primary form-control" type="submit" name="boton2" value="CONSULTAR">
              </form>
            </div>
          </div>
        </div>
      </div>
<br><br>
      <div class="row">
        <div class="col-md-6 text-center">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Consulta 3 </h3>
            </div>
            <div class="panel-body">
              <p class="text-justify">  En esta consulta será mostrada una lista de ONGs que participan en un recurso ambiental contra un proyecto
              a especificar en la sección correspondiente  </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="consultas/consulta_3.php" method="post">
                <label>Nombre del Proyecto</label>
                <input class="form-control" type="text" name="proyecto" placeholder="Proyecto">
                <br>
                <input class="btn btn-primary form-control" type="submit" name="boton3" value="CONSULTAR">
              </form>
            </div>
          </div>
        </div>
      </div>
<br><br>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Consulta 4 </h3>
            </div>
            <div class="panel-body">
              <p class="text-justify">En esta consulta, serán desplegadas aquellas regiones que tengan algún recurso ambiental vigente.
              Se entiende por recurso vigente aquel que esta 'En trámite' o 'Aprobado' </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="consultas/consulta_4.php" method="post">
                <br><br>
                <input class="btn btn-primary form-control" type="submit" name="boton4" value="CONSULTAR">
              </form>
            </div>
          </div>
        </div>
      </div>
<br><br>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Consulta 5 </h3>
            </div>
            <div class="panel-body">
              <p class="text-justify">En esta consulta se muestra todas las ONGs, luego presionando sobre el nombre de estas, se redirige
              a otra pagina en donde es mostrado todas las marchas organizadas por dicha ONG </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="consultas/consulta_5.php" method="post">
                <br><br>
                <input class="btn btn-primary form-control" type="submit" name="boton5" value="CONSULTAR">
              </form>
            </div>
          </div>
        </div>
      </div>
<br><br>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Consulta 6 </h3>
            </div>
            <div class="panel-body">
              <p class="text-justify">En esta cnsulta nos dimos cuenta de que no existen consultas para la fecha actual, por ello todos los botones se muestran como consultas vacias. En caso de usar cualquier año mayor o igual a 2019 y cualquier mes menor a septiembre, si exisitiran consultas asociadas. </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="panel panel-default">
            <div class="panel-body">
              <form role="form" action="consultas/consulta_6.php" method="post">
                <br><br>
                <input class="btn btn-primary form-control" type="submit" name="boton6" value="CONSULTAR">
              </form>
            </div>
          </div>
        </div>
      </div>

<br><br><br>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
