<?php
    class Libro{
        //atributos
        private $titulo;
        private $autor;
        private $fecha_publicacion;
        private $editorial;

        //constructor
        function __construct($titulo, $autor, $fecha_publicacion, $editorial){
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->fecha_publicacion = $fecha_publicacion;
            $this->editorial = $editorial;
        }

        //metodos
        //metodo para mostrar la presentacion del libro
        public function presentacion(){
            print "Hola, el libro ".$this->titulo." fue escrito por ".$this->autor." y publicado por ".$this->editorial." en la fecha ".$this->fecha_publicacion;
        }
        
        //metodos get y set
        public function getTitulo(){
            return $this->titulo;
        }
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function setAutor($autor){
            $this->autor = $autor;
        }
        public function getFechaPublicacion(){
            return $this->fecha_publicacion;
        }
        public function setFechaPublicacion($fecha_publicacion){
            $this->fecha_publicacion = $fecha_publicacion;
        }
        public function getEditorial(){
            return $this->editorial;
        }
        public function setEditorial($editorial){
            $this->editorial = $editorial;
        }
    }

    

?>