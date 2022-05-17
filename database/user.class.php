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

        public function __construct(int $id, string $username, string $email, string $phoneNumber, string $address, string $city, string $country){
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->address = $address;
            $this->city = $city;
            $this->country = $country;
        }

        function save($db){
            $stmt = $db->prepare('
        UPDATE User SET username = ?, email = ?, phoneNumber = ?, address = ?
        WHERE id = ?');

            $stmt->execute(array($this->username, $this->email, $this->phoneNumber, $this->address, $this->id));
        }

        static function addNewUser(bool &$success, PDO $db, string $username, string $email, string $password, string $phoneNumber, string $address, string $city, string $country){
            $password = md5($password);
            $stmt = $db->prepare('INSERT INTO User (username, email, password, address, city, country, phoneNumber) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($username, $email, $password, $address, $city, $country, $phoneNumber));
            $stmt = $db->prepare("
        SELECT *
        FROM User
        WHERE username = ?");

            $stmt->execute(array($username));

            if ($row = $stmt->fetch()) {
                $success = true;
            }
            else
                $success = false;
        }

        static function getUserWithEmail(PDO $db, string $username, string $email): bool{
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
                echo 'Já existe uma conta a utilizar este nome de utilizador.';
                return true;
            }
            echo 'Já existe uma conta a utilizar este email.';
            return true;
        }

        static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
            $stmt = $db->prepare('
        SELECT *
        FROM User
        WHERE email = ?');

            $stmt->execute(array($email));

            if ($user = $stmt->fetch()) {

                if(md5($password) === $user['password']){
                    return new User(
                        intval($user['id']),
                        $user['username'],
                        $user['email'],
                        $user['phoneNumber'],
                        $user['address'],
                        $user['city'],
                        $user['country']
                    );
                }
                else echo 'A palavra-passe está incorreta.';
            }
            return null;
        }

        static function getUser(PDO $db, int $id) : ?User {
            $stmt = $db->prepare('
        SELECT *
        FROM User
        WHERE id = ?
      ');

            $stmt->execute(array($id));
            $user = $stmt->fetch();

             return new User(
                intval($user['id']),
                $user['username'],
                $user['email'],
                $user['phoneNumber'],
                $user['address'],
                $user['city'],
                $user['country']
            );
        }

        static function getOrders(PDO $db, int $id) {
            $stmt = $db->prepare('
        SELECT idDish
        FROM Orders
        WHERE idUser = ?
      ');

            $stmt->execute(array($id));

            if ($row = $stmt->fetch()) {
                $stmt1 = $db->prepare("
                SELECT *
                FROM Dish
                WHERE id = ?");

                $stmt1->execute(array($row['idDish']));
                $dishes = array();
                while($dish = $stmt1->fetch()){
                    $dishes[] = new Dish(
                        $dish['id'],
                        $dish['idRestaurant'],
                        $dish['name'],
                        $dish['price'],
                        $dish['photo'],
                        $dish['idTypeOfDish'],
                        $dish['idMeal']
                    );
                }
                    return $dishes;
                }
            else{
                echo 'Ainda não foram realizados pedidos.';
                return null;
            }
        }
    }
