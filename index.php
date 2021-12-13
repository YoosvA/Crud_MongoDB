<?php
session_start();
require_once "clases/Crud.php";
$obj = new Crud();
$datos = $obj->mostrar();

// echo "<pre>";
//   print_r($datos);
// echo "</pre>";  

///const
$crud = new Crud();
$datos = $crud->mostrar();
$mensaje = @$crud->mensajesCrud($_SESSION['mensaje_crud']);
unset($_SESSION['mensaje_crud']);

?>

<?php require_once "header.php"; ?>

<br>
<br>
<br>
<br>
<div class="jumbotron jumbotron-fluid bg-index">
    <div class="container border border-warning" style="background-color: rgba(255, 255, 255, 0.6);">
        <br>
        <h1 class="display-4"><b>
                <center>CRUD con PHP y Mongo</center>
            </b></h1>
        <br>
        <p class="lead">
            <a href="agregar.php" class="btn btn-outline-success"> Agregar persona <svg
                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="10" height="10" viewBox="0 0 172 172"
                    style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#ffffff">
                            <path
                                d="M28.66667,28.66667c-7.88333,0 -14.33333,6.45 -14.33333,14.33333v86c0,7.88333 6.45,14.33333 14.33333,14.33333h57.90723c-0.33683,-2.3435 -0.57389,-4.73 -0.57389,-7.16667c0,-2.43667 0.23706,-4.82317 0.57389,-7.16667h-57.90723v-71.66667h114.66667v29.24056c5.06683,0.72383 9.87567,2.20386 14.33333,4.3252v-33.56576c0,-7.88333 -6.45,-14.33333 -14.33333,-14.33333h-57.33333l-14.33333,-14.33333zM136.22265,100.44531c-9.14914,0.00269 -18.29504,3.50697 -25.29329,10.49805c-6.99467,6.99467 -10.52604,16.12029 -10.52604,25.27929c0,9.159 3.53137,18.2918 10.52604,25.2793c13.98933,13.98933 36.58325,13.98933 50.57259,0c13.98933,-13.98933 13.98933,-36.59726 0,-50.58659c-6.9875,-6.98033 -16.13015,-10.47274 -25.2793,-10.47005zM129.08399,114.68066h14.33333v14.33333h14.33333v14.33333h-14.33333v14.33333h-14.33333v-14.33333h-14.33333v-14.33333h14.33333z">
                            </path>
                        </g>
                    </g>
                </svg></a>
            <hr>


        <div class="table.responsive">
            <table class="table table-hover table-sm table-bordered">
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
                    <th>
                        <center>Editar</center>
                    </th>
                    <th>
                        <center>Eliminar</center>
                    </th>
                </thead>

                <tbody>



                    <?php foreach ($datos as $key) :

            $idMongo = new MongoDB\BSON\ObjectId($key->_id);
          ?>



                    <tr>
                        <td>
                            <center><?php echo $key->nombre; ?></center>
                        </td>
                        <td>
                            <center><?php echo $key->paterno; ?></center>
                        </td>
                        <td>
                            <center><?php echo $key->materno; ?></center>
                        </td>
                        <td>
                            <center><?php echo $key->fecha_nacimiento; ?></center>
                        </td>
                        <td>

                            <form action="actualizar.php" method="POST">
                                <input type="text" name="idActualizar" hidden value="<?php echo $idMongo ?>">
                                <center><button class="btn btn-warning">Editar</button></center>

                            </form>
                        </td>




                        <td>


                            <form action="eliminar.php" method="POST">
                                <input type="text" name="_id" hidden value="<?php echo $idMongo ?>">
                                <center><button class="btn btn-danger">Eliminar </button></center>
                            </form>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
            <br>
        </div>

        </p>
    </div>
</div>

<?php require_once "scripts.php"; ?>

<script>
    let mensaje = <?php echo $mensaje;?>;
    console.log(mensaje);
</script>