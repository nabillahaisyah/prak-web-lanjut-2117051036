<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdJurusanColumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            'id_jurusan' => [
                'type'  => 'INT',
                'constraint' => 5,
                'null' => false
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
