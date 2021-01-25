<?php 
// incluto el archivo de configuracion con los datos de la base de datos, el ususario y la contraseña
include("configuracion.php");
// Realizo la conexion a la base de datos mandando las variables que hay en el archivo configuracion.php
$conexion = new mysqli($server,$user,$pass,$bd);
// Si la conexion no es exitosa, sacó un anuncio de error y CIERRO comunicacion
if (mysqli_connect_errno()){
    echo "No conectado", mysqli_connect_error();
    exit();
// Si la conexion es exitosa, aviso internamente con un mensaje.
}else{
    $conexion -> query('SET CHARACTER SET UTF8');
    echo 'CONECTADO';
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="node_modules/ionicons/css/ionicons.min.css">
    <link href="https://allfont.es/allfont.css?fonts=roboto-slab-regular" rel="stylesheet" type="text/css" />


    <!-- css.css ES un archivo que creé para dar un color especfico. con Link se le dice al compilador que hay un archivo de estilo-->
    <link rel="stylesheet" href="css/css.css">

  </head>
  <body>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jQuery/dist/jQuery.min.JS"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--BARRA DE NAVEGACION-->
    <nav  class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand">Investigación</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Barra superios  -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item "><a class="nav-link active">Modo administrador activo </a></li>
          <li class="nav-item "><a class="nav-link" href="NuevoUser.php">Crear usuario</a></li>
          <li class="nav-item "><a class="nav-link" href="ingreso.php">Salir</a></li>

        </ul>
      </div>
    </nav>

    
    <!-- TITULO PRINCIPAL DE LA PAGINA  -->
    <div class="jumbotron">
        <h1 class="display-4 titulo">Investigaciones y Publicaciones - Escuela de idiomas</h1>
    </div>

    <!-- CONTENIDO DE LA PAGINA  -->
    <div class="container">
        <div>
            <!-- Se recibe el nombre del usuario logueado por medio GET y se imprime mensaje de bienvenida al usuario  -->
          
            <h1 style="text-align: center;">Bienvenido administrador</h1>
        </div>  
        
        <!-- SE CREA COMO TARJETAS LAS OPCIONES DE EDICION PARA CADA UNA DE LAS 4 BASES DE DATOS  -->
        <div class="row">
            <div class="col-sm-12 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Grupos de investigación</h5>
                  <p class="card-text">Administrar base de datos de los grupos de investigación. </p>
                  <a href="gruposDB.php" class="btn btn-admin btn-primary">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Investigadores</h5>
                  <p class="card-text">Añadir o modificar informacion de los investigadores.</p>
                  <a href="#" class="btn btn-admin btn-primary">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Proyectos</h5>
                  <p class="card-text">Administrar proyectos de la escuela de idiomas.</p>
                  <a href="#" class="btn btn-admin btn-primary">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Publicaciones</h5>
                  <p class="card-text">Modificar datos de la base de datos de publicaciones.</p>
                  <a href="#" class="btn btn-admin btn-primary">Editar</a>
                </div>
              </div>
            </div>
          </div>
    </div>     

    <!-- PIE DE PAGINA  -->
    <footer class="footer-low">
      <div class="container">  
        <div class="row">
        <div class="col-md-6" >
          <address class="text-footer">
            <h5>Desarrollador Web I</h5>
            <p>Andres Felipe Moreno Calle</p>
            <p><span class="ion-ios-telephone-outline"></span>3145438798</p>
            <p>andres.morenoc@udea.edu.co</p>
          </address>
        </div>
        <div class="col-md-6">
          <address class="text-footer">
            <h5>Programador Web II</h5>
            <p>Charles Fabian Ramirez Luna</p>
            <p><span class="ion-ios-telephone-outline"></span>3137659809</p>
            <p>charles.ramirez@udea.edu.co</p>
          </address>
        </div>
        </div>
      </div>

    </footer>
    

  </body>
  
</html>