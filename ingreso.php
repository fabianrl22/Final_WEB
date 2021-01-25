<?php
include("configuracion.php");
// Si el usuario ya envió los datos de login, se entra aqui para verificar si son correctos
if(isset($_POST["enviar"]))
{
  // aqui haces las validaciones del usuario y contraseña
  
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

  $user_x = $_POST["USER"];
  $pass_x = $_POST["PASS"];
  $bandera_login = 0; //SI ESTÁ EN 0 QUIERE DECIR QUE NO SE HAN LOGUEADO EN LA PAGINA

  $sel = $conexion ->query("SELECT * FROM admins WHERE USER = '$user_x' AND PASS = '$pass_x'");
  
  // SI LOS DATOS DE LOGIN SON INCORRECTOS, Se redirige a esta misma pagina actual.
  if($sel->num_rows == 0){
      
      sleep(3);//seconds to wait..
      //Se redirige a esta misma pagina y se manda en la url la variable fallo, indicando que el login falló, para que se muestra alli un mensaje de error de login
      header("location: ingreso.php?fallo=true");
  }
  else{ //Si el login fue correcto se redirige a la pagina administrador.php Y SE ENVIA POR URL el nombre del usuario logueado
    sleep(3);
      header("location: administrador.php?USER=$user_x");
  }

	// si todo ha ido bien redireccionas, por lo que al hacer volver (back)
	// en el navegador no te indica que si quieres reenviar el formulario.
	return;
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
    <link href="https://allfont.es/allfont.css?fonts=roboto-slab-regular" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="node_modules/ionicons/css/ionicons.min.css">


    <!-- css.css ES un archivo que creé para dar un color especfico. con Link se le dice al compilador que hay un archivo de estilo-->
    
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/css.css">

  </head>
  <body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jQuery/dist/jQuery.min.JS"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--BARRA DE NAVEGACION-->
    <nav  class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand">Investigación</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item "><a class="nav-link" href="./index.php">Inicio</a></li>
          <li class="nav-item "><a class="nav-link" href="nosotros.html">Nosotros</a></li>
          <li class="nav-item "><a class="nav-link" href="./contacto.html">Contacto</a></li>
          <li class="nav-item active"><a class="nav-link" href="#">Ingresar</a></li>

        </ul>
      </div>
    </nav>

    <!-- Seccion con titulo principal de la pagina  -->
    <div class="jumbotron">
        <h1 class="display-4 titulo">Investigaciones y Publicaciones - Escuela de idiomas</h1> 
      </div>
      
    <!-- Container que contiene el formulario de LOGIN  -->
    <div class="containerr">
      <div class="login-page">
        <!-- Formulario de LOGIN -->
        <div class="form" id="login">
            <!-- Se define el metodo POST DE ENVIO, Ya que son datos privados. Se define en action el envio del formulario a la pagina actual ingreso.php  -->
            <form class="login-form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" target="_SELF">
              <input type="text" id="USER" name="USER" placeholder="Usuario"/>
              <input type="password" id="PASS" name="PASS" placeholder="Contraseña"/>

              <!-- Esta seccion obtiene la variable "fallo" enviada por la URL cuando el login es incorrecto y se redirige a la actual pagina ingreso.php desde administrador.php  -->
              <?php
                if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                {
                    // Se muestra error si la variable fallo enviada es true 
                    echo "<div style='color:red'>Usuario o contraseña invalido </div>";
                }

                
              ?>
              <button type="submit" name="enviar" value="enviar">Ingresar</button>
              <p>Nota: Debes ser administrador y loguearte para crear nuevos usuarios.</p>
            </form>

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
