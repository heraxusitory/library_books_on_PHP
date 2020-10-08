<?php 

// Назначаем пространство имен
namespace App;

class DB {

    public function connect($dbName, $dnUser, $dbPass) {
        try {
            // Подключение через класс PDO
            $connection = new \PDO('mysql:host=localhost;dbname=' . $dbName, $dnUser, $dbPass);
        } catch (\PDOException $e) {
            // В случае если не удалось подключитбся к БД, то убиваем нахуй наш сайт
            die('Failed to connect on Data Base');
        }
        
        return $connection;
    }

    public function getList($queryStr) {
        // Ключевое слово $this означает обращение к методу или переменной данного(DB) класса, или родительского класса
        $connection = $this->connect(DB_NAME, DB_USER, DB_PASSWORD);
        $objList = $connection->query($queryStr);
        $arrList = [];
        if ($objList != false) {
            foreach($objList as $element) {
                $arrList[] = $element;
            }
        } else {
            return false;
        }

        return $arrList;
    }

    public function get($queryStr) {
        $connection = $this->connect(DB_NAME, DB_USER, DB_PASSWORD);
        $objData = $connection->query($queryStr);
        $arrData = [];
        
        if ($objData != false) {
            foreach($objData as $data) {
                $arrData = $data;
            }
        } else {
            return false;
        }
        return $arrData;  
    }

}

?>