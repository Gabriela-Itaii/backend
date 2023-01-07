<?php

namespace App\Controllers\API;

use App\Models\PaqueteMakeupModel;
use CodeIgniter\RESTful\ResourceController;

class PaqueteMakeup extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new PaqueteMakeupModel());
    }

 
    public function index()
    {
        $paqueteMakeup = $this->model->findAll();
        return $this->respond($paqueteMakeup);
    }


    public function create()
    {
        try {
            $paMakeup = $this->request->getJSON();
            if($this->model->insert($paMakeup)):
                $paMakeup->id_makeup = $this->model->insertID();
                return $this->respondCreated($paMakeup);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id_makeup = null)
    {
        try { 
            if ($id_makeup == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $paqueteVerificado = $this->model->find($id_makeup);
            if($paqueteVerificado == null)
            return $this->failNotFound('No se ha encontrado el paquete con el id: '.$id_makeup);

            $paquete = $this->request->getJSON();

            if($this->model->update($id_makeup, $paquete)):
                $paquete->id_makeup = $id_makeup;
                return $this->respondUpdated($paquete);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_makeup = null)
    {
        try {
            if ($id_makeup == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $paqueteVerificado = $this->model->find($id_makeup);
            if($paqueteVerificado == null)
            return $this->failNotFound('No se ha encontrado el paquete con el id: '.$id_makeup);

            if($this->model->delete($id_makeup)): 
                return $this->respondDeleted($paqueteVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
}