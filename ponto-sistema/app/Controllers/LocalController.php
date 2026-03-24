<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Local;

class LocalController extends BaseController
{
    protected $localModel;

    public function __construct()
    {
        $this->localModel = new Local();
    }

    public function index()
    {
        $data['locais'] = $this->localModel->findAll();
        return view('locais/index', $data);
    }

    public function create()
    {
        return view('locais/form');
    }

    public function store()
    {
        $this->localModel->save([
            'secretaria' => $this->request->getPost('secretaria'),
            'escola_local' => $this->request->getPost('escola_local')
        ]);
        return redirect()->to('/locais');
    }

    public function edit($id)
    {
        $data['local'] = $this->localModel->find($id);
        return view('locais/form', $data);
    }

    public function update($id)
    {
        $this->localModel->update($id, [
            'secretaria' => $this->request->getPost('secretaria'),
            'escola_local' => $this->request->getPost('escola_local')
        ]);
        return redirect()->to('/locais');
    }

    public function delete($id)
    {
        $this->localModel->delete($id);
        return redirect()->to('/locais');
    }
}
