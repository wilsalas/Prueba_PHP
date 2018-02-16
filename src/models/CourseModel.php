<?php

class CourseModel
{
    private $codigo, $nombre, $observaciones;
    public function __construct($codigo, $nombre, $observaciones)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->observaciones = $observaciones;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }
}
