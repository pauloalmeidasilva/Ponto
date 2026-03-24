<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Servidor;
use App\Models\Local;

class ServidorController extends BaseController
{
    protected $servidorModel;
    protected $localModel;

    public function __construct()
    {
        $this->servidorModel = new Servidor();
        $this->localModel = new Local();
    }

    public function index()
    {
        $data['servidores'] = $this->servidorModel->getAllWithLocal();
        return view('servidores/index', $data);
    }

    public function create()
    {
        $data['locais'] = $this->localModel->findAll();
        return view('servidores/form', $data);
    }

    public function store()
    {
        $this->servidorModel->save($this->request->getPost());
        return redirect()->to('/servidores');
    }

    public function edit($id)
    {
        $data['servidor'] = $this->servidorModel->find($id);
        $data['locais'] = $this->localModel->findAll();
        return view('servidores/form', $data);
    }

    public function update($id)
    {
        $this->servidorModel->update($id, $this->request->getPost());
        return redirect()->to('/servidores');
    }

    public function delete($id)
    {
        $this->servidorModel->delete($id);
        return redirect()->to('/servidores');
    }
}
