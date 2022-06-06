<?php
declare(strict_types = 1);

class Review
{
    public int $id;
    public int $idRestaurant;
    public int $idUser;
    public string $review;
    public string $date;
    public int $rating;

    public function __construct(int $id, int $idRestaurant, int $idUser, string $review, string $date,int $rating)
    {

        $this->id = $id;
        $this->idRestaurant = $idRestaurant;
        $this->idUser = $idUser;
        $this->review = $review;
        $this->date=$date;
        $this->rating = $rating;
    }

    static public function getReview(PDO $db, string $idRest): array
    {
        $stmt = $db->prepare('
                SELECT *
                FROM Review
                WHERE idRestaurant = ?
                Order by id DESC ;
            ');

        $stmt->execute(array($idRest));

        $reviews = array();

        while ($review = $stmt->fetch()) {
            $reviews[] = new Review(
                $review['id'],
                $review['idRestaurant'],
                $review['idUser'],
                $review['review'],
                $review['date'],
                $review['rating'],
            );
        }
        return $reviews;
    }

    static public function getRanking(PDO $db, int $idRest)
    {

        $stmt = $db->prepare('
                SELECT round(avg(rating), 1) as average
                FROM Review
                WHERE idRestaurant = ?
            ');

        $stmt->execute(array($idRest));

        $review = $stmt->fetch();
        return $review['average'];
    }

    static function addReview(PDO $db, string $idRe, int $idUser, string $review, string $date, int $raiting)  {
        $stmt = $db->prepare('INSERT INTO Review(idRestaurant, idUser, review, date, rating) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($idRe, $idUser, $review, $date, $raiting));
    }

    static function removeReview(PDO $db, int $id)  {
        $stmt = $db->prepare('DELETE FROM Review where id=?' );
        $stmt->execute(array($id));
    }

    static function updateReview(PDO $db, int $id, string $review, int $rating)  {
        $stmt = $db->prepare('Update Review set review=?, rating=? where id=?' );
        $stmt->execute(array($review,$rating, $id));
    }
}