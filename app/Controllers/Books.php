<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\AuthorsModel;
use App\Models\BooksAuthorModel;

class Books extends BaseController
{
    public function index()
    {
    }

    public function books_table()
    {
        $booksModel = new BooksModel();
        $books = $booksModel->orderBy('id', 'DESC')->findAll();

        $data = [];
        foreach ($books as $row) {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'edition' => $row['edition'],
                'publication_date' => $row['publication_date'],
                'actions' => '
                    <div>
                        <a class="btn btn-small btn-primary" href="' . site_url('/books/details/' . $row['id']) . '">Ver detalles</a>
                        <a class="btn btn-small btn-danger" href="' . site_url('/books/delete/' . $row['id']) . '">Eliminar</a>
                    </div>
                ',
            ];
        }

        $output = array(
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function details($id = null)
    {
        $booksModel = new BooksModel();
        $book = $booksModel->find($id);

        // Join con la tabla de autores para obtener el nombre del autor que ha escrito el libro
        $db = \Config\Database::connect();
        $builder = $db->table('authors');
        $builder->select('name, lastname');
        $builder->join('books_authors', 'books_authors.author_id = authors.id');
        $builder->where('books_authors.book_id', $id);
        $authors = $builder->get()->getResultArray();
        $authors_names = '';
        foreach ($authors as $author) {
            $authors_names .= $author['name'] . ' ' . $author['lastname'];
            if ($author !== end($authors)) {
                $authors_names .= ', ';
            }
        }

        // Agregamos la propiedad computada a la respuesta
        $book['authors'] = $authors_names;

        $data = [
            'book' => $book,
        ];
        return view('books/details', $data);
    }

    public function create()
    {
        $authorsModel = new AuthorsModel();
        $authors = $authorsModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'authors' => $authors,
        ];

        return view('books/create', $data);
    }

    public function store()
    {
        // Insertamos un libro
        $bookModel = new BooksModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'edition' => $this->request->getPost('edition'),
            'publication_date' => $this->request->getPost('publication_date'),
            'authors' => $this->request->getPost('authors')
        ];
        $bookModel->insert($data);
        $bookModelInsertedId = $bookModel->getInsertID();

        // Tabla Muchos a Muchos
        // Insertamos la relacion entre libro y autor
        $booksAuthor = new BooksAuthorModel();
        $authorsIds = $data['authors'];

        foreach ($authorsIds as $authorId) {
            $data = [
                'author_id' => intval($authorId),
                'book_id' => $bookModelInsertedId
            ];
            $booksAuthor->insert($data);
        }

        return $this->response->redirect(site_url('home/index'));
    }

    public function delete($id)
    {
        $booksModel = new BooksModel();
        $booksAuthorsModel = new BooksAuthorModel();
        $book = $booksModel->find($id);
        if (!$book) {
            $erroData = [
                'error' => "El libro " . $id . " no ha sido encontrado"
            ];
            return view('home/index', $erroData);
        }
        $booksModel->where('id', $id)->delete();
        // eliminamos tambien la relacion entre las tablas
        $booksAuthorsModel->where('id', $id)->delete();
        return $this->response->redirect(site_url(''));
    }
}
