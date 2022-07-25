<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class AddBooksAuthorsTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('books_authors', true);

        $this->forge->addField('id');
        $this->forge->addField([
            'book_id' => [
                'type'           => 'INT',
                'constraint'     => 9,
            ],
            'author_id' => [
                'type'           => 'INT',
                'constraint'     => 9,
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
        //Creando llaves foraneas
        $this->forge->addForeignKey('book_id', 'books', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('author_id', 'authors', 'id', '', 'CASCADE');

        $this->forge->createTable('books_authors');
    }

    public function down()
    {
        //deshabilitando inspección de llaves foraneas para eliminar la tabla
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('books_authors');
        $this->db->enableForeignKeyChecks();
    }
}
