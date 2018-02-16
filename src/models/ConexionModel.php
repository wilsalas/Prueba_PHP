<?php
class ConexionModel
{

    private $Con;
    private static $instance;

    public function __construct()
    {
        try {

            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "educativodb";

            $this->Con = new PDO('mysql:host=' . $host . '; dbname=' . $db, $user, $pass);
            $this->Con->exec("SET CHARACTER SET utf8");
        } catch (PDOException $E) {
            echo ' Error : ' . $E->getMessage();
        }
    }

    public function prepare($sql)
    {
        return $this->Con->prepare($sql);
    }

    public static function ConexionDB()
    {
        if (!isset(self::$instance)) {
            $miclase = __CLASS__;
            self::$instance = new $miclase;
        }
        return self::$instance;
    }

    // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

}
