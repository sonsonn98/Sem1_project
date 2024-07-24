<?php
class DetailsModel {
    private $__conn;
    public function __construct($conn) {
        $this->__conn = $conn;
    }
        
    public function addReviewReview ($rating, $beache_id, $name, $comment) {
        try {
            $sql = "insert into beach_review (`name`)";
        } catch (PDOException $e) {
            echo "error".$e->getMessage();
        }
    }




    }



?>