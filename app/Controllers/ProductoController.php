<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProductoController extends ResourceController
{
    
    protected $modelName = 'App\Models\Producto';
    protected $format    = 'json';

    public function index()
    {
        
            return $this->respond($this->model->findAll());
        
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Producto not encontrado');
        }
    }

    // POST /categories
    public function create()
    {
        //$data = $this->request->getVar();
        $data = $this->request->getJSON();
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
        
    }

    // PUT /categories/{id}
    public function update($id = null)
    {
        //$data = $this->request->getRawInput();
        $data = $this->request->getJSON();
        if ($this->model->update($id, $data)) {
            return $this->respond($data);
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted('Producto Eliminada');
        } else {
            return $this->failNotFound('No se encontró el Producto');
        }
    }

    public function handleOptions() {
        // Configurar y enviar las cabeceras CORS necesarias
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Max-Age: 86400"); // cache preflight request for 1 day
        
        // Enviar una respuesta vacía con el código de estado 204 No Content
        http_response_code(204);
        exit;
    }
    
}
