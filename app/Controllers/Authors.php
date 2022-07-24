<?php

namespace App\Controllers;

use App\Models\AuthorsModel;

class Authors extends BaseController
{
    public function index()
    {
        $data = [
            'error' => null
        ];
        return view('authors/index', $data);
    }

    public function authors_table()
    {
        $authorsModel = new AuthorsModel();
        $authors = $authorsModel->orderBy('id', 'DESC')->findAll();

        $data = [];

        foreach ($authors as $row) {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'lastname' => $row['lastname'],
                'country' => $row['country'],
                'actions' => '
                 <div>
                    <a class="btn btn-small btn-primary" href="' . site_url('/authors/details/' . $row['id']) . '">Ver detalles</a>
                    <a class="btn btn-small btn-danger" href="' . site_url('/authors/delete/' . $row['id']) . '">Eliminar</a>
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

    public function details($id)
    {
        $authorsModel = new AuthorsModel();
        $author = $authorsModel->find($id);
        if (!$author) {
            $errorData = [
                'error' => "El Autor " . $id . " no ha sido encontrado"
            ];
            return view('authors/index', $errorData);
        }

        // Cantidad de libros que ha escrito el autor
        $db = \Config\Database::connect();
        $builder = $db->table('books_authors');
        $builder->select('count(*) as books_count');
        $builder->join('books', 'books.id = books_authors.book_id');
        $builder->where('books_authors.author_id', $id);
        $books_count = $builder->get()->getRow()->books_count;

        // Agregamos propiedad computada a la respuesta
        $author['books_count'] = $books_count;

        $data = [
            'author' => $author,
        ];

        return view('authors/details', $data);
    }

    public function create()
    {
        return view('authors/create');
    }

    public function store()
    {
        // Insertar un autor
        $authorModel = new AuthorsModel();
        // dd($this->request);
        $data = [
            'name' => $this->request->getPost('name'),
            'lastname' => $this->request->getPost('lastname'),
            'country' => $this->request->getPost('country'),
            'register_date' => $this->request->getPost('register_date')
        ];
        $authorModel->insert($data);

        return $this->response->redirect(site_url('/authors'));
    }

    public function delete($id)
    {
        $authorsModel = new AuthorsModel();
        $author = $authorsModel->find($id);
        if (!$author) {
            $erroData = [
                'error' => "El Autor " . $id . " no ha sido encontrado"
            ];
            return view('authors/index', $erroData);
        }
        $authorsModel->where('id', $id)->delete();

        return $this->response->redirect(site_url('/authors'));
   }
}
