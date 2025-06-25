<?php


// en este archivo se muestra un ejemplo general de todos los componentes de POO en PHP

// primero, se define una clase llamada "Persona" que tiene propiedades y métodos
// una clase es una plantilla para crear objetos. Como una generalización de un concepto.
// en cambio, el objeto es una instancia de una clase, es decir, una representación concreta de esa clase.

// mientras que la clase sería "persona", el objeto sería una instancia específica de esa clase, como "Juan" o "María".
// algo así como las tablas en una base de datos, donde la clase es la tabla y el objeto es una fila específica de esa tabla.

// las clases encapsulan datos y comportamientos relacionados
// permitiendo la creación de instancias (objetos) que pueden interactuar entre sí.
// tambien hay propiedades, que son variables que pertenecen a la clase y se usan para almacenar datos


// la diferencia entre propiedad y objeto es que una propiedad es una variable que pertenece a una clase,
// mientras que un objeto es una instancia de una clase.

// instancia y objeto en si son lo mismo, lo que se le llama "instancia" es la acción de crear un objeto a partir de una clase.

//hay distintas formas de definir una propiedad.
// una propiedad puede ser privada, protegida o pública.
// privada significa que solo puede ser accedida desde dentro de la clase,
// protegida significa que puede ser accedida desde dentro de la clase y desde clases heredadas,
// y pública significa que puede ser accedida desde cualquier lugar.

// ademas de esto, las variables pueden ser estaticas o no estaticas.
// una variable estatica es una variable que pertenece a la clase en si, y no a una instancia de la clase.

// son utilizados cuando queremos que esa variable se aplique a todas las instancias de la clase, y no a una instancia específica.
// un ejemplo sencillo, si queremos aplicar un descuento a todos los productos de una tienda según la temporada,
// podemos definir una variable estatica en la clase Producto que almacene el descuento actual.

// cabe aclarar que las variables estáticas pueden ser utilizadas para cualquier tipo de dato, excepto por las constantes, ya 
// que es preferible usar "const" para definir constantes en PHP, porque las variables estáticas 
// si pueden ser modificadas en tiempo de ejecución.


Class Persona { // Clase Persona, se usa para representar a una persona
    private $nombre;
    private $edad;        //estas son propiedades de la clase Persona, que se usan para almacenar datos relacionados con una persona
    private $email;
    private $telefono;

//esta es una forma rápida de definir una clase, aunque falta algunos detalles, como el constructor y los métodos.
//un metodo es una función que pertenece a una clase y se usa para realizar acciones o cálculos relacionados con la clase.
//por lo general, los metodos interactuan con las propiedades de la clase, es decir, pueden leer o modificar los valores de las propiedades.
//pero hay excepciones, como los metodos estaticos, que no pueden acceder a las propiedades de la clase directamente,
//o metodos auxiliares, que son metodos que se usan para realizar acciones secundarias y no interactuan con las propiedades de la clase.

// Un constructor es un método especial que se ejecuta automáticamente cuando se crea una instancia de la clase.
// Se utiliza para inicializar las propiedades del objeto con valores iniciales.

// Inicializar significa asignar un valor a las propiedades cuando el objeto se crea.
// Si no usáramos un constructor, las propiedades podrían no tener valores definidos (estar vacías o en null).

// El constructor puede recibir parámetros, que son los valores que queremos asignar a las propiedades.
// Esos parámetros se asignan a las propiedades mediante $this->propiedad.

function __construct($nombre, $edad, $email, $telefono) {
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->email = $email;
    $this->telefono = $telefono;
}

// luego de terminar con el constructor, se pueden definir los metodos de la clase

// importante, las funciones y el constructor deben estar dentro de la clase, si no no se considerarán parte de la clase.

public function getNombre() { // Método para obtener el nombre de la persona
    return $this->nombre; // Devuelve el valor de la propiedad $nombre
}

public function setNombre($nombre) { // Método para establecer el nombre de la persona
    $this->nombre = $nombre; // Asigna el valor del parámetro $nombre a la propiedad $nombre
}

public function getEdad() { // Método para obtener la edad de la persona
    return $this->edad; // Devuelve el valor de la propiedad $edad
}

// los metodos estan en publico, debido a que pueden ser accedidos desde fuera de la clase.
// además de que pueden ser utilizados por otras instancias de la misma clase, a esta función se le llama polimorfismo.

// por ultimo, y para tener en cuenta, tiene que haber un php principal que incluya el archivo de clase de la database
// una vez que tenga este archivo, cualquier otro archivo php que necesite acceder a la base de datos, incluirá solo el archivo php principal
// y podrá usar la clase database para obtener la conexión a la base de datos.

}
?>