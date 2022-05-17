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
        public string $meal;



        public function __construct(string $id, string $idRestaurant, string  $name, string $price, string $photo, string $idMeal, string $idTypeOfDish, string $meal){
            $this->id=$id;
            $this->idRestaurant = $idRestaurant;
            $this->name=$name;
            $this->price=$price;
            $this->photo=$photo;
            $this->idMeal=$idMeal;
            $this->idTypeOfDish=$idTypeOfDish;
            $this->meal=$meal;
        }

        static public function getDishesRestaurant(PDO $db, string $id): array{
            $stmt = $db -> prepare('
                SELECT Dish.id as id, idRestaurant, Dish.name as name, price, photo, idMeal, idTypeOfDish, Meal.name as mealName
                FROM Dish, Meal
                WHERE idRestaurant = ? and idMeal=Meal.id
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
                    $dish['idTypeOfDish'],
                    $dish['mealName']
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
        SELECT Dish.id as id, idRestaurant, Dish.name as name, price, photo, idMeal, idTypeOfDish, Meal.name as mealName
        FROM Dish, Meal where Dish.id=? and idMeal=Meal.id
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
                $dish['idTypeOfDish'],
                $dish['mealName']
            );
        }

        static function filterDish(PDO $db, $filter, $idRestaurant)
        {
            $stmt = $db->prepare('SELECT Dish.id as id, idRestaurant, Dish.name as name, price, photo, idMeal, idTypeOfDish, Meal.name as mealName
            FROM Dish, Meal WHERE idTypeOfDish=? and idRestaurant=? and idMeal=Meal.id');
            $stmt->execute(array($filter, $idRestaurant));

            $dishes = array();

            while ($dish = $stmt->fetch()){
                $dishes[] = new Dish(
                    $dish['id'],
                    $dish['idRestaurant'],
                    $dish['name'],
                    $dish['price'],
                    $dish['photo'],
                    $dish['idMeal'],
                    $dish['idTypeOfDish'],
                    $dish['mealName']
                );
            }
            return $dishes;
        }

        static function addfavoriteDish(PDO $db, string $idDi, string $idUser)  {
            $stmt = $db->prepare('INSERT INTO FavoriteDish(idUser, idDish) Values(?, ?)');
            $stmt->execute(array($idUser, $idDi));
        }
        static function removefavoriteDish(PDO $db, string $idDi, string $idUser)  {
            $stmt = $db->prepare('DELETE FROM FavoriteDish where idUser=? and idDish=?' );
            $stmt->execute(array($idUser, $idDi));
        }
        static function isfavoriteDish(PDO $db, string $idDi, string $idUser)  {
            $stmt = $db->prepare('SELECT Dish.id as id, idRestaurant, Dish.name as name, price, photo, idMeal, idTypeOfDish, Meal.name as mealName
            FROM Dish, Meal, FavoriteDish WHERE FavoriteDish.idUser=? and FavoriteDish.idDish=? and FavoriteDish.idDish=Dish.id and idMeal=Meal.id');
            $stmt->execute(array($idUser, $idDi));

            $dishes = array();

            while ($dish = $stmt->fetch()){
                $dishes[] = new Dish(
                    $dish['id'],
                    $dish['idRestaurant'],
                    $dish['name'],
                    $dish['price'],
                    $dish['photo'],
                    $dish['idMeal'],
                    $dish['idTypeOfDish'],
                    $dish['mealName']
                );
            }
            if(sizeof($dishes)>0)
                return true;
            else
                return false;
        }
    }



?>