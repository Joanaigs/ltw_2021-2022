<?php
declare(strict_types = 1);

class Filter {
    public string $id;
    public string $name;

    public function __construct(string $id, string $name)
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
        while ($artist = $stmt->fetch()) {
            $filters[] = new Filter(
                $artist['id'],
                $artist['name']
            );
        }
        return $filters;
    }
}
?>