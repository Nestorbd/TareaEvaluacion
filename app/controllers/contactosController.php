<?php
require_once '../models/contactosModel.php';



class ContactosController
{

    private $contacto;

    public function __construct()
    {
        $this->contacto = new Contactos();
    }

    public function getAll()
    {
        $data = $this->contacto->getContactos();

        return($data);
    }

    public function getOne($id)
    {
        if (is_array($id)) {
            $id = implode('', $id);
        }
        $data = $this->contacto->getContactoById($id);
        if ($data == null) {
            $data = "No hay ningun contacto con id=" . $id;
            return(json_encode($data));
        }else{
            $data_r[0] = $data;
            return(json_encode($data_r));
        }
        
    }

    public function insert()
    {
        $data = json_decode(file_get_contents("php://input"));
        $dataCreate = $this->contacto->createContacto($data);

        if ($dataCreate) {
            $this->getOne($dataCreate);
        } else {
            return(json_encode(array('status' => 'error')));
        }

    }

    public function update($id)
    {
        if (is_array($id)) {
            $id = implode('', $id);
        }
        $data = json_decode(file_get_contents("php://input"));

        $dataUpdate = $this->contacto->updateContacto($id, $data);
        if ($dataUpdate) {
            $this->getOne($id);
        } else {
            return(json_encode(array('status' => 'error')));
        }
    }

    public function delete($id)
    {
        if (is_array($id)) {
            $id = implode('', $id);
        }
        $data = $this->contacto->deleteContacto($id);

        if (!$data) {
            return(json_encode("No hay ninguna contacto"));
        } else {
            return(json_encode(array('status' => 'success')));
        }
    }
}