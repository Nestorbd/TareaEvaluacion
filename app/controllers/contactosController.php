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
            return($data);
        }else{
            return($data);
        }
        
    }

    public function insert($data)
    {
        $dataCreate = $this->contacto->createContacto($data);

        if ($dataCreate) {
            $this->getOne($dataCreate);
        }
    }

    public function update($data)
    {

        $dataUpdate = $this->contacto->updateContacto($data); 
        
        return $dataUpdate;
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