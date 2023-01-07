<?php

namespace App\Controllers\API;

use App\Models\ProductosUtilizarModel;
use CodeIgniter\RESTful\ResourceController;

class ProductosUtilizar extends ResourceController

{
    public function __construct() {
        $this->model = $this->setModel(new ProductosUtilizarModel());
    }

 
    public function index()
    {
        $productosUtilizar = $this->model->findAll();
        return $this->respond($productosUtilizar);
    }


    public function create()
    {
        try {
            $productosUti = $this->request->getJSON();
            if($this->model->insert($productosUti)):
                $productosUti->id_productos = $this->model->insertID();
                return $this->respondCreated($productosUti);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function update($id_productos = null)
    {
        try { 
            if ($id_productos == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $productoVerificado = $this->model->find($id_productos);
            if($productoVerificado == null)
            return $this->failNotFound('No se ha encontrado el producto con el id: '.$id_productos);

            $producto = $this->request->getJSON();

            if($this->model->update($id_productos, $producto)):
                $producto->id_productos = $id_productos;
                return $this->respondUpdated($producto);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id_productos = null)
    {
        try {
            if ($id_productos == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $productoVerificado = $this->model->find($id_productos);
            if($productoVerificado == null)
            return $this->failNotFound('No se ha encontrado el producto con el id: '.$id_productos);

            if($this->model->delete($id_productos)): 
                return $this->respondDeleted($productoVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }




 
}