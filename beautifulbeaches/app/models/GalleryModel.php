<?php
class GalleryModel {
    private $__conn;

    public function __construct($conn) {
        $this->__conn = $conn;
    }

    public function getImages() {
        try {
            $sql = "
                SELECT picture_link 
                FROM beach_picture
                 ";
            $stmt = $this->__conn->prepare($sql);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>