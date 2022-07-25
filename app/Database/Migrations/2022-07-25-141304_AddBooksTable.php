<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class AddBooksTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('books', true);

        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'edition' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'publication_date' => [
                'type'       => 'DATE',
            ],
            'created_at' => [
                'type'    => 'DATE',
            ],
            'updated' => [
                'type'    => 'DATE',
            ],
            'deleted_at' => [
                'type'    => 'DATE',
            ],
          
        ]);

        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
