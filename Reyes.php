<?php
require_once('Utils.php');

class Reyes
{
        protected $_conexion;

        public function __construct()
        {
                $this->_conexion = Utils::conectar();
        }

        public function selectAllMelchor()
        {
                $sql = "SELECT juguetes.nombre, ninos.nombre FROM reyesmagos JOIN juguetes ON reyesmagos.id_reymago=juguetes.id_reymago JOIN pedir ON juguetes.id_juguete=pedir.id_juguete JOIN ninos ON pedir.id_nino=ninos.id_nino WHERE reyesmagos.nombre = 'Melchor' AND ninos.bueno_malo = 'Si'";
                return $this->_conexion->query($sql);
        }

        public function selectAllGaspar()
        {
                $sql = "SELECT juguetes.nombre, ninos.nombre FROM reyesmagos JOIN juguetes ON reyesmagos.id_reymago=juguetes.id_reymago JOIN pedir ON juguetes.id_juguete=pedir.id_juguete JOIN ninos ON pedir.id_nino=ninos.id_nino WHERE reyesmagos.nombre = 'Gaspar' AND ninos.bueno_malo = 'Si'";
                return $this->_conexion->query($sql);
        }

        public function selectAllBaltasar()
        {
                $sql = "SELECT juguetes.nombre, ninos.nombre FROM reyesmagos JOIN juguetes ON reyesmagos.id_reymago=juguetes.id_reymago JOIN pedir ON juguetes.id_juguete=pedir.id_juguete JOIN ninos ON pedir.id_nino=ninos.id_nino WHERE reyesmagos.nombre = 'Baltasar' AND ninos.bueno_malo = 'Si'";
                return $this->_conexion->query($sql);
        }

        public function selectGastoTotalMelchor()
        {
                $sql = "SELECT SUM(juguetes.precio) FROM juguetes INNER JOIN pedir ON juguetes.id_juguete=pedir.id_juguete INNER JOIN ninos ON pedir.id_nino=ninos.id_nino WHERE id_reymago=1 AND ninos.bueno_malo='Si'";
                return $this->_conexion->query($sql);
        }

        public function selectGastoTotalGaspar()
        {
                $sql = "SELECT SUM(juguetes.precio) FROM juguetes INNER JOIN pedir ON juguetes.id_juguete=pedir.id_juguete INNER JOIN ninos ON pedir.id_nino=ninos.id_nino WHERE id_reymago=2 AND ninos.bueno_malo='Si'";
                return $this->_conexion->query($sql);
        }

        public function selectGastoTotalBaltasar()
        {
                $sql = "SELECT SUM(juguetes.precio) FROM juguetes INNER JOIN pedir ON juguetes.id_juguete=pedir.id_juguete INNER JOIN ninos ON pedir.id_nino=ninos.id_nino WHERE id_reymago=3 AND ninos.bueno_malo='Si'";
                return $this->_conexion->query($sql);
        }
}
?>