<?php

namespace App\Controllers\API;

use App\Models\UsuariosModel;
use CodeIgniter\RESTful\ResourceController;

class Usuarios extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new UsuariosModel());
    }

 
    public function index()
    {
        $usuarios = $this->model->findAll();
        return $this->respond($usuarios);
    }


    public function create()
    {
        try {
            $usuario = $this->request->getJSON();
            if($this->model->insert($usuario)):
                $usuario->id_usuario = $this->model->insertID();
                return $this->respondCreated($usuario);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id_usuario = null)
    {
        try { 
            if ($id_usuario == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $usuarioVerificado = $this->model->find($id_usuario);
            if($usuarioVerificado == null)
            return $this->failNotFound('No se ha encontrado el usuario con el id: '.$id_usuario);

            $usuario = $this->request->getJSON();

            if($this->model->update($id_usuario, $usuario)):
                $usuario->id_usuario = $id_usuario;
                return $this->respondUpdated($usuario);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_usuario = null)
    {
        try {
            if ($id_usuario == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $usuarioVerificado = $this->model->find($id_usuario);
            if($usuarioVerificado == null)
            return $this->failNotFound('No se ha encontrado el usuario con el id: '.$id_usuario);

            if($this->model->delete($id_usuario)): 
                return $this->respondDeleted($usuarioVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
 
}