<?php require_once "header.php"; ?>
<br>
<br>

<div class="jumbotron jumbotron-fluid bg-index">
    <div class="container border border-warning" style="background-color: rgba(255, 255, 255, 0.6);">
        <br>

        <p><a href="index.php" class="btn btn-outline-dark">regresar</a></p>
        <h1 class="display-4"><b>
                <center>Agregar Datos</center>
            </b></h1>
        <br>
        <form action="procesos/agregar.php" method="POST">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input required="" type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Apellido Paterno:</label>
                <input required="" type="text" class="form-control" name="paterno">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Apellido Materno:</label>
                <input required="" type="text" class="form-control" name="materno">
            </div>


            <div class="mb-3">
                <label for="nombre" class="form-label">Fecha de Nacimiento:</label>
                <input required="" type="date" class="form-control" name="fecha_nacimiento">
            </div>

            <br>
            <button class="btn" style="background-color: blueviolet; color: white;">Agregar</button>
        </form>
        <br>
    </div>
</div>

<?php require_once "scripts.php"; ?>