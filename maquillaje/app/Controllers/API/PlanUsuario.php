<?php

namespace App\Controllers\API;

use App\Models\PlanUsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class PlanUsuario extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new PlanUsuarioModel());
    }

 
    public function index()
    {
        $planUsuario = $this->model->findAll();
        return $this->respond($planUsuario);
    }


    public function create()
    {
        try {
            $planUsua = $this->request->getJSON();
            if($this->model->insert($planUsua)):
                $planUsua->id_plan_usuario = $this->model->insertID();
                return $this->respondCreated($planUsua);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
 

    public function update($id_plan_usuario = null)
    {
        try { 
            if ($id_plan_usuario == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $planVerificado = $this->model->find($id_plan_usuario);
            if($planVerificado == null)
            return $this->failNotFound('No se ha encontrado el plan con el id: '.$id_plan_usuario);

            $plan = $this->request->getJSON();

            if($this->model->update($id_plan_usuario, $plan)):
                $plan->id_plan_usuario = $id_plan_usuario;
                return $this->respondUpdated($plan);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
    

    public function delete($id_plan_usuario = null)
    {
        try {
            if ($id_plan_usuario == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $planVerificado = $this->model->find($id_plan_usuario);
            if($planVerificado == null)
            return $this->failNotFound('No se ha encontrado el plan con el id: '.$id_plan_usuario);

            if($this->model->delete($id_plan_usuario)): 
                return $this->respondDeleted($planVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

}