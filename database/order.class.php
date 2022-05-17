<?php
declare(strict_types = 1);

class Order {
    public string $id;
    public string $idDish;
    public string $idUser;
    public string $state;
    public string $dishName;

    public function __construct(string $id, string $idDish, string $idUser, string $state, string $dishName)
    {
        $this->id = $id;
        $this->idDish = $idDish;
        $this->idUser = $idUser;
        $this->state = $state;
        $this->dishName= $dishName;
    }

    static function getOrdersRestaurant(PDO $db, string $id) : array {
        $stmt = $db->prepare('
        SELECT Orders.id as id, Orders.idDish as idDish, Orders.idUser as idUser, state, Dish.name as name
        FROM Orders, Dish
        WHERE Dish.idRestaurant = ? and Orders.idDish=Dish.id
      ');
        $stmt->execute(array($id));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $orders[] = new Order(
                $order['id'],
                $order['idDish'],
                $order['idUser'],
                $order['state'],
                $order['name']
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