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

    public function getBeachesByZoneId($zone_id, $limit, $offset, $search) {
        try {
            $search = "%$search%";
            $sql = "
                SELECT b.id, b.name, c.country_name
                FROM beaches b
                JOIN countries c ON b.country_id = c.country_id
                JOIN zones z ON z.zone_id = c.zone_id
                WHERE z.zone_id = :zone_id AND (b.name LIKE :search OR c.country_name LIKE :search)
                LIMIT :limit OFFSET :offset";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':zone_id', $zone_id, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function countBeachesByZoneId($zone_id, $search) {
        try {
            $search = "%$search%";
            $sql = "
                SELECT COUNT(*) as total
                FROM beaches b
                JOIN countries c ON b.country_id = c.country_id
                JOIN zones z ON z.zone_id = c.zone_id
                WHERE z.zone_id = :zone_id AND (b.name LIKE :search OR c.country_name LIKE :search)";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(':zone_id', $zone_id, PDO::PARAM_INT);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
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
