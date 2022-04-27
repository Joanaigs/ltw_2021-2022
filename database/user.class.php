<?php
    declare(strict_types=1);

    class User
    {
        public int $id;
        public string $username;
        public string $email;
        public string $phoneNumber;
        public string $address;
        public string $city;
        public string $country;
        public string $postcode;

        public function __contruct(int $id, string $username, string $email, string $phoneNumber, string $address, string $city, string $country, string $postcode){
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->address = $address;
            $this->city = $city;
            $this->country = $country;
            $this->postcode = $postcode;
        }

        function save($db){
            $stmt = $db->prepare('
        UPDATE User SET username = ?, email = ?, 
        WHERE id = ?');

            $stmt->execute(array($this->username, $this->email, $this->id));
        }

        static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
            $stmt = $db->prepare('
        SELECT id, username, email, phoneNumber, address, city, country, postcode,
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
        SELECT id, username, email, phoneNumber, address, city, country, postcode
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
                $user['country'],
                $user['postCode']
            );
        }

    }