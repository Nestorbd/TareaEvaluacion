<?php

class Conexion
{
    private static $dialect;
    private static $host;
    private static $bd;
    private static $user;
    private static $password;

    public function __construct()
    {
        static::$dialect = "mysql";
        static::$host = "localhost";
        static::$bd = "contactosdb";
        static::$user = "root";
        static::$password = "A123456b";
    }

    static public function conectar()
    {
        $dialect = static::$dialect;
        $host = static::$host;
        $bd = static::$bd;
        $user = static::$user;
        $password = static::$password;

        try {
            $conn = new PDO($dialect . ':host=' . $host . ';dbname=' . $bd, $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}