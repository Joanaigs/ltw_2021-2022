<?php

declare(strict_types = 1);

class Cart {
    public int $id;
    public int $idRestaurant;
    public string $name;
    public float $price;
    public string $photo;
    public int $idMeal;
    public int $idUser;

    public function __construct(int $id, int $idRestaurant, int $idUser, string  $name, float $price, string $photo, int $idMeal)
    {
        $this->id=$id;
        $this->idRestaurant = $idRestaurant;
        $this->name=$name;
        $this->price=$price;
        $this->photo=$photo;
        $this->idMeal=$idMeal;
        $this->idUser=$idUser;
    }


    static function getCart(PDO $db, int $idUser, int $idRes) {
        $stmt = $db -> prepare('
                
                SELECT Dish.id, Dish.idRestaurant, Dish.name, Dish.price, Dish.photo, Dish.idMeal, idUser
                FROM Dish, Cart
                WHERE Dish.id = Cart.idDish and idUser=? and Dish.idRestaurant=?;
            ');

        $stmt -> execute(array($idUser, $idRes));
        $cart = array();

        while ($dish = $stmt->fetch()){
            $cart[] = new Cart(
                $dish['id'],
                $dish['idRestaurant'],
                $dish['idUser'],
                $dish['name'],
                $dish['price'],
                $dish['photo'],
                $dish['idMeal']
            );
        }

        return $cart;
    }

    static function addToCart(PDO $db, string $idDi, int $idUser)  {
        $stmt = $db->prepare('INSERT INTO Cart(idDish, idUser) Values(?, ?)');
        $stmt->execute(array($idDi, $idUser));
    }
    static function findInCart(PDO $db, int $idDi, int $idUser)  {
        $stmt = $db->prepare('SELECT Dish.id, Dish.idRestaurant, Dish.name, Dish.price, Dish.photo, Dish.idMeal, idUser 
         FROM Cart, Dish 
         WHERE idUser=? and idDish=? and Dish.id = Cart.idDish');
        $stmt->execute(array($idUser, $idDi));

        $cart = array();

        while ($c = $stmt->fetch()){
            $cart[] = new Cart(
                $c['id'],
                $c['idRestaurant'],
                $c['idUser'],
                $c['name'],
                $c['price'],
                $c['photo'],
                $c['idMeal']
            );
        }
        if(sizeof($cart)>0)
            return true;
        else
            return false;
    }

    static function removefromCart(PDO $db, int $idDi, int $idUser)  {
        $stmt = $db->prepare('DELETE FROM Cart where idUser=? and idDish=?' );
        $stmt->execute(array($idUser, $idDi));
    }

}
?>