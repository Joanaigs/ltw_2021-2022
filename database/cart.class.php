<?php

declare(strict_types = 1);

class Cart{
    public int $id;
    public int $idDish;
    public int $idUser;

    public function __construct(int $id, int $idDish, int $idUser){

        $this->id=$id;
        $this->idDish=$idDish;
        $this->idUser=$idUser;
    }

    static function addToCart(PDO $db, string $idDi, string $idUser)  {
        $stmt = $db->prepare('INSERT INTO Cart(idDish, idUser) Values(?, ?)');
        $stmt->execute(array($idDi, $idUser));
    }
    static function findInCart(PDO $db, int $idDi, int $idUser)  {
        $stmt = $db->prepare('SELECT * FROM Cart WHERE idUser=? and idDish=?');
        $stmt->execute(array($idUser, $idDi));

        $cart = array();

        while ($c = $stmt->fetch()){
            $cart[] = new Cart(
                $c['id'],
                $c['idDish'],
                $c['idUser']
            );
        }
        if(sizeof($cart)>0)
            return true;
        else
            return false;
    }

    static function removefromCart(PDO $db, string $idDi, string $idUser)  {
        $stmt = $db->prepare('DELETE FROM Cart where idUser=? and idDish=?' );
        $stmt->execute(array($idUser, $idDi));
    }
}
?>