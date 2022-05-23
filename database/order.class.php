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

}
?>