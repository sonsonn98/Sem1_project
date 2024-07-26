<?php
class DetailsModel
{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function saveReviews($starValue, $beache_id, $name, $comment)
    {
        try {
            $sql = "INSERT INTO beach_review (`rating`, `beach_id`, `reviewer_name`, `review_comments`) 
            VALUES (:rating, :beach_id, :reviewer_name, :review_comments)";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(":rating", $starValue, PDO::PARAM_INT);
            $stmt->bindParam(":beach_id", $beache_id, PDO::PARAM_INT);
            $stmt->bindParam(":reviewer_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":review_comments", $comment, PDO::PARAM_STR);
            $stmt->execute();
            header("location: http://localhost/beautifulbeaches/details/index");
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
        }
    }

    public function getAllReviews()
    {
        try {
            $sql = "select * from beache_review";
            $stmt = $this->__conn->prepare($sql);
            $reviews = $stmt->execute();
            return $reviews;
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
        }
    }
}
