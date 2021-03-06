<?php

namespace App;

// Класс наследуется от родительского класса DB
class Books extends DB {
    private $selectAll = 'SELECT 
        books.id as book_id, 
        books.name as book_name,
        books.desc as book_desc,
        authors.id as author_id, 
        authors.name as author_name,
        genre.id as genre_id, 
        genre.name as genre_name 
        FROM book_author_genre';

    private $getListQuery = 'LEFT JOIN books ON book_id = books.id 
        LEFT JOIN authors ON author_id = authors.id 
        LEFT JOIN genre ON genre_id = genre.id';

    private $getByBook_Id = 'WHERE book_id = ';
    private $getByAuthor_Id = 'WHERE author_id = ';
    private $getByGenre_Id = 'WHERE genre_id = ';

    public function getBooks() {
        // Тут через $this идет обращение к методу родительского класса
        $arrList = $this->getList($this->selectAll . " " . $this->getListQuery);
        return $arrList;
    }

    public function getBookById($id) {
        $arrList = $this->get($this->selectAll . " " . $this->getListQuery . " " . $this->getByBook_Id . $id);
        return $arrList;
    }
    public function getBooksById($id) {
        $arrList = $this->getList($this->selectAll . " " . $this->getListQuery . " " . $this->getByAuthor_Id . $id);
        return $arrList;
    }

     public function getGenreById($id) {
        $arrList = $this->getList($this->selectAll . " " . $this->getListQuery . " " . $this->getByGenre_Id . $id);
        return $arrList;
    }

    public function getIdOfBooks() {
        $arrList = $this->getList('
            SELECT id FROM books');
        return $arrList;
    }
}