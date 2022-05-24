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
        public string $meal;



        public function __construct(int $id, int $idRestaurant, string  $name, float $price, string $photo, int $idMeal, int $idTypeOfDish, string $meal){

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

        static function getFavoriteDishes(PDO $db, int $id) : array {
            $stmt = $db -> prepare('
                SELECT Dish.id, Dish.idRestaurant, Dish.name, Dish.price, Dish.photo, Dish.idMeal,
                       Dish.idTypeOfDish, Meal.name as mealName
                FROM FavoriteDish, Dish, Meal
                WHERE FavoriteDish.idDish == Dish.id AND FavoriteDish.idUser == ? AND Dish.idMeal == Meal.id
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


        static function isfavoriteDish(PDO $db, int $idDi, string $idUser)  {
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
        static function dishOrder(PDO $db, int $idOrder)  {
            $stmt = $db->prepare('SELECT distinct Dish.id as id, idRestaurant, Dish.name as name, price, photo, idMeal, idTypeOfDish, Meal.name as mealName
            FROM Dish, Meal, DishOrder WHERE DishOrder.idOrder=? and DishOrder.idDish=Dish.id and idMeal=Meal.id');
            $stmt->execute(array($idOrder));

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
    }

?>

