<?php
if(!isset($_POST['codigo'])){
    header("locatio: index.php?mensaje=Error");

}
include "model/conexion.php";
    $codigo = $_GET["codigo"];

$sentencia = $bd->prepare("DELETE FROM persona WHERE codigo=?;");
$resultado = $sentencia->execute([$codigo]);

if ($resultado === TRUE) {
    header("location: index.php?mensaje=datosEliminados");
}else{
    header("location: index.php?mensaje=Error");
}
?>