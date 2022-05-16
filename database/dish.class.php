<?php

    declare(strict_types = 1);

    class Dish{
        public string $id;
        public string $idRestaurant;
        public string $name;
        public string $price;
        public string $photo;
        public string $idMeal;



        public function __construct(string $id, string $idRestaurant, string  $name, string $price, string $photo, string $idMeal){
            $this->id=$id;
            $this->idRestaurant = $idRestaurant;
            $this->name=$name;
            $this->price=$price;
            $this->photo=$photo;
            $this->idMeal=$idMeal;
        }

        static public function getDishesRestaurant(PDO $db, string $id): array{
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