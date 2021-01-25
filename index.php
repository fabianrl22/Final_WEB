<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- /*añadir las librerias. Deben estar en Node_Modules preferiblemente*/ -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/ionicons/css/ionicons.min.css">

    <!-- Se importa la tabla de estilos css -->
    <link rel="stylesheet" href="css/css.css">

  </head>
  <body>
 

 
    <!--BARRA DE NAVEGACION-->
    <nav  class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <!-- Titulo para la barra de navegacion  -->
      <a class="navbar-brand" >Investigación</a>
     
      <!-- Se crean las pestañas de navegacion con la lista "ul" dentro de la division "div" -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!-- Se activa "inicio" indicando que la pagina actual es "inicio" -->
          <li class="nav-item active"><a class="nav-link" href="#">Inicio</a></li>
          <!-- Se crean las demas pestañas referenciando con "href" los enlaces de redireccion. -->
          <li class="nav-item "><a class="nav-link" href="nosotros.html">Nosotros</a></li>
          <li class="nav-item "><a class="nav-link" href="contacto.html">Contacto</a></li>
          <li class="nav-item "><a class="nav-link" href="ingreso.php">Ingresar</a></li>
        </ul>
      </div>
    </nav>

    
    

    <!-- Añadir un recuadro colorido en la parte inicial de la pantalla -->
    <div class="jumbotron">
      <h1 class="display-4 titulo">
        Investigaciones y Publicaciones - Escuela de idiomas
      </h1>
    </div>

    <!-- CUERPO DEL TRABAJO -->
    <div class="container">

      <!-- EL BREADCRUMB Crea la barra de ubicacion jerarquica -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Inicio</li>
        </ol>
      </nav>
    
    
    <!-- CARRUSELLLLLL DE IMAGENES -->
    <div id="carouselControls" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <!-- Se define el slide que aparecerá por defecto de primero  -->
        <li data-target="#carouselControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselControls" data-slide-to="1"></li>
        <li data-target="#carouselControls" data-slide-to="2"></li>
      </ol>
      <!-- Seccion para definir las imagenes de cada transicion -->
      <div class="carousel-inner">
        <!-- Para cada slide se importa la imagen y se define la transicion cada 4 segundos (4000ms) -->
        <div class="carousel-item active" data-interval="4000">
          <img class="d-block w-100" style="height: 400px;" src="images/Bienvenido2.jpg" alt="Primer slide">
        </div>
        <div class="carousel-item" data-interval="4000">
          <img class="d-block w-100" style="height: 400px;" src="images/Banner.jpg" alt="Segundo slide">
        </div>  
        <div class="carousel-item" data-interval="4000">
          <img class="d-block w-100" style="height: 400px;" src="images/Aerea2.jpg" alt="Tercer slide">
        </div>
      </div>
      <!-- Se define el boton de navegacion en el carrusel hacia la izquierda -->
      <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <!-- Se define el boton de navegacion del carrusel hacia la derecha -->
      <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    


