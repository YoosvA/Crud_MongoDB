<?php 
  require_once  "clases/Crud.php";
  $crud = new Crud();
  $id = $_POST['idActualizar']; 
  $datos = $crud->obtenerDocumento($id);
  $idMongo = new MongoDB\BSON\ObjectId($datos->_id);

?>


<?php require_once "header.php"; ?>

<div class="jumbotron jumbotron-fluid bg-index">
    <div class="container border border-warning" style="background-color: rgba(255, 255, 255, 0.6);">

<!-- <div class="jumbotron jumbotron-fluid" style="background: white">
    <div class="container" style="background-color: rgba(255, 255, 255, 0.6);"> -->


        <p><a href="index.php" class="btn btn-outline-dark">regresar</a></p>
        <h1 class="display-4"><b>Actualizar un registro</b></h1>

        <form action="procesos/actualizar.php" method="POST">

            <input type="text" name="idActualizar" value="<?php  echo $idMongo; ?>" hidden>

            <br>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input required type="text" class="form-control" name="nombre" value="<?php echo $datos->nombre;?>">
            </div>

            <div class="mb-3">
                <label for="paterno" class="form-label">Apellido Paterno:</label>
                <input required type="text" class="form-control" name="paterno" value="<?php echo $datos->paterno;?>"
                    </div>

                <div class="mb-3">
                    <label for="materno" class="form-label">Apellido Materno:</label>
                    <input required type="text" class="form-control" name="materno"
                        value="<?php echo $datos->materno; ?>" </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" value="<?php echo $datos->fecha_nacimiento;?>"
                            class="form-control" required>
                    </div>
                    <br>

                    <button class="btn btn-outline-warning">Actualizar</button>


        </form>
    </div>
</div>

<?php require_once "scripts.php"; ?>