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
                Order by date;
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

    static function addReview(PDO $db, string $idRe, int $idUser, string $review, string $date, int $raiting)  {
        $stmt = $db->prepare('INSERT INTO Review(idRestaurant, idUser, review, date, rating) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($idRe, $idUser, $review, $date, $raiting));
    }
}