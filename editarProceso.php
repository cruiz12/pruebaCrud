<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $signo = $_POST['signo'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre =?, edad =?, signo =? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=datosEditadosConExito');
    } else {
        header('Location: index.php?mensaje=errorAlEditarLosDatos');
        exit();
    }
    
?>