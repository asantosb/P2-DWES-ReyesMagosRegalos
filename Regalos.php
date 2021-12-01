<?php
require_once('Utils.php');

class Regalos
{

    protected $_conexion;

    public function __construct()
    {
        $this->_conexion = Utils::conectar();
    }

    public function selectAll()
    {
        $sql = 'SELECT * FROM juguetes';
        return $this->_conexion->query($sql);
    }

    public function select($id)
    {
        $sql = 'SELECT * FROM juguetes WHERE id_juguete = ' . (int)$id;
        $rows = $this->_conexion->query($sql);
        if ((int)$rows->num_rows) {
            $row = $rows->fetch_assoc();
        } else {
            $row = null;
        }
        return $row;
    }

    public function insert($data)
    {
        $nombre = $data['nombre'];
        if (empty($data['nombre']) && ($data['precio'])) {
            throw new Exception('Debes de rellenar los campos correctamente.');
        } else if (!preg_match("/^[a-zA-Z]+/", $nombre)) {
            throw new Exception('Debes de rellenar los campos.');
        } else {
            $sql = 'INSERT INTO juguetes (nombre, precio, id_reymago) VALUES ("' . $data['nombre'] . '", "' . $data['precio'] . '","' . $data['id_reymago'] . '")';
            $this->_conexion->query($sql);
            return $this->_conexion->insert_id;
        }
    }
    
    public function update($data)
    {
        $nombre = $data['nombre'];
        if (empty($data['nombre']) && ($data['precio'])) {
            throw new Exception('Debes de rellenar los campos correctamente.');
        } else if (!preg_match("/^[a-zA-Z]+/", $nombre)) {
            throw new Exception('Debes de rellenar los campos.');
        } else {
            $sql = 'UPDATE juguetes SET nombre = "' . $data['nombre'] . '", precio = "' . $data['precio'] . '" WHERE id_juguete = ' . (int)$data['id_juguete'];
            $this->_conexion->query($sql);
            return (int)$data['id_juguete'];
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM juguetes WHERE id_juguete = ' . (int)$id;
        return $this->_conexion->query($sql);
    }
}
