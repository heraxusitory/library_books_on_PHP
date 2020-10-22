<?php

namespace App;

class Genre extends DB {
	private $selectAll = 'SELECT * FROM genre';
    private $getById = 'WHERE id = ';

	public function getGenre() {
        // Тут через $this идет обращение к методу родительского класса
        $arrList = $this->getList($this->selectAll);
        return $arrList;
    }

    public function getGenreById($id) {
        $arrList = $this->get($this->selectAll . " " . $this->getById . $id);
        return $arrList;
    }

    public function getIdOfGenre() {
        $arrList = $this->getList('
            SELECT id FROM genre');
        return $arrList;
    }
}
