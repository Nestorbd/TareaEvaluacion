<?php
require_once 'conexion.php';


class Contactos
{
    private $conn;
    private $id;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->conn = Conexion::conectar();

    }

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }

    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }
    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    function getDireccion(){
        return $this->direccion;
    }
    function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    function getTelefono(){
        return $this->telefono;
    }
    function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getContactos()
    {
        $sql = $this->conn->query("SELECT * FROM contactos");
        $data = $sql->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    public function getContactoById($id)
    {
        $id =  $this->conn->quote($id);
        $sql = $this->conn->query("SELECT * FROM contactos WHERE id =" . $id);
        $data = $sql->fetch(PDO::FETCH_OBJ);

        return $data;
    }

    public function createContacto($data)
    {
        
        $return = array();
        $returnColum = array();

        foreach ($data as $key => $val) {
            if(!empty($val)){
                $returnColum[$key] = $key;
                $return[$key] = $val;
            }
        }

        $insData = implode("','", $return);
        $insDataColumn = implode(",", $returnColum);

        $this->conn->query("INSERT INTO contactos (" . $insDataColumn . ") VALUES ('" . $insData . "')");
        $data = $this->conn->lastInsertId();

        return $data;
    }

    public function updateContacto($id, $dataNew)
    {
        $id = $this->conn->quote($id);
        $sql_get = $this->conn->query("SELECT * FROM contactos WHERE id=" . $id);
        $dataOld = $sql_get->fetch();
        if ($dataOld == null) {
            return false;
        } else {
            $return = array();

            foreach ($dataNew as $key => $val) {
                $return[$key] = $key . " = '" . $val . "'";
            }
            $insData = implode(", ", $return);

            $sql = $this->conn->query("UPDATE contactos SET " . $insData . " WHERE id=" . $id);
            if ($sql) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function deleteContacto($id)
    {
        $id = $this->conn->quote($id);
        $sql_get = $this->conn->query("SELECT * FROM contactos WHERE id=" . $id);
        $data = $sql_get->fetch();
        if ($data == null) {
            return false;
        } else {
            $sql = "DELETE FROM contactos WHERE id=" . $id;
            if ($this->conn->query($sql) == TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
}