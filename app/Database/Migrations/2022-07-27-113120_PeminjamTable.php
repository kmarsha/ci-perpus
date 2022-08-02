<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class PeminjamTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'peminjam_id' => [
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
            'student_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'null' => true,
            ],
            'buku_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'tgl_pinjam' => [
                'type' => 'date',
                'default' => new RawSql('CURRENT_DATE'),
                'null' => false,
            ],
            'tgl_kembali' => [
                'type' => 'date',
                'null' => true,
            ],
            'ket' => [
                'type' => 'enum',
                'constraint' => ['kembali', 'belum'],
                'default' => 'belum',
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

        $this->forge->addPrimaryKey('peminjam_id');
        $this->forge->addForeignKey('student_id', 'students', 'student_id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('buku_id', 'books', 'buku_id');

        $this->forge->createTable('peminjams');
    }

    public function down()
    {
        $this->forge->dropTable('peminjams');
    }
}
