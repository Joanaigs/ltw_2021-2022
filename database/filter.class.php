<?php
declare(strict_types = 1);

class Filter {
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name=$name;
    }

    static function getFilterRestaurants(PDO $db) : array
    {
        $stmt = $db->prepare('
        SELECT *
        FROM Category
      ');
        $stmt->execute(array());
        $filters = array();
        while ($filter = $stmt->fetch()) {
            $filters[] = new Filter(
                $filter['id'],
                $filter['name']
            );
        }
        return $filters;
    }
    static function getMeals(PDO $db):array  {
        $stmt = $db->prepare('
        SELECT *
        FROM Meal
      ');
        $stmt->execute(array());
        $filters = array();
        while ($filter = $stmt->fetch()) {
            $filters[] = new Filter(
                $filter['id'],
                $filter['name']
            );
        }
        return $filters;
    }
    static function getTypeDish(PDO $db):array  {
        $stmt = $db->prepare('
        SELECT *
        FROM TypeOfDish
      ');
        $stmt->execute(array());
        $filters = array();
        while ($filter = $stmt->fetch()) {
            $filters[] = new Filter(
                $filter['id'],
                $filter['type']
            );
        }
        return $filters;
    }
}
?>