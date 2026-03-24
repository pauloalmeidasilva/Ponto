<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFolhasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'servidor_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'mes' => [
                'type'       => 'INT',
                'constraint' => 2,
            ],
            'ano' => [
                'type'       => 'INT',
                'constraint' => 4,
            ],
            'dias_feriados' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'dias_ponto_facultativo' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'plantao_custom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'estudante_custom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'almoco_custom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'observacoes_extras' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('servidor_id', 'servidores', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('folhas');
    }

    public function down()
    {
        $this->forge->dropTable('folhas');
    }
}
