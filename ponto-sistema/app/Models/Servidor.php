<?php
namespace App\Models;

use CodeIgniter\Model;

class Servidor extends Model
{
    protected $table            = 'servidores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'matricula', 'nome', 'tipo', 'cargo_funcao', 'rg', 'ch_semanal', 
        'horario_padrao', 'local_id', 'plantao', 'estudante', 'almoco'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getServidorWithLocal($id)
    {
        return $this->select('servidores.*, locais.secretaria, locais.escola_local')
                    ->join('locais', 'locais.id = servidores.local_id', 'left')
                    ->where('servidores.id', $id)
                    ->first();
    }
    
    public function getAllWithLocal()
    {
        return $this->select('servidores.*, locais.secretaria, locais.escola_local')
                    ->join('locais', 'locais.id = servidores.local_id', 'left')
                    ->orderBy('servidores.nome', 'ASC')
                    ->findAll();
    }
}
