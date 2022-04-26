<?php
  declare(strict_types = 1);

  class Restaurant {
    public int $id;
    public string $idUser;
    public string $name;
    public string $address;
    public string $image;

    public function __construct(int $id, string $idUser, string $name, string $address, string $image)
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
      return $stmt->fetchAll();;
    }
  
  }
?>