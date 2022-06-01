<?php
declare(strict_types = 1);

class Restaurant {
    public int $id;
    public int $idUser;
    public string $name;
    public string $address;
    public string $image;
    public bool $heart;
    public bool $loggedIn;

    public function __construct(int $id, int $idUser, string $name, string $address, string $image)
    {
        $this->id = $id;
        $this->idUser=$idUser;
        $this->name=$name;
        $this->address=$address;
        $this->image=$image;
    }

    static function getRestaurants(PDO $db, Session $session) : array {
        $stmt = $db->prepare('
        SELECT *
        FROM Restaurant
      ');
        $stmt->execute();
        $restaurants = array();

        while ($restaurant = $stmt->fetch()) {
            $temp = new Restaurant(
                $restaurant['id'],
                $restaurant['idUser'],
                $restaurant['name'],
                $restaurant['address'],
                $restaurant['image']
            );
            if ($session->isLoggedIn()) {
                if (self::isfavoriteRestaurant($db, $restaurant['id'], $session->getId())) {
                    $temp->heart = true;
                } else
                    $temp->heart = false;
                if ($session->isLoggedIn()) {
                    $temp->loggedIn = true;
                } else
                    $temp->loggedIn = false;
            }
            $restaurants[]=$temp;
        }
        return $restaurants;
    }

    static function getFavoriteRestaurants(PDO $db,  int $idUser) : array {
        $stmt = $db->prepare('
        SELECT id, Restaurant.idUser, name, address, image
        FROM FavoriteRestaurant, Restaurant
        WHERE FavoriteRestaurant.idUser=? and idRestaurant=id
      ');
        $stmt->execute(array($idUser));
        $restaurants = array();

        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['id'],
                $restaurant['idUser'],
                $restaurant['name'],
                $restaurant['address'],
                $restaurant['image']
            );
        }
        return $restaurants;
    }

    static function isfavoriteRestaurant(PDO $db, int $id, int $idUser){
        $stmt = $db->prepare('SELECT id, Restaurant.idUser as idUser, name, address, image

        FROM FavoriteRestaurant , Restaurant
        WHERE FavoriteRestaurant.idUser=? and idRestaurant=? and idRestaurant=id');
        $stmt->execute(array($idUser, $id));

        $restaurants = array();

        while ($restaurant = $stmt->fetch()) {
            $restaurants[] = new Restaurant(
                $restaurant['id'],
                $restaurant['idUser'],
                $restaurant['name'],
                $restaurant['address'],
                $restaurant['image']
            );
        }
        if(sizeof($restaurants)>0)
            return true;
        else
            return false;
    }


    static function getRestaurant(PDO $db, int $id) : Restaurant {
        $stmt = $db->prepare('SELECT *  FROM Restaurant WHERE id = ?');
        $stmt->execute(array($id));

        $restaurant = $stmt->fetch();

        return new Restaurant(
            $restaurant['id'],
            $restaurant['idUser'],
            $restaurant['name'],
            $restaurant['address'],
            $restaurant['image']
        );
    }


    static function searchRestaurants(PDO $db, string $search, Session $session) : array {
        $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name LIKE ? ');
        $stmt->execute(array('%'. $search . '%'));

        $restaurants = array();

        while ($restaurant = $stmt->fetch()) {
            $temp = new Restaurant(
                $restaurant['id'],
                $restaurant['idUser'],
                $restaurant['name'],
                $restaurant['address'],
                $restaurant['image']
            );
            if ($session->isLoggedIn()) {
                if (self::isfavoriteRestaurant($db, $restaurant['id'], $session->getId())) {
                    $temp->heart = true;
                } else
                    $temp->heart = false;
                if ($session->isLoggedIn()) {
                    $temp->loggedIn = true;
                } else
                    $temp->loggedIn = false;
            }
            $restaurants[]=$temp;
        }
        return $restaurants;
    }
    static function filterRestaurants(PDO $db, string $filter, Session $session) : array {
        $stmt = $db->prepare('SELECT * FROM Restaurant WHERE id in(
        SELECT idRestaurant FROM CategoryRestaurant, Category  WHERE idCategory=id and name=? )
 ');
        $stmt->execute(array($filter));

        $restaurants = array();
        while ($restaurant = $stmt->fetch()) {

            $temp = new Restaurant(
                $restaurant['id'],
                $restaurant['idUser'],
                $restaurant['name'],
                $restaurant['address'],
                $restaurant['image']
            );
            if ($session->isLoggedIn()) {
                if (self::isfavoriteRestaurant($db, $restaurant['id'], $session->getId())) {
                    $temp->heart = true;
                } else
                    $temp->heart = false;
                if ($session->isLoggedIn()) {
                    $temp->loggedIn = true;
                } else
                    $temp->loggedIn = false;
            }
            $restaurants[] = $temp;
        }
        return $restaurants;
    }
    static function addfavoriteRestaurants(PDO $db, string $idRe, int $idUser)  {
        $stmt = $db->prepare('INSERT INTO FavoriteRestaurant(idUser, idRestaurant) Values(?, ?)');
        $stmt->execute(array($idUser, $idRe));
    }

    static function addRestaurants(PDO $db, int $idUser, string $name, string $address)  {
        $stmt = $db->prepare('INSERT INTO Restaurant(idUser, name, address) Values(?, ?, ?)');
        $stmt->execute(array($idUser, $name, $address));
    }

    static function removefavoriteRestaurants(PDO $db, string $idRe, int $idUser)  {
        $stmt = $db->prepare('DELETE FROM FavoriteRestaurant where idUser=? and idRestaurant=?' );
        $stmt->execute(array($idUser, $idRe));
    }

    static function removeRestaurants(PDO $db, int $idRe)  {
        $stmt = $db->prepare('DELETE FROM Restaurant where id=?' );
        $stmt->execute(array($idRe));
    }

    static function hasRestaurant(PDO $db, int $id)
    {
        $stmt = $db->prepare('
            SELECT *
            FROM Restaurant
            WHERE idUser = ?
          ');

        $stmt->execute(array($id));
        $r = $stmt->fetch();
        if($r===false)
            return false;
        return new Restaurant(
            $r['id'],
            $r['idUser'],
            $r['name'],
            $r['address'],
            $r['image']
        );
    }
}
?>