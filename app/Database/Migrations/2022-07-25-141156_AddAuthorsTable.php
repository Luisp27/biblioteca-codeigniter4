<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class AddAuthorsTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('authors', true);
        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'lastname' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'country' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'register_date' => [
                'type'       => 'DATE',
            ],
            'created_at' => [
                'type'    => 'DATE',
            ],
            'updated_at' => [
                'type'    => 'DATE',
            ],
            'deleted_at' => [
                'type'    => 'DATE',
            ],
          
        ]);

        $this->forge->createTable('authors');
    }

    public function down()
    {
        $this->forge->dropTable('authors');
    }
}
