<?php
  declare(strict_types = 1);

  class Restaurant {
    public string $id;
    public string $idUser;
    public string $name;
    public string $address;
    public string $image;

    public function __construct(string $id, string $idUser, string $name, string $address, string $image)
    {
      $this->id = $id;
      $this->idUser=$idUser;
      $this->name=$name;
      $this->address=$address;
      $this->image=$image;
    }

    static function getRestaurants(PDO $db) : array {
      $stmt = $db->prepare('
        SELECT *
        FROM Restaurant
      ');
        $stmt->execute();
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

      static function getFavoriteRestaurants(PDO $db) : array {
          $stmt = $db->prepare('
        SELECT *
        FROM FavoriteRestaurant
      ');
          $stmt->execute();
          return $stmt->fetchAll();;
      }


      static function getRestaurant(PDO $db, string $id) : Restaurant {
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


      static function searchRestaurants(PDO $db, string $search) : array {
          $stmt = $db->prepare('SELECT * FROM Restaurant WHERE name LIKE ? ');
          $stmt->execute(array('%'. $search . '%'));

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
      static function filterRestaurants(PDO $db, string $filter) : array {
          $stmt = $db->prepare('SELECT * FROM Restaurant WHERE id in(
        SELECT idRestaurant FROM CategoryRestaurant, Category  WHERE idCategory=id and name=? )
 ');
          $stmt->execute(array($filter));

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
      static function addfavoriteRestaurants(PDO $db, string $idRe, string $idUser)  {
          $stmt = $db->prepare('INSERT INTO FavoriteRestaurant(idUser, idRestaurant) Values(?, ?)');
          $stmt->execute(array($idUser, $idRe));
      }
      static function removefavoriteRestaurants(PDO $db, string $idRe, string $idUser)  {
          $stmt = $db->prepare('DELETE FROM FavoriteRestaurant where idUser=? and idRestaurant=?' );
          $stmt->execute(array($idUser, $idRe));
      }
  }
?>