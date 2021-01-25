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

    <!--<title>Hello, world!</title>-->
  </head>
  <body>
    <!--<h1>Hello, world!</h1>-->

    <!-- Optional JavaScript -->
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
        <ul class="navbar-nav mr-auto">
          <li class="nav-item "><a class="nav-link" href="./index.php">Inicio</a></li>
          <li class="nav-item "><a class="nav-link" href="./nosotros.html">Nosotros</a></li>
          <li class="nav-item "><a class="nav-link" href="./contacto.html">Contacto</a></li>
          <li class="nav-item "><a class="nav-link" href="./ingreso.php">Ingresar</a></li>
          <li class="nav-item active"><a class="nav-link" href="#">Resultados</a></li>

        </ul>
      </div>
    </nav>


    <div class="jumbotron">
      
        <h1 class="display-4 titulo">Investigaciones y Publicaciones - Escuela de idiomas</h1>
        
      </div>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Resultados</li>
        </ol>
      </nav>
      
      <!-- BOTON PARA HACER NUEVA BUSQUEDA -->
        <div style="margin-bottom: 50px; margin-top: 0px">
            <a class="btn btn-outline-secondary" style="float: right;" data-toggle="modal" data-target="#Reconsulta" id=""
                data-toggle="popover">Nueva Búsqueda</a>
        </div>
        <div>
            <h1>Resultados de la búsqueda:</h1>
        <!-- <button type="button" class="btn btn-outline-secondary" 
                data-toggle="modal" data-target="#Investigacion" id="BuscarPublicacion"
                data-toggle="popover" title="Nueva búsqueda.">Investigaciones</button> -->

                
        </div>   
        
        <div class="modal fade" id="Reconsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 600px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal">Publicaciones</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="publicaciones.php" method="get" target="_SELF">
                    <div class="form-group">
                      <label for="busqueda" class="col-form-label">Búsqueda:</label>
                      <input style="width: 300px" type="text" class="form-input" id="busqueda" name="busqueda" placeholder="Autor, título, año o tipo de producción." required>
                      <input type="submit" class="form-btn btn btn-success" value="Buscar"/>
                      
                    </div>                    
                  </form>
                  
                </div>
                
              </div>
            </div>
          </div>
     
    
            
        <div class="tab-pane fadeshow active">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>PRODUCTO</th>
                  <th>TIPO DE PRODUCCIÒN</th>
                  <th>TÍTULO</th>
                  <th style=>AUTOR</th>
                  <th>FUENTE</th>
                  <th>AÑO</th>
                  <th>IDIOMA</th>
                  <th>REFERENCIA APA</th>
                  <th>BASES DE DATOS</th>
                  <th>INGRESADO REPOSITORIO</th>
                  <th>ACCESO ABIERTO</th>
                  <th>INDEXADO</th>
                  <th>ENLACE REPOSITORIO</th>
                </tr>
              </thead>
             <!--Abro Apartado de codigo PHP  -->
            <?php 
            //A la variable ITEM le llevo el dato almacenado en el formulario de INDEX
            $item = $_GET["busqueda"];;
            $item = str_replace("'","''",$item);
            // QUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
            
            //A la variable SEL la cargo con los resultados de las filas que tienen en comun el dato almacenado en ITEM

            $sel = $conexion ->query("SELECT * FROM publicaciones WHERE AUTOR like '%$item%'");
            if($sel->num_rows == 0){
                $sel = $conexion ->query("SELECT * FROM publicaciones WHERE FECHA like '$item' GROUP BY TITULO");
                if($sel->num_rows == 0){
                    $sel = $conexion ->query("SELECT * FROM publicaciones WHERE TITULO like '%$item%' GROUP BY TITULO");
                    if($sel->num_rows == 0){
                        $sel = $conexion ->query("SELECT * FROM publicaciones WHERE TIPO like '%$item%' GROUP BY TITULO");
                      
                  }
                }
            }
            
                       
            ?>
            <?php
            // WHILE que recorre todos los resultados encontrados en la base de datos
            while($fila = $sel -> fetch_assoc()){
                
            ?>
            
              <!-- Creo una tabla para mostrar los resultados de la busqueda -->
              <tbody>
                <tr>
                  <!-- Empiezo a recorrer la primera fila de resultados y a mostrar en pantalla las columnas TIPO Y TITULO -->
                  <td><?php echo $fila['PRODUCTO'];?></td> 
                  <td><?php echo $fila['TIPO'];?></td> 
                  <td><?php echo $fila['TITULO'];?></td>
                  <td>
                    <?php    
                    // Se guarda TITULO de la presente fila
                    $title = $fila['TITULO'];
                    $title = str_replace("'","''",$title);
                    
                    // Se consulta el presente TITULO para obtener todas las filas que comparten ese mismo titulo
                    $sel2 = $conexion ->query("SELECT * FROM publicaciones WHERE TITULO like '$title'");
                    

                        // $row_cnt = $sel2->num_rows;
                        // Ahora, recorremos con el WHILW todos los resultados obtenidos para el titulo buscado en el paso anterior

                        //if($sel2->num_rows > 0){
                          
                        
                         
                        while($title2 = $sel2 -> fetch_assoc()){

                            
                            // SI TITULO del while exterior es igual a la fila dada por el WHILE interno, entonces imprimo el autor
                            //if($title  == $title2['TITULO']){
                            ?>
                                <!-- IMPRIMO EL AUTOR QUE ESCRIBIO EL TITULO, CUANDO SON VARIOS, EL WHILW PERMITE MOSTRARLOS TODOS -->
                                <?php echo $title2['AUTOR'];?><br><br>
                            

                        <?php ?>

                        <?php   } ?>
                              
                  </td>
                  <!-- CONTINUO, mostrando en la tabla los datos -->
                  <td><?php echo $fila['FUENTE'];?></td>
                  <td><?php echo $fila['FECHA'];?></td>
                  <td><?php echo $fila['IDIOMA'];?></td>
                  <td><?php echo $fila['REFERENCIA'];?></td>
                  <td><?php echo $fila['DATOS'];?></td>
                  <td><?php echo $fila['INGRESADO'];?></td>
                  <td><?php echo $fila['ACCESO'];?></td>
                  <td><?php echo $fila['INDEXADO'];?></td>
                  <td><a href="<?php echo $fila['ENLACE'];?>" target="_blank"><?php echo $fila['ENLACE'];?></a></td>
                </tr>
                <?php } ?>  
              </tbody>
            </table>
          </div>
        </div>




    
    
  <!-- pie de pagina  -->
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
