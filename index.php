<?php  include 'template/header.php' ?>
<?php
//añadir la conexion y traer datos de la basde de datos
    include_once "model/conexion.php";
    $sentencia = $bd ->query("SELECT * FROM persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //verificar si impirmen los datos en la pantalla -> print_r($persona);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alertas -->
            <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'faltanDatos'){

            
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong>Todos los campos son requeridos.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
     ?>  



    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Registrado'){

            
    ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Registrado!</strong>Se agregaron los datos
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
     ?>  



<?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Error'){

            
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> vuelve a intentar.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
     ?>  

<?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'datosEditadosConExito'){

            
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>editado!</strong> se actualizaron los datos con exito.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
     ?> 
<?php
               if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'datosEliminados'){

            
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>eliminado!</strong> se eliminaron los datos correctamente.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
     ?> 
            
            <!-- fin alertas -->

            <!--datos que se muetsran en la interfaz-->
            <div class="card">
                <div class="card-header" style="color:khaki; background-color:firebrick;">
                    lista de personas
                </div>
                <div class="p-4">
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre</th>
                                <th scope="col">edad</th>
                                <th scope="col">signo</th>
                                <th scope="col">opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--botones para actualizar y eliminar informacion-->
                            <?php
                               foreach($persona as $dato){
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td scope="row"><?php echo $dato->nombre; ?></td>
                                <td scope="row"><?php echo $dato->edad; ?></td>
                                <td scope="row"><?php echo $dato->signo; ?></td>
                                <td  ><a class="text-dark" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-fill"></i></a></td>
                                <td ><a class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3-fill"></i></a></td>
                            </tr>
                            <?php
                               }
                               ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <!-- datos de ingreso -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" style="background-color:firebrick; ">
                    <strong class="text-khaki">Ingresar datos</strong> 
                </div>
                <form  class="p-4" method="POST" action="registrar.php">
                        <div class="mb-3">
                            <label class="form-label">nombre:</label>
                            <input type="text" class="form-control" name="nombre" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">edad:</label>
                            <input type="number" class="form-control" name="edad" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">signo:</label>
                            <input type="text" class="form-control" name="signo" autofocus required>
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-danger" value="Registrar">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php  include 'template/footer.php' ?>
   