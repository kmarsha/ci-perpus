<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class PenerbitTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'penerbit_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'perusahaan' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('penerbit_id');

        $this->forge->createTable('penerbits');
    }

    public function down()
    {
        $this->forge->dropTable('penerbits');
    }
}
