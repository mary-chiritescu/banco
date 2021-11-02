<?php

session_start();
$servername= "localhost";
$database="banco";
$username="root";
$password="";

$link = mysqli_connect($servername,$username,$password,$database);
 
// comprobar conexion
if(!$link){
    die("ERROR:  " . mysqli_connect_error());
}
 
// Obtener datos
$cuen = $_GET["login"];
$_SESSION["CUENTA"]=$cuen;
$pin = $_GET["password"];

 
// Creamos cadena SQL y la ejecutamos
$consulta = "SELECT * from  USUARIOS  WHERE cuenta=$cuen AND pin=$pin";
$result=mysqli_query($link, $consulta);
$filas=mysqli_num_rows($result);

if($filas>0){
    //header ("Location: index.php");

    $cantid="SELECT saldo FROM USUARIOS where cuenta='$cuen";

    $res=$conexion->query($cantid);
    $row=$res->fetch_assoc();
    $cantidad=$row["cantidad"];
    $_SESSION["cantidad"]=$cantidad;
} else{
    header("Location: banco.html");
    echo "ERROR:  $consulta. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

