<?php 
  require_once "clases/Crud.php";
  $crud = new Crud();
  $id = $_POST ['_id'];

  $datos = $crud->obtenerDocumento($id);
  $idMongo = new MongoDB\BSON\ObjectId($datos->_id);

?>


<?php require_once "header.php"; ?>
<br>
<br>
<div class="jumbotron jumbotron-fluid bg-index">
    <div class="container border border-warning" style="background-color: rgba(255, 255, 255, 0.6);">
        <br>
        <p><a href="index.php" class="btn btn-outline-dark">regresar</a></p>
        <h1 class="display-4"><b>Eliminar un registro</b></h1>
        <p class="lead">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Advertencia </h4>
            <p>
                Estas seguro de eliminar este registro!!
            <table class="table table-hover table-sm table-bordered table-secondary">
                <thead>
                    <th>
                        <center>Nombre</center>
                    </th>
                    <th>
                        <center>Apellido Paterno</center>
                    </th>
                    <th>
                        <center>Apellido Materno</center>
                    </th>
                    <th>
                        <center>Fecha de nacimiento</center>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <center><?php echo $datos->nombre ?></center>
                        </td>
                        <td>
                            <center><?php echo $datos->paterno ?></center>
                        </td>
                        <td>
                            <center><?php echo $datos->materno ?></center>
                        </td>
                        <td>
                            <center><?php echo $datos->fecha_nacimiento ?></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            </p>
            <hr>
            <p class="mb-0">
            <form action="procesos/eliminar.php" method="POST">
                <input type="text" hidden name="idEliminar" value="<?php echo $idMongo; ?>">
                <button class="btn btn-danger">Eliminar</button>
            </form>
            </p>
            <br>
        </div>
        <br>
        </p>
    </div>
</div>

<?php require_once "scripts.php"; ?>