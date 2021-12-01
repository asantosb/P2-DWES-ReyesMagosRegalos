<?php
require_once('Utils.php');

    class Ninos
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

        public function select($id){
            $sql = 'SELECT * FROM ninos WHERE id_nino = '.(int)$id;
            $rows = $this->_conexion->query($sql);
            if((int)$rows->num_rows){
                $row = $rows->fetch_assoc();
            }else{
                $row = null;
            }
            return $row;
        }

        public function insert($data){
           $nombre = $data['nombre'];
           $apellido = $data['apellido'];
           $bueno_malo = $data['bueno_malo'];
           if (empty($data['nombre']) && ($data['apellido'])&&($data['fecha_nacimiento'])&&($data['bueno_malo'])) {
            throw new Exception('Debes de rellenar los campos correctamente.');
           } else if(!preg_match("/^[a-zA-Z]+/", $nombre) || (!preg_match("/^[a-zA-Z]+/", $apellido)) || (!preg_match("/^[a-zA-Z]+/", $bueno_malo)) ){
            throw new Exception('Debes de rellenar los campos.');
           }else{
            $sql = 'INSERT INTO ninos (nombre, apellido, fecha_nacimiento, bueno_malo) VALUES ("'.$data['nombre'].'", "'.$data['apellido'].'", "'.$data['fecha_nacimiento'].'","'.$data['bueno_malo'].'")';
            $this->_conexion->query($sql);
            return $this->_conexion->insert_id;
           }
        }
        
        public function update($data){
            $nombre = $data['nombre'];
           $apellido = $data['apellido'];
           $bueno_malo = $data['bueno_malo'];
           if (empty($data['nombre']) && ($data['apellido'])&&($data['fecha_nacimiento'])&&($data['bueno_malo'])) {
            throw new Exception('Debes de rellenar los campos correctamente.');
           } else if(!preg_match("/^[a-zA-Z]+/", $nombre) || (!preg_match("/^[a-zA-Z]+/", $apellido)) || (!preg_match("/^[a-zA-Z]+/", $bueno_malo)) ){
            throw new Exception('Debes de rellenar los campos.');
           }else{
            $sql = 'UPDATE ninos SET nombre = "'.$data['nombre'].'", apellido = "'.$data['apellido'].'", fecha_nacimiento = "'.$data['fecha_nacimiento'].'", bueno_malo = "'.$data['bueno_malo'].'"  WHERE id_nino = '.(int)$data['id_nino'];
            $this->_conexion->query($sql);
            return (int)$data['id_nino'];
           }
        }
        
        public function delete($id){
            $sql = 'DELETE FROM ninos WHERE id_nino = '.(int)$id;
            return $this->_conexion->query($sql);
        }
    }
?>
