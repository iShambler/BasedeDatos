<?php 
class Tarea {
    private $id;
    private $nombre;
    private $fechaFin;

    public function __construct($id, $nombre, $fechaFin) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fechaFin = $fechaFin;
    }
    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getFechaFin() {
        return $this->fechaFin;
    }
}