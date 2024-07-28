<?php
class BestModel {
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function getTopRatedBeaches() {
        try {
            $sql = "
                SELECT b.id, b.name, c.country_name, AVG(br.rating) as average_rating
                FROM beaches b
                JOIN countries c ON b.country_id = c.country_id
                JOIN beach_review br ON b.id = br.beach_id
                GROUP BY b.id, b.name, c.country_name
                ORDER BY average_rating DESC
                LIMIT 5"; 
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>