<?php
declare(strict_types = 1);

class Order {
    public int $id;
    public int $idDish;
    public int $idUser;
    public string $state;
    public string $address;
    public int $idRestaurant;

    public function __construct(int $id, int $idUser, string $state, $address)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->state = $state;
        $this->address=$address;
    }

    static function getOrdersRestaurant(PDO $db, string $id) : array {
        $stmt = $db->prepare('
        SELECT distinct Orders.id as id, Orders.idUser as idUser, state, address
        FROM Orders, DishOrder, Dish
        WHERE Dish.idRestaurant = ? and DishOrder.idDish=Dish.id and Orders.id=DishOrder.idOrder
      ');
        $stmt->execute(array($id));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $orders[] = new Order(
                $order['id'],
                $order['idUser'],
                $order['state'],
                $order['address']
            );

        }
        return $orders;
    }

    static function getOrdersUser(PDO $db, int $id) : array {
        $stmt = $db->prepare('
        SELECT distinct Orders.id as id, Orders.idUser as idUser, state, address, idRestaurant
        FROM Orders, DishOrder, Dish
        WHERE Orders.idUser = ? and DishOrder.idDish=Dish.id and Orders.id=DishOrder.idOrder
      ');
        $stmt->execute(array($id));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $temp = new Order(
                $order['id'],
                $order['idUser'],
                $order['state'],
                $order['address']
            );
            $temp->idRestaurant=$order['idRestaurant'];
            $orders[]=$temp;
        }
        return $orders;
    }

    static function UpdateOrdersRestaurant(PDO $db, string $id, string $state) {
        $stmt = $db->prepare('UPDATE Orders set state=? where id=?');
        $stmt->execute(array($state, $id));
    }

    static function addOrder(PDO $db, int $idUser, string $address)  {
        $stmt = $db->prepare("INSERT INTO Orders(idUser, address, state) VALUES (?, ?, 'Recebido pelo restaurante')");
        $stmt->execute(array( $idUser, $address));
    }

    static function addAddressOrder(PDO $db, string $address,int $id)  {
        $stmt = $db->prepare('UPDATE Orders set address=? where id=?');
        $stmt->execute(array($address, $id));
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
                $order['state'],
                $order['address']
            );
        }
        return end($orders);
    }

}
?>