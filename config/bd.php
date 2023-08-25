<?php
//creamos una clase para la conexión, creamos un método para crear la instancia, preguntamos si la instancia tiene algo, sino utilizamos la conexión
//a la base de datos e imprimimos conectado sino está conectado, retornar null
class BD {

    //para almacenar la conexión 
    public static $instance=null;
    //crear la función
    public static function createInstance(){
        //preguntar si tiene conexión
        if ( !isset(self::$instance)) {
            //para activar unas propiedades que nos permitan trabajar con la base de datos
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            //creación de la instancia y la conexión.Utiliza esta variable instancia cuando crees la conexión con PDO
            self::$instance = new PDO('mysql:host=localhost;dbname=app_db', 'root', '', $options);
            //se comenta el echo de conectado a la hora de crear el pdf, no antes para poder comprobar la conexión
            //echo "conectado...";
        }
        return self::$instance;
    }


}

?>