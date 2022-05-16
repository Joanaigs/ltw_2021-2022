<?php

    declare(strict_types = 1);

    class Dish{
        public string $id;
        public string $idRestaurant;
        public string $name;
        public string $price;
        public string $photo;
        public string $idMeal;
        public string $idTypeOfDish;



        public function __construct(string $id, string $idRestaurant, string  $name, string $price, string $photo, string $idMeal, string $idTypeOfDish){
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
        static function addDish(PDO $db, string $name, string $price, string $idMeal, string $idRest, string $idType)  {
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