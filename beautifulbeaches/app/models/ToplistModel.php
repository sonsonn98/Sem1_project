<?php
class ToplistModel {
    private $__conn;

    public function __construct($conn) {
        $this->__conn = $conn;
    }

    public function getZoneById($zone_id) {
        try {
            $sql = "SELECT * FROM zones WHERE zone_id = :zone_id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':zone_id', $zone_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getBeachesByZoneId($zone_id) {
        try {
            $sql = "
                SELECT id, name, c.country_name
                FROM beaches b
                JOIN countries c ON b.country_id = c.country_id
                JOIN zones z on z.zone_id = c.zone_id
                WHERE z.zone_id = :zone_id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':zone_id', $zone_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public function getImageSlider($beach_id) {
        try {
            $sql = "
                SELECT picture_link 
                FROM beach_picture 
                WHERE beach_id = :beach_id 
                AND type = 'list_slider_img'";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':beach_id', $beach_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
