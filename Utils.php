<?php

class utils{

    public static function conectar(){
        $servidor = 'localhost:3308';
        $usuario = 'studium';
        $clave = 'studium__';
        $baseDeDatos = 'studium_dws_p2';
        $conexion = new mysqli($servidor, $usuario, $clave, $baseDeDatos);
        if (mysqli_connect_error()) {
            die('Error de Conexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
        $conexion->set_charset("utf8");
        return $conexion;
    }

    public static function getHead($title){
        return '
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <link href="assets/css/site.css" rel="stylesheet">
        <title>'.$title.'</title>
        ';
    }
}

?>