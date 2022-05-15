<?php

    declare(strict_types = 1);

    class Dish{
        public int $id;
        public int $idRestaurant;
        public string $name;
        public float $price;
        public string $photo;
        public int $idMeal;



    public function __construct(int $id, int $idRestaurant, string  $name, float $price, string $photo, int $idMeal){
        $this->id=$id;
        $this->idRestaurant = $idRestaurant;
        $this->name=$name;
        $this->price=$price;
        $this->photo=$photo;
        $this->idMeal=$idMeal;
    }

    static public function getDishesRestaurant(PDO $db, int $id){
        $stmt = $db -> prepare('
                SELECT *
                FROM Dish
                WHERE idRestaurant = ?
            ');

        $stmt -> execute(array($id));

        $dishes = array();

        while ($dish = $stmt->fetch()){
            $dishes[] = new Dish(
                $dish['id'],
                $dish['idRestaurant'],
                $dish['name'],
                $dish['price'],
                $dish['photo'],
                $dish['idMeal']
            );
        }


        return $dishes;
    }

    static function getFavoriteDishes(PDO $db) : array {
        $stmt = $db->prepare('
        SELECT *
        FROM FavoriteDish
      ');
        $stmt->execute();
        return $stmt->fetchAll();;
    }
}

?>
