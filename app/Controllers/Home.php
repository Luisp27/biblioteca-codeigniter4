<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Home extends BaseController
{
    public function index()
    {
        // Obtener todos los libros de manera descendente
        $bookModel = new BooksModel();
        $books = $bookModel->orderBy('id', 'DESC')->findAll();

        // Pasar los libros a la vista
        $data = [
            'books' => $books,
            'error' => null
        ];
        return view('home\index', $data);
    }
}