<!-- ---------------------------------------------------------------------------------------------------------------------  -->
      <!-- Se crea un container para la barra de busqueda -->
      <div class="container cuerpo">
      <div class="col-md-12">
        <!-- Se crea una tarjeta de bootstrap para implementar en ella la barra de busqueda  -->
        <div class="card text-center">
          <div class="card-body">
            <!-- Se implemente un tooltip(informacion adicional, cuando se para el mouse en algun sitio) desde data-toggler hasta title -->
            <h3 class="card-title text-white" data-toggle="tooltip" data-placement="top" style="margin-top: 50px;"
            title="Reliza una busqueda.">Tipo de búsqueda</h3>
            <!-- -----------------------------------------------------------------  --------------------------------------------------------- -->
            <!-- Se crean los dos botones de busqueda "investigaciones" y "Publicaciones"  -->
            <div class="d-flex">
              <div class="col-md-6">
                 <!-- En el boton, se implemente un POPOVER que es similar al tooltip -->
                <button type="button" class="btn-success btn" style="margin-right: 20px;" 
                  data-toggle="modal" data-target="#Investigacion" id="BuscarInvestigacion"
                  data-toggle="popover" title="Busqueda por investigación.">Investigaciones</button>
                </div>         
              <div class="d-flex">
                <div class="col-md-6">
                   <!-- En el boton, se implemente un POPOVER que es similar al tooltip -->
                  <button type="button" class="btn-success btn" style="margin-left: 20px;"
                    data-toggle="modal" data-target="#Publicacion" id="BuscarPublicacion"
                    data-toggle="popover" title="Busqueda por Publicacion.">Publicaciones
                  </button>
                </div>                    
              </div>
            </div>
          </div>  
          </div>
        
          <!-- Se implementa MODAL para el boton buscar por Investigaciones ---------------------  -->
          <div class="modal fade" id="Investigacion" tabindex="-1" role="dialog" aria-labelledby="exampleModal" 
          aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 340px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <!-- TITULO PARA EL MODAL QUE SE ABRE  -->
                  <h5 class="modal-title" id="exampleModal">Filtro de Investigaciones</h5>
                  <!-- BOTON PARA CERRAR MODAL MANUALMENTE -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <!-- Se define el cuerpo del moda, con las opciones, filtros de busqueda  -->
                <div class="modal-body" style="width: 310px;">
                  <form action="investigaciones.php" method="get" target="_SELF">
                    <div class="form-group">
                      <!-- Busqueda por investigaciones con su respectivo campo input  -->
                      <label for="busqueda1" class="col-form-label">Investigadores:</label><br>
                      <input style="width: 280px" type="text" class="form-input" id="busqueda1" name="busqueda1" 
                      placeholder="Investigador o nombre del proyecto.">
                      <br>
                      <hr>
                      <!-- Busqueda por Proyectos con su campo input y adicionalmente el boton para realizar la busqueda de "todos" -->
                      <label for="busqueda2" class="col-form-label">Proyectos:</label>
                      <!-- En este boton se implementa de tipo submit para que funcione independiente y en "formaction" redirija a una pagina individual de los demas submit  -->
                      <button class="btn btn-outline-secondary active" style="float: right; height: 30px; margin-top:8px;"
                          type="submit" formaction="todos_proyectos.php" formmethod="POST" >Todos
                      </button><br>
                      <input style="width: 280px" type="text" class="form-input" id="busqueda2" name="busqueda2" 
                      placeholder="Nombre del proyecto o año.">
                      <br>
                      <hr>
                      <!-- Se crea el campo de busqueda por grupos y se realiza la misma implementacion anterior, para busqueda por "todos" con su respectivo boton  -->
                      <label for="busqueda3" class="col-form-label">Grupos:</label>
                      <button type="submit" class="btn btn-outline-secondary active" style="float: right; height: 30px; margin-top:8px"
                      formaction="todos_grupos.php" formmethod="POST">Todos</button><br>
                      <input style="width: 280px" type="text" class="form-input" id="busqueda3" name="busqueda3" 
                      placeholder="Nombre del grupo."><br><br>
                      <!-- "Boton" tipo input para realizar el SUBMIT para los campos de busqueda, excepto por los botones "todos" -->
                      <input type="submit" class="form-btn btn btn-success" style="width: 280px;" value="Buscar"/>
                    </div>                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        
        <!-- --------------------------------------------------------- -->
        <!-- ---------------------------------------------------------------------------------------------------------------  -->

        <!-- -------------------------------------------------------------------------------------------------------------------  -->
        <!-- Se implementa MODAL para el boton buscar por publicaciones ---------------------  -->       
          <div class="modal fade" id="Publicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 600px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModal">Publicaciones</h5>
                  <!-- BOTON PARA CERRAR MODAL MANUEALMENTE -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <!-- Cuerpo y opciones de busqueda del Modal  -->
                <div class="modal-body">
                  <form action="publicaciones.php" method="get" target="_SELF">
                    <div class="form-group">
                      <label for="busqueda" class="col-form-label">Busqueda:</label>
                      <input style="width: 300px" type="text" class="form-input" id="busqueda" name="busqueda" placeholder="Autor, título, año o tipo de producción." required>
                      <input type="submit" class="form-btn btn btn-success" value="Buscar"/>
                    </div>                    
                  </form>
                  
                </div>
                
              </div>
            </div>
          </div>
      </div>
      
      </div>
        <!-- --------------------------------------------------------- -->
        <!-- --------------------------------------------------------------------------------------------------------  -->

    <!-- FOOTER ES EL PIE DE PAGINA -->
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jQuery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="app.js"></script>
   
  </body>
  
</html>