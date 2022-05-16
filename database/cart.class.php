<?php

declare(strict_types = 1);

class Cart {
    public int $id;
    public int $idRestaurant;
    public string $name;
    public float $price;
    public string $photo;
    public int $idMeal;

    public function __construct(int $id, int $idRestaurant, string  $name, float $price, string $photo, int $idMeal)
    {
        $this->id=$id;
        $this->idRestaurant = $idRestaurant;
        $this->name=$name;
        $this->price=$price;
        $this->photo=$photo;
        $this->idMeal=$idMeal;

    }

    static function getCart(PDO $db) : array {
        $stmt = $db -> prepare('
                
                SELECT Dish.id, Dish.idRestaurant, Dish.name, Dish.price, Dish.photo, Dish.idMeal
                FROM Dish, Cart
                WHERE Dish.id = Cart.idDish;
            ');

        $stmt -> execute();

        $cart = array();

        while ($dish = $stmt->fetch()){
            $cart[] = new Cart(
                $dish['id'],
                $dish['idRestaurant'],
                $dish['name'],
                $dish['price'],
                $dish['photo'],
                $dish['idMeal']
            );
        }

        return $cart;
    }

}
?>