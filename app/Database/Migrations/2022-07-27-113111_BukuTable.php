<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class BukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'buku_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'judul_buku' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'penulis' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'penerbit_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'tahun_terbit' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'status' => [
                'type' => 'enum',
                'constraint' => ['tersedia', 'dipinjam'],
                'default' => 'tersedia',
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

        $this->forge->addPrimaryKey('buku_id');
        $this->forge->addForeignKey('penerbit_id', 'penerbits', 'penerbit_id');

        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
