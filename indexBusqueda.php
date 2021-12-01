<?php

require_once('Busqueda.php');
$modeloBusqueda = new Busqueda();
$rows = $modeloBusqueda->selectAll();

if ($rows->num_rows == 0) {
    $mensajeKO = 'No hay ningún dato de niño guardado.';
}

?>
<!doctype html>
<html lang="es">

<head>
    <?php echo Utils::getHead('Formulario de Búsqueda'); ?>
</head>

<body class="fondo-reyesmagos">
    <header>
        <div id="my-row-01" class="my-row bg-success">
            <div class="container">
                <div class="row text-center justify-content-center align-items-center">
                    <div class="col-12">
                        <h2 class="text-warning">Base de Datos - Reyes Magos</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row text-center align-items-center">
            <div class="col-12 col-md-8 offset-md-2 mt-4">
                <h1>Formulario de Búsqueda</h1>
                <?php if (isset($mensajeOK)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $mensajeOK; ?>
                    </div>
                <?php } else if (isset($mensajeKO)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensajeKO; ?>
                    </div>
                <?php } ?>
            </div>
            <?php if ((int)$rows->num_rows) { ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                <form action='formularioBusqueda.php' method='POST' name='formulario' id='formulario'>
                    <p>Elige un niño:
                        <select name="id_nino">
                        <?php while ($row = $rows->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id_nino']?>"><?php echo $row['id_nino']."-".$row['nombre']; ?></option>
                    </p>
                    <?php } ?>
                    </select>
                    <input type="submit" class="btn btn-danger text-warning" value="Ir" name="btnEnviar">
                </form>
                <a href="index.html" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>