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


$user_x = $_POST["USER"];
$pass_x = $_POST["PASS"];
$bandera_login = 0; //SI ESTÁ EN 0 QUIERE DECIR QUE NO SE HAN LOGUEADO EN LA PAGINA

$sel = $conexion ->query("SELECT * FROM admins WHERE USER = '$user_x' AND PASS = '$pass_x'");
// SI LOS DATOS DE LOGIN SON INCORRECTOS, SE REGRESA A LA PAGINA DE ingreso.php
if($sel->num_rows == 0){
    
    sleep(4);//seconds to wait..
    echo "Please Log In First";
    header("location: ingreso.php");
}
else{
    echo "holaaaaaaaaaaaaaa";
}
?>

