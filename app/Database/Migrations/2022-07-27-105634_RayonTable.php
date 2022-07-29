<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class RayonTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rayon_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 20,
            ],
            'jumlah_siswa' => [
                'type' => 'int',
                'constraint' => 3,
            ],
            'pembimbing' => [
                'type' => 'varchar',
                'constraint' => 255,
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

        $this->forge->addPrimaryKey('rayon_id');
        
        $this->forge->createTable('rayons');
    }

    public function down()
    {
        $this->forge->dropTable('rayons');
    }
}
