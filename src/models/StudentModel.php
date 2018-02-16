<?php

class StudentModel
{
    private $identificacion, $nombres, $apellidos, $genero;
    public function __construct($identificacion, $nombres, $apellidos, $genero)
    {
        $this->identificacion = $identificacion;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getGenero()
    {
        return $this->genero;
    }

}
