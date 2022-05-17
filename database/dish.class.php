<?php

    declare(strict_types = 1);

    class Dish{
        public int $id;
        public int $idRestaurant;
        public string $name;
        public float $price;
        public string $photo;
        public int $idMeal;
        public int $idTypeOfDish;



        public function __construct(int $id, int $idRestaurant, string  $name, float $price, string $photo, int $idMeal, int $idTypeOfDish){
            $this->id=$id;
            $this->idRestaurant = $idRestaurant;
            $this->name=$name;
            $this->price=$price;
            $this->photo=$photo;
            $this->idMeal=$idMeal;
            $this->idTypeOfDish=$idTypeOfDish;
        }

        static public function getDishesRestaurant(PDO $db, string $id): array{
            $stmt = $db -> prepare('
                SELECT *
                FROM Dish
                WHERE idRestaurant = ?
                Order by idMeal, name
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
                    $dish['idMeal'],
                    $dish['idTypeOfDish']
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
            return $stmt->fetchAll();
        }
        static function addDish(PDO $db, string $name, string $price, string $idMeal, int $idRest, string $idType)  {
        $stmt = $db->prepare('INSERT INTO Dish(idRestaurant, name, price, idTypeOfDish, idMeal) VALUES (?, ?, ?, ?, ?);');
        $stmt->execute(array($idRest, $name, $price, $idType, $idMeal));
        }
        static function removeDish(PDO $db, string $id)  {
            $stmt = $db->prepare('DELETE FROM Dish where id=?' );
            $stmt->execute(array($id));
        }
        static function getDish(PDO $db, string $id) : Dish
        {
            $stmt = $db->prepare('
        SELECT *
        FROM Dish where id=?
      ');
            $stmt->execute(array($id));
            $dish = $stmt->fetch();
            return new Dish(
                $dish['id'],
                $dish['idRestaurant'],
                $dish['name'],
                $dish['price'],
                $dish['photo'],
                $dish['idMeal'],
                $dish['idTypeOfDish']
            );
        }
    }



?>