<?php
declare(strict_types = 1);

class Comment
{
    public int $id;
    public int $idReview;
    public int $idRestaurant;
    public int $idUser;
    public int $fromRestaurant;
    public string $date;
    public string $comment;

    public function __construct(int $id, int $idReview, int $idRestaurant, int $idUser, string $date, string $comment, int $fromRestaurant)
    {
        $this->id = $id;
        $this->idReview = $idReview;
        $this->date=$date;
        $this->idUser=$idUser;
        $this->idRestaurant=$idRestaurant;
        $this->comment = $comment;
        $this->fromRestaurant=$fromRestaurant;
    }

    static public function getComments(PDO $db, int $idReview): array
    {
        $stmt = $db->prepare('
                SELECT Comment.id as id, idReview, idRestaurant, idUser, Comment.date as date, comment, fromRestaurant
                FROM Review, Comment
                WHERE idReview = ? and idReview=Review.id
                Order by id ;
            ');

        $stmt->execute(array($idReview));

        $comments = array();

        while ($comment = $stmt->fetch()) {
            $comments[] = new Comment(
                $comment['id'],
                $comment['idReview'],
                $comment['idRestaurant'],
                $comment['idUser'],
                $comment['date'],
                $comment['comment'],
                $comment['fromRestaurant'],
            );
        }
        return $comments;
    }

    static function addComment(PDO $db,int $idReview, int $restaurant, string $date, string $comment)  {
        $stmt = $db->prepare('INSERT INTO Comment(idReview, fromRestaurant, date, comment) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($idReview, $restaurant, $date, $comment));
    }

    static function removeComment(PDO $db, int $id)  {
        $stmt = $db->prepare('DELETE FROM Comment where id=?' );
        $stmt->execute(array($id));
    }
}