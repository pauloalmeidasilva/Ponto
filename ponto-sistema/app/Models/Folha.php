<?php
namespace App\Models;

use CodeIgniter\Model;

class Folha extends Model
{
    protected $table            = 'folhas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'servidor_id', 'mes', 'ano', 'dias_feriados', 'dias_ponto_facultativo', 
        'plantao_custom', 'estudante_custom', 'almoco_custom', 'observacoes_extras'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getFolha($servidor_id, $mes, $ano)
    {
        return $this->where('servidor_id', $servidor_id)
                    ->where('mes', $mes)
                    ->where('ano', $ano)
                    ->first();
    }
}
