<?php 
//mostrar datos en la pantalla print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["nombre"]) || empty($_POST["edad"]) || empty($_POST["signo"])){
    header('location: index.php?mensaje=faltanDatos');
    exit();

}
include_once 'model/conexion.php';

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$signo = $_POST["signo"];
$oculto = $_POST["oculto"];

$sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,signo) VALUES(?,?,?)");
$resultado = $sentencia->execute([$nombre,$edad,$signo]);

if($resultado === TRUE){
    header('location: index.php?mensaje=registrado');
}else{
    header('location: index.php?mensaje=Error');
    exit();
}
?>
   