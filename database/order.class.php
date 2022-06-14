<?php
declare(strict_types = 1);

class Order {
    public int $id;
    public int $idDish;
    public int $idUser;
    public string $state;
    public string $address;
    public int $idRestaurant;
    public string $date;


    public function __construct(int $id, int $idUser, string $state, $address, string $date)
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->state = $state;
        $this->address=$address;
        $this->date=$date;
    }

    static function getOrdersRestaurant(PDO $db, string $id) : array {
        $stmt = $db->prepare('
        SELECT distinct Orders.id as id, Orders.idUser as idUser, state, address, date
        FROM Orders, DishOrder, Dish
        WHERE Dish.idRestaurant = ? and DishOrder.idDish=Dish.id and Orders.id=DishOrder.idOrder
        ORDER BY date asc, Orders.id desc
      ');
        $stmt->execute(array($id));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $orders[] = new Order(
                $order['id'],
                $order['idUser'],
                $order['state'],
                $order['address'],
                $order['date']
            );

        }
        return $orders;
    }

    static function getOrdersUser(PDO $db, int $id) : array {
        $stmt = $db->prepare('
        SELECT distinct Orders.id as id, Orders.idUser as idUser, state, address, idRestaurant, date
        FROM Orders, DishOrder, Dish
        WHERE Orders.idUser = ? and DishOrder.idDish=Dish.id and Orders.id=DishOrder.idOrder
        ORDER BY date asc, Orders.id desc

      ');
        $stmt->execute(array($id));

        $orders = array();

        while ($order = $stmt->fetch()) {
            $temp = new Order(
                $order['id'],
                $order['idUser'],
                $order['state'],
                $order['address'],
                $order['date']
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
        $date = date("d-m-Y");
        $stmt = $db->prepare("INSERT INTO Orders(idUser, address, state, date) VALUES (?, ?, 'Recebido pelo restaurante', ?)");
        $stmt->execute(array( $idUser, $address, $date));
    }

    static function addAddressOrder(PDO $db, string $address,int $id)  {
        $stmt = $db->prepare('UPDATE Orders set address=? where id=?');
        $stmt->execute(array($address, $id));
    }

    static function addDishOrder(PDO $db, int $idOrder, int $idDish, int $number)  {
        $stmt = $db->prepare('INSERT INTO DishOrder(idDish , idOrder, number) VALUES (?,?, ?)');
        $stmt->execute(array($idDish, $idOrder, $number));
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
                $order['address'],
                $order['date']
            );
        }
        return end($orders);
    }

}
?>