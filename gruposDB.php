<?php
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

// Si el usuario ya envió los datos de login, se entra aqui para verificar si son correctos
if(isset($_POST["enviar"]))
{
  $idd = $_POST["Id"];
  $grupo = $_POST["Grupo"];
  $coord = $_POST["Coordinador"];
  $correo = $_POST["Correo"];
  $codigo = $_POST["Codigo"];
  $clasi = $_POST["Clasificacion"];
  $red = $_POST["Red"];
  $semi = $_POST["Semillero"];

  echo "sdhfasddddddddddddd";

  $sell = $conexion ->query("UPDATE grupos_inv SET GRUPO='$grupo', COORDINADOR='$coord', CORREO = '$correo', CLASIFICACION='$clasi', RED='$red', SEMILLERO='$semi' WHERE ID = '$idd' ");
  
  if ($sell === TRUE) {
    echo "Record updated successfully";
    echo "$semi";
  } else {
    echo "Error updating record: " ;
  }
  

	// si todo ha ido bien redireccionas, por lo que al hacer volver (back)
	// en el navegador no te indica que si quieres reenviar el formulario.
return ;
} ?>

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
          <li class="nav-item "><a class="nav-link" href="ingreso.php">Volver</a></li>

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
            <h1 style="text-align: center;">Panel de administracion, Grupos</h1>
        </div>  
    </div>
        <div class="tab-pane fadeshow active">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>NOMBRE DEL GRUPO</th>
                        <th>COORDINADOR</th>
                        <th>CORREO</th>
                        <th>CÓDIGO COLCIENCIAS</th>
                        <th>CLASIFICACIÓN COLCIENCIAS</th>
                        <th>RED O CONSORCIO</th>
                        <th>SEMILLEROS</th>
                        <th>ACCIÓN</th>
                      </tr>
                    </thead>
                    <!-- ABRO PHP PARA HACER EL QUERY E IMPRIMIR -->
                    <?php 
                        // COMO ' ES UN CARACTER DE ESCAPE PARA SQL, ENTONCES LO REEMPLAZO POR ''
                        
                        $sel = $conexion ->query("SELECT * FROM grupos_inv");
                        // sI HAY RESULTADOS IMPRIMO LA TABLA CON LOS DATOS CONSULTADOS
                        if($sel->num_rows > 0){
                            while($fila = $sel -> fetch_assoc()){
                                ?>
                                  <!-- Creo una tabla para mostrar los resultados de la busqueda -->

                                  <form class="login-form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" target="_SELF">
                                  <tbody>

                                    <tr>
                                      <!-- Empiezo a recorrer la primera fila de resultados y a mostrar en pantalla las columnas TIPO Y TITULO -->
                                      
                                      <td><input style="width: 20px;" type="hidden" id="Id"  name="Id" value="<?php echo $fila['ID'];?>"></td>
                                      <td><input type="text" name="<?php echo $fila['GRUPO'];?>" id="Grupo" value="<?php echo $fila['GRUPO'];?>"></td>
                                      <td><input type="text" name="Coordinador" id="Coordinador" value="<?php echo $fila['COORDINADOR'];?>"></td>
                                      <td><input type="text" name="Correo" id="Correo" value="<?php echo $fila['CORREO'];?>"></td>
                                      <td><input type="text" name="Codigo" id="Codigo" value="<?php echo $fila['CODIGO'];?>"></td>
                                      <td><input type="text" name="Clasificacion" id="Clasificacion" value="<?php echo $fila['CLASIFICACION'];?>"></td>
                                      <td><input type="text" name="Red" id="Red" value="<?php echo $fila['RED'];?>"></td> 
                                      <td><input type="text" name="Semillero" id="Semillero" value="<?php echo $fila['SEMILLERO'];?>"></td> 
                                      <td>
                                      <button onclick="funcion('<?php echo $fila['GRUPO'];?>')"> enviar </button>
                                      
                                      </td>
                                      
                                    </tr>
                                      
                                    <?php } ?>  
                                   </tbody>
                                    </form>
                        <!-- SI NO HAY RESULTADOS SEGUN LO CONSULTADO, SE LE INDICA AL USUARIO -->
                        <?php } else{ ?>
                            <h2 style="color: red;">No se encontró ningun resultado.</h2>
                        <?php } ?>
                  </table>
                </div>
            </div>
      <script>
        function funcion(valor){
          product = document.getElementsByName(valor)[0].value;
          alert(product);

        }
      </script>

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