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

  $user_x = $_POST["USERR"];
  $pass_x = $_POST["PASSS"];
  $bandera_login = 0; //SI ESTÁ EN 0 QUIERE DECIR QUE NO SE HAN LOGUEADO EN LA PAGINA

  $conexion -> query("INSERT INTO admins (USER,PASS) VALUES ('$user_x', '$pass_x')");
  
 
  header("location: NuevoUser.php?create=true");

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
    
    <link rel="stylesheet" href="node_modules/ionicons/css/ionicons.min.css">
    <link href="https://allfont.es/allfont.css?fonts=roboto-slab-regular" rel="stylesheet" type="text/css" />


    <!-- css.css ES un archivo que creé para dar un color especfico. con Link se le dice al compilador que hay un archivo de estilo-->
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/login.css">

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
          <li class="nav-item "><a class="nav-link" href="administrador.php">Modo administrador activo </a></li>
          <li class="nav-item "><a class="nav-link active" href="">Crear usuario</a></li>
          <li class="nav-item "><a class="nav-link" href="ingreso.php">Salir</a></li>

        </ul>
      </div>
    </nav>

    
    <!-- TITULO PRINCIPAL DE LA PAGINA  -->
    <div class="jumbotron">
        <h1 class="display-4 titulo">Investigaciones y Publicaciones - Escuela de idiomas</h1>
    </div>


    <div class="containerr">
      <div class="login-page">
        <!-- Formulario de LOGIN -->
        <div class="form" id="login">
            <!-- Se define el metodo POST DE ENVIO, Ya que son datos privados. Se define en action el envio del formulario a la pagina actual ingreso.php  -->
            <form class="login-form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" target="_SELF">
              <input type="text" id="USER" name="USERR" placeholder="Ingrese nuevo usuario"/>
              <input type="password" id="PASS" name="PASSS" placeholder="Ingrese contraseña"/>

              <button type="submit" name="enviar" value="enviar">Registrar Usuario</button>

            </form>

            <?php
                if(isset($_GET["create"]) && $_GET["create"] == 'true')
                {
                    // Se muestra error si la variable fallo enviada es true 
                    echo "<div style='color:red'>Usuario creado exitosamente </div>";
                }

                
              ?>

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