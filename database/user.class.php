<?php
declare(strict_types=1);
require_once('database/dish.class.php');

class User
{
    public int $id;
    public string $username;
    public string $email;
    public string $phoneNumber;
    public string $address;
    public string $city;
    public string $country;

    public function __construct(int $id, int $image, string $username, string $email, string $phoneNumber, string $address, string $city, string $country)
    {
        $this->id = $id;
        $this->image = $image;
        $this->username = $username;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->city = $city;
        $this->country = $country;
    }

    function save($db, string $password, string $confirm_password)
    {
        if ($password != NULL && $password === $confirm_password) {
            $cost = [
                'cost' => 11
            ];
            $hash = password_hash($password, PASSWORD_BCRYPT, $cost);
            $stmt = $db->prepare('
        UPDATE User SET username = ?, email = ?, phoneNumber = ?, address = ?, password = ?, image=?
        WHERE id = ?');
            $stmt->execute(array($this->username, $this->email, $this->phoneNumber, $this->address, $hash, $this->image, $this->id));
        } else {
            $stmt = $db->prepare('
        UPDATE User SET username = ?, email = ?, phoneNumber = ?, address = ?, image=?
        WHERE id = ?');
            $stmt->execute(array($this->username, $this->email, $this->phoneNumber, $this->address, $this->image, $this->id));
        }
    }

    static function addNewUser(bool &$success, PDO $db, string $username, string $email, string $password, string $phoneNumber, string $address, string $city, string $country)
    {
        $cost = [
            'cost' => 11
        ];
        $hash = password_hash($password, PASSWORD_BCRYPT, $cost);

        $stmt = $db->prepare('INSERT INTO User (username, email, password, address, city, country, phoneNumber) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($username, $email, $hash, $address, $city, $country, $phoneNumber));
        $stmt = $db->prepare("
        SELECT *
        FROM User
        WHERE username = ?");

        $stmt->execute(array($username));

        if ($row = $stmt->fetch()) {
            $success = true;
        } else
            $success = false;
    }

    static function getUserWithEmail(Session $session, PDO $db, string $username, string $email): bool
    {
        $stmt = $db->prepare("
        SELECT email
        FROM User
        WHERE email = ?");
        $stmt->execute(array($email));

        if (!($row = $stmt->fetch())) {
            $stmt1 = $db->prepare("
                SELECT username
                FROM User
                WHERE username = ?");

            $stmt1->execute(array($username));

            if (!($row1 = $stmt1->fetch())) {
                return false;
            }
            $session->addMessage('error', 'Já existe uma conta a utilizar este nome de utilizador.');
            return true;
        }
        $session->addMessage('error', 'Já existe uma conta a utilizar este email.');
        return true;
    }

    static function getUserWithPassword(Session $session, PDO $db, string $email, string $password): ?User
    {
        $stmt = $db->prepare('
        SELECT *
        FROM User
        WHERE email = ?');

        $stmt->execute(array($email));

        if ($user = $stmt->fetch()) {

            if (password_verify($password, $user['password'])) {
                return new User(
                    intval($user['id']),
                    $user['image'],
                    $user['username'],
                    $user['email'],
                    $user['phoneNumber'],
                    $user['address'],
                    $user['city'],
                    $user['country']
                );
            } else $session->addMessage('error', 'A palavra-passe está incorreta.');
        }
        return null;
    }

    static function getUser(PDO $db, int $id): ?User
    {
        $stmt = $db->prepare('
        SELECT *
        FROM User
        WHERE id = ?
      ');

        $stmt->execute(array($id));
        $user = $stmt->fetch();

        return new User(
            intval($user['id']),
            $user['image'],
            $user['username'],
            $user['email'],
            $user['phoneNumber'],
            $user['address'],
            $user['city'],
            $user['country']
        );
    }

    static function getOrders(Session $session, PDO $db, int $id): ?array
    {
        $stmt = $db->prepare('
        SELECT idDish
        FROM Orders, DishOrder
        WHERE idUser = ?
      ');

        $stmt->execute(array($id));

        if ($row = $stmt->fetch()) {
            $stmt1 = $db->prepare("
                SELECT Dish.id as id, idRestaurant, Dish.name as name, price, Dish.image, idMeal, idTypeOfDish, Meal.name as mealName
                FROM Dish, Meal
                WHERE Dish.id = ?  and idMeal=Meal.id");

            $stmt1->execute(array($row['idDish']));
            $dishes = array();
            while ($dish = $stmt1->fetch()) {
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
        } else {
            $session->addMessage('error', 'Ainda não foram realizados pedidos.');
            return null;
        }
    }

    static function deleteUser(PDO $db, int $idUser)
    {
        $stmt = $db->prepare('DELETE FROM User where id=? ');
        $stmt->execute(array($idUser));
    }

}
