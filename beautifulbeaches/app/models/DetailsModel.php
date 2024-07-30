<?php
class DetailsModel
{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }
    public function getBeachDetail($beach_id) {
        try {
            $sql = " SELECT b.*, c.country_name
                FROM beaches b
                JOIN countries c ON b.country_id = c.country_id
                WHERE b.id = :beach_id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':beach_id',$beach_id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo "".$e->getMessage();
        } 
    }

    public function getBeachImages($beach_id, $type) {
        try {
            $sql = "
                SELECT picture_link 
                FROM beach_picture 
                WHERE beach_id = :beach_id AND type = :type";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':beach_id', $beach_id, PDO::PARAM_INT);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getTraitsByIds($id) {
        try {
            $sql = "
                SELECT *
                FROM beach_traits
                WHERE id = :id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getMoreInfoByIds($id) {
        try {
            $sql = "
                    SELECT * FROM beach_more_info
                    WHERE id = :id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getBeachWeather($id) {
        try {
            $sql = "SELECT * from beach_weather_view where beach_id = :id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
} 

}

public function saveReviews($starValue, $beach_id, $name, $comment)
{
    try {
        $sql = "INSERT INTO beach_review (`rating`, `beach_id`, `reviewer_name`, `review_comments`) 
        VALUES (:rating, :beach_id, :reviewer_name, :review_comments)";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam(":rating", $starValue, PDO::PARAM_INT);
        $stmt->bindParam(":beach_id", $beach_id, PDO::PARAM_INT);
        $stmt->bindParam(":reviewer_name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":review_comments", $comment, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}

public function getAllReviews($beach_id)
{
    try {
        $sql = "select * from beach_review where beach_id = :beach_id order by rating desc";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam(":beach_id", $beach_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}


    
}
?>
