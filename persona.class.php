<?php
    class Persona{
        //atributos
        private $dni;
        private $nombre;
        private $apellido;
        private $fecha_nac;

        //metodos
        function __construct($dni, $nombre, $apellido, $fecha_nac){
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fecha_nac = $fecha_nac;
        }

        public function presentacion(){
            print"hola, el nombre es ".$this->nombre." ".$this->apellido;
        }

        public function saludar(){
            print "hola amigo.";
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
        }

        public function getApellido(){
            return $this->apellido;
        }

    }
?>