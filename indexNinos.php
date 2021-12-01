<?php


require_once('Ninos.php');
$modeloNinos = new Ninos();
$rows = $modeloNinos->selectAll();

if ($rows->num_rows == 0) {
    $mensajeKO = 'No hay ningún dato de niño guardado.';
}

if (!empty($_GET)) {
    $idMensaje = (int) filter_input(INPUT_GET, 'msg');
    if ($idMensaje == 77) {
        $mensajeOK = 'El niño ha sido borrado correctamente.';
    } else if ($idMensaje == 66) {
        $mensajeKO = 'Lo sentimos, pero ha intentado acceder a un niño que no existe.';
    }
}

?>
<!doctype html>
<html lang="es">

<head>
<?php echo Utils::getHead('Datos de los Niños'); ?>
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
                <h1>Datos de los niños</h1>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellido</th>
                                <th class="text-center">Fecha de Nacimiento</th>
                                <th class="text-center">Bueno(si/no)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $rows->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id_nino']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apellido']; ?></td>
                                    <td><?php echo $row['fecha_nacimiento'] = date("d/m/Y", strtotime($row['fecha_nacimiento'])); ?></td>
                                    <td><?php echo $row['bueno_malo']; ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="editarNinos.php?id=<?php echo $row['id_nino']; ?>" class="btn btn-success"><i class="bi bi-pencil"></i> Editar</a>
                                            <a href="borrarNinos.php?id=<?php echo $row['id_nino']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Borrar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="index.html" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                    <a href="crearNinos.php" class="btn btn-success text-warning float-right"><i class="bi bi-plus"></i> Alta Niño</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>