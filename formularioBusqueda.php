<?php

require_once('Busqueda.php');
$modeloBusqueda = new Busqueda();

$id = $_POST['id_nino'];
$rowsNinos = $modeloBusqueda->selectRegalo($id);
$rowsRegalos = $modeloBusqueda->selectAllRegalos();

if (($rowsNinos->num_rows == 0) && ($rowsRegalos->num_rows == 0)) {
    $mensajeKO = 'No hay ningún dato guardado.';
    header('Refresh: 1; URL=indexBusqueda.php');
}

if (isset($_POST['btnAnadirRegalo'])) {
    $id_regalo = $_POST['id_regalo'];
    $id_nino = $_POST['id_nino'];

    try {
        $pedir = $modeloBusqueda->insertPedir($id_regalo, $id_nino);
        if ((int) $pedir) {
            $mensajeOK = 'Se ha dado de alta correctamente.';
            header('Refresh: 0.5; URL=indexBusqueda.php');
        } else {
            $mensajeKO = "Este regalo ya le ha sido añadido al niño";
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
    }
}

?>
<!doctype html>
<html lang="es">

<head>
    <?php echo Utils::getHead('Regalos Pedidos'); ?>
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
                <h1>Listado de Regalos</h1>
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
            <?php if ((int)$rowsNinos->num_rows) { ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Regalo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $rowsNinos->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id_juguete']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php if ((int)$rowsRegalos->num_rows) { ?>
                <div class="col-12 col-md-8 offset-md-2 mt-4">
                    <form action='formularioBusqueda.php' method='POST' name='formulario' id='formulario'>
                        <p>Elige un regalo:
                            <select name='id_regalo'>
                                <?php while ($row = $rowsRegalos->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_juguete'] ?>"><?php echo $row['id_juguete'] . "-" . $row['nombre']; ?></option>
                        </p>
                    <?php } ?>
                    </select>
                    <input type="hidden" name="id_nino" value="<?php echo $id ?>" />
                    <p><a href="indexBusqueda.php" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                        <input type="submit" class="btn btn-danger text-warning" value="Añadir Regalo" name="btnAnadirRegalo">
                    </p>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>