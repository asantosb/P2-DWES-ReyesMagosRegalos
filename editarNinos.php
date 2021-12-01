<?php

require_once('Ninos.php');
$modeloNinos = new Ninos();

$id = 0;
if(!empty($_POST)){
    $datosNino = [];
    $datosNino['id_nino'] = (int)filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $datosNino['nombre'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $datosNino['apellido'] = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
    $datosNino['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
    $datosNino['bueno_malo'] = $_POST['bueno_malo'];

    try {
        $id = $modeloNinos->update($datosNino);
        if ((int) $id) {
            $mensajeOK = 'El dato del niño se ha actualizado correctamente.';
            header('Refresh: 1; URL=indexNinos.php');
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
        $id = $datosNino['id_nino'];
    }

}else if(!empty($_GET)){
    $id = (int) filter_input(INPUT_GET, 'id');
}
$nino = $modeloNinos->select($id);
if($nino == null){
    header('Location:indexNinos.php?msg=66');
}

?>
<!doctype html>
<html lang="es">
    <head>
       <?php echo Utils::getHead('Editar Niño'); ?>
    </head>
    <body>
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
            <div class="row ">
                <div class="col-12 col-md-4 offset-md-4 mt-4">
                    <h1>Editar Niño</h1>
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
                <div class="col-12 col-md-4 offset-md-4">
                    <form action="editarNinos.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nino['nombre']; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $nino['apellido']; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="YYYY/MM/DD" value="<?php echo $nino['fecha_nacimiento']; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="bueno_malo">Bueno/Malo:</label>
                            <input type="text" class="form-control" id="bueno_malo" name="bueno_malo" placeholder="Sí/No"  value="<?php echo $nino['bueno_malo']; ?>" required/>
                        </div>
                        <div class="col-12 text-center align-items-center mt-2">
                        <input type="hidden" name="id" value="<?php echo $nino['id_nino']; ?>"/>
                        <a href="indexNinos.php" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                        <button type="submit" class="btn btn-success text-warning"><i class="bi bi-plus"></i> Editar</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>