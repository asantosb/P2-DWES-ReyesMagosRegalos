<?php

require_once('Ninos.php');
$modeloNinos = new Ninos();

if(!empty($_POST)){
    $datosNino = [];
    $datosNino['nombre'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $datosNino['apellido'] = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
    $datosNino['fecha_nacimiento']= date("Y/m/d", strtotime($_POST['fecha_nacimiento']));
    $datosNino['bueno_malo'] = $_POST['bueno_malo'];
    try {
        $id = $modeloNinos->insert($datosNino);
        if ((int) $id) {
            $mensajeOK = 'Se ha dado de alta un niño correctamente.';
            header('Refresh: 1; URL=indexNinos.php');
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
    }
}

?>
<!doctype html>
<html lang="es">
    <head>
       <?php echo Utils::getHead('Alta Niño'); ?>
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
                    <h1>Alta Niño</h1>
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
                    <form action="crearNinos.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"  required/>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"  required/>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="DD/MM/YYYY"  required/>
                        </div>
                        <div class="form-group">
                            <label for="bueno_malo">Bueno/Malo:</label>
                            <input type="text" class="form-control" id="bueno_malo" name="bueno_malo" placeholder="Sí/No"  required/>
                        </div>
                        <div class="col-12 text-center align-items-center mt-2">
                        <a href="indexNinos.php" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                        <button type="submit" class="btn btn-success text-warning"><i class="bi bi-plus"></i> Crear</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>