<?php
declare(strict_types = 1);

class Restaurant {
    public int $id;
    public int $idUser;
    public string $name;
    public string $address;
    public string $image;

    public function __construct(int $id, int $idUser, string $name, string $address, string $image)
    {
        $this->id = $id;
        $this->idUser=$idUser;
        $this->name=$name;
        $this->address=$address;
        $this->image=$image;
    }

    static function getRestaurants(PDO $db) : array {
        $stmt = $db->prepare('
        SELECT *
        FROM Restaurant
      ');
        $stmt->execute();
        return $stmt->fetchAll();;
    }



    static function getRestaurant(PDO $db, int $id) : Restaurant {
        $stmt = $db->prepare('SELECT *  FROM Restaurant WHERE id = ?');
        $stmt->execute(array($id));

        $restaurant = $stmt->fetch();

        return new Restaurant(
            $restaurant['id'],
            $restaurant['idUser'],
            $restaurant['name'],
            $restaurant['address'],
            $restaurant['image']
        );
    }

}
?>
