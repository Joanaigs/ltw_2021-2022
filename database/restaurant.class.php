<?php
declare(strict_types = 1);
require_once(__DIR__ .'/../database/review.class.php');
require_once(__DIR__ .'/../database/filter.class.php');
class Restaurant {
    public int $id;
    public int $idUser;
    public string $name;
    public string $address;
    public int $image;
    public bool $heart;
    public bool $loggedIn;
    public string $filt;
    public $ranking;

    public function __construct(int $id, int $idUser, string $name, string $address, int $image)
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
            $r=Review::getRanking($db, $restaurant['id']);

            $temp->ranking=$r;
            $temp->filt=Filter::getFilterfromRestaurant($db, $restaurant['id']);
            $restaurants[]=$temp;
        }
        return $restaurants;
    }

    static function getFavoriteRestaurants(PDO $db, Session $session, int $idUser) : array {
        $stmt = $db->prepare('
        SELECT id, Restaurant.idUser, name, address, image
        FROM FavoriteRestaurant, Restaurant
        WHERE FavoriteRestaurant.idUser=? and idRestaurant=id
      ');
        $stmt->execute(array($idUser));
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
            $r=Review::getRanking($db, $restaurant['id']);

            $temp->ranking=$r;
            $restaurants[]=$temp;
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

       $temp=  new Restaurant(
            $restaurant['id'],
            $restaurant['idUser'],
            $restaurant['name'],
            $restaurant['address'],
            $restaurant['image']
        );
        $temp->filt=Filter::getFilterfromRestaurant($db, $restaurant['id']);
        return $temp;
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
            $r=Review::getRanking($db, $restaurant['id']);
            $temp->ranking=$r;
            $temp->filt=Filter::getFilterfromRestaurant($db, $restaurant['id']);
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
            $r=Review::getRanking($db, $restaurant['id']);
            $temp->ranking=$r;
            $temp->filt=Filter::getFilterfromRestaurant($db, $restaurant['id']);
            $restaurants[] = $temp;
        }
        return $restaurants;
    }
    static function addfavoriteRestaurants(PDO $db, string $idRe, int $idUser)  {
        $stmt = $db->prepare('INSERT INTO FavoriteRestaurant(idUser, idRestaurant) Values(?, ?)');
        $stmt->execute(array($idUser, $idRe));
    }

    static function addRestaurants(PDO $db, int $idUser, string $name, string $address, $image)  {
        if($image===null){
            $stmt = $db->prepare('INSERT INTO Restaurant(idUser, name, address) Values(?, ?, ?)');
            $stmt->execute(array($idUser, $name, $address));
        }
        else{
            $stmt = $db->prepare('INSERT INTO Restaurant(idUser, name, address, image) Values(?, ?, ?, ?)');
            $stmt->execute(array($idUser, $name, $address, $image));
        }
    }

    static function removefavoriteRestaurants(PDO $db, string $idRe, int $idUser)  {
        $stmt = $db->prepare('DELETE FROM FavoriteRestaurant where idUser=? and idRestaurant=?' );
        $stmt->execute(array($idUser, $idRe));
    }


    static function removeRestaurants(PDO $db, int $idRe)  {
        $rest=self::getRestaurant($db, $idRe);
        $stmt = $db->prepare('DELETE FROM Restaurant where id=?' );
        $stmt->execute(array($idRe));
        $stmtk = $db->prepare('Select title from images where id=?' );
        $stmtk->execute(array($rest->image));
        $image=$stmtk->fetch();
        echo $image['title'];
        if($image['title']!=='Default') {
            $stmt = $db->prepare('DELETE FROM Images where id=?');
            $stmt->execute(array($rest->image));
            $filePath = "images/restaurants/$rest->image.jpg";
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    static function updateRestaurants(PDO $db, int $idRe, string $name, string $address, string $cate, $image)  {
        if($image===null) {
            $stmt = $db->prepare('Update Restaurant set name=?, address=? where id=?');
            $stmt->execute(array($name, $address, $idRe));
        }
        else{
            $stmt = $db->prepare('Update Restaurant set name=?, address=?, image=? where id=?');
            $stmt->execute(array($name, $address, $image, $idRe));
        }

        $stmt = $db->prepare('Update CategoryRestaurant set idCategory=(select Category.id from Category where id=?) where idRestaurant=?' );
        $stmt->execute(array($cate, $idRe));
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