<?php

class TeacherModel
{
    private $identificacion, $nombres, $apellidos, $genero;
    public function __construct($identificacion, $nombres, $apellidos, $genero)
    {
        $this->identificacion = $identificacion;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
    }

    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getGenero()
    {
        return $this->genero;
    }
}
