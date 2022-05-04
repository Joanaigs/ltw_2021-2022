<?php
    declare(strict_types=1);

    class User
    {
        public string $id;
        public string $username;
        public string $email;
        public string $phoneNumber;
        public string $address;
        public string $city;
        public string $country;

        public function __contruct(string $id, string $username, string $email, string $phoneNumber, string $address, string $city, string $country){
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
        UPDATE User SET username = ?, email = ?, 
        WHERE id = ?');

            $stmt->execute(array($this->username, $this->email, $this->id));
        }

        static function addNewUser(bool &$success, PDO $db, string $username, string $email, string $password, string $phoneNumber, string $address, string $city, string $country){
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

        static function getUserWithUsername(PDO $db, string $username, string $email): bool{
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
                ?> Já existe uma conta a utilizar este nome de utilizador.
                <?php return true;
            }
            ?> Já existe uma conta a utilizar este email.
            <?php return true;
        }

        static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
            $stmt = $db->prepare('
        SELECT id, username, email, phoneNumber, address, city, country
        FROM User
        WHERE lower(email) = ? AND password = ?');

            $stmt->execute(array(strtolower($email), sha1($password)));

            if ($user = $stmt->fetch()) {
                return new User(
                    $user['id'],
                    $user['username'],
                    $user['email'],
                    $user['phoneNumber'],
                    $user['address'],
                    $user['city'],
                    $user['country'],
                    $user['postCode']
                );
            } else return null;
        }

        static function getUser(PDO $db, int $id) : User {
            $stmt = $db->prepare('
        SELECT id, username, email, phoneNumber, address, city, country+
        FROM User
        WHERE id = ?
      ');

            $stmt->execute(array($id));
            $user = $stmt->fetch();

            return new Customer(
                $user['id'],
                $user['username'],
                $user['email'],
                $user['phoneNumber'],
                $user['address'],
                $user['city'],
                $user['country']
            );
        }

    }