<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class RombelTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rombel_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'tingkat' => [
                'type' => 'int',
                'constraint' => 2,
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

        $this->forge->addPrimaryKey('rombel_id');

        $this->forge->createTable('rombels');
    }

    public function down()
    {
        $this->forge->dropTable('rombels');
    }
}
