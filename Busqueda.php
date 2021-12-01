<?php
require_once('Utils.php');

class Busqueda
{
    protected $_conexion;
    public function __construct()
    {
        $this->_conexion = Utils::conectar();
    }

    public function selectAll()
    {
        $sql = 'SELECT * FROM ninos ORDER BY nombre';
        return $this->_conexion->query($sql);
    }

    public function selectRegalo($id){
        $sql = "SELECT id_juguete, nombre FROM juguetes WHERE id_juguete IN(SELECT id_juguete FROM pedir WHERE id_nino = '" . $id . "')";
        return $this->_conexion->query($sql);
    }

    public function selectAllRegalos(){
        $sql = 'SELECT * FROM juguetes';
        return $this->_conexion->query($sql);
    }

    public function insertPedir($id_juguete, $id_nino){

        $sql1= "SELECT * FROM pedir WHERE id_juguete=$id_juguete AND id_nino=$id_nino";
        $rows = $this->_conexion->query($sql1);

        if ((int)$rows->num_rows){
            $mensajeKO = "Este regalo ya le ha sido añadido al niño";
            return $mensajeKO;
        }else{
            $sql = "INSERT INTO pedir (id_juguete, id_nino) VALUES ('" . $id_juguete . "', '" . $id_nino . "')";
            return $this->_conexion->query($sql);
        }
    } 
}

?>