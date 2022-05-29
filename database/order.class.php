<?php
declare(strict_types = 1);

class Order {
    public int $id;
    public int $idDish;
    public int $idUser;
    public string $state;
    public string $dishName;

    public function __construct(int $id, int $idUser, string $state)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->state = $state;
    }

    static function getOrdersRestaurant(PDO $db, string $id) : array {
        $stmt = $db->prepare('
        SELECT distinct Orders.id as id, Orders.idUser as idUser, state
        FROM Orders, DishOrder, Dish
        WHERE Dish.idRestaurant = ? and DishOrder.idDish=Dish.id and Orders.id=DishOrder.idOrder
      ');
        $stmt->execute(array($id));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $orders[] = new Order(
                $order['id'],
                $order['idUser'],
                $order['state']
            );
        }
        return $orders;
    }
    static function UpdateOrdersRestaurant(PDO $db, string $id, string $state) {
        $stmt = $db->prepare('UPDATE Orders set state=? where id=?');
        $stmt->execute(array($state, $id));
    }

    static function addOrder(PDO $db, int $idUser)  {
        $stmt = $db->prepare('INSERT INTO Orders(idUser, state) VALUES (?, "received")');
        $stmt->execute(array($idUser));
    }

    static function addDishOrder(PDO $db, int $idOrder, int $idDish)  {
        $stmt = $db->prepare('INSERT INTO DishOrder(idDish , idOrder) VALUES (?,?)');
        $stmt->execute(array($idDish, $idOrder));
    }


    static function orderOfUser(PDO $db, int $idUser)  {
        $stmt = $db->prepare('SELECT * FROM Orders where idUser=?');
        $stmt->execute(array($idUser));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $orders[] = new Order(
                $order['id'],
                $order['idUser'],
                $order['state']
            );
        }
        return end($orders);
    }

}
?>