<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTipoToServidores extends Migration
{
    public function up()
    {
        $fields = [
            'tipo' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'apoio',
                'after'      => 'nome'
            ],
        ];
        $this->forge->addColumn('servidores', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('servidores', 'tipo');
    }
}
