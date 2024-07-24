<?php
class DetailsModel {
    private $__conn;
    public function __construct($conn) {
        $this->__conn = $conn;
    }
        
    public function getBeachDetail($beach_id) {
        try {
            $sql = " SELECT b.id, b.name, b.description, c.country_name,b.description_title,b.trait1_id, b.trait2_id, b.trait3_id
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
                SELECT trait_id, trait_name, trait_description, trait_img
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




    }



?>