<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class StudentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'student_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'null' => true,
            ],
            'nis' => [
                'type' => 'char',
                'constraint' => 8,
            ],
            'nama_siswa' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'rayon_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'rombel_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
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

        $this->forge->addPrimaryKey('student_id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('rayon_id', 'rayons', 'rayon_id');
        $this->forge->addForeignKey('rombel_id', 'rombels', 'rombel_id');

        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
