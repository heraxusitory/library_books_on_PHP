<?php

namespace App;

class Authors extends DB {
	private $selectAll = 'SELECT * FROM authors';

    private $getById = 'WHERE id = ';

	public function getAuthors() {
        // Тут через $this идет обращение к методу родительского класса
        $arrList = $this->getList($this->selectAll);
        return $arrList;
    }

    public function getAuthorById($id) {
        $arrList = $this->get($this->selectAll . " " . $this->getById . $id);
        return $arrList;
    }
}