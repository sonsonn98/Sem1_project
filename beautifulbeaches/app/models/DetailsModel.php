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
            $sql = " SELECT b.id, b.name, b.description, c.country_name,
            b.description_title,b.trait1_id, b.trait2_id, b.trait3_id,
            b.more_info1_id,b.more_info2_id,b.more_info3_id,b.more_info4_id
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

    public function getTraitsByIds($trait1_id, $trait2_id, $trait3_id) {
        try {
            $sql = "
                SELECT *
                FROM traits
                WHERE trait_id IN (:trait1_id, :trait2_id, :trait3_id)";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':trait1_id', $trait1_id, PDO::PARAM_INT);
            $stmt->bindParam(':trait2_id', $trait2_id, PDO::PARAM_INT);
            $stmt->bindParam(':trait3_id', $trait3_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getMoreInfoByIds($more_info1_id, $more_info2_id, $more_info3_id, $more_info4_id) {
        try {
            $sql = "
                    SELECT * FROM more_info
                    WHERE more_info_id IN (:more_info1_id, :more_info2_id, :more_info3_id, :more_info4_id)";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam('more_info1_id', $more_info1_id, PDO::PARAM_INT);
            $stmt->bindParam('more_info2_id', $more_info2_id, PDO::PARAM_INT);
            $stmt->bindParam('more_info3_id', $more_info3_id, PDO::PARAM_INT);
            $stmt->bindParam('more_info4_id', $more_info4_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getBeachWeather($beach_id) {
        try {
            $sql = "SELECT * from beach_weather where beach_id = :beach_id order by month asc";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam('beach_id', $beach_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        } }
        
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

    public function getBeachDetails($beach_id)
    {
        try {
            $sql = "SELECT * FROM beaches WHERE id = :beach_id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(":beach_id", $beach_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
        }
    }
}
?>
