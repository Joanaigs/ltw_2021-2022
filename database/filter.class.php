<?php

declare(strict_types = 1);

class Filter{
    public int $id;
    public string $name;

    public function __construct(int $id, string  $name){
        $this->id=$id;
        $this->name=$name;
    }

    static public function getFilterItems(PDO $db){
        $stmt = $db -> prepare('
                SELECT *
                FROM Meal
            ');

        $stmt -> execute();

        $filterItems = array();

        while ($item = $stmt->fetch()){
            $filterItems[] = new Filter(
                $item['id'],
                $item['name'],

            );
        }

        return $filterItems;

    }

}

?>